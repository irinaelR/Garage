<?php

class Dashboard extends CI_Controller
{

    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('dashboard_model');
    }

    public function index(){
        $date_reference = config_item('dateDebut');

        $data = array();

        $total_CA = $this->dashboard_model->get_total_CA($date_reference);
        $presta_paye = $this->dashboard_model->get_presta_payes($date_reference);
        $presta_impaye = $this->dashboard_model->get_presta_impayes($date_reference);

        $data['title'] = "Dashboard";
        $data['total_CA'] = $total_CA;
        $data['presta_paye'] = $presta_paye;
        $data['presta_impaye'] = $presta_impaye;


        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('backoffice/dashboard', $data);
        $this->load->view('templates/footer');
    }

}