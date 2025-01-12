<?php
include '../api/Api.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$curl = new Api;

$home = $curl->homeNews();

echo json_encode($home);