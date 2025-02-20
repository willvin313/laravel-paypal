<?php

namespace Willvin\PayPal\Tests\Unit\Client;

use PHPUnit\Framework\TestCase;
use Willvin\PayPal\Tests\MockClientClasses;
use Willvin\PayPal\Tests\MockRequestPayloads;
use Willvin\PayPal\Tests\MockResponsePayloads;

class WebHooksTest extends TestCase
{
    use MockClientClasses;
    use MockRequestPayloads;
    use MockResponsePayloads;

    /** @test */
    public function it_can_create_a_web_hook()
    {
        $expectedResponse = $this->mockCreateWebHookResponse();

        $expectedEndpoint = 'https://api.sandbox.paypal.com/v1/notifications/webhooks';
        $expectedParams = [
            'headers' => [
                'Accept'            => 'application/json',
                'Accept-Language'   => 'en_US',
                'Authorization'     => 'Bearer some-token',
            ],
            'json' => $this->mockCreateWebHookParams(),
        ];

        $mockHttpClient = $this->mock_http_request(\GuzzleHttp\json_encode($expectedResponse), $expectedEndpoint, $expectedParams, 'post');

        $this->assertEquals($expectedResponse, \GuzzleHttp\json_decode($mockHttpClient->post($expectedEndpoint, $expectedParams)->getBody(), true));
    }

    /** @test */
    public function it_can_list_web_hooks()
    {
        $expectedResponse = $this->mockListWebHookResponse();

        $expectedEndpoint = 'https://api.sandbox.paypal.com/v1/notifications/webhooks';
        $expectedParams = [
            'headers' => [
                'Accept'            => 'application/json',
                'Accept-Language'   => 'en_US',
                'Authorization'     => 'Bearer some-token',
            ],
        ];

        $mockHttpClient = $this->mock_http_request(\GuzzleHttp\json_encode($expectedResponse), $expectedEndpoint, $expectedParams, 'get');

        $this->assertEquals($expectedResponse, \GuzzleHttp\json_decode($mockHttpClient->get($expectedEndpoint, $expectedParams)->getBody(), true));
    }

    /** @test */
    public function it_can_delete_a_web_hook()
    {
        $expectedResponse = '';

        $expectedEndpoint = 'https://api.sandbox.paypal.com/v1/notifications/webhooks/5GP028458E2496506';
        $expectedParams = [
            'headers' => [
                'Accept'            => 'application/json',
                'Accept-Language'   => 'en_US',
                'Authorization'     => 'Bearer some-token',
            ],
        ];

        $mockHttpClient = $this->mock_http_request(\GuzzleHttp\json_encode($expectedResponse), $expectedEndpoint, $expectedParams, 'delete');

        $this->assertEquals($expectedResponse, \GuzzleHttp\json_decode($mockHttpClient->delete($expectedEndpoint, $expectedParams)->getBody(), true));
    }

    /** @test */
    public function it_can_update_a_web_hook()
    {
        $expectedResponse = $this->mockUpdateWebHookResponse();

        $expectedEndpoint = 'https://api.sandbox.paypal.com/v1/notifications/webhooks/0EH40505U7160970P';
        $expectedParams = [
            'headers' => [
                'Accept'            => 'application/json',
                'Accept-Language'   => 'en_US',
                'Authorization'     => 'Bearer some-token',
            ],
            'json' => $this->mockUpdateWebHookParams(),
        ];

        $mockHttpClient = $this->mock_http_request(\GuzzleHttp\json_encode($expectedResponse), $expectedEndpoint, $expectedParams, 'patch');

        $this->assertEquals($expectedResponse, \GuzzleHttp\json_decode($mockHttpClient->patch($expectedEndpoint, $expectedParams)->getBody(), true));
    }

    /** @test */
    public function it_can_show_details_for_a_web_hook()
    {
        $expectedResponse = $this->mockGetWebHookResponse();

        $expectedEndpoint = 'https://api.sandbox.paypal.com/v1/notifications/webhooks/0EH40505U7160970P';
        $expectedParams = [
            'headers' => [
                'Accept'            => 'application/json',
                'Accept-Language'   => 'en_US',
                'Authorization'     => 'Bearer some-token',
            ],
        ];

        $mockHttpClient = $this->mock_http_request(\GuzzleHttp\json_encode($expectedResponse), $expectedEndpoint, $expectedParams, 'get');

        $this->assertEquals($expectedResponse, \GuzzleHttp\json_decode($mockHttpClient->get($expectedEndpoint, $expectedParams)->getBody(), true));
    }

    /** @test */
    public function it_can_list_web_hooks_events()
    {
        $expectedResponse = $this->mockListWebHookEventsResponse();

        $expectedEndpoint = 'https://api.sandbox.paypal.com/v1/notifications/webhooks/0EH40505U7160970P';
        $expectedParams = [
            'headers' => [
                'Accept'            => 'application/json',
                'Accept-Language'   => 'en_US',
                'Authorization'     => 'Bearer some-token',
            ],
        ];

        $mockHttpClient = $this->mock_http_request(\GuzzleHttp\json_encode($expectedResponse), $expectedEndpoint, $expectedParams, 'get');

        $this->assertEquals($expectedResponse, \GuzzleHttp\json_decode($mockHttpClient->get($expectedEndpoint, $expectedParams)->getBody(), true));
    }
}
