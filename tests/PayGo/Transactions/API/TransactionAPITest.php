<?php

namespace Tests\PayGo\Transactions\API;

use PayGo\Transactions\API\TransactionAPI;
use PayGo\Transactions\Constants\SourceConst;
use PayGo\Transactions\Contracts\Query\Filters;
use PayGo\Transactions\Contracts\Query\DateRange;
use PayGo\Transactions\Contracts\Query\Query;
use PayGo\Transactions\Contracts\Query\Source;
use Tests\PayGo\PHPUnit;

/**
 * Class TransactionAPITest
 * @package Tests\PayGo\Transactions\API
 */
class TransactionAPITest extends PHPUnit
{
    /**
     * @var TransactionAPI
     */
    private $transacaoApi;

    /**
     * TransactionAPITest constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->transacaoApi = new TransactionAPI();
    }

    /**
     * @throws \Exception
     */
    public function testFiltrar()
    {
        $response = $this->transacaoApi->filter(
            (new Query())
                ->setLimit(1)
        );

        $transactions = $response->json();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($transactions[0]['AffiliationCompanyDataDisplayName']);
        $this->assertNotEmpty($transactions[0]['AffiliationCompanyDataTaxId']);
        $this->assertNotEmpty($transactions[0]['AffiliationNumber']);
        $this->assertNotEmpty($transactions[0]['Amount']);
        $this->assertNotEmpty($transactions[0]['AuthorizerCode']);
        $this->assertNotEmpty($transactions[0]['AuthorizerExternalReference']);
        $this->assertNotEmpty($transactions[0]['AuthorizerName']);
        $this->assertNotEmpty($transactions[0]['CardDataExpirationDate']);
        $this->assertNotEmpty($transactions[0]['CardDataMaskedCardNumber']);
        $this->assertNotEmpty($transactions[0]['CardDataType']);
        $this->assertNotEmpty($transactions[0]['FinancingDataInstallmentsNumber']);
        $this->assertNotEmpty($transactions[0]['FinancingDataType']);
        $this->assertNotEmpty($transactions[0]['FullReceiptCopy']);
        $this->assertNotEmpty($transactions[0]['InternalLocalReference']);
        $this->assertNotEmpty($transactions[0]['POSCompanyDataDisplayName']);
        $this->assertNotEmpty($transactions[0]['POSCompanyDataTaxId']);
        $this->assertNotEmpty($transactions[0]['POSDataDescription']);
        $this->assertNotEmpty($transactions[0]['POSDataIdentifier']);
        $this->assertNotEmpty($transactions[0]['POSTimestamp']);
        $this->assertNotEmpty($transactions[0]['ProductName']);
        $this->assertNotEmpty($transactions[0]['ResultMessage']);
        $this->assertNotEmpty($transactions[0]['ServerTimestamp']);
        $this->assertNotEmpty($transactions[0]['Status']);
        $this->assertNotEmpty($transactions[0]['Type']);
        $this->assertNotEmpty($transactions[0]['UniqueId']);
    }

    /**
     * @throws \Exception
     */
    public function testFiltrarWithFiltersRangeDateTime()
    {
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

        $transactions = $response->json();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($transactions[0]['AffiliationCompanyDataDisplayName']);
        $this->assertNotEmpty($transactions[0]['AffiliationCompanyDataTaxId']);
        $this->assertNotEmpty($transactions[0]['AffiliationNumber']);
        $this->assertNotEmpty($transactions[0]['Amount']);
        $this->assertNotEmpty($transactions[0]['AuthorizerCode']);
        $this->assertNotEmpty($transactions[0]['AuthorizerExternalReference']);
        $this->assertNotEmpty($transactions[0]['AuthorizerName']);
        $this->assertNotEmpty($transactions[0]['CardDataExpirationDate']);
        $this->assertNotEmpty($transactions[0]['CardDataMaskedCardNumber']);
        $this->assertNotEmpty($transactions[0]['CardDataType']);
        $this->assertNotEmpty($transactions[0]['FinancingDataInstallmentsNumber']);
        $this->assertNotEmpty($transactions[0]['FinancingDataType']);
        $this->assertNotEmpty($transactions[0]['FullReceiptCopy']);
        $this->assertNotEmpty($transactions[0]['InternalLocalReference']);
        $this->assertNotEmpty($transactions[0]['POSCompanyDataDisplayName']);
        $this->assertNotEmpty($transactions[0]['POSCompanyDataTaxId']);
        $this->assertNotEmpty($transactions[0]['POSDataDescription']);
        $this->assertNotEmpty($transactions[0]['POSDataIdentifier']);
        $this->assertNotEmpty($transactions[0]['POSTimestamp']);
        $this->assertNotEmpty($transactions[0]['ProductName']);
        $this->assertNotEmpty($transactions[0]['ResultMessage']);
        $this->assertNotEmpty($transactions[0]['ServerTimestamp']);
        $this->assertNotEmpty($transactions[0]['Status']);
        $this->assertNotEmpty($transactions[0]['Type']);
        $this->assertNotEmpty($transactions[0]['UniqueId']);
    }

    /**
     * @throws \Exception
     */
    public function testFiltrarWithFiltersRangeDateTimeTypes()
    {
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

        $transactions = $response->json();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($transactions[0]['AffiliationCompanyDataDisplayName']);
        $this->assertNotEmpty($transactions[0]['AffiliationCompanyDataTaxId']);
        $this->assertNotEmpty($transactions[0]['AffiliationNumber']);
        $this->assertNotEmpty($transactions[0]['Amount']);
        $this->assertNotEmpty($transactions[0]['AuthorizerCode']);
        $this->assertNotEmpty($transactions[0]['AuthorizerExternalReference']);
        $this->assertNotEmpty($transactions[0]['AuthorizerName']);
        $this->assertNotEmpty($transactions[0]['CardDataExpirationDate']);
        $this->assertNotEmpty($transactions[0]['CardDataMaskedCardNumber']);
        $this->assertNotEmpty($transactions[0]['CardDataType']);
        $this->assertNotEmpty($transactions[0]['FinancingDataInstallmentsNumber']);
        $this->assertNotEmpty($transactions[0]['FinancingDataType']);
        $this->assertNotEmpty($transactions[0]['FullReceiptCopy']);
        $this->assertNotEmpty($transactions[0]['InternalLocalReference']);
        $this->assertNotEmpty($transactions[0]['POSCompanyDataDisplayName']);
        $this->assertNotEmpty($transactions[0]['POSCompanyDataTaxId']);
        $this->assertNotEmpty($transactions[0]['POSDataDescription']);
        $this->assertNotEmpty($transactions[0]['POSDataIdentifier']);
        $this->assertNotEmpty($transactions[0]['POSTimestamp']);
        $this->assertNotEmpty($transactions[0]['ProductName']);
        $this->assertNotEmpty($transactions[0]['ResultMessage']);
        $this->assertNotEmpty($transactions[0]['ServerTimestamp']);
        $this->assertNotEmpty($transactions[0]['Status']);
        $this->assertNotEmpty($transactions[0]['Type']);
        $this->assertNotEmpty($transactions[0]['UniqueId']);
    }

    /**
     * @throws \Exception
     */
    public function testFiltrarWithFiltersRangeDateTimeStatus()
    {
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

        $transactions = $response->json();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($transactions[0]['AffiliationCompanyDataDisplayName']);
        $this->assertNotEmpty($transactions[0]['AffiliationCompanyDataTaxId']);
        $this->assertNotEmpty($transactions[0]['AffiliationNumber']);
        $this->assertNotEmpty($transactions[0]['Amount']);
        $this->assertNotEmpty($transactions[0]['AuthorizerCode']);
        $this->assertNotEmpty($transactions[0]['AuthorizerExternalReference']);
        $this->assertNotEmpty($transactions[0]['AuthorizerName']);
        $this->assertNotEmpty($transactions[0]['CardDataExpirationDate']);
        $this->assertNotEmpty($transactions[0]['CardDataMaskedCardNumber']);
        $this->assertNotEmpty($transactions[0]['CardDataType']);
        $this->assertNotEmpty($transactions[0]['FinancingDataInstallmentsNumber']);
        $this->assertNotEmpty($transactions[0]['FinancingDataType']);
        $this->assertNotEmpty($transactions[0]['FullReceiptCopy']);
        $this->assertNotEmpty($transactions[0]['InternalLocalReference']);
        $this->assertNotEmpty($transactions[0]['POSCompanyDataDisplayName']);
        $this->assertNotEmpty($transactions[0]['POSCompanyDataTaxId']);
        $this->assertNotEmpty($transactions[0]['POSDataDescription']);
        $this->assertNotEmpty($transactions[0]['POSDataIdentifier']);
        $this->assertNotEmpty($transactions[0]['POSTimestamp']);
        $this->assertNotEmpty($transactions[0]['ProductName']);
        $this->assertNotEmpty($transactions[0]['ResultMessage']);
        $this->assertNotEmpty($transactions[0]['ServerTimestamp']);
        $this->assertNotEmpty($transactions[0]['Status']);
        $this->assertNotEmpty($transactions[0]['Type']);
        $this->assertNotEmpty($transactions[0]['UniqueId']);
    }

    /**
     * @throws \Exception
     */
    public function testFiltrarWithFiltersRangeDateTimeAuthorizerNames()
    {
        $response = $this->transacaoApi->filter(
            (new Query())
                ->setLimit(1)
                ->setFilters(
                    (new Filters())
                        ->setAuthorizerNames(['REDE'])
                        ->setServerDateRange(
                            (new DateRange())
                                ->setFromDate(\DateTime::createFromFormat('Y-m-d', '2015-01-01'))
                                ->setEndDate(\DateTime::createFromFormat('Y-m-d', '2018-12-01'))
                        )
                )
        );

        $transactions = $response->json();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($transactions[0]['AffiliationCompanyDataDisplayName']);
        $this->assertNotEmpty($transactions[0]['AffiliationCompanyDataTaxId']);
        $this->assertNotEmpty($transactions[0]['AffiliationNumber']);
        $this->assertNotEmpty($transactions[0]['Amount']);
        $this->assertNotEmpty($transactions[0]['AuthorizerCode']);
        $this->assertNotEmpty($transactions[0]['AuthorizerExternalReference']);
        $this->assertNotEmpty($transactions[0]['AuthorizerName']);
        $this->assertNotEmpty($transactions[0]['CardDataExpirationDate']);
        $this->assertNotEmpty($transactions[0]['CardDataMaskedCardNumber']);
        $this->assertNotEmpty($transactions[0]['CardDataType']);
        $this->assertNotEmpty($transactions[0]['FinancingDataInstallmentsNumber']);
        $this->assertNotEmpty($transactions[0]['FinancingDataType']);
        $this->assertNotEmpty($transactions[0]['FullReceiptCopy']);
        $this->assertNotEmpty($transactions[0]['InternalLocalReference']);
        $this->assertNotEmpty($transactions[0]['POSCompanyDataDisplayName']);
        $this->assertNotEmpty($transactions[0]['POSCompanyDataTaxId']);
        $this->assertNotEmpty($transactions[0]['POSDataDescription']);
        $this->assertNotEmpty($transactions[0]['POSDataIdentifier']);
        $this->assertNotEmpty($transactions[0]['POSTimestamp']);
        $this->assertNotEmpty($transactions[0]['ProductName']);
        $this->assertNotEmpty($transactions[0]['ResultMessage']);
        $this->assertNotEmpty($transactions[0]['ServerTimestamp']);
        $this->assertNotEmpty($transactions[0]['Status']);
        $this->assertNotEmpty($transactions[0]['Type']);
        $this->assertNotEmpty($transactions[0]['UniqueId']);
    }

    /**
     * @throws \Exception
     */
    public function testFiltrarWithFiltersSourceExclude()
    {
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

        $transactions = $response->json();

        $this->assertEquals(200, $response->getStatusCode());

        $this->assertTrue(!isset($transactions[0][SourceConst::AFFILIATION_COMPANY_DATA_TAX_ID]));
        $this->assertTrue(!isset($transactions[0][SourceConst::FULL_RECEIPT_COPY]));
        $this->assertTrue(!isset($transactions[0][SourceConst::AFFILIATION_COMPANY_DATA_DISPLAY_NAME]));

        $this->assertNotEmpty($transactions[0]['AffiliationNumber']);
        $this->assertNotEmpty($transactions[0]['Amount']);
        $this->assertNotEmpty($transactions[0]['AuthorizerCode']);
        $this->assertNotEmpty($transactions[0]['AuthorizerExternalReference']);
        $this->assertNotEmpty($transactions[0]['AuthorizerName']);
        $this->assertNotEmpty($transactions[0]['CardDataExpirationDate']);
        $this->assertNotEmpty($transactions[0]['CardDataMaskedCardNumber']);
        $this->assertNotEmpty($transactions[0]['CardDataType']);
        $this->assertNotEmpty($transactions[0]['FinancingDataInstallmentsNumber']);
        $this->assertNotEmpty($transactions[0]['FinancingDataType']);
        $this->assertNotEmpty($transactions[0]['InternalLocalReference']);
        $this->assertNotEmpty($transactions[0]['POSCompanyDataDisplayName']);
        $this->assertNotEmpty($transactions[0]['POSCompanyDataTaxId']);
        $this->assertNotEmpty($transactions[0]['POSDataDescription']);
        $this->assertNotEmpty($transactions[0]['POSDataIdentifier']);
        $this->assertNotEmpty($transactions[0]['POSTimestamp']);
        $this->assertNotEmpty($transactions[0]['ProductName']);
        $this->assertNotEmpty($transactions[0]['ResultMessage']);
        $this->assertNotEmpty($transactions[0]['ServerTimestamp']);
        $this->assertNotEmpty($transactions[0]['Status']);
        $this->assertNotEmpty($transactions[0]['Type']);
        $this->assertNotEmpty($transactions[0]['UniqueId']);
    }

    /**
     * @throws \Exception
     */
    public function testFiltrarWithFiltersSourceInclude()
    {
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

        $transactions = $response->json();

        $this->assertEquals(200, $response->getStatusCode());

        $this->assertTrue(isset($transactions[0][SourceConst::AFFILIATION_COMPANY_DATA_TAX_ID]));
        $this->assertTrue(isset($transactions[0][SourceConst::FULL_RECEIPT_COPY]));
        $this->assertTrue(isset($transactions[0][SourceConst::AFFILIATION_COMPANY_DATA_DISPLAY_NAME]));

        $this->assertTrue(!isset($transactions[0]['AffiliationNumber']));
        $this->assertTrue(!isset($transactions[0]['Amount']));
        $this->assertTrue(!isset($transactions[0]['AuthorizerCode']));
        $this->assertTrue(!isset($transactions[0]['AuthorizerExternalReference']));
        $this->assertTrue(!isset($transactions[0]['AuthorizerName']));
        $this->assertTrue(!isset($transactions[0]['CardDataExpirationDate']));
        $this->assertTrue(!isset($transactions[0]['CardDataMaskedCardNumber']));
        $this->assertTrue(!isset($transactions[0]['CardDataType']));
        $this->assertTrue(!isset($transactions[0]['FinancingDataInstallmentsNumber']));
        $this->assertTrue(!isset($transactions[0]['FinancingDataType']));
        $this->assertTrue(!isset($transactions[0]['InternalLocalReference']));
        $this->assertTrue(!isset($transactions[0]['POSCompanyDataDisplayName']));
        $this->assertTrue(!isset($transactions[0]['POSCompanyDataTaxId']));
        $this->assertTrue(!isset($transactions[0]['POSDataDescription']));
        $this->assertTrue(!isset($transactions[0]['POSDataIdentifier']));
        $this->assertTrue(!isset($transactions[0]['POSTimestamp']));
        $this->assertTrue(!isset($transactions[0]['ProductName']));
        $this->assertTrue(!isset($transactions[0]['ResultMessage']));
        $this->assertTrue(!isset($transactions[0]['ServerTimestamp']));
        $this->assertTrue(!isset($transactions[0]['Status']));
        $this->assertTrue(!isset($transactions[0]['Type']));
        $this->assertTrue(!isset($transactions[0]['UniqueId']));
    }

    /**
     * @throws \Exception
     */
    public function testFiltrarWithFiltersSourceIncludeAndAuthorizerNames()
    {
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

        $transactions = $response->json();

        $this->assertEquals(200, $response->getStatusCode());

        $this->assertTrue(isset($transactions[0][SourceConst::AFFILIATION_COMPANY_DATA_TAX_ID]));
        $this->assertTrue(isset($transactions[0][SourceConst::FULL_RECEIPT_COPY]));
        $this->assertTrue(isset($transactions[0][SourceConst::AFFILIATION_COMPANY_DATA_DISPLAY_NAME]));
        $this->assertTrue(isset($transactions[0][SourceConst::AUTHORIZER_NAME]));
        $this->assertEquals("REDE", $transactions[0][SourceConst::AUTHORIZER_NAME]);

        $this->assertTrue(!isset($transactions[0]['AffiliationNumber']));
        $this->assertTrue(!isset($transactions[0]['Amount']));
        $this->assertTrue(!isset($transactions[0]['AuthorizerCode']));
        $this->assertTrue(!isset($transactions[0]['AuthorizerExternalReference']));
        $this->assertTrue(!isset($transactions[0]['CardDataExpirationDate']));
        $this->assertTrue(!isset($transactions[0]['CardDataMaskedCardNumber']));
        $this->assertTrue(!isset($transactions[0]['CardDataType']));
        $this->assertTrue(!isset($transactions[0]['FinancingDataInstallmentsNumber']));
        $this->assertTrue(!isset($transactions[0]['FinancingDataType']));
        $this->assertTrue(!isset($transactions[0]['InternalLocalReference']));
        $this->assertTrue(!isset($transactions[0]['POSCompanyDataDisplayName']));
        $this->assertTrue(!isset($transactions[0]['POSCompanyDataTaxId']));
        $this->assertTrue(!isset($transactions[0]['POSDataDescription']));
        $this->assertTrue(!isset($transactions[0]['POSDataIdentifier']));
        $this->assertTrue(!isset($transactions[0]['POSTimestamp']));
        $this->assertTrue(!isset($transactions[0]['ProductName']));
        $this->assertTrue(!isset($transactions[0]['ResultMessage']));
        $this->assertTrue(!isset($transactions[0]['ServerTimestamp']));
        $this->assertTrue(!isset($transactions[0]['Status']));
        $this->assertTrue(!isset($transactions[0]['Type']));
        $this->assertTrue(!isset($transactions[0]['UniqueId']));
    }

    /**
     * @throws \Exception
     */
    public function testFiltrarWithFiltersSourceIncludeAndFinancingDataInstallmentsNumbers()
    {
        $response = $this->transacaoApi->filter(
            (new Query())
                ->setLimit(1)
                ->setFilters(
                    (new Filters())
                        ->setFinancingDataInstallmentsNumbers([1,2,3,4,5,7,8,9,10,11,12])
                )
                ->setSource(
                    (new Source())
                        ->setInclude([
                            SourceConst::AFFILIATION_COMPANY_DATA_TAX_ID,
                            SourceConst::FULL_RECEIPT_COPY,
                            SourceConst::AFFILIATION_COMPANY_DATA_DISPLAY_NAME,
                            SourceConst::FINANCING_DATA_INSTALLMENTS_NUMBER,
                        ])
                )
        );

        $transactions = $response->json();

        $this->assertEquals(200, $response->getStatusCode());

        $this->assertTrue(isset($transactions[0][SourceConst::AFFILIATION_COMPANY_DATA_TAX_ID]));
        $this->assertTrue(isset($transactions[0][SourceConst::FULL_RECEIPT_COPY]));
        $this->assertTrue(isset($transactions[0][SourceConst::AFFILIATION_COMPANY_DATA_DISPLAY_NAME]));
        $this->assertTrue(isset($transactions[0][SourceConst::FINANCING_DATA_INSTALLMENTS_NUMBER]));
        $this->assertTrue(in_array(
            $transactions[0][SourceConst::FINANCING_DATA_INSTALLMENTS_NUMBER],
            [1,2,3,4,5,7,8,9,10,11,12]
        ));

        $this->assertTrue(!isset($transactions[0]['AffiliationNumber']));
        $this->assertTrue(!isset($transactions[0]['Amount']));
        $this->assertTrue(!isset($transactions[0]['AuthorizerCode']));
        $this->assertTrue(!isset($transactions[0]['AuthorizerExternalReference']));
        $this->assertTrue(!isset($transactions[0]['CardDataExpirationDate']));
        $this->assertTrue(!isset($transactions[0]['CardDataMaskedCardNumber']));
        $this->assertTrue(!isset($transactions[0]['CardDataType']));
        $this->assertTrue(!isset($transactions[0]['FinancingDataType']));
        $this->assertTrue(!isset($transactions[0]['InternalLocalReference']));
        $this->assertTrue(!isset($transactions[0]['POSCompanyDataDisplayName']));
        $this->assertTrue(!isset($transactions[0]['POSCompanyDataTaxId']));
        $this->assertTrue(!isset($transactions[0]['POSDataDescription']));
        $this->assertTrue(!isset($transactions[0]['POSDataIdentifier']));
        $this->assertTrue(!isset($transactions[0]['POSTimestamp']));
        $this->assertTrue(!isset($transactions[0]['ProductName']));
        $this->assertTrue(!isset($transactions[0]['ResultMessage']));
        $this->assertTrue(!isset($transactions[0]['ServerTimestamp']));
        $this->assertTrue(!isset($transactions[0]['Status']));
        $this->assertTrue(!isset($transactions[0]['Type']));
        $this->assertTrue(!isset($transactions[0]['UniqueId']));
    }

    /**
     * @throws \Exception
     */
    public function testFiltrarWithFiltersSourceIncludeAndStatus()
    {
        $response = $this->transacaoApi->filter(
            (new Query())
                ->setLimit(1)
                ->setFilters(
                    (new Filters())
                        ->setStatus([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16])
                )
                ->setSource(
                    (new Source())
                        ->setInclude([
                            SourceConst::AFFILIATION_COMPANY_DATA_TAX_ID,
                            SourceConst::AFFILIATION_COMPANY_DATA_DISPLAY_NAME,
                            SourceConst::STATUS,
                        ])
                )
        );

        $transactions = $response->json();

        $this->assertEquals(200, $response->getStatusCode());

        $this->assertTrue(isset($transactions[0][SourceConst::AFFILIATION_COMPANY_DATA_TAX_ID]));
        $this->assertTrue(isset($transactions[0][SourceConst::AFFILIATION_COMPANY_DATA_DISPLAY_NAME]));
        $this->assertTrue(isset($transactions[0][SourceConst::STATUS]));
        $this->assertTrue(in_array(
            $transactions[0][SourceConst::STATUS],
            [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16]
        ));

        $this->assertTrue(!isset($transactions[0]['AffiliationNumber']));
        $this->assertTrue(!isset($transactions[0]['Amount']));
        $this->assertTrue(!isset($transactions[0]['AuthorizerCode']));
        $this->assertTrue(!isset($transactions[0]['AuthorizerExternalReference']));
        $this->assertTrue(!isset($transactions[0]['CardDataExpirationDate']));
        $this->assertTrue(!isset($transactions[0]['CardDataMaskedCardNumber']));
        $this->assertTrue(!isset($transactions[0]['CardDataType']));
        $this->assertTrue(!isset($transactions[0]['FinancingDataInstallmentsNumber']));
        $this->assertTrue(!isset($transactions[0]['FinancingDataType']));
        $this->assertTrue(!isset($transactions[0]['InternalLocalReference']));
        $this->assertTrue(!isset($transactions[0]['POSCompanyDataDisplayName']));
        $this->assertTrue(!isset($transactions[0]['POSCompanyDataTaxId']));
        $this->assertTrue(!isset($transactions[0]['POSDataDescription']));
        $this->assertTrue(!isset($transactions[0]['POSDataIdentifier']));
        $this->assertTrue(!isset($transactions[0]['POSTimestamp']));
        $this->assertTrue(!isset($transactions[0]['ProductName']));
        $this->assertTrue(!isset($transactions[0]['ResultMessage']));
        $this->assertTrue(!isset($transactions[0]['ServerTimestamp']));
        $this->assertTrue(!isset($transactions[0]['Type']));
        $this->assertTrue(!isset($transactions[0]['UniqueId']));
    }

    /**
     * @throws \Exception
     */
    public function testFiltrarWithFiltersSourceIncludeAndLastUniqueSearchedId()
    {
        $response = $this->transacaoApi->filter(
            (new Query())
                ->setLastUniqueSearchedId(900)
                ->setLimit(2)
                ->setSource(
                    (new Source())
                        ->setInclude([
                            SourceConst::AFFILIATION_COMPANY_DATA_TAX_ID,
                            SourceConst::AFFILIATION_COMPANY_DATA_DISPLAY_NAME,
                            SourceConst::STATUS,
                            SourceConst::UNIQUE_ID,
                        ])
                )
        );

        $transactions = $response->json();

        $this->assertEquals(200, $response->getStatusCode());

        $this->assertTrue(isset($transactions[0][SourceConst::AFFILIATION_COMPANY_DATA_TAX_ID]));
        $this->assertTrue(isset($transactions[0][SourceConst::AFFILIATION_COMPANY_DATA_DISPLAY_NAME]));
        $this->assertTrue(isset($transactions[0][SourceConst::STATUS]));
        $this->assertTrue(isset($transactions[0][SourceConst::UNIQUE_ID]));
        $this->assertTrue($transactions[0][SourceConst::UNIQUE_ID]>900);

        $this->assertTrue(!isset($transactions[0]['AffiliationNumber']));
        $this->assertTrue(!isset($transactions[0]['Amount']));
        $this->assertTrue(!isset($transactions[0]['AuthorizerCode']));
        $this->assertTrue(!isset($transactions[0]['AuthorizerExternalReference']));
        $this->assertTrue(!isset($transactions[0]['CardDataExpirationDate']));
        $this->assertTrue(!isset($transactions[0]['CardDataMaskedCardNumber']));
        $this->assertTrue(!isset($transactions[0]['CardDataType']));
        $this->assertTrue(!isset($transactions[0]['FinancingDataInstallmentsNumber']));
        $this->assertTrue(!isset($transactions[0]['FinancingDataType']));
        $this->assertTrue(!isset($transactions[0]['InternalLocalReference']));
        $this->assertTrue(!isset($transactions[0]['POSCompanyDataDisplayName']));
        $this->assertTrue(!isset($transactions[0]['POSCompanyDataTaxId']));
        $this->assertTrue(!isset($transactions[0]['POSDataDescription']));
        $this->assertTrue(!isset($transactions[0]['POSDataIdentifier']));
        $this->assertTrue(!isset($transactions[0]['POSTimestamp']));
        $this->assertTrue(!isset($transactions[0]['ProductName']));
        $this->assertTrue(!isset($transactions[0]['ResultMessage']));
        $this->assertTrue(!isset($transactions[0]['ServerTimestamp']));
        $this->assertTrue(!isset($transactions[0]['Type']));
    }

    /**
     * @throws \Exception
     */
    public function testFiltrarWithFiltersSourceIncludeAndPOSCompanyDataTaxIds()
    {
        $response = $this->transacaoApi->filter(
            (new Query())
                ->setLastUniqueSearchedId(900)
                ->setLimit(2)
                ->setFilters(
                    (new Filters())
                        ->setPosCompanyDataTaxIds([
                            "06.167.186/0001-54","18.528.941/0001-68","05.471.416/0001-01"
                        ])
                )
                ->setSource(
                    (new Source())
                        ->setInclude([
                            SourceConst::AFFILIATION_COMPANY_DATA_TAX_ID,
                            SourceConst::AFFILIATION_COMPANY_DATA_DISPLAY_NAME,
                        ])
                )
        );

        $transactions = $response->json();

        $this->assertEquals(200, $response->getStatusCode());

        $this->assertTrue(isset($transactions[0][SourceConst::AFFILIATION_COMPANY_DATA_TAX_ID]));
        $this->assertTrue(isset($transactions[0][SourceConst::AFFILIATION_COMPANY_DATA_DISPLAY_NAME]));
        $this->assertTrue(in_array(
            $transactions[0][SourceConst::AFFILIATION_COMPANY_DATA_TAX_ID],
            ["06.167.186/0001-54","18.528.941/0001-68","05.471.416/0001-01"]
        ));

        $this->assertTrue(!isset($transactions[0]['AffiliationNumber']));
        $this->assertTrue(!isset($transactions[0]['Amount']));
        $this->assertTrue(!isset($transactions[0]['AuthorizerCode']));
        $this->assertTrue(!isset($transactions[0]['AuthorizerExternalReference']));
        $this->assertTrue(!isset($transactions[0]['CardDataExpirationDate']));
        $this->assertTrue(!isset($transactions[0]['CardDataMaskedCardNumber']));
        $this->assertTrue(!isset($transactions[0]['CardDataType']));
        $this->assertTrue(!isset($transactions[0]['FinancingDataInstallmentsNumber']));
        $this->assertTrue(!isset($transactions[0]['FinancingDataType']));
        $this->assertTrue(!isset($transactions[0]['InternalLocalReference']));
        $this->assertTrue(!isset($transactions[0]['POSCompanyDataDisplayName']));
        $this->assertTrue(!isset($transactions[0]['POSCompanyDataTaxId']));
        $this->assertTrue(!isset($transactions[0]['POSDataDescription']));
        $this->assertTrue(!isset($transactions[0]['POSDataIdentifier']));
        $this->assertTrue(!isset($transactions[0]['POSTimestamp']));
        $this->assertTrue(!isset($transactions[0]['ProductName']));
        $this->assertTrue(!isset($transactions[0]['ResultMessage']));
        $this->assertTrue(!isset($transactions[0]['ServerTimestamp']));
        $this->assertTrue(!isset($transactions[0]['Type']));
    }

    /**
     * @throws \Exception
     */
    public function testFiltrarWithFiltersSourceIncludeAndCardDataTypeAndFinancingDataType()
    {
        $response = $this->transacaoApi->filter(
            (new Query())
                ->setLimit(2)
                ->setFilters(
                    (new Filters())
                        ->setCardDataType(1)
                        ->setFinancingDataType(1)
                )
                ->setSource(
                    (new Source())
                        ->setInclude([
                            SourceConst::AFFILIATION_COMPANY_DATA_TAX_ID,
                            SourceConst::AFFILIATION_COMPANY_DATA_DISPLAY_NAME,
                            SourceConst::CARD_DATA_TYPE,
                            SourceConst::FINANCING_DATA_TYPE,
                        ])
                )
        );

        $transactions = $response->json();

        $this->assertEquals(200, $response->getStatusCode());

        $this->assertTrue(isset($transactions[0][SourceConst::AFFILIATION_COMPANY_DATA_TAX_ID]));
        $this->assertTrue(isset($transactions[0][SourceConst::AFFILIATION_COMPANY_DATA_DISPLAY_NAME]));
        $this->assertEquals(1, $transactions[0][SourceConst::CARD_DATA_TYPE]);
        $this->assertEquals(1, $transactions[0][SourceConst::FINANCING_DATA_TYPE]);

        $this->assertTrue(!isset($transactions[0]['AffiliationNumber']));
        $this->assertTrue(!isset($transactions[0]['Amount']));
        $this->assertTrue(!isset($transactions[0]['AuthorizerCode']));
        $this->assertTrue(!isset($transactions[0]['AuthorizerExternalReference']));
        $this->assertTrue(!isset($transactions[0]['CardDataExpirationDate']));
        $this->assertTrue(!isset($transactions[0]['CardDataMaskedCardNumber']));
        $this->assertTrue(!isset($transactions[0]['FinancingDataInstallmentsNumber']));
        $this->assertTrue(!isset($transactions[0]['InternalLocalReference']));
        $this->assertTrue(!isset($transactions[0]['POSCompanyDataDisplayName']));
        $this->assertTrue(!isset($transactions[0]['POSCompanyDataTaxId']));
        $this->assertTrue(!isset($transactions[0]['POSDataDescription']));
        $this->assertTrue(!isset($transactions[0]['POSDataIdentifier']));
        $this->assertTrue(!isset($transactions[0]['POSTimestamp']));
        $this->assertTrue(!isset($transactions[0]['ProductName']));
        $this->assertTrue(!isset($transactions[0]['ResultMessage']));
        $this->assertTrue(!isset($transactions[0]['ServerTimestamp']));
        $this->assertTrue(!isset($transactions[0]['Type']));
    }

}