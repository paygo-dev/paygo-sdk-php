<?php

namespace PayGo\Transactions\API;


use PayGo\AbstractAPI;
use PayGo\Client;
use PayGo\Transactions\Contracts\Query\Query;

/**
 * Class TransactionAPI
 * @package PayGo\Transactions\API
 */
class TransactionAPI extends AbstractAPI
{

    /**
     * TransactionAPI constructor.
     * @param Client|null $client
     * @throws \Exception
     */
    public function __construct(Client $client = null)
    {
        parent::__construct("/subntk", $client);
    }

    /**
     * @param Query $query
     * @return \GuzzleHttp\Message\FutureResponse|\GuzzleHttp\Message\ResponseInterface|\GuzzleHttp\Ring\Future\FutureInterface|null
     * @throws \Exception
     */
    public function filter(Query $query)
    {
        try{
            return $this->httpClient->post("transactions", [
                'body' => json_encode($query)
            ]);
        }catch (\Exception $ex){
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex);
        }
    }
}