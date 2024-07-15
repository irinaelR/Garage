<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rendez_vous extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('rendez_vous_model');
        $this->load->model('service_model');
        $this->load->model('slot_model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index() {
        $items = $this->rendez_vous_model->get_all_items();
        echo json_encode($items);
    }

    public function view($id) {
        $item = $this->rendez_vous_model->get_item_by_id($id);
        echo json_encode($item);
    }

    public function create() {
        // $this->form_validation->set_rules('idRendezVous', 'IdRendezVous', 'required');
$this->form_validation->set_rules('dateDebut', 'DateDebut', 'required');
$this->form_validation->set_rules('idService', 'IdService', 'required');
// $this->form_validation->set_rules('idSlot', 'IdSlot', 'required');
// $this->form_validation->set_rules('idClient', 'IdClient', 'required');


        if ($this->form_validation->run() === FALSE) {
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
            );
            echo json_encode($response);
        } else {
            $dhDebut = $this->input->post('dateDebut');
            $idService = $this->input->post('idService');
            $service = $this->service_model->get_item_by_id($idService);
            $available_slots = $this->slot_model->get_available($dhDebut, $service["duree"]);
            $idClient = $this->session->userdata("client")["idClient"];

            if(count($available_slots) == 0) {
                $response = array(
                    'status' => 'error',
                    'message' => 'Pas de place disponible pour cette heure'
                );
            } else {
                $data = array(
                    'idRendezVous' => null,
                    'dateDebut' => $dhDebut,
                    'idService' => $idService,
                    'idSlot' => $this->input->$available_slots[0],
                    'idClient' => $this->input->$idClient,
    
                );
                if ($this->rendez_vous_model->create_item($data)) {
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
    }

    public function update($id) {
        $this->form_validation->set_rules('idRendezVous', 'IdRendezVous', 'required');
$this->form_validation->set_rules('dateDebut', 'DateDebut', 'required');
$this->form_validation->set_rules('idService', 'IdService', 'required');
$this->form_validation->set_rules('idSlot', 'IdSlot', 'required');
$this->form_validation->set_rules('idClient', 'IdClient', 'required');


        if ($this->form_validation->run() === FALSE) {
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
            );
            echo json_encode($response);
        } else {
            $data = array(
                'idRendezVous' => $this->input->post('idRendezVous'),
'dateDebut' => $this->input->post('dateDebut'),
'idService' => $this->input->post('idService'),
'idSlot' => $this->input->post('idSlot'),
'idClient' => $this->input->post('idClient'),

            );
            if ($this->rendez_vous_model->update_item($id, $data)) {
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
        if ($this->rendez_vous_model->delete_item($id)) {
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

    public function nouveau_rdv() {
        $data = array();
        $data['title'] = "Nouveau rendez-vous";

        $services = $this->service_model->get_all_items();
        $data['services'] = $services;

        $this->load->view('templates/header', $data);
		$this->load->view('frontoffice/rdv', $data);
        $this->load->view('templates/footer');
    }
}

