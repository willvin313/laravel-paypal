<?php

namespace Willvin\PayPal\Tests\Mocks\Responses;

trait Trackers
{
    /**
     * @return array
     */
    private function mockGetTrackingDetailsResponse()
    {
        return \GuzzleHttp\json_decode('{
  "transaction_id": "8MC585209K746392H",
  "tracking_number": "443844607820",
  "status": "SHIPPED",
  "carrier": "FEDEX",
  "links": [
    {
      "href": "https://api.sandbox.paypal.com/v1/shipping/trackers/8MC585209K746392H-443844607820",
      "rel": "self"
    },
    {
      "href": "https://api.sandbox.paypal.com/v1/shipping/trackers/8MC585209K746392H-443844607820",
      "rel": "replace",
      "method": "PUT"
    },
    {
      "href": "https://api.sandbox.paypal.com/v1/shipping/trackers-batch",
      "rel": "create",
      "method": "POST"
    }
  ]
}', true);
    }

    /**
     * @return array
     */
    private function mockCreateTrackinginBatchesResponse()
    {
        return \GuzzleHttp\json_decode('{
  "tracker_identifiers": [
    {
      "transaction_id": "8MC585209K746392H",
      "tracking_number": "443844607820",
      "links": [
        {
          "href": "https://api.sandbox.paypal.com/v1/shipping/trackers/8MC585209K746392H-443844607820",
          "rel": "self",
          "method": "GET"
        },
        {
          "href": "https://api.sandbox.paypal.com/v1/shipping/trackers/8MC585209K746392H-443844607820",
          "rel": "replace",
          "method": "PUT"
        }
      ]
    },
    {
      "transaction_id": "53Y56775AE587553X",
      "tracking_number": "443844607821",
      "links": [
        {
          "href": "https://api.sandbox.paypal.com/v1/shipping/trackers/53Y56775AE587553X-443844607821",
          "rel": "self",
          "method": "GET"
        },
        {
          "href": "https://api.sandbox.paypal.com/v1/shipping/trackers/53Y56775AE587553X-443844607821",
          "rel": "replace",
          "method": "PUT"
        }
      ]
    }
  ],
  "errors": [
    {
      "name": "RESOURCE_NOT_FOUND",
      "debug_id": "46735c7461f3d",
      "message": "The specified resource does not exist.",
      "details": [
        {
          "field": "/trackers/0/transaction_id",
          "value": "8MC585309K746392H",
          "location": "body",
          "issue": "INVALID_TRANSACTION_ID"
        }
      ]
    }
  ],
  "links": [
    {
      "href": "https://api.sandbox.paypal.com/v1/shipping/trackers-batch",
      "rel": "self",
      "method": "POST"
    }
  ]
}', true);
    }
}
