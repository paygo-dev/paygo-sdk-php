<?php

namespace PayGo;

use GuzzleHttp;
use PayGo\Transactions\Constants\PayGoTransactionParameterConst;

/**
 * Class AbstractAPI
 * @package PayGo
 */
abstract class AbstractAPI
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var GuzzleHttp\Client
     */
    protected $httpClient;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $endpoint;

    /**
     * @var array
     */
    protected $headers = [
        'Content-Type' => 'application/json; charset=utf-8',
        'Accept' => 'application/json',
    ];

    /**
     * AbstractAPI constructor.
     *
     * @param null $endpoint
     * @param Client|null $client
     * @throws \Exception
     */
    protected function __construct($endpoint = null, Client $client = null)
    {
        $this->httpClientInitialize($endpoint, $client);
    }

    /**
     * @param null $endpoint
     * @param Client|null $client
     * @throws \Exception
     */
    private function httpClientInitialize($endpoint = null, Client $client = null)
    {
        $this->endpoint = $endpoint;
        $this->client = $client;

        if(is_null($this->client))
            $this->client = new Client();

        $this->headers['x-application-key'] =  $this->client->getParameter(
            PayGoTransactionParameterConst::PAYGO_TRANSACTIONS_TOKEN);

        $baseUrl = $this->client->getParameter(
            PayGoTransactionParameterConst::PAYGO_TRANSACTIONS_HOST);

        if(!empty($endpoint))
            $baseUrl = sprintf("%s%s/", $baseUrl, $endpoint);

        $this->httpClient = new GuzzleHttp\Client([
            'base_url' => $baseUrl,
            'timeout' => $this->client->getParameter(
                PayGoTransactionParameterConst::PAYGO_TRANSACTIONS_TIMEOUT),
            'verify' => false,
            'defaults' => [
                'headers' => $this->headers
            ]
        ]);
    }

}