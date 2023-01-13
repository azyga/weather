<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Service\WeatherService;
use App\Service\DatabaseService;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Cache\Adapter\TagAwareAdapter;

class MainController extends AbstractController
{
    private $doctrine;
    
    private $cache;
    
    private $countries = [
        [
            'name' => 'Poland',
            'code' => 'PL'
        ],
        [
            'name' => 'United States',
            'code' => 'US'
        ],
        [
            'name' => 'United Kingdom',
            'code' => 'GB'
        ]
    ];
    
    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
        $this->cache = new TagAwareAdapter(new FilesystemAdapter('app.cache'));
    }
    
    #[Route('/main', name: 'app_main')]
    public function index(): Response
    {
        $cacheItem = $this->cache->getItem('place.data');
        
        $cacheData = array();
        if($cacheItem->isHit()){
            $cacheData = $cacheItem->get();
        }
        
        $cacheItem2 = $this->cache->getItem('countryList');
        if($cacheItem2->isHit()){
            $countryList = $cacheItem2->get();
        } else {
            // Problem z MySQL Server
//         $databaseService = new DatabaseService($this->doctrine);
//         $countryList = $databaseService->getAllCountries();
            $countryList = $this->countries;
        }
        
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'countryList' => $countryList,
            'cacheData' => $cacheData
        ]);
    }
    
    #[Route('/getWeather', name: 'app_get_weather')]
    public function getWeather(Request $request, WeatherService $weatherService): JsonResponse
    {
        $city = $request->get('city');
        $countryCode = $request->get('country-code');
        
        $data = [
            'city' => $city,
            'countryCode' => $countryCode
        ];
        
        $cacheItem = $this->cache->getItem('place.data');
        
        $cacheItem->set($data);
        $cacheItem->tag('place');
        $this->cache->save($cacheItem);
        
        $weatherData = $weatherService->handleWeather($city, $countryCode);
        
        // Problem z MySQL Server
//         if($weatherData[2] != 'ERROR'){
//             $databaseService = new DatabaseService($this->doctrine);
//             $databaseService->addNewWeatherData($weatherData, $city, $countryCode);
//         }
        
        return $this->json($weatherData);

    }
}
