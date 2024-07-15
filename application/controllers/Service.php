<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('service_model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index() {
        $items = $this->service_model->get_all_items();
        echo json_encode($items);
    }

    public function view($id) {
        $item = $this->service_model->get_item_by_id($id);
        echo json_encode($item);
    }

    public function create() {
        $this->form_validation->set_rules('idService', 'IdService', 'required');
        $this->form_validation->set_rules('nom', 'Nom', 'required');
        $this->form_validation->set_rules('duree', 'Duree', 'required');
        $this->form_validation->set_rules('prix', 'Prix', 'required');


        if ($this->form_validation->run() === FALSE) {
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
            );
            echo json_encode($response);
        } else {
            $data = array(
                'idService' => $this->input->post('idService'),
                'nom' => $this->input->post('nom'),
                'duree' => $this->input->post('duree'),
                'prix' => $this->input->post('prix'),
            );
            if ($this->service_model->create_item($data)) {
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

    public function update($id) {
        $this->form_validation->set_rules('idService', 'IdService', 'required');
        $this->form_validation->set_rules('nom', 'Nom', 'required');
        $this->form_validation->set_rules('duree', 'Duree', 'required');
        $this->form_validation->set_rules('prix', 'Prix', 'required');


        if ($this->form_validation->run() === FALSE) {
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
            );
            echo json_encode($response);
        } else {
            $data = array(
                'idService' => $this->input->post('idService'),
                'nom' => $this->input->post('nom'),
                'duree' => $this->input->post('duree'),
                'prix' => $this->input->post('prix'),

            );
            if ($this->service_model->update_item($id, $data)) {
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
        if ($this->service_model->delete_item($id)) {
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

