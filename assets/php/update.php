<?php

include_once('connect.php');

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
header('Content-Type: text/html; charset=utf-8');
header('Content-Type: application/json');

$post = file_get_contents('php://input');
$post = json_decode($post, true);

$update = $conn->prepare("UPDATE car SET description = ?, imgroute = ?, model = ?, type = ?, year = ?, brand_idbrand = ? WHERE id = ?");

$id = $post['id'];
$description = $post['description'];
$imgroute = $post['imgroute'];
$model = $post['model'];
$type = ucfirst($post['type']);
$year = $post['year'];
$idbrand = $post['idbrand'];

$update->bind_param("ssssiii", $description, $imgroute, $model, $type, $year, $idbrand, $id);

if ($update->execute() === TRUE) {
    echo "Registro actualizado exitosamente.";
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}

$update->close();
$conn->close();