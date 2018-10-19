
## SDK para consulta de transações do PayGo WEB

[![Build Status](https://travis-ci.com/paygo-dev/paygo-sdk-php.svg?branch=master)](https://travis-ci.com/paygo-dev/paygo-sdk-php)


[![Total Downloads](https://poser.pugx.org/paygo-dev/paygo-sdk-php/downloads)](https://packagist.org/packages/paygo-dev/paygo-sdk-php)
[![Monthly Downloads](https://poser.pugx.org/paygo-dev/paygo-sdk-php/d/monthly)](https://packagist.org/packages/paygo-dev/paygo-sdk-php)
[![Daily Downloads](https://poser.pugx.org/paygo-dev/paygo-sdk-php/d/daily)](https://packagist.org/packages/paygo-dev/paygo-sdk-php)

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/paygo-dev/paygo-sdk-php/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/paygo-dev/paygo-sdk-php/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/paygo-dev/paygo-sdk-php/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/paygo-dev/paygo-sdk-php/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/paygo-dev/paygo-sdk-php/badges/build.png?b=master)](https://scrutinizer-ci.com/g/paygo-dev/paygo-sdk-php/build-status/master)

[![License](https://poser.pugx.org/paygo-dev/paygo-sdk-php/license)](https://packagist.org/packages/paygo-dev/paygo-sdk-php)

## Dependências

#### require
* PHP >= 5.6
* guzzlehttp/guzzle 5.3.1

#### require-dev
* phpunit/phpunit ^4.8


## Instalação

Execute em seu shell:

    composer require paygo-dev/paygo-sdk-php

Adicionando a dependência ao seu arquivo composer.json

    {
        "require": {
           "paygo-dev/paygo-sdk-php" : "*"
        }
    }

## Variáveis de ambiente

    PAYGO_TRANSACTIONS_HOST=http://api.paygomais.com.br
    PAYGO_TRANSACTIONS_TIMEOUT=10
    PAYGO_TRANSACTIONS_TOKEN=e258c0g0-4795-4bf3-bf12-483737e9cac3


## Configurando a autenticação

### Informar parâmetros de integração

Para que o SDK consiga acessar as API's é necessário informar os parâmetros conforme exemplo abaixo, caso não seja específicado o SDK irá aferir através de variáveis de ambiente.

```php
$client = new \PayGo\Client([
    PayGoTransactionParameterConst::PAYGO_TRANSACTIONS_HOST => "http://api.paygomais.com.br",
    PayGoTransactionParameterConst::PAYGO_TRANSACTIONS_TIMEOUT => 10,
    PayGoTransactionParameterConst::PAYGO_TRANSACTIONS_TOKEN => "e258c0g0-4795-4bf3-bf12-483737e9cac3",
]);

$transactionApi = new \PayGo\Transactions\API\TransactionAPI($client);
```

Os parâmetros poder ser definidos ou alterados conforme abaixo.

```php
$client = (new Client())
            ->setParameter(PayGoTransactionParameterConst::PAYGO_TRANSACTIONS_HOST, "http://api.paygomais.com.br")
            ->setParameter(PayGoTransactionParameterConst::PAYGO_TRANSACTIONS_TIMEOUT, 10)
            ->setParameter(PayGoTransactionParameterConst::PAYGO_TRANSACTIONS_TOKEN, "e258c0g0-4795-4bf3-bf12-483737e9cac3");

$transactionApi = new \PayGo\Transactions\API\TransactionAPI($client);
```

Caso os parâmetros não sejam informados o SDK irá aferir através de variáveis de ambiente caso tenha sido configuradas

```php
$transactionApi = new \PayGo\Transactions\API\TransactionAPI();
```

### Exemplos de utilização


Exemplo de consulta por intervalo de data, retornando apenas um registro.

```php
$response = $this->transacaoApi->filter(
            (new Query())
                ->setLimit(1)
                ->setFilters(
                    (new Filters())
                        ->setServerDateRange(
                            (new DateRange())
                                ->setFromDate(\DateTime::createFromFormat('Y-m-d', '2015-01-01'))
                                ->setEndDate(\DateTime::createFromFormat('Y-m-d', '2018-12-01'))
                        )
                )
        );

print_r($response->getStatusCode());
print_r($response->json());
```

Exemplo de consulta por intervalo de data e tipos de transações, retornando apenas um registro.

```php
$response = $this->transacaoApi->filter(
            (new Query())
                ->setLimit(1)
                ->setFilters(
                    (new Filters())
                        ->setTypes([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,33,34])
                        ->setServerDateRange(
                            (new DateRange())
                                ->setFromDate(\DateTime::createFromFormat('Y-m-d', '2015-01-01'))
                                ->setEndDate(\DateTime::createFromFormat('Y-m-d', '2018-12-01'))
                        )
                )
        );

print_r($response->getStatusCode());
print_r($response->json());
```

Exemplo de consulta por intervalo de data e status de transações, retornando apenas um registro.

```php
$response = $this->transacaoApi->filter(
            (new Query())
                ->setLimit(1)
                ->setFilters(
                    (new Filters())
                        ->setStatus([289,8737])
                        ->setServerDateRange(
                            (new DateRange())
                                ->setFromDate(\DateTime::createFromFormat('Y-m-d', '2015-01-01'))
                                ->setEndDate(\DateTime::createFromFormat('Y-m-d', '2018-12-01'))
                        )
                )
        );

print_r($response->getStatusCode());
print_r($response->json());
```

Exemplo de consulta omitindo alguns campos do retorno.

```php
$response = $this->transacaoApi->filter(
            (new Query())
                ->setLimit(1)
                ->setSource(
                    (new Source())
                        ->setExclude([
                            SourceConst::AFFILIATION_COMPANY_DATA_TAX_ID,
                            SourceConst::FULL_RECEIPT_COPY,
                            SourceConst::AFFILIATION_COMPANY_DATA_DISPLAY_NAME
                        ])
                )
        );

print_r($response->getStatusCode());
print_r($response->json());
```

Exemplo de consulta expecificando alguns campos do retorno.

```php
$response = $this->transacaoApi->filter(
            (new Query())
                ->setLimit(1)
                ->setSource(
                    (new Source())
                        ->setInclude([
                            SourceConst::AFFILIATION_COMPANY_DATA_TAX_ID,
                            SourceConst::FULL_RECEIPT_COPY,
                            SourceConst::AFFILIATION_COMPANY_DATA_DISPLAY_NAME
                        ])
                )
        );

print_r($response->getStatusCode());
print_r($response->json());
```

Exemplo de consulta expecificando alguns campos do retorno e fintrando por nome da rede adquirente.

```php
$response = $this->transacaoApi->filter(
            (new Query())
                ->setLimit(1)
                ->setFilters(
                    (new Filters())
                        ->setAuthorizerNames(["REDE"])
                )
                ->setSource(
                    (new Source())
                        ->setInclude([
                            SourceConst::AFFILIATION_COMPANY_DATA_TAX_ID,
                            SourceConst::FULL_RECEIPT_COPY,
                            SourceConst::AFFILIATION_COMPANY_DATA_DISPLAY_NAME,
                            SourceConst::AUTHORIZER_NAME,
                        ])
                )
        );

print_r($response->getStatusCode());
print_r($response->json());
```

[GitHub]: <https://github.com/paygo-dev/paygo-sdk-php.git>