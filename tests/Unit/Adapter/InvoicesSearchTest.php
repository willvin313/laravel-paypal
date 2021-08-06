<?php

namespace Willvin\PayPal\Tests\Unit\Adapter;

use PHPUnit\Framework\TestCase;
use Willvin\PayPal\Tests\MockClientClasses;
use Willvin\PayPal\Tests\MockRequestPayloads;
use Willvin\PayPal\Tests\MockResponsePayloads;

class InvoicesSearchTest extends TestCase
{
    use MockClientClasses;
    use MockRequestPayloads;
    use MockResponsePayloads;

    /** @test */
    public function it_can_search_invoices()
    {
        $expectedResponse = $this->mockSearchInvoicesResponse();

        $expectedParams = $this->invoiceSearchParams();

        $expectedMethod = 'searchInvoices';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, true);

        $mockClient->setApiCredentials($this->getMockCredentials());
        $mockClient->getAccessToken();

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}($expectedParams, 1, 1, true));
    }
}
