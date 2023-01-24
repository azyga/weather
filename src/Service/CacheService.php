<?php 

namespace App\Service;

use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Cache\Adapter\TagAwareAdapter;

class CacheService
{
    
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
    
    public function __construct()
    {
        $this->cache = new TagAwareAdapter(new FilesystemAdapter('app.cache'));
    }
    
    public function getCachedData(): array
    {
        $cacheItem = $this->cache->getItem('place.data');
        
        $cacheData = array();
        if($cacheItem->isHit()){
            $cacheData = $cacheItem->get();
        }
        
        return $cacheData;
    }
    
    public function getCachedCountries(): array
    {
        $countryList = array();
        
        $cacheItem = $this->cache->getItem('countryList');
        if($cacheItem->isHit()){
            $countryList = $cacheItem->get();
        } else {
            // Problem z MySQL Server
            //         $databaseService = new DatabaseService($this->doctrine);
            //         $countryList = $databaseService->getAllCountries();
            $countryList = $this->countries;
        }
        
        return $countryList;
    }
    
    public function setCachedPlace(array $data): void 
    {
        
        $cacheItem = $this->cache->getItem('place.data');
        
        $cacheItem->set($data);
        $cacheItem->tag('place');
        $this->cache->save($cacheItem);
    }

    
}