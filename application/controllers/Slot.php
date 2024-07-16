<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slot extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('slot_model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index() {
        $items = $this->slot_model->get_all_items();
        echo json_encode($items);
    }

    public function view($id) {
        $item = $this->slot_model->get_item_by_id($id);
        echo json_encode($item);
    }

    public function create() {
        $this->form_validation->set_rules('idSlot', 'IdSlot', 'required');
$this->form_validation->set_rules('nom', 'Nom', 'required');


        if ($this->form_validation->run() === FALSE) {
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
            );
            echo json_encode($response);
        } else {
            $data = array(
                'idSlot' => $this->input->post('idSlot'),
'nom' => $this->input->post('nom'),

            );
            if ($this->slot_model->create_item($data)) {
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
        $this->form_validation->set_rules('idSlot', 'IdSlot', 'required');
$this->form_validation->set_rules('nom', 'Nom', 'required');


        if ($this->form_validation->run() === FALSE) {
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
            );
            echo json_encode($response);
        } else {
            $data = array(
                'idSlot' => $this->input->post('idSlot'),
'nom' => $this->input->post('nom'),

            );
            if ($this->slot_model->update_item($id, $data)) {
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
        if ($this->slot_model->delete_item($id)) {
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

    public function get_day_occupation() {
        $day = $this->input->get('day');
        $result = $this->slot_model->get_count_per_day($day);
        $final_result = array();
        foreach ($result as $key => $r) {
            $final_result[] = array(
                "nomSlot" => $this->slot_model->get_item_by_id($r["idSlot"])["nom"],
                "idSlot" => $r["idSlot"],
                "count" => $r["nb"]
            );
        }
        echo json_encode($final_result);
        
    }

    public function occupation_slots() {
        $data = array();
        $data['title'] = "Occupation des slots";
        
        $this->load->view('templates/header', $data);
        $this->load->view('frontoffice/rdv', $data);
        $this->load->view('templates/footer');
    }
}

