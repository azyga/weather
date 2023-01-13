<?php 

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;

class CoordinatesService
{
    private $key = 'aXQ944pOih0nBLZtsaE3Ew==ExRweHAoabyQsuBC';
    
    public function __construct()
    {
        $this->client = HttpClient::create();
    }
    
    public function getCoordinates(string $city, string $countryCode): array
    {
        $response = $this->client->request(
            'GET',
            'https://api.api-ninjas.com/v1/geocoding?city='.$city.'&country'.$countryCode,
            [
                'headers' => [
                    'X-Api-Key' => $this->key
                ]
            ]
            );
        
        $contentArray = $response->toArray(false);
        if(!empty($contentArray)){
            $coordinates = [
                'status' => 'OK',
                'city' => $contentArray[0]['name'],
                'countryCode' => $contentArray[0]['country'],
                'latitude' => $contentArray[0]['latitude'],
                'longitude' => $contentArray[0]['longitude']
            ];
        } else {
            $coordinates = [
                'status' => 'ERROR'
            ];
        }
        return $coordinates;
    }
    
}