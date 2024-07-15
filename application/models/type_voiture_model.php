<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Type_voiture_model extends CI_Model {

    private $idTypeVoiture;
private $nom;

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
* @return mixed
*/
public function getIdTypeVoiture()
{
    return $this->idTypeVoiture;
}

/**
* @param mixed $idTypeVoiture
*/
public function setIdTypeVoiture($idTypeVoiture)
{
    $this->idTypeVoiture = $idTypeVoiture;
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
        return $this->db->insert('garage_type_voiture', $data);
    }

    public function get_all_items() {
        $query = $this->db->get('garage_type_voiture');
        return $query->result_array();
    }

    public function get_item_by_id($id) {
        $query = $this->db->get_where('garage_type_voiture', array('id' => $id));
        return $query->row_array();
    }

    public function update_item($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('garage_type_voiture', $data);
    }

    public function delete_item($id) {
        $this->db->where('id', $id);
        return $this->db->delete('garage_type_voiture');
    }
}
