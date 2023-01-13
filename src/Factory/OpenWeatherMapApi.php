<?php 

namespace App\Factory;

use Symfony\Component\HttpClient\HttpClient;


class OpenWeatherMapApi implements WeatherApi  {
    
    private $apiId = '73acee1466eb24502d87759af1bc3dd9';
    
    public function __construct()
    {
        $this->client = HttpClient::create();
    }
    
    public function getData($latitude, $longitude)
    {
        $response = $this->client->request(
            'GET',
            'https://api.openweathermap.org/data/2.5/weather?lat='.$latitude.'&lon='.$longitude.'&units=metric&appid='.$this->apiId
            );
        
        //var_dump();
        if($response->getStatusCode() != 200){
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
            'temperature' => $contentArray['main']['temp'],
            'pressure' => $contentArray['main']['pressure'],
            'humidity' => $contentArray['main']['humidity'],
        ];
        
        return $data;
    }

    
}

