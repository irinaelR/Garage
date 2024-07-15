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
    }
?>