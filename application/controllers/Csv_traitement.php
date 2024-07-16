<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Csv_traitement extends CI_Controller {
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

        $data['title'] = 'Csv';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('backoffice/import_csv', $data);
        $this->load->view('templates/footer');
    }
}
?>