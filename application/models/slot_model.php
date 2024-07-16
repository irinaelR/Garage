<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slot_model extends CI_Model {

    private $idSlot;
private $nom;

    public function __construct() {
        parent::__construct();
        $this->load->database();
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
public function getNom()
{
    return $this->nom;
}

/**
* @param mixed $nom
*/
public function setNom($nom)
{
    $this->nom = $nom;
}



    public function create_item($data) {
        return $this->db->insert('garage_slot', $data);
    }

    public function get_all_items() {
        $query = $this->db->get('garage_slot');
        return $query->result_array();
    }

    public function get_item_by_id($id) {
        $query = $this->db->get_where('garage_slot', array('id' => $id));
        return $query->row_array();
    }

    public function update_item($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('garage_slot', $data);
    }

    public function delete_item($id) {
        $this->db->where('id', $id);
        return $this->db->delete('garage_slot');
    }

    public function get_available($dateDebut, $duree) {
        $heureOuverture = $this->db->get_where('garage_horaire', array('nom' => 'ouverture'));
        $heureOuvertureRA = $heureOuverture->row_array();
        $heureFermeture = $this->db->get_where('garage_horaire', array('nom' => 'fermeture'));
        $heureFermetureRA = $heureFermeture->row_array();


        $sql = "SELECT * from garage_slot WHERE idSlot NOT IN (SELECT rdv.idSlot FROM garage_rendez_vous AS rdv JOIN garage_service AS s ON rdv.idService = s.idService WHERE ((rdv.dateDebut < ? AND END_DATETIME(rdv.dateDebut, s.duree, ?, ?) > ?) OR (rdv.dateDebut >= ? AND rdv.dateDebut < END_DATETIME(?, ?, ?, ?))))";

        $query_data = array($dateDebut, $heureOuvertureRA["heure"], $heureFermetureRA["heure"], $dateDebut, $dateDebut, $dateDebut, $duree, $heureOuvertureRA["heure"], $heureFermetureRA["heure"]);

        $query = $this->db->query($sql, $query_data);

        return $query->result_array();
    }
}
