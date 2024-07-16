<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Csv_traitement extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index(){
        $data['title'] = 'Csv';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
		$this->load->view('backoffice/import_csv', $data);
        $this->load->view('templates/footer');        
    }

    public function readCsv(){
        $config['upload_path'] = 'assets/files/';
        $config['allowed_types'] = 'csv|txt';
        $config['overwrite'] = TRUE;

        $separator = $this->input->post('separator');
    
        $this->load->model('import_model');

        $this->import_model->import_service($config, $separator);
        $this->import_model->import_travaux($config, $separator);

        $data['title'] = 'csv';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('backoffice/import_csv', $data);
        $this->load->view('templates/footer');
    }

    public function deleteData() {
        $first = $this->db->empty_table('garage_prestation');
        $second = $this->db->empty_table('garage_rendez_vous');
        $third = $this->db->empty_table('garage_devis');
        $fourth = $this->db->empty_table('garage_service');
        $fifth = $this->db->empty_table('garage_client');
        $last = $this->db->empty_table('garage_type_voiture');
        if ($first && $second && $third && $fourth && $first && $last){
            echo "Base supprimée avec succès";
        } else {
            echo "Une erreur s'est produite";
        }
    }
}
