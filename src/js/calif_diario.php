<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $fecha = $_POST['fecha'];
    $dia_num = $_POST['dia_num'];
    $apertura = $_POST['apertura'];
    $resp_posi = $_POST['resp_posi'];
    $no_interest = $_POST['no_interest'];
    $vistos = $_POST['vistos'];
    $vistos_retom = $_POST['vistos_retom'];
    $resp_recib = $_POST['resp_recib'];
    $convers_posi = $_POST['convers_posi'];
    $vistos_inbound = $_POST['vistos_inbound'];
    $seguimiento = $_POST['seguimiento'];
    $resp_recib_anuncio = $_POST['resp_recib_anuncio'];
    $convers_posi_anuncio = $_POST['convers_posi_anuncio'];
    $vistos_inbound_anuncio = $_POST['vistos_inbound_anuncio'];
    $seguimiento_anuncio = $_POST['seguimiento_anuncio'];
    $agenda = $_POST['agenda'];

    $filename = '/tmp/reporte_' . date('Ymd_His') . ".csv";

    $file = fopen($filename, 'w');

    // Encabezados del CSV
    $header = ['Fecha', 'Número del día', 'Apertura', 'Respuestas positivas', 'No me interesa', 'Vistos', 'Vistos retomados', 'Respuestas recibidas', 'Conversaciones positivas', 'Vistos (inbound)', 'Seguimiento', 'Respuestas recibidas por anuncio', 'Conversaciones positivas por anuncio', 'Vistos por anuncio (inbound)', 'Seguimiento por anuncio', 'Agenda'];
    fputcsv($file, $header);

    $data = [$fecha, $dia_num, $apertura, $resp_posi, $no_interest, $vistos, $vistos_retom, $resp_recib, $convers_posi, $vistos_inbound, $seguimiento, $resp_recib_anuncio, $convers_posi_anuncio, $vistos_inbound_anuncio, $seguimiento_anuncio, $agenda];
    fputcsv($file, $data);

    fclose($file);

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="reporte_' . date('Ymd_His') . '.csv"');
    readfile($filename);

    unlink($filename);

    exit();
}