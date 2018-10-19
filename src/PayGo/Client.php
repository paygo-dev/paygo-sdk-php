<?php

namespace PayGo;


use PayGo\Transactions\Constants\PayGoTransactionParameterConst;

/**
 * Class Client
 * @package PayGo
 */
class Client
{

    /**
     * Timeout padrão
     *
     * @var integer
     */
    const PAYGO_TRANSACTIONS_TIMEOUT_DEFAULT = 10;

    /**
     * Parâmetros, pré inicializado com valores padrão
     *
     * @var array
     */
    private $params = [
        PayGoTransactionParameterConst::PAYGO_TRANSACTIONS_TIMEOUT => self::PAYGO_TRANSACTIONS_TIMEOUT_DEFAULT,
    ];

    /**
     * Client constructor.
     *
     * @param array|null $params
     * @throws \Exception
     */
    public function __construct(array $params = null)
    {
        $this->loadParameters($params);
    }

    /**
     * Obter parâmetro
     *
     * @param $key
     * @return mixed
     */
    public function getParameter($key)
    {
        return isset($this->params[$key]) ? $this->params[$key] : null;
    }

    /**
     * @param $key
     * @param $value
     * @return $this
     * @throws \Exception
     */
    public function setParameter($key, $value)
    {
        $this->params[$key] = $value;
        $this->loadParameters($this->params);
        return $this;
    }

    /**
     * @param $params
     * @throws \Exception
     */
    private function loadParameters($params)
    {
        $this->params[PayGoTransactionParameterConst::PAYGO_TRANSACTIONS_HOST] =
            getenv('PAYGO_TRANSACTIONS_HOST');
        $this->params[PayGoTransactionParameterConst::PAYGO_TRANSACTIONS_TIMEOUT] =
            getenv('PAYGO_TRANSACTIONS_TIMEOUT');
        $this->params[PayGoTransactionParameterConst::PAYGO_TRANSACTIONS_TOKEN] =
            getenv('PAYGO_TRANSACTIONS_TOKEN');

        if(!is_null($params))
            foreach ($params as $key => $param)
            {
                if(!in_array($key, [
                    PayGoTransactionParameterConst::PAYGO_TRANSACTIONS_HOST,
                    PayGoTransactionParameterConst::PAYGO_TRANSACTIONS_TIMEOUT,
                    PayGoTransactionParameterConst::PAYGO_TRANSACTIONS_TOKEN,
                ]))
                    throw new \Exception(sprintf("Parâmetro %s inválido", $key));
            }

        if(!is_null($params) && is_array($params)){
            foreach ($params as $key => $value)
                $this->params[$key] = $value;
        }
    }


}







