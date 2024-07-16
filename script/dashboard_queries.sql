-- Total CA jusqu'à date de reference
SELECT sum(gd.prixService) FROM garage_prestation gp JOIN garage_devis gd ON gp.idDevis = gd.idDevis WHERE gp.datePayement <= ?

-- Presta payées et presta impayées jusqu'à date de reference
    -- presta payées
SELECT * FROM garage_prestation gp LEFT JOIN garage_devis gd ON gp.idDevis = gd.idDevis WHERE gp.idDevis IS NOT NULL AND gp.datePayement <= ?

    -- presta impayéés -> devis
SELECT * FROM garage_prestation gp LEFT JOIN garage_devis gd ON gp.idDevis = gd.idDevis WHERE gp.idDevis IS NULL AND gd.dateDevis <= ?
