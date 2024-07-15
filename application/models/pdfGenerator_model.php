<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class PdfGenerator_model extends CI_Model {
        public function generate_pdf($data) {
            // Charger une vue pour le contenu PDF
            $html = $this->load->view('pdf_template', $data, true);
    
            // Générer le PDF
            $this->dompdf_gen->dompdf->loadHtml($html);
            $this->dompdf_gen->dompdf->setPaper('A4', 'portrait');
            $this->dompdf_gen->dompdf->render();
            $this->dompdf_gen->dompdf->stream("devis.pdf", array("Attachment" => 1)); // 1 pour télécharger, 0 pour afficher dans le navigateur
        }

        public function formatDate($dateString){
            $date = new DateTime($dateString);

            $formattedDate = $date->format('d F Y');

            $months = array(
                'January' => 'janvier',
                'February' => 'février',
                'March' => 'mars',
                'April' => 'avril',
                'May' => 'mai',
                'June' => 'juin',
                'July' => 'juillet',
                'August' => 'août',
                'September' => 'septembre',
                'October' => 'octobre',
                'November' => 'novembre',
                'December' => 'décembre'
            );

            foreach ($months as $english => $french) {
                $formattedDate = str_replace($english, $french, $formattedDate);
            }

            return $formattedDate;
        }

        public function formatTime($timeString){
            $timeParts = explode(':', $timeString);

            $hours = (int)$timeParts[0];
            $minutes = (int)$timeParts[1];
            $seconds = (int)$timeParts[2];

            $formattedTime = ($hours > 0 ? $hours.' heure':'') . ($hours > 1 ? 's':'') . ' ' . ($minutes > 0 ? $minutes.' minute' : '') . ($minutes > 1 ? 's':'') . ' ' . ($seconds > 0 ? $seconds.'second' : '') . ($seconds > 1 ? 's':'');
            return $formattedTime;
        }
    }
?>