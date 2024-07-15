<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Devis_model extends CI_Model {

    private $idDevis;
private $dateDevis;
private $numVoiture;
private $nomService;
private $prixService;
private $dureeService;
private $slot;

    public function __construct() {
        parent::__construct();
        $this->load->database();
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
public function getDateDevis()
{
    return $this->dateDevis;
}

/**
* @param mixed $dateDevis
*/
public function setDateDevis($dateDevis)
{
    $this->dateDevis = $dateDevis;
}

/**
* @return mixed
*/
public function getNumVoiture()
{
    return $this->numVoiture;
}

/**
* @param mixed $numVoiture
*/
public function setNumVoiture($numVoiture)
{
    $this->numVoiture = $numVoiture;
}

/**
* @return mixed
*/
public function getNomService()
{
    return $this->nomService;
}

/**
* @param mixed $nomService
*/
public function setNomService($nomService)
{
    $this->nomService = $nomService;
}

/**
* @return mixed
*/
public function getPrixService()
{
    return $this->prixService;
}

/**
* @param mixed $prixService
*/
public function setPrixService($prixService)
{
    $this->prixService = $prixService;
}

/**
* @return mixed
*/
public function getDureeService()
{
    return $this->dureeService;
}

/**
* @param mixed $dureeService
*/
public function setDureeService($dureeService)
{
    $this->dureeService = $dureeService;
}

/**
* @return mixed
*/
public function getSlot()
{
    return $this->slot;
}

/**
* @param mixed $slot
*/
public function setSlot($slot)
{
    $this->slot = $slot;
}



    public function create_item($data) {
        return $this->db->insert('garage_devis', $data);
    }

    public function get_all_items() {
        $query = $this->db->get('garage_devis');
        return $query->result_array();
    }

    public function get_item_by_id($id) {
        $query = $this->db->get_where('garage_devis', array('idDevis' => $id));
        return $query->row_array();
    }

    public function update_item($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('garage_devis', $data);
    }

    public function delete_item($id) {
        $this->db->where('id', $id);
        return $this->db->delete('garage_devis');
    }
}
