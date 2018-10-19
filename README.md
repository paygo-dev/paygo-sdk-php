
## Componente de integração com API's do PayGo WEB para consulta de transações

Este Projeto tem por finalidade prover uma integração mais simples e padronizada com as API's do PayGo utilizando PHP >=5.6

### Instalação

Execute em seu shell:

```sh
composer require paygo-dev/paygo-sdk-php
```

### Configurando de variáveis de ambiente


Variáveis de ambiente

```env
PAYGO_TRANSACTIONS_HOST=http://api.paygomais.com.br
PAYGO_TRANSACTIONS_TIMEOUT=10
PAYGO_TRANSACTIONS_TOKEN=e258c0g0-4795-4bf3-bf12-483737e9cac3
```

Inicialização de cliente setando parâmetros

    * Passar como parâmetro no construtor em forma de array.

```php
$client = new \PayGo\Client([
    PayGoTransactionParameterConst::PAYGO_TRANSACTIONS_HOST => "http://api.paygomais.com.br",
    PayGoTransactionParameterConst::PAYGO_TRANSACTIONS_TIMEOUT => 10,
    PayGoTransactionParameterConst::PAYGO_TRANSACTIONS_TOKEN => "e258c0g0-4795-4bf3-bf12-483737e9cac3",
]);

$transactionApi = new \PayGo\Transactions\API\TransactionAPI($client);
```

    * Passar como parâmetro a partir de uma instância do Client.

```php
$client = new \PayGo\Client();

$client->setParameter(PayGoTransactionParameterConst::PAYGO_TRANSACTIONS_HOST, "http://api.paygomais.com.br");
$client->setParameter(PayGoTransactionParameterConst::PAYGO_TRANSACTIONS_TIMEOUT, 10);
$client->setParameter(PayGoTransactionParameterConst::PAYGO_TRANSACTIONS_TOKEN, "e258c0g0-4795-4bf3-bf12-483737e9cac3");

$transactionApi = new \PayGo\Transactions\API\TransactionAPI($client);
```

### Parâmetros

    PayGoTransactionParameterConst::PAYGO_TRANSACTIONS_HOST => URL
    PayGoTransactionParameterConst::PAYGO_TRANSACTIONS_TIMEOUT => Tempo de Timeout da requisição, como padrão o tempo é de 10 segundos
    PayGoTransactionParameterConst::PAYGO_TRANSACTIONS_TOKEN => Token de acesso


Para obter a versão configure seu composer.json conforme exemplo abaixo:

```json
{
    "name": "paygo-dev/app",
    "authors": [
        {
            "name": "Adriano M. La Selva",
            "email": "adrianolaselva@gmail.com"
        }
    ],
    "require": {
        "paygo-dev/paygo-sdk-php": "0.1.*"
    },
	"prefer-stable" : true
}
```

```sh
phpunit
```

[GitHub]: <https://github.com/paygo-dev/paygo-sdk-php.git>