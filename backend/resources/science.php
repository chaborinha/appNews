<?php
include '../api/Api.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$curl = new Api;

$science = $curl->scienceNews();

$img = $science[0]['multimedia'][0]['url'];

echo json_encode([
    'image_url' => $img
]);
?>
