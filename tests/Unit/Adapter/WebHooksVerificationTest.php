<?php

namespace Willvin\PayPal\Tests\Unit\Adapter;

use PHPUnit\Framework\TestCase;
use Willvin\PayPal\Tests\MockClientClasses;
use Willvin\PayPal\Tests\MockRequestPayloads;
use Willvin\PayPal\Tests\MockResponsePayloads;

class WebHooksVerificationTest extends TestCase
{
    use MockClientClasses;
    use MockRequestPayloads;
    use MockResponsePayloads;

    /** @test */
    public function it_can_verify_web_hook_signature()
    {
        $expectedResponse = $this->mockVerifyWebHookSignatureResponse();

        $expectedParams = $this->mockVerifyWebHookSignatureParams();

        $expectedMethod = 'verifyWebHook';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, true);

        $mockClient->setApiCredentials($this->getMockCredentials());
        $mockClient->getAccessToken();

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}($expectedParams));
    }
}
