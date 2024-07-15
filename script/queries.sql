DELIMITER //

CREATE OR REPLACE FUNCTION END_DATETIME(dateDebut DATETIME, duree TIME, heureOuverture TIME, heureFermeture TIME)
RETURNS DATETIME
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

SELECT rdv.*, END_DATETIME(rdv.dateDebut, s.duree, '08:00:00', '18:00:00') AS dateFin
    FROM garage_rendez_vous AS rdv
    JOIN garage_service AS s
        ON rdv.idService = s.idService
    WHERE 
            -- va commencer avant et va se finir après le début du nouveau rdv
            ((rdv.dateDebut < '2024-07-15 09:00:00' AND END_DATETIME(rdv.dateDebut, s.duree, '08:00:00', '18:00:00') > '2024-07-15 09:00:00') 
            OR 
            -- va commencer pendant l'intervalle du nouveau rdv
            (rdv.dateDebut >= '2024-07-15 09:00:00' AND rdv.dateDebut < END_DATETIME('2024-07-15 09:00:00', '02:00:00', '08:00:00', '18:00:00')));