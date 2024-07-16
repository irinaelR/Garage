<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Travaux_model extends CI_Model {

    private $numVoiture;
private $typeVoiture;
private $dateDebut;
private $heureDebut;
private $typeService;
private $montant;
private $datePayement;
private $duree;
private $slot;

    public function __construct() {
        parent::__construct();
        $this->load->database();
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
public function getTypeVoiture()
{
    return $this->typeVoiture;
}

/**
* @param mixed $typeVoiture
*/
public function setTypeVoiture($typeVoiture)
{
    $this->typeVoiture = $typeVoiture;
}

/**
* @return mixed
*/
public function getDateDebut()
{
    return $this->dateDebut;
}

/**
* @param mixed $dateDebut
*/
public function setDateDebut($dateDebut)
{
    $this->dateDebut = $dateDebut;
}

/**
* @return mixed
*/
public function getHeureDebut()
{
    return $this->heureDebut;
}

/**
* @param mixed $heureDebut
*/
public function setHeureDebut($heureDebut)
{
    $this->heureDebut = $heureDebut;
}

/**
* @return mixed
*/
public function getTypeService()
{
    return $this->typeService;
}

/**
* @param mixed $typeService
*/
public function setTypeService($typeService)
{
    $this->typeService = $typeService;
}

/**
* @return mixed
*/
public function getMontant()
{
    return $this->montant;
}

/**
* @param mixed $montant
*/
public function setMontant($montant)
{
    $this->montant = $montant;
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

/**
* @return mixed
*/
public function getDuree()
{
    return $this->duree;
}

/**
* @param mixed $duree
*/
public function setDuree($duree)
{
    $this->duree = $duree;
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
        return $this->db->insert('garage_travaux', $data);
    }

    public function get_all_items() {
        $query = $this->db->get('garage_travaux');
        return $query->result_array();
    }

    public function get_item_by_id($id) {
        $query = $this->db->get_where('garage_travaux', array('id' => $id));
        return $query->row_array();
    }

    public function update_item($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('garage_travaux', $data);
    }

    public function delete_item($id) {
        $this->db->where('id', $id);
        return $this->db->delete('garage_travaux');
    }
}
