<?php
    // application/libraries/Dompdf_gen.php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // Charger Dompdf via Composer
    use Dompdf\Dompdf;

    class Dompdf_gen {
        public $dompdf;

        public function __construct() {
            $this->dompdf = new Dompdf();
        }
    }
?>