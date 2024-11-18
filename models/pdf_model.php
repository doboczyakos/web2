<?php

require_once(SERVER_ROOT.'tcpdf/tcpdf.php');

class Pdf_Model {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function generatePdf($table1, $table2, $table3) {    
        if (empty($table1) || empty($table2) || empty($table3)) {
            return;
        }
        $allowedTables = ['eredmeny', 'gp', 'pilota'];
        if (!in_array($table1, $allowedTables) || !in_array($table2, $allowedTables) || !in_array($table3, $allowedTables)) {
            return;
        }        

        $data1 = $this->conn->query("SELECT * FROM $table1")->fetchAll(PDO::FETCH_ASSOC);
        $data2 = $this->conn->query("SELECT * FROM $table2")->fetchAll(PDO::FETCH_ASSOC);
        $data3 = $this->conn->query("SELECT * FROM $table3")->fetchAll(PDO::FETCH_ASSOC);

        // PDF generálás
        $pdf = new TCPDF();
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Rendszer');
        $pdf->SetTitle('Automatikusan Generált PDF');
        $pdf->SetHeaderData('', 0, 'Adatbázis PDF', '');

        // Betű és alapbeállítások
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $pdf->SetMargins(15, 27, 15);
        $pdf->SetHeaderMargin(5);
        $pdf->SetFooterMargin(10);
        $pdf->SetAutoPageBreak(TRUE, 25);
        $pdf->SetFont('dejavusans', '', 10);

        // PDF tartalom összeállítása
        $pdf->AddPage();
        $pdf->Write(0, "$table1:\n", '', 0, 'L', true, 0, false, false, 0);
        foreach ($data1 as $row) {
            $pdf->Write(0, implode(", ", $row) . "\n", '', 0, 'L', true, 0, false, false, 0);
        }

        $pdf->Ln(10);
        $pdf->Write(0, "$table2:\n", '', 0, 'L', true, 0, false, false, 0);
        foreach ($data2 as $row) {
            $pdf->Write(0, implode(", ", $row) . "\n", '', 0, 'L', true, 0, false, false, 0);
        }

        $pdf->Ln(10);
        $pdf->Write(0, "$table3:\n", '', 0, 'L', true, 0, false, false, 0);
        foreach ($data3 as $row) {
            $pdf->Write(0, implode(", ", $row) . "\n", '', 0, 'L', true, 0, false, false, 0);
        }

        $pdf->Output('adatbazis_adatok.pdf', 'D');	    
    }
}
?>