DELIMITER //

CREATE FUNCTION END_DATETIME(dateDebut DATETIME, duree TIME, heureOuverture TIME, heureFermeture TIME)
RETURNS DATETIME
NO SQL
BEGIN
    DECLARE end_datetime DATETIME;
    DECLARE remaining_time TIME;

    IF ADDTIME(dateDebut, duree) > CONCAT(DATE(dateDebut), ' ', heureFermeture) THEN
        SET remaining_time = TIMEDIFF(ADDTIME(dateDebut, duree), CONCAT(DATE(dateDebut), ' ', heureFermeture));
        SET end_datetime = CONCAT(DATE(DATE_ADD(dateDebut, INTERVAL 1 DAY)), ' ', heureOuverture);
        SET end_datetime = ADDTIME(end_datetime, remaining_time);
    ELSE 
        SET end_datetime = ADDTIME(dateDebut, duree);
    END IF;

    RETURN end_datetime;
END //

DELIMITER ;

SELECT idSlot FROM garage_slot WHERE idSlot IN
    (SELECT idSlot
    FROM garage_rendez_vous AS rdv
    JOIN garage_service AS s
        ON rdv.idService = s.idService
    WHERE
            -- va commencer avant et va se finir après le début du nouveau rdv
            ((rdv.dateDebut < '2024-07-15 09:00:00' AND END_DATETIME(rdv.dateDebut, s.duree, '08:00:00', '18:00:00') > '2024-07-15 09:00:00')
            OR
            -- va commencer pendant l'intervalle du nouveau rdv
            (rdv.dateDebut >= '2024-07-15 09:00:00' AND rdv.dateDebut < END_DATETIME('2024-07-15 09:00:00', '02:00:00', '08:00:00', '18:00:00')));

SELECT idSlot, COUNT(*) AS nb FROM garage_rendez_vous AS rdv
    WHERE (rdv.dateDebut < ? AND rdv.dateDebut >= ?) OR (END_DATETIME(rdv.dateDebut, s.duree, (SELECT heure FROM garage_horaires WHERE nom='ouverture'), (SELECT heure FROM garage_horaires WHERE nom='fermeture')) < ? AND END_DATETIME(rdv.dateDebut, s.duree, (SELECT heure FROM garage_horaires WHERE nom='ouverture'), (SELECT heure FROM garage_horaires WHERE nom='fermeture')) >= ?)

DELIMITER //

CREATE OR REPLACE FUNCTION AVAILABLE_SLOTS(dateDebut DATETIME, idService INT, heureOuverture TIME, heureFermeture TIME)
RETURNS INT
BEGIN
    DECLARE first_available_slot INT;

    SELECT idSlot INTO first_available_slot FROM garage_slot WHERE idSlot NOT IN
    (SELECT idSlot
    FROM garage_rendez_vous AS rdv
    JOIN garage_service AS s
        ON rdv.idService = s.idService
    WHERE
            -- va commencer avant et va se finir après le début du nouveau rdv
            ((rdv.dateDebut < dateDebut AND END_DATETIME(rdv.dateDebut, s.duree, heureOuverture, heureFermeture) > dateDebut))
            OR
            -- va commencer pendant l'intervalle du nouveau rdv
            (rdv.dateDebut >= dateDebut AND rdv.dateDebut < END_DATETIME(dateDebut, (SELECT duree FROM garage_service AS s WHERE s.idService = idService), heureOuverture, heureOuverture))
    ) LIMIT 1;

    RETURN first_available_slot;
END //

DELIMITER ;