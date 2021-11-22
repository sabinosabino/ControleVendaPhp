<?php

include_once 'Models/connection.php';

use  Dompdf\Dompdf;

class MenuController extends Controller
{

    public function index()
    {

        try {
            $menu = new Menu;
            $conn = Conexao::conectar();
            $dados = $menu->Listar($conn);
            $this->carregarTemplate('Menu/index', '../', $dados);
        } catch (Exception $e) {
            echo "Erro ao tentar listar. " . $e->getMessage();
        } finally {
            $conn = null;
        }
    }


    public function report()
    {

        $menu = new Menu;
        $conn = Conexao::conectar();
        $dados = $menu->Listar($conn);

        $dompdf = new Dompdf();

        ob_start();
        $this->carregarTemplateReport('Menu/report.producao', '',$dados);
        $pdf = ob_get_clean();
        $pdf=mb_convert_encoding($pdf, 'HTML-ENTITIES', 'UTF-8');
        $dompdf->loadHtml($pdf);
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream(
            "producao.pdf",
            array(
                "Attachment" => false
            )
        );
    }
}
