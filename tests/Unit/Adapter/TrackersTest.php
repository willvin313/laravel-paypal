<?php

namespace Willvin\PayPal\Tests\Unit\Adapter;

use PHPUnit\Framework\TestCase;
use Willvin\PayPal\Tests\MockClientClasses;
use Willvin\PayPal\Tests\MockRequestPayloads;
use Willvin\PayPal\Tests\MockResponsePayloads;

class TrackersTest extends TestCase
{
    use MockClientClasses;
    use MockRequestPayloads;
    use MockResponsePayloads;

    /** @test */
    public function it_can_get_tracking_details_for_tracking_id()
    {
        $expectedResponse = $this->mockGetTrackingDetailsResponse();

        $expectedParams = '8MC585209K746392H-443844607820';

        $expectedMethod = 'showTrackingDetails';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, true);

        $mockClient->setApiCredentials($this->getMockCredentials());
        $mockClient->getAccessToken();

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}($expectedParams));
    }

    /** @test */
    public function it_can_update_tracking_details_for_tracking_id()
    {
        $expectedResponse = '';

        $expectedData = $this->mockUpdateTrackingDetailsParams();

        $expectedParams = '8MC585209K746392H-443844607820';

        $expectedMethod = 'updateTrackingDetails';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, true);

        $mockClient->setApiCredentials($this->getMockCredentials());
        $mockClient->getAccessToken();

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}($expectedParams, $expectedData));
    }

    /** @test */
    public function it_can_create_tracking_in_batches()
    {
        $expectedResponse = $this->mockCreateTrackinginBatchesResponse();

        $expectedParams = $this->mockCreateTrackinginBatchesParams();

        $expectedMethod = 'addBatchTracking';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, true);

        $mockClient->setApiCredentials($this->getMockCredentials());
        $mockClient->getAccessToken();

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}($expectedParams));
    }
}
