<?php 

namespace App\Factory;

use Symfony\Component\HttpClient\HttpClient;


class WorldWeatherOnlineApi implements WeatherApi  {
    
    private $apiId = '65938a788fc547c6ae0213641231201';
    
    public function __construct()
    {
        $this->client = HttpClient::create();
    }
    
    public function getData($latitude, $longitude)
    {
        $response = $this->client->request(
            'GET',
            'http://api.worldweatheronline.com/premium/v1/weather.ashx?q='.$latitude.','.$longitude.'&format=json&show_comments=no&mca=no&fx=no&key='.$this->apiId
            );

        if(empty($response->toArray(false))){
            return $data = [
                'status' => 'ERROR'
            ];
        }
        return $this->prepareData($response->toArray(false));
    }
    
    public function prepareData($contentArray): array
    {
        
        $data = [
            'status' => 'OK',
            'temperature' => $contentArray['data']['current_condition'][0]['temp_C'],
            'pressure' => $contentArray['data']['current_condition'][0]['pressure'],
            'humidity' => $contentArray['data']['current_condition'][0]['humidity'],
            'weatherDesc' => $contentArray['data']['current_condition'][0]['weatherDesc'][0]['value'],
            'weatherIconUrl' => $contentArray['data']['current_condition'][0]['weatherIconUrl'][0]['value'],
        ];
        
        return $data;
    }

    
}

