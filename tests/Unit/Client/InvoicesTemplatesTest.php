<?php

namespace Willvin\PayPal\Tests\Unit\Client;

use PHPUnit\Framework\TestCase;
use Willvin\PayPal\Tests\MockClientClasses;
use Willvin\PayPal\Tests\MockRequestPayloads;
use Willvin\PayPal\Tests\MockResponsePayloads;

class InvoicesTemplatesTest extends TestCase
{
    use MockClientClasses;
    use MockRequestPayloads;
    use MockResponsePayloads;

    /** @test */
    public function it_can_create_invoice_template()
    {
        $expectedResponse = $this->mockCreateInvoiceTemplateResponse();

        $expectedEndpoint = 'https://api.sandbox.paypal.com/v2/invoicing/templates';
        $expectedParams = [
            'headers' => [
                'Accept'            => 'application/json',
                'Accept-Language'   => 'en_US',
                'Authorization'     => 'Bearer some-token',
            ],
            'json' => $this->mockCreateInvoiceTemplateParams(),
        ];

        $mockHttpClient = $this->mock_http_request(\GuzzleHttp\json_encode($expectedResponse), $expectedEndpoint, $expectedParams, 'post');

        $this->assertEquals($expectedResponse, \GuzzleHttp\json_decode($mockHttpClient->post($expectedEndpoint, $expectedParams)->getBody(), true));
    }

    /** @test */
    public function it_can_list_invoice_templates()
    {
        $expectedResponse = $this->mockListInvoiceTemplateResponse();

        $expectedEndpoint = 'https://api.sandbox.paypal.com/v2/invoicing/templates';
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
    public function it_can_delete_an_invoice_template()
    {
        $expectedResponse = '';

        $expectedEndpoint = 'https://api.sandbox.paypal.com/v2/invoicing/templates/TEMP-19V05281TU309413B';
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
    public function it_can_update_an_invoice_template()
    {
        $expectedResponse = $this->mockUpdateInvoiceTemplateResponse();

        $expectedEndpoint = 'https://api.sandbox.paypal.com/v2/invoicing/templates/TEMP-19V05281TU309413B';
        $expectedParams = [
            'headers' => [
                'Accept'            => 'application/json',
                'Accept-Language'   => 'en_US',
                'Authorization'     => 'Bearer some-token',
            ],
            'json' => $this->mockUpdateInvoiceTemplateParams(),
        ];

        $mockHttpClient = $this->mock_http_request(\GuzzleHttp\json_encode($expectedResponse), $expectedEndpoint, $expectedParams, 'put');

        $this->assertEquals($expectedResponse, \GuzzleHttp\json_decode($mockHttpClient->put($expectedEndpoint, $expectedParams)->getBody(), true));
    }

    /** @test */
    public function it_can_get_details_for_an_invoice_template()
    {
        $expectedResponse = $this->mockGetInvoiceTemplateResponse();

        $expectedEndpoint = 'https://api.sandbox.paypal.com/v2/invoicing/templates/TEMP-19V05281TU309413B';
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
