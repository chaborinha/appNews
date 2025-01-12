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

    public function homeNews(String $home = 'home')
    {
        $response = $this->curlInit($home);
        
        $responseData = json_decode($response, true);

        return $responseData['results'];
    }

    public function scienceNews(String $science = 'science')
    {
        $response = $this->curlInit($science);
        
        $responseData = json_decode($response, true);

        return $responseData['results'];
    }

    public function artsNews(String $arts = 'arts')
    {
        $response = $this->curlInit($arts);

        $responseData = json_decode($response, true);

        return $responseData;
    }

    public function usNews(String $us = 'us')
    {
        $response = $this->curlInit($us);

        $responseData = json_decode($response, true);

        return $responseData['results'];
    }

    public function worldNews(String $world = 'world')
    {
        $response = $this->curlInit($world);

        $responseData = json_decode($response, true);

        return $responseData['results'];
    }
}