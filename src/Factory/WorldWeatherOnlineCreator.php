<?php 

namespace App\Factory;


class WorldWeatherOnlineCreator extends Creator 
{
    protected function factoryMethod($latitude, $longitude)
    {
        $api = new WorldWeatherOnlineApi();
        return $api->getData($latitude, $longitude);
        
    }

    
}