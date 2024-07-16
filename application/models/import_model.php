<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Import_model extends CI_Model {
    public function import_service($config, $separator){
        $this->load->library('upload', $config);
    
        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            foreach($error as $key => $value){
                echo $value;
            }
        } else {
            $uploadData = $this->upload->data();
            $csvFilePath = $config['upload_path']. $uploadData['file_name'];
    
            $row = 0;
            $lines = array();
            if (($handle = fopen($csvFilePath, "r"))!== FALSE) {
                while (($data = fgetcsv($handle, 1000, $separator))!== FALSE) {
                    if($row > 0) { // Ignorer la première ligne (header)
                        $lines[] = $data;
                    }
                    $row++;
                }
                fclose($handle);
            }

            $this->load->model('service_model');
    
            foreach($lines as $line) {
                $serviceData = array(
                    'nom' => $line[0],
                    'duree' => $line[1],
                    'prix' => isset($line[2]) ? $line[2] : 0
                );
    
                $this->service_model->create_item($serviceData);
            }
        }
    }

    public function import_travaux($config, $separator){
        $this->load->library('upload', $config);
    
        if (!$this->upload->do_upload('travaux')) {
            $error = array('error' => $this->upload->display_errors());
            foreach($error as $key => $value){
                echo $value;
            }
        } else {
            $uploadData = $this->upload->data();
            $csvFilePath = $config['upload_path']. $uploadData['file_name'];
    
            $row = 0;
            $lines = array();
            if (($handle = fopen($csvFilePath, "r"))!== FALSE) {
                while (($data = fgetcsv($handle, 1000, $separator))!== FALSE) {
                    if($row > 0) { // Ignorer la première ligne (header)
                        $lines[] = $data;
                    }
                    $row++;
                }
                fclose($handle);
            }

            $this->load->model('travaux_model');
            $this->load->model('service_model');
            $this->load->model('slot_model');
            $this->load->model('client_model');
            $this->load->model('rendez_vous_model');
            $this->load->model('devis_model');
            $this->load->model('prestation_model');
    
            foreach($lines as $line) {
                $duree = $this->service_model->get_duree_by_type($line[4]);

                $dateTime = DateTime::createFromFormat('d/m/Y', $line[2]);
                $line[2] = $dateTime->format('Y-m-d');
                if (isset($line[6])) {
                    $dateTime2 = DateTime::createFromFormat('d/m/Y', $line[6]);
                    if ($dateTime2 !== false) {
                        $line[6] = $dateTime2->format('Y-m-d');
                    } else {
                        $line[6] = null;
                    }
                }
                

                $slot = $this->slot_model->get_available($line[2].' '.$line[3], $duree);
                $travauxData = array(
                    'numVoiture' => $line[0],
                    'typeVoiture' => $line[1],
                    'dateDebut' => $line[2],
                    'heureDebut' => $line[3],
                    'typeService' => $line[4],
                    'montant' => $line[5],
                    'datePayement' => isset($line[6]) ? $line[6]:null,
                    'duree' => $duree,
                    'slot' => $slot[0]['idSlot']
                );
    
                $this->travaux_model->create_item($travauxData);
            
            }

            $this->client_model->insert_from_travaux();
            $this->rendez_vous_model->insert_from_travaux();
            $this->devis_model->insert_from_travaux();
            $this->prestation_model->insert_from_travaux();
        }
    }
}

?>