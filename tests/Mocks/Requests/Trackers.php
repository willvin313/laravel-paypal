<?php

namespace Willvin\PayPal\Tests\Mocks\Requests;

trait Trackers
{
    /**
     * @return array
     */
    private function mockUpdateTrackingDetailsParams()
    {
        return \GuzzleHttp\json_decode('{
  "transaction_id": "8MC585209K746392H",
  "tracking_number": "443844607820",
  "status": "SHIPPED",
  "carrier": "FEDEX"
}', true);
    }

    /**
     * @return array
     */
    private function mockCreateTrackinginBatchesParams()
    {
        return \GuzzleHttp\json_decode('{
  "trackers": [
    {
      "transaction_id": "8MC585209K746392H",
      "tracking_number": "443844607820",
      "status": "SHIPPED",
      "carrier": "FEDEX"
    },
    {
      "transaction_id": "53Y56775AE587553X",
      "tracking_number": "443844607821",
      "status": "SHIPPED",
      "carrier": "FEDEX"
    }
  ]
}', true);
    }
}
