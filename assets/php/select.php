<?php

include_once('connect.php');

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
header('Content-Type: text/html; charset=utf-8');
header('Content-Type: application/json');

$sql = "SELECT `id`, `description`, `imgroute`, `model`, `type`, `year`, `brandName` FROM `car` INNER JOIN `brand` ON car.brand_idbrand = brand.idbrand";
$result = $conn->query($sql);
$response = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        array_push(
            $response,
            array(
                "id" => $row['id'],
                "description" => $row['description'],
                "imgroute" => $row['imgroute'],
                "model" => $row['model'],
                "type" => $row['type'],
                "year" => $row["year"],
                "brandName" => $row["brandName"]
            )
        );
    }
} else {
    echo "0 results";
}

$conn->close();
echo json_encode($response);

?>