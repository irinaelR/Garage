<?php
class PdfGenerator extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('Dompdf_gen');
    }

    public function generate_pdf() {
        // Charger une vue pour le contenu PDF
        $html = $this->load->view('pdf_template', [], true);

        // Générer le PDF
        $this->dompdf_gen->dompdf->loadHtml($html);
        $this->dompdf_gen->dompdf->setPaper('A4', 'portrait');
        $this->dompdf_gen->dompdf->render();
        $this->dompdf_gen->dompdf->stream("example.pdf", array("Attachment" => 1)); // 1 pour télécharger, 0 pour afficher dans le navigateur
    }
}

?>