<?php

namespace Willvin\PayPal\Traits\PayPalAPI;

use Carbon\Carbon;

trait Subscriptions
{
    /**
     * Create a new subscription.
     *
     * @param array $data
     *
     * @throws \Throwable
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @see https://developer.paypal.com/docs/api/subscriptions/v1/#subscriptions_create
     */
    public function createSubscription(array $data)
    {
        $this->apiEndPoint = 'v1/billing/subscriptions';
        $this->apiUrl = collect([$this->config['api_url'], $this->apiEndPoint])->implode('/');

        $this->options['json'] = $data;

        $this->verb = 'post';

        return $this->doPayPalRequest();
    }

    /**
     * Update an existing billing plan.
     *
     * @param string $subscription_id
     * @param array  $data
     *
     * @throws \Throwable
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @see https://developer.paypal.com/docs/api/subscriptions/v1/#subscriptions_patch
     */
    public function updateSubscription($subscription_id, array $data)
    {
        $this->apiEndPoint = "v1/billing/subscriptions/{$subscription_id}";
        $this->apiUrl = collect([$this->config['api_url'], $this->apiEndPoint])->implode('/');

        $this->options['json'] = $data;

        $this->verb = 'patch';

        return $this->doPayPalRequest(false);
    }

    /**
     * Show details for an existing subscription.
     *
     * @param string $subscription_id
     *
     * @throws \Throwable
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @see https://developer.paypal.com/docs/api/subscriptions/v1/#subscriptions_get
     */
    public function showSubscriptionDetails($subscription_id)
    {
        $this->apiEndPoint = "v1/billing/subscriptions/{$subscription_id}";
        $this->apiUrl = collect([$this->config['api_url'], $this->apiEndPoint])->implode('/');

        $this->verb = 'get';

        return $this->doPayPalRequest();
    }

    /**
     * Activate an existing subscription.
     *
     * @param string $subscription_id
     * @param string $reason
     *
     * @throws \Throwable
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @see https://developer.paypal.com/docs/api/subscriptions/v1/#subscriptions_activate
     */
    public function activateSubscription($subscription_id, $reason)
    {
        $this->apiEndPoint = "v1/billing/subscriptions/{$subscription_id}/activate";
        $this->apiUrl = collect([$this->config['api_url'], $this->apiEndPoint])->implode('/');

        $this->options['json'] = ['reason' => $reason];

        $this->verb = 'post';

        return $this->doPayPalRequest(false);
    }

    /**
     * Cancel an existing subscription.
     *
     * @param string $subscription_id
     * @param string $reason
     *
     * @throws \Throwable
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @see https://developer.paypal.com/docs/api/subscriptions/v1/#subscriptions_cancel
     */
    public function cancelSubscription($subscription_id, $reason)
    {
        $this->apiEndPoint = "v1/billing/subscriptions/{$subscription_id}/cancel";
        $this->apiUrl = collect([$this->config['api_url'], $this->apiEndPoint])->implode('/');

        $this->options['json'] = ['reason' => $reason];

        $this->verb = 'post';

        return $this->doPayPalRequest(false);
    }

    /**
     * Suspend an existing subscription.
     *
     * @param string $subscription_id
     * @param string $reason
     *
     * @throws \Throwable
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @see https://developer.paypal.com/docs/api/subscriptions/v1/#subscriptions_suspend
     */
    public function suspendSubscription($subscription_id, $reason)
    {
        $this->apiEndPoint = "v1/billing/subscriptions/{$subscription_id}/suspend";
        $this->apiUrl = collect([$this->config['api_url'], $this->apiEndPoint])->implode('/');

        $this->options['json'] = ['reason' => $reason];

        $this->verb = 'post';

        return $this->doPayPalRequest(false);
    }

    /**
     * Capture payment for an existing subscription.
     *
     * @param string $subscription_id
     * @param string $note
     * @param float  $amount
     *
     * @throws \Throwable
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @see https://developer.paypal.com/docs/api/subscriptions/v1/#subscriptions_capture
     */
    public function captureSubscriptionPayment($subscription_id, $note, $amount)
    {
        $this->apiEndPoint = "v1/billing/subscriptions/{$subscription_id}/capture";
        $this->apiUrl = collect([$this->config['api_url'], $this->apiEndPoint])->implode('/');

        $this->options['json'] = [
            'note'          => $note,
            'capture_type'  => 'OUTSTANDING_BALANCE',
            'amount'        => [
                'currency_code'     => $this->currency,
                'value'             => "{$amount}",
            ],
        ];

        $this->verb = 'post';

        return $this->doPayPalRequest(false);
    }

    /**
     * Revise quantity, product or service for an existing subscription.
     *
     * @param string $subscription_id
     * @param array  $items
     *
     * @throws \Throwable
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @see https://developer.paypal.com/docs/api/subscriptions/v1/#subscriptions_revise
     */
    public function reviseSubscription($subscription_id, array $items)
    {
        $this->apiEndPoint = "v1/billing/subscriptions/{$subscription_id}/revise";
        $this->apiUrl = collect([$this->config['api_url'], $this->apiEndPoint])->implode('/');

        $this->options['json'] = $items;

        $this->verb = 'post';

        return $this->doPayPalRequest();
    }

    /**
     * List transactions for an existing subscription.
     *
     * @param string                    $subscription_id
     * @param \DateTimeInterface|string $start_date
     * @param \DateTimeInterface|string $end_date
     *
     * @throws \Throwable
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @see https://developer.paypal.com/docs/api/subscriptions/v1/#subscriptions_transactions
     */
    public function listSubscriptionTransactions($subscription_id, $start_date = '', $end_date = '')
    {
        if (($start_date instanceof \DateTimeInterface) === false) {
            $start_date = Carbon::parse($start_date);
        }

        if (($end_date instanceof \DateTimeInterface) === false) {
            $end_date = Carbon::parse($end_date);
        }

        $start_date = $start_date->toIso8601String();
        $end_date = $end_date->toIso8601String();

        $this->apiEndPoint = "v1/billing/subscriptions/{$subscription_id}/transactions?start_time={$start_date}&end_time={$end_date}";
        $this->apiUrl = collect([$this->config['api_url'], $this->apiEndPoint])->implode('/');

        $this->verb = 'get';

        return $this->doPayPalRequest();
    }
}
