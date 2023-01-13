<?php

namespace App\Factory;

abstract class Creator 
{
    protected abstract function factoryMethod($latitude, $longitude);
	
    public function getWeather($latitude, $longitude)
	{
	    $api = $this->factoryMethod($latitude, $longitude);
	    return $api;
	}
	
	
}