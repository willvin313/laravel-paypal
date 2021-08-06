<?php

namespace Willvin\PayPal;

use Exception;
use Willvin\PayPal\Services\PayPal as PayPalClient;

class PayPalFacadeAccessor
{
    /**
     * PayPal API provider object.
     *
     * @var
     */
    public static $provider;

    /**
     * Get specific PayPal API provider object to use.
     *
     * @throws Exception
     *
     * @return \Willvin\PayPal\Services\PayPal
     */
    public static function getProvider()
    {
        return self::$provider;
    }

    /**
     * Set PayPal API Client to use.
     *
     * @throws \Exception
     *
     * @return \Willvin\PayPal\Services\PayPal
     */
    public static function setProvider()
    {
        // Set default provider. Defaults to ExpressCheckout
        self::$provider = new PayPalClient();

        return self::getProvider();
    }
}
