<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('client_model');
        $this->load->helper('url');
        $this->load->helper('form');
        // $this->load->helper('type');
        $this->load->library('form_validation');
    }

    public function index() {
        $items = $this->client_model->get_all_items();
        echo json_encode($items);
    }

    public function view($id) {
        $item = $this->client_model->get_item_by_id($id);
        echo json_encode($item);
    }

    public function create() {
        $this->form_validation->set_rules('numVoiture', 'NumVoiture', 'required');
        $this->form_validation->set_rules('idTypeVoiture', 'IdTypeVoiture', 'required');


        if ($this->form_validation->run() === FALSE) {
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
            );
            echo json_encode($response);
        } else {
            $data = array(
                'idClient' => null,
                'numVoiture' => $this->input->post('numVoiture'),
                'idTypeVoiture' => $this->input->post('idTypeVoiture'),

            );
            $exist = $this->client_model->get_item_by_name_type($data['numVoiture']);
            if(is_array($exist) && count($exist) != 0){
                if ($exist["numVoiture"] == $data['numVoiture'] && $exist["idTypeVoiture"] == $data['idTypeVoiture']) {
                    $response = array(
                        'status' => 'success',
                        'message' => 'User connected successfully.'
                    );
                    
                    $this->session->set_userdata("client", "gxdych v");
                } else {
                    $response = array(
                        'status' => 'error',
                        'message' => 'Numero ou type voiture incorrect.'
                    );
                }
                echo json_encode($response);
                return;
            }
            if ($this->client_model->create_item($data)) {
                $response = array(
                    'status' => 'success',
                    'message' => 'User created successfully.'
                );
                $sess = $this->client_model->get_item_by_name_type($data['numVoiture']);
                $obj = new Client_model();
                $obj->setIdClient($exist["idClient"]);
                $obj->setNumVoiture($exist["numVoiture"]);
                $obj->setIdTypeVoiture($exist["idTypeVoiture"]);
                $obj_data = (array) $obj;
                $this->session->set_userdata("client", $obj_data);
            } else {
                $response = array(
                    'status' => 'error',
                    'message' => 'Failed to create user.'
                );
            }
            echo json_encode($response);
        }
    }

    public function update($id) {
        $this->form_validation->set_rules('idClient', 'IdClient', 'required');
        $this->form_validation->set_rules('numVoiture', 'NumVoiture', 'required');
        $this->form_validation->set_rules('idTypeVoiture', 'IdTypeVoiture', 'required');


        if ($this->form_validation->run() === FALSE) {
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
            );
            echo json_encode($response);
        } else {
            $data = array(
                'idClient' => $this->input->post('idClient'),
                'numVoiture' => $this->input->post('numVoiture'),
                'idTypeVoiture' => $this->input->post('idTypeVoiture'),

            );
            if ($this->client_model->update_item($id, $data)) {
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
        if ($this->client_model->delete_item($id)) {
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

