<?php 

namespace App\Factory;

class OpenWeatherMapCreator extends Creator 
{
    protected function factoryMethod($latitude, $longitude)
    {
        $api = new OpenWeatherMapApi();
        return $api->getData($latitude, $longitude);
        
    }

    
}