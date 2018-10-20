
<img src="https://marketplace-ntk.pismo.io/assets/images/logos/PayGo/logo-PayGo-color.svg" align="right" />

# SDK para consulta de transações do PayGo WEB v1

[![Build Status](https://travis-ci.com/paygo-dev/paygo-sdk-php.svg?branch=master)](https://travis-ci.com/paygo-dev/paygo-sdk-php)
[![Code Climate](https://codeclimate.com/github/paygo-dev/paygo-sdk-php/badges/gpa.svg)](https://codeclimate.com/github/paygo-dev/paygo-sdk-php)

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/paygo-dev/paygo-sdk-php/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/paygo-dev/paygo-sdk-php/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/paygo-dev/paygo-sdk-php/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/paygo-dev/paygo-sdk-php/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/paygo-dev/paygo-sdk-php/badges/build.png?b=master)](https://scrutinizer-ci.com/g/paygo-dev/paygo-sdk-php/build-status/master)

[![Total Downloads](https://poser.pugx.org/paygo-dev/paygo-sdk-php/downloads)](https://packagist.org/packages/paygo-dev/paygo-sdk-php)
[![Monthly Downloads](https://poser.pugx.org/paygo-dev/paygo-sdk-php/d/monthly)](https://packagist.org/packages/paygo-dev/paygo-sdk-php)
[![Daily Downloads](https://poser.pugx.org/paygo-dev/paygo-sdk-php/d/daily)](https://packagist.org/packages/paygo-dev/paygo-sdk-php)

[![Latest Stable Version](https://poser.pugx.org/paygo-dev/paygo-sdk-php/v/stable)](https://packagist.org/packages/paygo-dev/paygo-sdk-php)
[![Latest Unstable Version](https://poser.pugx.org/paygo-dev/paygo-sdk-php/v/unstable)](https://packagist.org/packages/paygo-dev/paygo-sdk-php)

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

Resposta

```php
array(1) {
  [0]=>
  array(27) {
    ["AffiliationCompanyDataDisplayName"]=>
    string(4) "TESTE"
    ["AffiliationCompanyDataTaxId"]=>
    string(18) "99.999.999/0001-99"
    ["AffiliationNumber"]=>
    string(32) "********************************"
    ["Amount"]=>
    string(4) "5000"
    ["AuthorizerCode"]=>
    string(5) "STONE"
    ["AuthorizerExternalReference"]=>
    string(14) "19291241077475"
    ["AuthorizerName"]=>
    string(5) "STONE"
    ["CardDataCardName"]=>
    string(10) "MASTERCARD"
    ["CardDataExpirationDate"]=>
    string(4) "2602"
    ["CardDataMaskedCardNumber"]=>
    string(16) "************5768"
    ["CardDataType"]=>
    int(1)
    ["FinancingDataInstallmentsNumber"]=>
    int(1)
    ["FinancingDataType"]=>
    int(1)
    ["FullReceiptCopy"]=>
    string(543) "
     STONE - VIA ESTABELECIMENTO      
     MASTERCARD - CREDITO A VISTA     
CNPJ: 999.999.999/0001-99
2ALL
BELO HORIZONTE - MG
************5766       02/04/18  16:42
EC:128268623                AUT:424973
SAK:&E62D11B67204181A190D83E1EBED4EC
DOC:1585
STONE ID:19281241077495
AC:6B087A3450022121           ONL-CHIP
AID: A0000000041010
Credito                       APROVADO
TOTAL:                        R$ 50,00
     TRANSACAO APROVADA COM SENHA     
----------------------------------------
71666 0000007544 0000002585 

"
    ["InternalLocalReference"]=>
    int(1585)
    ["POSCompanyDataDisplayName"]=>
    string(27) "Adriano M. La Selva"
    ["POSCompanyDataTaxId"]=>
    string(14) "111.111.111-11"
    ["POSDataDescription"]=>
    string(12) "Door to Door"
    ["POSDataIdentifier"]=>
    string(5) "9999999"
    ["POSTimestamp"]=>
    string(19) "2018-04-02 16:43:04"
    ["ProductName"]=>
    string(15) "CREDITO A VISTA"
    ["Result"]=>
    int(0)
    ["ResultMessage"]=>
    string(9) "APROVADO "
    ["ServerTimestamp"]=>
    string(19) "2018-04-02 16:42:46"
    ["Status"]=>
    string(3) "289"
    ["Type"]=>
    int(33)
    ["UniqueId"]=>
    int(33171163)
  }
}
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

Resposta

```php
array(1) {
  [0]=>
  array(27) {
    ["AffiliationCompanyDataDisplayName"]=>
    string(4) "TESTE"
    ["AffiliationCompanyDataTaxId"]=>
    string(18) "99.999.999/0001-99"
    ["AffiliationNumber"]=>
    string(32) "********************************"
    ["Amount"]=>
    string(4) "5000"
    ["AuthorizerCode"]=>
    string(5) "STONE"
    ["AuthorizerExternalReference"]=>
    string(14) "19291241077475"
    ["AuthorizerName"]=>
    string(5) "STONE"
    ["CardDataCardName"]=>
    string(10) "MASTERCARD"
    ["CardDataExpirationDate"]=>
    string(4) "2602"
    ["CardDataMaskedCardNumber"]=>
    string(16) "************5768"
    ["CardDataType"]=>
    int(1)
    ["FinancingDataInstallmentsNumber"]=>
    int(1)
    ["FinancingDataType"]=>
    int(1)
    ["FullReceiptCopy"]=>
    string(543) "
     STONE - VIA ESTABELECIMENTO      
     MASTERCARD - CREDITO A VISTA     
CNPJ: 999.999.999/0001-99
2ALL
BELO HORIZONTE - MG
************5766       02/04/18  16:42
EC:128268623                AUT:424973
SAK:&E62D11B67204181A190D83E1EBED4EC
DOC:1585
STONE ID:19281241077495
AC:6B087A3450022121           ONL-CHIP
AID: A0000000041010
Credito                       APROVADO
TOTAL:                        R$ 50,00
     TRANSACAO APROVADA COM SENHA     
----------------------------------------
71666 0000007544 0000002585 

"
    ["InternalLocalReference"]=>
    int(1585)
    ["POSCompanyDataDisplayName"]=>
    string(27) "Adriano M. La Selva"
    ["POSCompanyDataTaxId"]=>
    string(14) "111.111.111-11"
    ["POSDataDescription"]=>
    string(12) "Door to Door"
    ["POSDataIdentifier"]=>
    string(5) "9999999"
    ["POSTimestamp"]=>
    string(19) "2018-04-02 16:43:04"
    ["ProductName"]=>
    string(15) "CREDITO A VISTA"
    ["Result"]=>
    int(0)
    ["ResultMessage"]=>
    string(9) "APROVADO "
    ["ServerTimestamp"]=>
    string(19) "2018-04-02 16:42:46"
    ["Status"]=>
    string(3) "289"
    ["Type"]=>
    int(33)
    ["UniqueId"]=>
    int(33171163)
  }
}
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

Resposta

```php
array(1) {
  [0]=>
  array(27) {
    ["AffiliationCompanyDataDisplayName"]=>
    string(4) "TESTE"
    ["AffiliationCompanyDataTaxId"]=>
    string(18) "99.999.999/0001-99"
    ["AffiliationNumber"]=>
    string(32) "********************************"
    ["Amount"]=>
    string(4) "5000"
    ["AuthorizerCode"]=>
    string(5) "STONE"
    ["AuthorizerExternalReference"]=>
    string(14) "19291241077475"
    ["AuthorizerName"]=>
    string(5) "STONE"
    ["CardDataCardName"]=>
    string(10) "MASTERCARD"
    ["CardDataExpirationDate"]=>
    string(4) "2602"
    ["CardDataMaskedCardNumber"]=>
    string(16) "************5768"
    ["CardDataType"]=>
    int(1)
    ["FinancingDataInstallmentsNumber"]=>
    int(1)
    ["FinancingDataType"]=>
    int(1)
    ["FullReceiptCopy"]=>
    string(543) "
     STONE - VIA ESTABELECIMENTO      
     MASTERCARD - CREDITO A VISTA     
CNPJ: 999.999.999/0001-99
2ALL
BELO HORIZONTE - MG
************5766       02/04/18  16:42
EC:128268623                AUT:424973
SAK:&E62D11B67204181A190D83E1EBED4EC
DOC:1585
STONE ID:19281241077495
AC:6B087A3450022121           ONL-CHIP
AID: A0000000041010
Credito                       APROVADO
TOTAL:                        R$ 50,00
     TRANSACAO APROVADA COM SENHA     
----------------------------------------
71666 0000007544 0000002585 

"
    ["InternalLocalReference"]=>
    int(1585)
    ["POSCompanyDataDisplayName"]=>
    string(27) "Adriano M. La Selva"
    ["POSCompanyDataTaxId"]=>
    string(14) "111.111.111-11"
    ["POSDataDescription"]=>
    string(12) "Door to Door"
    ["POSDataIdentifier"]=>
    string(5) "9999999"
    ["POSTimestamp"]=>
    string(19) "2018-04-02 16:43:04"
    ["ProductName"]=>
    string(15) "CREDITO A VISTA"
    ["Result"]=>
    int(0)
    ["ResultMessage"]=>
    string(9) "APROVADO "
    ["ServerTimestamp"]=>
    string(19) "2018-04-02 16:42:46"
    ["Status"]=>
    string(3) "289"
    ["Type"]=>
    int(33)
    ["UniqueId"]=>
    int(33171163)
  }
}
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

Resposta

```php
array(1) {
  [0]=>
  array(27) {
    ["AffiliationNumber"]=>
    string(32) "********************************"
    ["Amount"]=>
    string(4) "5000"
    ["AuthorizerCode"]=>
    string(5) "STONE"
    ["AuthorizerExternalReference"]=>
    string(14) "19291241077475"
    ["AuthorizerName"]=>
    string(5) "STONE"
    ["CardDataCardName"]=>
    string(10) "MASTERCARD"
    ["CardDataExpirationDate"]=>
    string(4) "2602"
    ["CardDataMaskedCardNumber"]=>
    string(16) "************5768"
    ["CardDataType"]=>
    int(1)
    ["FinancingDataInstallmentsNumber"]=>
    int(1)
    ["FinancingDataType"]=>
    int(1)
    ["InternalLocalReference"]=>
    int(1585)
    ["POSCompanyDataDisplayName"]=>
    string(27) "Adriano M. La Selva"
    ["POSCompanyDataTaxId"]=>
    string(14) "111.111.111-11"
    ["POSDataDescription"]=>
    string(12) "Door to Door"
    ["POSDataIdentifier"]=>
    string(5) "9999999"
    ["POSTimestamp"]=>
    string(19) "2018-04-02 16:43:04"
    ["ProductName"]=>
    string(15) "CREDITO A VISTA"
    ["Result"]=>
    int(0)
    ["ResultMessage"]=>
    string(9) "APROVADO "
    ["ServerTimestamp"]=>
    string(19) "2018-04-02 16:42:46"
    ["Status"]=>
    string(3) "289"
    ["Type"]=>
    int(33)
    ["UniqueId"]=>
    int(33171163)
  }
}
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

Resposta

```php
array(1) {
  [0]=>
  array(4) {
    ["AffiliationCompanyDataDisplayName"]=>
    string(4) "Teste"
    ["AffiliationCompanyDataTaxId"]=>
    string(18) "999.999.999/0001-99"
    ["FullReceiptCopy"]=>
    string(543) "
     STONE - VIA ESTABELECIMENTO      
     MASTERCARD - CREDITO A VISTA     
CNPJ: 999.999.999/0001-99
2ALL
BELO HORIZONTE - MG
************5766       02/04/18  16:42
EC:128268623                AUT:424973
SAK:&E62D11B67204181A190D83E1EBED4EC
DOC:1585
STONE ID:19281241077495
AC:6B087A3450022121           ONL-CHIP
AID: A0000000041010
Credito                       APROVADO
TOTAL:                        R$ 50,00
     TRANSACAO APROVADA COM SENHA     
----------------------------------------
71666 0000007544 0000002585 

"
    ["Result"]=>
    int(0)
  }
}
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

Resposta

```php
array(1) {
  [0]=>
  array(4) {
    ["AffiliationCompanyDataDisplayName"]=>
    string(4) "Teste"
    ["AuthorizerName"]=>
    string(5) "REDE"
    ["AffiliationCompanyDataTaxId"]=>
    string(18) "999.999.999/0001-99"
    ["FullReceiptCopy"]=>
    string(543) "
     STONE - VIA ESTABELECIMENTO      
     MASTERCARD - CREDITO A VISTA     
CNPJ: 999.999.999/0001-99
TESTE
BELO HORIZONTE - MG
************5766       02/04/18  16:42
EC:128268623                AUT:424973
SAK:&E62D11B67204181A190D83E1EBED4EC
DOC:1585
STONE ID:19281241077495
AC:6B087A3450022121           ONL-CHIP
AID: A0000000041010
Credito                       APROVADO
TOTAL:                        R$ 50,00
     TRANSACAO APROVADA COM SENHA     
----------------------------------------
71666 0000007544 0000002585 

"
    ["Result"]=>
    int(0)
  }
}
```


[GitHub]: <https://github.com/paygo-dev/paygo-sdk-php.git>