<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_model extends CI_Model {

    private $idService;
    private $nom;
    private $duree;
    private $prix;

    public function __construct() {
        parent::__construct();
        $this->load->database();
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
    public function getPrix()
    {
        return $this->prix;
    }

    /**
    * @param mixed $prix
    */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }



    public function create_item($data) {
        return $this->db->insert('garage_service', $data);
    }

    public function get_all_items() {
        $query = $this->db->get('garage_service');
        return $query->result_array();
    }

    public function get_item_by_id($id) {
        $query = $this->db->get_where('garage_service', array('idService' => $id));
        return $query->row_array();
    }

    public function update_item($id, $data) {
        $this->db->where('idService', $id);
        return $this->db->update('garage_service', $data);
    }

    public function delete_item($id) {
        $this->db->where('idService', $id);
        return $this->db->delete('garage_service');
    }
}
