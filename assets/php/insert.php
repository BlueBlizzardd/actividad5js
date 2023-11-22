<?php

include_once('connect.php');

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
header('Content-Type: text/html; charset=utf-8');
header('Content-Type: application/json');

$post = file_get_contents('php://input');
$post = json_decode($post, true);

$insert = $conn->prepare("INSERT INTO car (description, imgroute, model, type, year, brand_idbrand) VALUES (?, ?, ?, ?, ?, ?)");

$description = $post['description'];
$imgroute = $post['imgroute'];
$model = $post['model'];
$type = ucfirst($post['type']);
$year = $post['year'];
$idbrand = $post['idbrand'];

$insert->bind_param("ssssii", $description, $imgroute, $model, $type, $year, $idbrand);

if ($insert->execute() === TRUE) {
    echo "Nuevo registro hecho exitosamente.";
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}

$insert->close();
$conn->close();