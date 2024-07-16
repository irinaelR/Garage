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

            $this->load->model('client_model');
            $this->load->model('rendez_vous_model');
            $this->load->model('devis_model');
            $this->load->model('prestation_model');
            $this->load->model('type_voiture_model');
            $this->load->model('service_model');
    
            foreach($lines as $line) {
                $slot = 1;

                $clientData = array(
                    'numVoiture' => $line[0],
                    'idTypeVoiture' => get_id_by_nom($line[1])
                );
    
                $idClient = $this->client_model->create_item2($clientData);

                $rendez_vousData = array(
                    'dateDebut' => $line[2]+' '+$line[3],
                    'idService' => $this->service_model->get_id_by_type($line[4]),
                    'idSlot' => $slot,  
                    'idClient' => $idClient               
                );

                $idRendez_vous = $this->rendez_vous_model->create_item2($rendez_vousData);

                $devisData = array(
                    'dateDevis' => $line[2]+' '+$line[3],
                    'numVoiture' => $line[0],
                    'nomService' => $line[4],
                    'prix_service' => $line[5],
                    'dureeService' => $this->service_model->get_duree_by_type($line[4]),
                    'slot' => $slot
                );

                $idDevis = $this->devis_service->create_item2($devisData);

                $prestationData = array(
                    'idDevis' => $idDevis,
                    'datePayement' => $line[6]
                );

                $this->prestation_model->create_item($prestationData);
            }
        }
    }
}

?>