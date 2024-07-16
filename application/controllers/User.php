<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('type_voiture_model');
        $this->load->model('client_model');
        $this->load->library("session");
    }

    /**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function signIn()
	{
		$data['title'] = "Sign In"; 
        $types = $this->type_voiture_model->get_all_items();
        $data['types'] = $types;

        $this->load->view('templates/header', $data);

        // $this->load->view('templates/navbar', $data);
		$this->load->view('profile/sign_in');
        $this->load->view('templates/footer');
	}

    public function check_session() {
        $client = $this->session->userdata('client');
        if ($client) {
            echo "Session is set: ";
            redirect("/Rendez_vous/nouveau_rdv");
        } else {
            echo "Session is not set.";
        }
    }
}
