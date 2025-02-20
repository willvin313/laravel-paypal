<?php

namespace Willvin\PayPal\Traits\PayPalAPI;

trait PaymentCaptures
{
    /**
     * Show details for a captured payment.
     *
     * @param string $capture_id
     *
     * @throws \Throwable
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @see https://developer.paypal.com/docs/api/payments/v2/#captures_get
     */
    public function showCapturedPaymentDetails($capture_id)
    {
        $this->apiEndPoint = "v2/payments/captures/{$capture_id}";
        $this->apiUrl = collect([$this->config['api_url'], $this->apiEndPoint])->implode('/');

        $this->verb = 'get';

        return $this->doPayPalRequest();
    }

    /**
     * Refund a captured payment.
     *
     * @param string $capture_id
     * @param string $invoice_id
     * @param float  $amount
     * @param string $note
     *
     * @throws \Throwable
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @see https://developer.paypal.com/docs/api/payments/v2/#captures_refund
     */
    public function refundCapturedPayment($capture_id, $invoice_id, $amount, $note)
    {
        $this->apiEndPoint = "v2/payments/captures/{$capture_id}/refund";
        $this->apiUrl = collect([$this->config['api_url'], $this->apiEndPoint])->implode('/');

        $this->options['json'] = [
            'amount' => [
                'value'         => $amount,
                'currency_code' => $this->currency,
            ],
            'invoice_id'    => $invoice_id,
            'note_to_payer' => $note,
        ];

        $this->verb = 'post';

        return $this->doPayPalRequest();
    }
}
