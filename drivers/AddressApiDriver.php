<?php
/**
 * Arikaim
 *
 * @link        http://www.arikaim.com
 * @copyright   Copyright (c)  Konstantin Atanasov <info@arikaim.com>
 * @license     http://www.arikaim.com/license
 * 
*/
namespace Arikaim\Modules\DataApi\Drivers;

use Arikaim\Core\Arikaim;
use Arikaim\Modules\Api\AbstractApiClient;
use Arikaim\Core\Driver\Traits\Driver;
use Arikaim\Core\Interfaces\Driver\DriverInterface;
use Arikaim\Modules\Api\Interfaces\ApiClientInterface;

/**
 * Address data api driver class
 */
class AddressApiDriver extends AbstractApiClient implements DriverInterface, ApiClientInterface
{   
    use Driver;

    /**
     * Api key
     *
     * @var string|null
     */
    private $apiKey;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->setDriverParams('address-api','data.api','Address Api Client','Address data api driver');      
    }

    /**
     * Initialize driver
     *
     * @return void
     */
    public function initDriver($properties)
    {
        $this->setBaseUrl($properties->getValue('baseUrl'));    
        $this->apiKey = $properties->getValue('api_key');        
        $this->setFunctionsNamespace('Arikaim\\Modules\\DataApi\\Functions\\Address\\');  
    }

    /**
     * Get authorization header or false if api not uses header for auth
     *
     * @param array|null $params
     * @return array|null
    */
    public function getAuthHeaders(?array $params = null): ?array
    {
        return [
            'Authorization: ' . $this->apiKey,          
            'User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 YaBrowser/16.3.0.7146 Yowser/2.5 Safari/537.36'
        ];       
    }

    /**
     * Create driver config properties array
     *
     * @param Arikaim\Core\Collection\Properties $properties
     * @return array
     */
    public function createDriverConfig($properties)
    {
        $properties->property('api_key',function($property) {
            $property
                ->title('Api Key')
                ->type('text')              
                ->value('');                         
        }); 

        $properties->property('baseUrl',function($property) {
            $property
                ->title('Base Url')
                ->type('text')
                ->default('https://arikaim.dev/')
                ->value('https://arikaim.dev/')
                ->readonly(true);              
        });
    }
}
