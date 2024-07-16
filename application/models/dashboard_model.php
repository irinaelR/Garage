<?php

class dashboard_model extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function get_total_CA($date_reference){
        $sql = "SELECT sum(gd.prixService) FROM garage_prestation gp JOIN garage_devis gd ON gp.idDevis = gd.idDevis WHERE gp.datePayement <= %s";
        $sql = sprintf($sql, $this->db->escape($date_reference));
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function get_presta_payes($date_reference){
        $sql = "SELECT * FROM garage_prestation gp LEFT JOIN garage_devis gd ON gp.idDevis = gd.idDevis WHERE gp.idDevis IS NOT NULL AND gp.datePayement <= %s";
        $sql = sprintf($sql, $this->db->escape($date_reference));
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function get_presta_impayes($date_reference){
        $sql = "SELECT * FROM garage_prestation gp LEFT JOIN garage_devis gd ON gp.idDevis = gd.idDevis WHERE gp.idDevis IS NULL AND gd.dateDevis <= %s";
        $sql = sprintf($sql, $this->db->escape($date_reference));
        $query = $this->db->query($sql);
        return $query->row_array();
    }

}