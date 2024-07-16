<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['title'] = "Sign In Admin";
        $this->load->view('templates/header', $data);

        // $this->load->view('templates/navbar', $data);
        $this->load->view('profil-admin/admin_sign_in');
        $this->load->view('templates/footer');
    }

    public function view($id) {
        $item = $this->admin_model->get_item_by_id($id);
        echo json_encode($item);
    }

    public function create() {
        $this->form_validation->set_rules('idAdmin', 'IdAdmin', 'required');
        $this->form_validation->set_rules('identifiant', 'Identifiant', 'required');
        $this->form_validation->set_rules('mdp', 'Mdp', 'required');


        if ($this->form_validation->run() === FALSE) {
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
            );
            echo json_encode($response);
        } else {
            $data = array(
                'idAdmin' => $this->input->post('idAdmin'),
                'identifiant' => $this->input->post('identifiant'),
                'mdp' => $this->input->post('mdp'),

            );
            if ($this->admin_model->create_item($data)) {
                $response = array(
                    'status' => 'success',
                    'message' => 'Item created successfully.'
                );
            } else {
                $response = array(
                    'status' => 'error',
                    'message' => 'Failed to create item.'
                );
            }
            echo json_encode($response);
        }
    }

    public function log_admin() {
        $this->form_validation->set_rules('identifiant', 'Identifiant', 'required');
        $this->form_validation->set_rules('mdp', 'Mdp', 'required');


        if ($this->form_validation->run() === FALSE) {
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
            );
            echo json_encode($response);
        } else {
            $identifiant = $this->input->post('identifiant');
            $mdp = $this->input->post('mdp');
            $hashedPass = hash('sha256', $mdp);
            if ($this->admin_model->get_item_by_logs($identifiant, $hashedPass)) {
                $response = array(
                    'status' => 'success',
                    'message' => 'Logged successfuly.'
                );
            } else {
                $response = array(
                    'status' => 'error',
                    'message' => 'Identifiants incorrects.'
                );
            }
            echo json_encode($response);
        }
    }

    public function update($id) {
        $this->form_validation->set_rules('idAdmin', 'IdAdmin', 'required');
        $this->form_validation->set_rules('identifiant', 'Identifiant', 'required');
        $this->form_validation->set_rules('mdp', 'Mdp', 'required');


        if ($this->form_validation->run() === FALSE) {
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
            );
            echo json_encode($response);
        } else {
            $data = array(
                'idAdmin' => $this->input->post('idAdmin'),
                'identifiant' => $this->input->post('identifiant'),
                'mdp' => $this->input->post('mdp'),

            );
            if ($this->admin_model->update_item($id, $data)) {
                $response = array(
                    'status' => 'success',
                    'message' => 'Item updated successfully.'
                );
            } else {
                $response = array(
                    'status' => 'error',
                    'message' => 'Failed to update item.'
                );
            }
            echo json_encode($response);
        }
    }

    public function delete($id) {
        if ($this->admin_model->delete_item($id)) {
            $response = array(
                'status' => 'success',
                'message' => 'Item deleted successfully.'
            );
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Failed to delete item.'
            );
        }
        echo json_encode($response);
    }

}

