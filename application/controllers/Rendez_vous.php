<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rendez_vous extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('rendez_vous_model');
        $this->load->model('service_model');
        $this->load->model('slot_model');
        $this->load->model('devis_model');
        $this->load->model('client_model');
        $this->load->model('prestation_model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
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

            if(! $this->rendez_vous_model->verify_date_debut($dhDebut)) {
                $response = array(
                    'status' => 'error',
                    'message' => 'Nos horaires sont de 8h à 18h'
                );
                echo json_encode($response);

            } else {
                $idService = $this->input->post('idService');
                $service = $this->service_model->get_item_by_id($idService);
                $available_slots = $this->slot_model->get_available($dhDebut, $service["duree"]);
                $client = $this->session->userdata("client");
                $idClient = $client["idClient"];
    
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
                        'idSlot' => $available_slots[0]["idSlot"],
                        'idClient' => $idClient
                    );
    
                    $devisData = array(
                        'dateDevis' => $dhDebut,
                        'numVoiture' => $client["numVoiture"],
                        'nomService' => $service["nom"],
                        'prixService' => $service["prix"],
                        'dureeService' => $service["duree"],
                        'slot' => $available_slots[0]["nom"]
                    );

                    
                    $rdv = $this->rendez_vous_model->create_item($data); 
                    $devis = $this->devis_model->create_item($devisData);

                    $prestationData = array(
                        'idDevis' => $devis
                    );
                    $prestation = $this->prestation_model->create_item($prestationData);

                    if ($rdv) {
                        $response = array(
                            'status' => 'success',
                            'message' => 'Item created successfully.',
                            'devis' => $devis
                        );
                    } else {
                        $response = array(
                            'status' => 'error',
                            'message' => 'Failed to create item.'
                        );
                    }
    
                }
                echo json_encode($response);
            }

            
        }
    }

    public function rdv_for_client() {
        // $this->form_validation->set_rules('idRendezVous', 'IdRendezVous', 'required');
        $this->form_validation->set_rules('rdvDate', 'RdvDate', 'required');
        $this->form_validation->set_rules('rdvHeure', 'RdvHeure', 'required');
        $this->form_validation->set_rules('idService', 'IdService', 'required');
        // $this->form_validation->set_rules('idSlot', 'IdSlot', 'required');
        $this->form_validation->set_rules('idClient', 'IdClient', 'required');


        if ($this->form_validation->run() === FALSE) {
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
            );
            echo json_encode($response);
        } else {
            $dhDebut = $this->input->post('rdvDate') . " " . $this->input->post('rdvHeure');

            if(! $this->rendez_vous_model->verify_date_debut($dhDebut)) {
                $response = array(
                    'status' => 'error',
                    'message' => 'Les horaires sont de 8h à 18h'
                );
                echo json_encode($response);

            } else {
                $idService = $this->input->post('idService');
                $service = $this->service_model->get_item_by_id($idService);
                $available_slots = $this->slot_model->get_available($dhDebut, $service["duree"]);
                $idClient = $this->input->post('idClient');
    
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
                        'idSlot' => $available_slots[0]["idSlot"],
                        'idClient' => $idClient
                    );
    
                    $devisData = array(
                        'dateDevis' => $dhDebut,
                        'numVoiture' => $idClient,
                        'nomService' => $service["nom"],
                        'prixService' => $service["prix"],
                        'dureeService' => $service["duree"],
                        'slot' => $available_slots[0]["nom"]
                    );

                    
                    $rdv = $this->rendez_vous_model->create_item($data); 
                    $devis = $this->devis_model->create_item($devisData);

                    $prestationData = array(
                        'idDevis' => $devis
                    );
                    $prestation = $this->prestation_model->create_item($prestationData);

                    if ($rdv) {
                        $response = array(
                            'status' => 'success',
                            'message' => 'Item created successfully.',
                            'devis' => $devis
                        );
                    } else {
                        $response = array(
                            'status' => 'error',
                            'message' => 'Failed to create item.'
                        );
                    }
    
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
        $client = $this->session->userdata('client');

        if($client != null) {
            $data = array();
            $data['title'] = "Nouveau rendez-vous";

            $services = $this->service_model->get_all_items();
            $data['services'] = $services;

            $this->load->view('templates/header', $data);
            $this->load->view('frontoffice/rdv', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('/User/signIn');
        }

    }

    public function liste_rdv() {
        $client = $this->session->userdata("client");
    // if($client != null) {
        $data = array();
        $data['title'] = "Liste des rendez-vous";

        $rdvs = $this->rendez_vous_model->get_rdv();
        $json_rdvs = json_encode($rdvs);
        $data['rdv'] = $json_rdvs;

        $clients = $this->client_model->get_all_items();
        $data['listeClients'] = $clients;

        $services = $this->service_model->get_all_items();
        $data['services'] = $services;

        $data['client'] = $client;

        $this->load->view('templates/header', $data);
        $this->load->view('backoffice/rdv_calendar', $data);
        $this->load->view('templates/footer');
    // } else {
        
    // }
    }
}

