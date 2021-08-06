<?php

namespace Willvin\PayPal\Facades;

/*
 * Class Facade
 * @package Willvin\PayPal\Facades
 * @see Willvin\PayPal\ExpressCheckout
 */

use Illuminate\Support\Facades\Facade;

class PayPal extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Willvin\PayPal\PayPalFacadeAccessor';
    }
}
