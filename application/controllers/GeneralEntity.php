<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GeneralEntity extends CI_Controller {

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
	public function list()
	{
		$data = array();
		$data['title'] = "List"; 
		$this->session->set_userdata('kikou', 'bonjour');

		$data['zizi'] = $this->session->userdata('kikou');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
		$this->load->view('crud/list_and_form', $data);
        $this->load->view('templates/footer');
	}
}
