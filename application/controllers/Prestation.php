<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prestation extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('prestation_model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index() {
        $items = $this->prestation_model->get_all_items();
        echo json_encode($items);
    }

    public function view($id) {
        $item = $this->prestation_model->get_item_by_id($id);
        echo json_encode($item);
    }

    public function create() {
        $this->form_validation->set_rules('idPrestation', 'IdPrestation', 'required');
$this->form_validation->set_rules('idDevis', 'IdDevis', 'required');
$this->form_validation->set_rules('datePayement', 'DatePayement', 'required');


        if ($this->form_validation->run() === FALSE) {
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
            );
            echo json_encode($response);
        } else {
            $data = array(
                'idPrestation' => $this->input->post('idPrestation'),
'idDevis' => $this->input->post('idDevis'),
'datePayement' => $this->input->post('datePayement'),

            );
            if ($this->prestation_model->create_item($data)) {
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
        $this->form_validation->set_rules('idPrestation', 'IdPrestation', 'required');
$this->form_validation->set_rules('idDevis', 'IdDevis', 'required');
$this->form_validation->set_rules('datePayement', 'DatePayement', 'required');


        if ($this->form_validation->run() === FALSE) {
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
            );
            echo json_encode($response);
        } else {
            $data = array(
                'idPrestation' => $this->input->post('idPrestation'),
'idDevis' => $this->input->post('idDevis'),
'datePayement' => $this->input->post('datePayement'),

            );
            if ($this->prestation_model->update_item($id, $data)) {
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
        if ($this->prestation_model->delete_item($id)) {
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

