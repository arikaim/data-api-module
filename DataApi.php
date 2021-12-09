<?php
/**
 * Arikaim
 *
 * @link        http://www.arikaim.com
 * @copyright   Copyright (c)  Konstantin Atanasov <info@arikaim.com>
 * @license     http://www.arikaim.com/license
 * 
*/
namespace Arikaim\Modules\DataApi;

use Arikaim\Core\Extension\Module;

/**
 * Data Api client module class
 */
class DataApi extends Module
{
    /**
     * Install module
     *
     * @return void
     */
    public function install()
    {
        $this->installDriver('Arikaim\\Modules\\DataApi\\Drivers\\AddressApiDriver');
    }
}
