<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_model extends CI_Model {

    private $idClient;
private $numVoiture;
private $idTypeVoiture;

    public function __construct() {
        parent::__construct();
        $this->load->database();
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

    public function create_item($data) {
        return $this->db->insert('garage_client', $data);
    }

    public function get_all_items() {
        $query = $this->db->get('garage_client');
        return $query->result_array();
    }

    public function get_item_by_name_type($name){
        $query = $this->db->get_where('garage_client', array('numVoiture' => $name));
        return $query->row_array();
    }

    public function get_item_by_id($id) {
        $query = $this->db->get_where('garage_client', array('id' => $id));
        return $query->row_array();
    }

    public function update_item($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('garage_client', $data);
    }

    public function delete_item($id) {
        $this->db->where('id', $id);
        return $this->db->delete('garage_client');
    }
}
