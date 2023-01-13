<?php

namespace App\Service;

use Doctrine\Persistence\ManagerRegistry;
use App\Entity\WeatherData;
use App\Entity\CountryList;

class DatabaseService 
{
    private $entityManager;
    
    public function __construct(ManagerRegistry $doctrine)
    {
        $this->entityManager = $doctrine->getManager();
    }
    
    public function getAllCountries():array
    {
        
        $countries = $this->entityManager->getRepository(CountryList::class)->findAll();
        
        return $countries;
    }
    
    public function addNewWeatherData(array $data, string $city, string $countryCode):void
    {
        
        $currency = new WeatherData();
        $currency->setCity($city);
        $currency->setCountryCode($countryCode);
        $currency->setDate($data[1]['date']);
        $currency->setWeatherDescription($data[1]['weatherDesc']);
        $currency->setTemperature($data[0]['temperature']);
        $currency->setHumidity($data[0]['humidity']);
        $currency->setPressure($data[0]['pressure']);
        $currency->setStatus($data[2]);
        
        $this->entityManager->persist($currency);
        $this->entityManager->flush();
    }
    
    
}