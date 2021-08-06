<?php

namespace Willvin\PayPal\Tests\Unit\Adapter;

use PHPUnit\Framework\TestCase;
use Willvin\PayPal\Tests\MockClientClasses;
use Willvin\PayPal\Tests\MockRequestPayloads;
use Willvin\PayPal\Tests\MockResponsePayloads;

class OrdersTest extends TestCase
{
    use MockClientClasses;
    use MockRequestPayloads;
    use MockResponsePayloads;

    /** @test */
    public function it_can_create_an_order()
    {
        $expectedResponse = $this->mockCreateOrdersResponse();

        $expectedParams = $this->createOrderParams();

        $expectedMethod = 'createOrder';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, true);

        $mockClient->setApiCredentials($this->getMockCredentials());
        $mockClient->getAccessToken();

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}($expectedParams));
    }

    /** @test */
    public function it_can_update_an_order()
    {
        $expectedResponse = '';

        $expectedParams = $this->updateOrderParams();

        $expectedMethod = 'updateOrder';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, true);

        $mockClient->setApiCredentials($this->getMockCredentials());
        $mockClient->getAccessToken();

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}('5O190127TN364715T', $expectedParams));
    }
}
