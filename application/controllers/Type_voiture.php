<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Type_voiture extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('type_voiture_model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index() {
        $items = $this->type_voiture_model->get_all_items();
        echo json_encode($items);
    }

    public function view($id) {
        $item = $this->type_voiture_model->get_item_by_id($id);
        echo json_encode($item);
    }

    public function create() {
        $this->form_validation->set_rules('idTypeVoiture', 'IdTypeVoiture', 'required');
$this->form_validation->set_rules('nom', 'Nom', 'required');


        if ($this->form_validation->run() === FALSE) {
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
            );
            echo json_encode($response);
        } else {
            $data = array(
                'idTypeVoiture' => $this->input->post('idTypeVoiture'),
'nom' => $this->input->post('nom'),

            );
            if ($this->type_voiture_model->create_item($data)) {
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
        $this->form_validation->set_rules('idTypeVoiture', 'IdTypeVoiture', 'required');
$this->form_validation->set_rules('nom', 'Nom', 'required');


        if ($this->form_validation->run() === FALSE) {
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
            );
            echo json_encode($response);
        } else {
            $data = array(
                'idTypeVoiture' => $this->input->post('idTypeVoiture'),
'nom' => $this->input->post('nom'),

            );
            if ($this->type_voiture_model->update_item($id, $data)) {
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
        if ($this->type_voiture_model->delete_item($id)) {
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

