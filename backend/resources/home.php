<?php
include '../api/Api.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$curl = new Api;

$news = $curl->getNews('home');
foreach ($news as $home) {
    if ($home == null || $home['multimedia'] == null) continue;
    
    $dados[] = [
        'title' => $home['title'],
        'abstract' => $home['abstract'],
        'url' => $home['url'],
        'img' => $home['multimedia'][0]['url']
    ];
}

$json = json_encode([
    'dados' => $dados
], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

echo $json;
?>
