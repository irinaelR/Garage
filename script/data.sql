INSERT INTO garage_slot VALUES
    (NULL, 'A'),
    (NULL, 'B'),
    (NULL, 'C');

INSERT INTO garage_service VALUES 
    (NULL, 'Réparation simple', '01:00:00', 150000),
    (NULL, 'Réparation standard', '02:00:00', 250000),
    (NULL, 'Réparation complexe', '08:00:00', 800000),
    (NULL, 'Entretien', '02:30:00', 300000);

-- légère, 4x4, Utilitaire
INSERT INTO garage_type_voiture VALUES
    (NULL, 'Légère'),
    (NULL, '4x4'),
    (NULL, 'Utilitaire');

INSERT INTO garage_client VALUES 
    (NULL, '4550TBA', 1),
    (NULL, '1920TAJ', 1),
    (NULL, '1360TBL', 2),
    (NULL, '1744TAH', 3);

-- Insert test data into garage_rendez_vous
INSERT INTO garage_rendez_vous (dateDebut, idService, idSlot, idClient) VALUES
    ('2024-07-15 08:00:00', 1, 1, 1),   -- Réparation simple at Slot A for Client 1
    ('2024-07-15 10:00:00', 2, 2, 2),   -- Réparation standard at Slot B for Client 2
    ('2024-07-15 13:00:00', 4, 3, 3),   -- Entretien at Slot C for Client 3
    ('2024-07-15 15:30:00', 3, 1, 4),   -- Réparation complexe at Slot A for Client 4
    ('2024-07-16 09:00:00', 1, 2, 1),   -- Réparation simple at Slot B for Client 1
    ('2024-07-16 11:00:00', 2, 3, 2),   -- Réparation standard at Slot C for Client 2
    ('2024-07-16 14:00:00', 4, 1, 3),   -- Entretien at Slot A for Client 3
    ('2024-07-16 16:30:00', 3, 2, 4),   -- Réparation complexe at Slot B for Client 4
    ('2024-07-17 08:00:00', 1, 3, 1),   -- Réparation simple at Slot C for Client 1
    ('2024-07-17 10:00:00', 2, 1, 2),   -- Réparation standard at Slot A for Client 2
    ('2024-07-17 13:00:00', 4, 2, 3),   -- Entretien at Slot B for Client 3
    ('2024-07-17 15:30:00', 3, 3, 4),   -- Réparation complexe at Slot C for Client 4
    ('2024-07-18 09:00:00', 1, 1, 1),   -- Réparation simple at Slot A for Client 1
    ('2024-07-18 11:00:00', 2, 2, 2),   -- Réparation standard at Slot B for Client 2
    ('2024-07-18 14:00:00', 4, 3, 3);   -- Entretien at Slot C for Client 3
