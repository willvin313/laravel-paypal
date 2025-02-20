<?php

namespace Willvin\PayPal\Tests\Feature;

use PHPUnit\Framework\TestCase;
use Willvin\PayPal\Services\PayPal as PayPalClient;
use Willvin\PayPal\Tests\MockClientClasses;

class AdapterConfigTest extends TestCase
{
    use MockClientClasses;

    /** @var \Willvin\PayPal\Services\PayPal */
    protected $client;

    protected function setUp(): void
    {
        $this->client = new PayPalClient($this->getApiCredentials());

        parent::setUp();
    }

    /** @test */
    public function it_throws_exception_if_invalid_credentials_are_provided()
    {
        $this->expectException(\RuntimeException::class);

        $this->client = new PayPalClient([]);
    }

    /** @test */
    public function it_can_take_valid_credentials_and_return_the_client_instance()
    {
        $this->assertInstanceOf(PayPalClient::class, $this->client);
    }

    /** @test */
    public function it_throws_exception_if_invalid_credentials_are_provided_through_method()
    {
        $this->expectException(\RuntimeException::class);

        $this->client->setApiCredentials([]);
    }

    /** @test */
    public function it_returns_the_client_instance_if_valid_credentials_are_provided_through_method()
    {
        $this->client->setApiCredentials($this->getApiCredentials());

        $this->assertInstanceOf(PayPalClient::class, $this->client);
    }

    /** @test */
    public function it_throws_exception_if_invalid_currency_is_set()
    {
        $this->expectException(\RuntimeException::class);

        $this->client->setCurrency('PKR');

        $this->assertNotEquals('PKR', $this->client->getCurrency());
    }

    /** @test */
    public function it_can_set_a_valid_currency()
    {
        $this->client->setCurrency('EUR');

        $this->assertNotEmpty($this->client->getCurrency());
        $this->assertEquals('EUR', $this->client->getCurrency());
    }
}
