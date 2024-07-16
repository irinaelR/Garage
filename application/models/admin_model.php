<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    private $idAdmin;
    private $identifiant;
    private $mdp;

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
    * @return mixed
    */
    public function getIdAdmin()
    {
        return $this->idAdmin;
    }

    /**
    * @param mixed $idAdmin
    */
    public function setIdAdmin($idAdmin)
    {
        $this->idAdmin = $idAdmin;
    }

    /**
    * @return mixed
    */
    public function getIdentifiant()
    {
        return $this->identifiant;
    }

    /**
    * @param mixed $identifiant
    */
    public function setIdentifiant($identifiant)
    {
        $this->identifiant = $identifiant;
    }

    /**
    * @return mixed
    */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
    * @param mixed $mdp
    */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    }



    public function create_item($data) {
        return $this->db->insert('garage_admin', $data);
    }

    public function get_all_items() {
        $query = $this->db->get('garage_admin');
        return $query->result_array();
    }

    public function get_item_by_id($id) {
        $query = $this->db->get_where('garage_admin', array('id' => $id));
        return $query->row_array();
    }

    public function get_item_by_logs($identifiant, $mdp){
        $query = $this->db->get_where('garage_admin', array('identifiant' => $identifiant, 'mdp' => $mdp));
        return $query->row_array();
    }

    public function update_item($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('garage_admin', $data);
    }

    public function delete_item($id) {
        $this->db->where('id', $id);
        return $this->db->delete('garage_admin');
    }
}
