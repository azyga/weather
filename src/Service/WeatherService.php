<?php 

namespace App\Service;

use App\Factory\OpenWeatherMapCreator;
use App\Factory\WorldWeatherOnlineCreator;

class WeatherService
{
    private $collectedData = array();
    private $averageData = array();
    private $weather = array();
    private $status = 'OK';
    private $message;
    
    public function handleWeather($city, $countryCode): array
    {
        //ujednolicenie wyników
        $coordinatesService = new CoordinatesService();
        $coordinates = $coordinatesService->getCoordinates($city, $countryCode);
        
        if($coordinates['status'] == 'OK' && $coordinates['countryCode'] == $countryCode){
            
            $this->collectWeather($coordinates['latitude'], $coordinates['longitude']);
            $this->calculateAverageConditions();
            return array($this->averageData, $this->weather, $this->status, $this->message);
        } else {
            $this->message = 'The specified city could not be found in the selected country.';
            $this->status = 'ERROR';
            return array($this->averageData, $this->weather, $this->status, $this->message);
        }

    }
    
    private function collectWeather($latitude, $longitude): void
    {
        //OpenWeatherMap
        $openWeatherMapApi = new OpenWeatherMapCreator();
        $this->collectedData['OpenWeatherMap'] = $openWeatherMapApi->getWeather($latitude, $longitude);
        
        //WorldWeatherOnline
        $worldWeatherOnlineApi = new WorldWeatherOnlineCreator();
        $this->collectedData['WorldWeatherOnline'] = $worldWeatherOnlineApi->getWeather($latitude, $longitude);
        
        //Warunki opisowe
        $this->weather['date'] = date('Y-m-d H:i:s');
        $this->weather['weatherDesc'] = $this->collectedData['WorldWeatherOnline']['weatherDesc'] ?? '';
        $this->weather['weatherIconUrl'] = $this->collectedData['WorldWeatherOnline']['weatherIconUrl'] ?? '';
    }
    
    private function calculateAverageConditions(): void
    {
        $this->averageData['temperature'] = 0;
        $this->averageData['pressure'] = 0;
        $this->averageData['humidity'] = 0;
        
        foreach ($this->collectedData as $key =>$data){
            
            if($data['status'] == 'ERROR'){
                $this->message = 'There is a problem with one or more APIs. The data may be incomplete.';
                $this->status = 'WARNING';
                unset($this->collectedData[$key]);
            } else {
                $this->averageData['temperature'] += $data['temperature'];
                $this->averageData['pressure'] += $data['pressure'];
                $this->averageData['humidity'] += $data['humidity'];
            }
        }
        
        if(count($this->collectedData)){
            $this->averageData = array_map(
                function ($value) { return $value / count($this->collectedData);},
                $this->averageData
                );
        } else {            
            $this->message = 'There is a problem with all APIs.';
            $this->status = 'ERROR';
        }

    }
    
}
