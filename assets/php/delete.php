<?php

include_once('connect.php');

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
header('Content-Type: text/html; charset=utf-8');

$post = file_get_contents('php://input');
$post = json_decode($post, true);

$delete = $conn->prepare("DELETE FROM car WHERE brand_idbrand=? AND model=? AND year=?");

$idbrand = $post['idbrand'];
$model = $post['model'];
$year = $post['year'];

$delete->bind_param("isi", $idbrand, $model, $year);

if ($delete->execute() === TRUE) {
    echo "Registro borrado exitosamente.";
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}

$delete->close();
$conn->close();