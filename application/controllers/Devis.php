<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Devis extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('devis_model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index() {
        $items = $this->devis_model->get_all_items();
        echo json_encode($items);
    }

    public function view($id) {
        $item = $this->devis_model->get_item_by_id($id);
        echo json_encode($item);
    }

    public function create() {
        $this->form_validation->set_rules('idDevis', 'IdDevis', 'required');
$this->form_validation->set_rules('dateDevis', 'DateDevis', 'required');
$this->form_validation->set_rules('numVoiture', 'NumVoiture', 'required');
$this->form_validation->set_rules('nomService', 'NomService', 'required');
$this->form_validation->set_rules('prixService', 'PrixService', 'required');
$this->form_validation->set_rules('dureeService', 'DureeService', 'required');
$this->form_validation->set_rules('slot', 'Slot', 'required');


        if ($this->form_validation->run() === FALSE) {
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
            );
            echo json_encode($response);
        } else {
            $data = array(
                'idDevis' => $this->input->post('idDevis'),
'dateDevis' => $this->input->post('dateDevis'),
'numVoiture' => $this->input->post('numVoiture'),
'nomService' => $this->input->post('nomService'),
'prixService' => $this->input->post('prixService'),
'dureeService' => $this->input->post('dureeService'),
'slot' => $this->input->post('slot'),

            );
            if ($this->devis_model->create_item($data)) {
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
        $this->form_validation->set_rules('idDevis', 'IdDevis', 'required');
$this->form_validation->set_rules('dateDevis', 'DateDevis', 'required');
$this->form_validation->set_rules('numVoiture', 'NumVoiture', 'required');
$this->form_validation->set_rules('nomService', 'NomService', 'required');
$this->form_validation->set_rules('prixService', 'PrixService', 'required');
$this->form_validation->set_rules('dureeService', 'DureeService', 'required');
$this->form_validation->set_rules('slot', 'Slot', 'required');


        if ($this->form_validation->run() === FALSE) {
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
            );
            echo json_encode($response);
        } else {
            $data = array(
                'idDevis' => $this->input->post('idDevis'),
'dateDevis' => $this->input->post('dateDevis'),
'numVoiture' => $this->input->post('numVoiture'),
'nomService' => $this->input->post('nomService'),
'prixService' => $this->input->post('prixService'),
'dureeService' => $this->input->post('dureeService'),
'slot' => $this->input->post('slot'),

            );
            if ($this->devis_model->update_item($id, $data)) {
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
        if ($this->devis_model->delete_item($id)) {
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

    public function exportDevisPdf(){
        // $id = $this->input->get('id');
        $devis = $this->devis_model->get_item_by_id(1);

        $data['devis'] = $devis;
        $this->load->model('pdfGenerator_model');
        $this->pdfGenerator_model->generate_pdf($data);
        // $this->load->view('pdf_template', $data);
    }
}

