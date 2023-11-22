<?php

if (isset($_GET['idbrand']) && isset($_GET['model']) && isset($_GET['year'])) {

    include_once('connect.php');

    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
    header('Content-Type: text/html; charset=utf-8');

    $delete = $conn->prepare("DELETE FROM car WHERE brand_idbrand=? AND model=? AND year=?");

    $idbrand = $_GET['idbrand'];
    $model = $_GET['model'];
    $year = $_GET['year'];

    $delete->bind_param("isi", $idbrand, $model, $year);

    if ($delete->execute() === TRUE) {
        echo "Registro borrado exitosamente.";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }

    $delete->close();
    $conn->close();
} else {
    echo 'Peticion invalida.';
}