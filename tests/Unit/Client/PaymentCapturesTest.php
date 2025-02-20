<?php

namespace Willvin\PayPal\Tests\Unit\Client;

use PHPUnit\Framework\TestCase;
use Willvin\PayPal\Tests\MockClientClasses;
use Willvin\PayPal\Tests\MockRequestPayloads;
use Willvin\PayPal\Tests\MockResponsePayloads;

class PaymentCapturesTest extends TestCase
{
    use MockClientClasses;
    use MockRequestPayloads;
    use MockResponsePayloads;

    /** @test */
    public function it_can_show_details_for_a_captured_payment()
    {
        $expectedResponse = $this->mockGetCapturedPaymentDetailsResponse();

        $expectedEndpoint = 'https://api.sandbox.paypal.com/v2/payments/captures/2GG279541U471931P';
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
    public function it_can_refund_a_captured_payment()
    {
        $expectedResponse = $this->mockRefundCapturedPaymentResponse();

        $expectedEndpoint = 'https://api.sandbox.paypal.com/v2/payments/captures/2GG279541U471931P/refund';
        $expectedParams = [
            'headers' => [
                'Accept'            => 'application/json',
                'Accept-Language'   => 'en_US',
                'Authorization'     => 'Bearer some-token',
            ],
            'json' => $this->mockRefundCapturedPaymentParams(),
        ];

        $mockHttpClient = $this->mock_http_request(\GuzzleHttp\json_encode($expectedResponse), $expectedEndpoint, $expectedParams, 'post');

        $this->assertEquals($expectedResponse, \GuzzleHttp\json_decode($mockHttpClient->post($expectedEndpoint, $expectedParams)->getBody(), true));
    }
}
