<?php

require_once '../vendor/autoload.php'; 
use Dotenv\Dotenv;

class Api
{
    private $apiKey;
    
    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
        $dotenv->load();
        $this->apiKey = $_ENV['API_KEY'];
    }

    public function getApiKey()
    {
        return $this->apiKey;
    }

    public function curlInit(String $news)
    {
        $api_key = $this->getApiKey();
        $url = "https://api.nytimes.com/svc/topstories/v2/{$news}.json?api-key={$api_key}";

        $curl = curl_init();
        
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
        $response = curl_exec($curl);

        if(curl_error($curl))  die('Erro: ' . curl_error($curl));
           
        curl_close($curl);

        return $response;
    }

    public function getNews(String $news)
    {
        $response = $this->curlInit($news);

        $responseData = json_decode($response, true);

        return $responseData['results'];
    }

}