<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rendez_vous_model extends CI_Model {

    private $idRendezVous;
private $dateDebut;
private $idService;
private $idSlot;
private $idClient;

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
* @return mixed
*/
public function getIdRendezVous()
{
    return $this->idRendezVous;
}

/**
* @param mixed $idRendezVous
*/
public function setIdRendezVous($idRendezVous)
{
    $this->idRendezVous = $idRendezVous;
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
public function getIdService()
{
    return $this->idService;
}

/**
* @param mixed $idService
*/
public function setIdService($idService)
{
    $this->idService = $idService;
}

/**
* @return mixed
*/
public function getIdSlot()
{
    return $this->idSlot;
}

/**
* @param mixed $idSlot
*/
public function setIdSlot($idSlot)
{
    $this->idSlot = $idSlot;
}

/**
* @return mixed
*/
public function getIdClient()
{
    return $this->idClient;
}

/**
* @param mixed $idClient
*/
public function setIdClient($idClient)
{
    $this->idClient = $idClient;
}

    public function create_item($data) {
        return $this->db->insert('garage_rendez_vous', $data);
    }

    public function get_all_items() {
        $query = $this->db->get('garage_rendez_vous');
        return $query->result_array();
    }

    public function get_item_by_id($id) {
        $query = $this->db->get_where('garage_rendez_vous', array('id' => $id));
        return $query->row_array();
    }

    public function update_item($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('garage_rendez_vous', $data);
    }

    public function delete_item($id) {
        $this->db->where('id', $id);
        return $this->db->delete('garage_rendez_vous');
    }

    public function insert_from_travaux(){
        $sql = "INSERT INTO garage_rendez_vous (dateDebut, idService, idSlot, idClient)
                (select distinct CONCAT(garage_travaux.dateDebut, ' ',garage_travaux.heureDebut ) as dateDebut, garage_service.idService ,garage_travaux.slot, garage_client.idClient from garage_travaux join garage_service on garage_travaux.typeService = garage_service.nom join garage_client on garage_travaux.numVoiture = garage_client.numVoiture)";
        return $this->db->query($sql);
    }
}
