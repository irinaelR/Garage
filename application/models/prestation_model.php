<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prestation_model extends CI_Model {

    private $idPrestation;
private $idDevis;
private $datePayement;

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
* @return mixed
*/
public function getIdPrestation()
{
    return $this->idPrestation;
}

/**
* @param mixed $idPrestation
*/
public function setIdPrestation($idPrestation)
{
    $this->idPrestation = $idPrestation;
}

/**
* @return mixed
*/
public function getIdDevis()
{
    return $this->idDevis;
}

/**
* @param mixed $idDevis
*/
public function setIdDevis($idDevis)
{
    $this->idDevis = $idDevis;
}

/**
* @return mixed
*/
public function getDatePayement()
{
    return $this->datePayement;
}

/**
* @param mixed $datePayement
*/
public function setDatePayement($datePayement)
{
    $this->datePayement = $datePayement;
}



    public function create_item($data) {
        return $this->db->insert('garage_prestation', $data);
    }

    public function get_all_items() {
        $query = $this->db->get('garage_prestation');
        return $query->result_array();
    }

    public function get_item_by_id($id) {
        $query = $this->db->get_where('garage_prestation', array('id' => $id));
        return $query->row_array();
    }

    public function update_item($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('garage_prestation', $data);
    }

    public function delete_item($id) {
        $this->db->where('id', $id);
        return $this->db->delete('garage_prestation');
    }
}
