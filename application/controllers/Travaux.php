<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Travaux extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('travaux_model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index() {
        $items = $this->travaux_model->get_all_items();
        echo json_encode($items);
    }

    public function view($id) {
        $item = $this->travaux_model->get_item_by_id($id);
        echo json_encode($item);
    }

    public function create() {
        $this->form_validation->set_rules('numVoiture', 'NumVoiture', 'required');
$this->form_validation->set_rules('typeVoiture', 'TypeVoiture', 'required');
$this->form_validation->set_rules('dateDebut', 'DateDebut', 'required');
$this->form_validation->set_rules('heureDebut', 'HeureDebut', 'required');
$this->form_validation->set_rules('typeService', 'TypeService', 'required');
$this->form_validation->set_rules('montant', 'Montant', 'required');
$this->form_validation->set_rules('datePayement', 'DatePayement', 'required');
$this->form_validation->set_rules('duree', 'Duree', 'required');
$this->form_validation->set_rules('slot', 'Slot', 'required');


        if ($this->form_validation->run() === FALSE) {
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
            );
            echo json_encode($response);
        } else {
            $data = array(
                'numVoiture' => $this->input->post('numVoiture'),
'typeVoiture' => $this->input->post('typeVoiture'),
'dateDebut' => $this->input->post('dateDebut'),
'heureDebut' => $this->input->post('heureDebut'),
'typeService' => $this->input->post('typeService'),
'montant' => $this->input->post('montant'),
'datePayement' => $this->input->post('datePayement'),
'duree' => $this->input->post('duree'),
'slot' => $this->input->post('slot'),

            );
            if ($this->travaux_model->create_item($data)) {
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
        $this->form_validation->set_rules('numVoiture', 'NumVoiture', 'required');
$this->form_validation->set_rules('typeVoiture', 'TypeVoiture', 'required');
$this->form_validation->set_rules('dateDebut', 'DateDebut', 'required');
$this->form_validation->set_rules('heureDebut', 'HeureDebut', 'required');
$this->form_validation->set_rules('typeService', 'TypeService', 'required');
$this->form_validation->set_rules('montant', 'Montant', 'required');
$this->form_validation->set_rules('datePayement', 'DatePayement', 'required');
$this->form_validation->set_rules('duree', 'Duree', 'required');
$this->form_validation->set_rules('slot', 'Slot', 'required');


        if ($this->form_validation->run() === FALSE) {
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
            );
            echo json_encode($response);
        } else {
            $data = array(
                'numVoiture' => $this->input->post('numVoiture'),
'typeVoiture' => $this->input->post('typeVoiture'),
'dateDebut' => $this->input->post('dateDebut'),
'heureDebut' => $this->input->post('heureDebut'),
'typeService' => $this->input->post('typeService'),
'montant' => $this->input->post('montant'),
'datePayement' => $this->input->post('datePayement'),
'duree' => $this->input->post('duree'),
'slot' => $this->input->post('slot'),

            );
            if ($this->travaux_model->update_item($id, $data)) {
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
        if ($this->travaux_model->delete_item($id)) {
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

