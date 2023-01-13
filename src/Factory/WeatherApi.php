<?php 

namespace App\Factory;

use Symfony\Contracts\HttpClient\HttpClientInterface;


interface WeatherApi
{
    
    public function __construct();
    
    /*
     * Pobieranie danych pogodowych
     * 
     * @param string $latitude
     * @param string $longitude
     */
    public function getData($latitude, $longitude);
    
    /*
     * Konwersja danych do oczekiwanej tablicy
     * 
     * @param array $contentArray
     */
    public function prepareData($contentArray);
    
    
}