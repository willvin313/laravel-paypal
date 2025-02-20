<?php

namespace Willvin\PayPal\Traits\PayPalAPI;

trait WebHooks
{
    /**
     * Create a new web hook.
     *
     * @param string $url
     * @param array  $events
     *
     * @throws \Throwable
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @see https://developer.paypal.com/docs/api/webhooks/v1/#webhooks_post
     */
    public function createWebHook($url, array $events)
    {
        $this->apiEndPoint = 'v1/notifications/webhooks';
        $this->apiUrl = collect([$this->config['api_url'], $this->apiEndPoint])->implode('/');

        $data = ['url' => $url];
        $data['event_types'] = collect($events)->map(function ($item) {
            return ['name' => $item];
        })->toArray();

        $this->options['json'] = $data;

        $this->verb = 'post';

        return $this->doPayPalRequest();
    }

    /**
     * List all web hooks.
     *
     * @throws \Throwable
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @see https://developer.paypal.com/docs/api/webhooks/v1/#webhooks_list
     */
    public function listWebHooks()
    {
        $this->apiEndPoint = 'v1/notifications/webhooks';
        $this->apiUrl = collect([$this->config['api_url'], $this->apiEndPoint])->implode('/');

        $this->verb = 'get';

        return $this->doPayPalRequest();
    }

    /**
     * Delete a web hook.
     *
     * @param string $web_hook_id
     *
     * @throws \Throwable
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @see https://developer.paypal.com/docs/api/webhooks/v1/#webhooks_delete
     */
    public function deleteWebHook($web_hook_id)
    {
        $this->apiEndPoint = "v1/notifications/webhooks/{$web_hook_id}";
        $this->apiUrl = collect([$this->config['api_url'], $this->apiEndPoint])->implode('/');

        $this->verb = 'delete';

        return $this->doPayPalRequest(false);
    }

    /**
     * Update an existing web hook.
     *
     * @param string $web_hook_id
     * @param array  $data
     *
     * @throws \Throwable
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @see https://developer.paypal.com/docs/api/webhooks/v1/#webhooks_update
     */
    public function updateWebHook($web_hook_id, array $data)
    {
        $this->apiEndPoint = "v1/notifications/webhooks/{$web_hook_id}";
        $this->apiUrl = collect([$this->config['api_url'], $this->apiEndPoint])->implode('/');

        $this->options['json'] = $data;

        $this->verb = 'patch';

        return $this->doPayPalRequest();
    }

    /**
     * Show details for an existing web hook.
     *
     * @param string $web_hook_id
     *
     * @throws \Throwable
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @see https://developer.paypal.com/docs/api/webhooks/v1/#webhooks_get
     */
    public function showWebHookDetails($web_hook_id)
    {
        $this->apiEndPoint = "v1/notifications/webhooks/{$web_hook_id}";
        $this->apiUrl = collect([$this->config['api_url'], $this->apiEndPoint])->implode('/');

        $this->verb = 'get';

        return $this->doPayPalRequest();
    }

    /**
     * List events for an existing web hook.
     *
     * @param string $web_hook_id
     *
     * @throws \Throwable
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @see https://developer.paypal.com/docs/api/webhooks/v1/#webhooks_get
     */
    public function listWebHookEvents($web_hook_id)
    {
        $this->apiEndPoint = "v1/notifications/webhooks/{$web_hook_id}/event-types";
        $this->apiUrl = collect([$this->config['api_url'], $this->apiEndPoint])->implode('/');

        $this->verb = 'get';

        return $this->doPayPalRequest();
    }
}
