<?php

namespace Willvin\PayPal\Traits\PayPalAPI;

trait DisputesActions
{
    /**
     * Accept customer dispute claim.
     *
     * @param string $dispute_id
     * @param string $dispute_note
     * @param array  $data
     *
     * @throws \Throwable
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @see https://developer.paypal.com/docs/api/customer-disputes/v1/#disputes-actions_accept-claim
     */
    public function acceptDisputeClaim($dispute_id, $dispute_note, array $data = [])
    {
        $this->apiEndPoint = "v1/customer/disputes/{$dispute_id}/accept-claim";
        $this->apiUrl = collect([$this->config['api_url'], $this->apiEndPoint])->implode('/');

        $data['note'] = $dispute_note;
        $data['accept_claim_type'] = 'REFUND';

        $this->options['json'] = $data;

        $this->verb = 'post';

        return $this->doPayPalRequest();
    }

    /**
     * Accept offer to resolve dispute.
     *
     * @param string $dispute_id
     * @param string $dispute_note
     *
     * @throws \Throwable
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @see https://developer.paypal.com/docs/api/customer-disputes/v1/#disputes-actions_accept-offer
     */
    public function acceptDisputeOfferResolution($dispute_id, $dispute_note)
    {
        $this->apiEndPoint = "v1/customer/disputes/{$dispute_id}/accept-offer";
        $this->apiUrl = collect([$this->config['api_url'], $this->apiEndPoint])->implode('/');

        $this->options['json'] = [
            'note'  => $dispute_note,
        ];

        $this->verb = 'post';

        return $this->doPayPalRequest();
    }

    /**
     * Acknowledge item has been returned.
     *
     * @param string $dispute_id
     * @param string $dispute_note
     * @param string $acknowledgement_type
     *
     * @throws \Throwable
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @see https://developer.paypal.com/docs/api/customer-disputes/v1/#disputes-actions_acknowledge-return-item
     */
    public function acknowledgeItemReturned($dispute_id, $dispute_note, $acknowledgement_type)
    {
        $this->apiEndPoint = "v1/customer/disputes/{$dispute_id}/acknowledge-return-item";
        $this->apiUrl = collect([$this->config['api_url'], $this->apiEndPoint])->implode('/');

        $this->options['json'] = [
            'note'                  => $dispute_note,
            'acknowledgement_type'  => $acknowledgement_type,
        ];

        $this->verb = 'post';

        return $this->doPayPalRequest();
    }
}
