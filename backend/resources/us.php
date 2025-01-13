<?php
include '../api/Api.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$curl = new Api;

$news = $curl->getNews('us');
foreach($news as $home):
    if ($home == null || $home['multimedia'] == null) continue;
    $title[] = $home['title'];
    $abstract[] = $home['abstract'];
    $url[] = $home['url'];
    $img[] = $home['multimedia'][0]['url'];
endforeach;

$json =  json_encode([
    'title' => $title,
    'abstract' => $abstract,
    'url' => $url,
    'img' => $img
], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

echo $json;