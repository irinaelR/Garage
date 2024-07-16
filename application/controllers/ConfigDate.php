<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ConfigDate extends CI_Controller {
    public function setDateReference(){
        $date = $this->input->post('date');

        $this->config->set_item('dateDebut' , $date);

        $data['reference'] = config_item('dateDebut');
        $data['title'] = 'Date';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
		$this->load->view('backoffice/date_reference', $data);
        $this->load->view('templates/footer');
    }

    public function index(){
        $date = config_item('dateDebut');
        $data['title'] = 'Date';
        $data['reference'] = $date;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
		$this->load->view('backoffice/date_reference', $data);
        $this->load->view('templates/footer');
    }
}
?>