<?php
/**
 * Created by PhpStorm.
 * User: adriano
 * Date: 19/10/18
 * Time: 09:04
 */

namespace PayGo\Transactions\Contracts\Query;

/**
 * Class Filters
 * @package PayGo\Transactions\Contracts
 */
class Filters implements \JsonSerializable
{
    /**
     * @var array
     */
    private $uniqueIds = [];

    /**
     * @var array
     */
    private $posCompanyDataTaxIds = [];

    /**
     * @var DateRange
     */
    private $serverDateRange;

    /**
     * @var array
     */
    private $types = [];

    /**
     * @var array
     */
    private $status = [];

    /**
     * @var array
     */
    private $authorizerNames = [];

    /**
     * @var array
     */
    private $affiliationCompanyDataTaxIds = [];

    /**
     * @var array
     */
    private $posDataIdentifiers = [];

    /**
     * @var array
     */
    private $financingDataInstallmentsNumbers = [];

    /**
     * @var array
     */
    private $cardDataTypes = [];

    /**
     * @var array
     */
    private $financingDataTypes = [];

    /**
     * @var array
     */
    private $cardDataCardHolderNames = [];

    /**
     * @var integer
     */
    private $type;

    /**
     * @var integer
     */
    private $cardDataType;

    /**
     * @var integer
     */
    private $financingDataType;

    /**
     * @var string
     */
    private $cardDataCardHolderName;

    /**
     * @var integer
     */
    private $financingDataInstallmentsNumber;

    /**
     * @return array
     */
    public function getUniqueIds()
    {
        return $this->uniqueIds;
    }

    /**
     * @param array $uniqueIds
     * @return Filters
     */
    public function setUniqueIds($uniqueIds)
    {
        $this->uniqueIds = $uniqueIds;
        return $this;
    }

    /**
     * @return array
     */
    public function getPosCompanyDataTaxIds()
    {
        return $this->posCompanyDataTaxIds;
    }

    /**
     * @param array $posCompanyDataTaxIds
     * @return Filters
     */
    public function setPosCompanyDataTaxIds($posCompanyDataTaxIds)
    {
        $this->posCompanyDataTaxIds = $posCompanyDataTaxIds;
        return $this;
    }

    /**
     * @return DateRange
     */
    public function getServerDateRange()
    {
        return $this->serverDateRange;
    }

    /**
     * @param DateRange $serverDateRange
     * @return Filters
     */
    public function setServerDateRange($serverDateRange)
    {
        $this->serverDateRange = $serverDateRange;
        return $this;
    }

    /**
     * @return array
     */
    public function getTypes()
    {
        return $this->types;
    }

    /**
     * @param array $types
     * @return Filters
     */
    public function setTypes($types)
    {
        $this->types = $types;
        return $this;
    }

    /**
     * @return array
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param array $status
     * @return Filters
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return array
     */
    public function getAuthorizerNames()
    {
        return $this->authorizerNames;
    }

    /**
     * @param array $authorizerNames
     * @return Filters
     */
    public function setAuthorizerNames($authorizerNames)
    {
        $this->authorizerNames = $authorizerNames;
        return $this;
    }

    /**
     * @return array
     */
    public function getAffiliationCompanyDataTaxIds()
    {
        return $this->affiliationCompanyDataTaxIds;
    }

    /**
     * @param array $affiliationCompanyDataTaxIds
     * @return Filters
     */
    public function setAffiliationCompanyDataTaxIds($affiliationCompanyDataTaxIds)
    {
        $this->affiliationCompanyDataTaxIds = $affiliationCompanyDataTaxIds;
        return $this;
    }

    /**
     * @return array
     */
    public function getPosDataIdentifiers()
    {
        return $this->posDataIdentifiers;
    }

    /**
     * @param array $posDataIdentifiers
     * @return Filters
     */
    public function setPosDataIdentifiers($posDataIdentifiers)
    {
        $this->posDataIdentifiers = $posDataIdentifiers;
        return $this;
    }

    /**
     * @return array
     */
    public function getFinancingDataInstallmentsNumbers()
    {
        return $this->financingDataInstallmentsNumbers;
    }

    /**
     * @param array $financingDataInstallmentsNumbers
     * @return Filters
     */
    public function setFinancingDataInstallmentsNumbers($financingDataInstallmentsNumbers)
    {
        $this->financingDataInstallmentsNumbers = $financingDataInstallmentsNumbers;
        return $this;
    }

    /**
     * @return array
     */
    public function getCardDataTypes()
    {
        return $this->cardDataTypes;
    }

    /**
     * @param array $cardDataTypes
     * @return Filters
     */
    public function setCardDataTypes($cardDataTypes)
    {
        $this->cardDataTypes = $cardDataTypes;
        return $this;
    }

    /**
     * @return array
     */
    public function getFinancingDataTypes()
    {
        return $this->financingDataTypes;
    }

    /**
     * @param array $financingDataTypes
     * @return Filters
     */
    public function setFinancingDataTypes($financingDataTypes)
    {
        $this->financingDataTypes = $financingDataTypes;
        return $this;
    }

    /**
     * @return array
     */
    public function getCardDataCardHolderNames()
    {
        return $this->cardDataCardHolderNames;
    }

    /**
     * @param array $cardDataCardHolderNames
     * @return Filters
     */
    public function setCardDataCardHolderNames($cardDataCardHolderNames)
    {
        $this->cardDataCardHolderNames = $cardDataCardHolderNames;
        return $this;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param int $type
     * @return Filters
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return int
     */
    public function getCardDataType()
    {
        return $this->cardDataType;
    }

    /**
     * @param int $cardDataType
     * @return Filters
     */
    public function setCardDataType($cardDataType)
    {
        $this->cardDataType = $cardDataType;
        return $this;
    }

    /**
     * @return int
     */
    public function getFinancingDataType()
    {
        return $this->financingDataType;
    }

    /**
     * @param int $financingDataType
     * @return Filters
     */
    public function setFinancingDataType($financingDataType)
    {
        $this->financingDataType = $financingDataType;
        return $this;
    }

    /**
     * @return string
     */
    public function getCardDataCardHolderName()
    {
        return $this->cardDataCardHolderName;
    }

    /**
     * @param string $cardDataCardHolderName
     * @return Filters
     */
    public function setCardDataCardHolderName($cardDataCardHolderName)
    {
        $this->cardDataCardHolderName = $cardDataCardHolderName;
        return $this;
    }

    /**
     * @return int
     */
    public function getFinancingDataInstallmentsNumber()
    {
        return $this->financingDataInstallmentsNumber;
    }

    /**
     * @param int $financingDataInstallmentsNumber
     * @return Filters
     */
    public function setFinancingDataInstallmentsNumber($financingDataInstallmentsNumber)
    {
        $this->financingDataInstallmentsNumber = $financingDataInstallmentsNumber;
        return $this;
    }

    public function jsonSerialize()
    {
        return array_filter([
            "UniqueIds" => $this->uniqueIds,
            "POSCompanyDataTaxIds" => $this->posCompanyDataTaxIds,
            "ServerDateRange" => $this->serverDateRange,
            "Types" => $this->types,
            "Status" => $this->status,
            "AuthorizerNames" => $this->authorizerNames,
            "AffiliationCompanyDataTaxIds" => $this->affiliationCompanyDataTaxIds,
            "POSDataIdentifiers" => $this->posDataIdentifiers,
            "FinancingDataInstallmentsNumbers" => $this->financingDataInstallmentsNumbers,
            "CardDataTypes" => $this->cardDataTypes,
            "FinancingDataTypes" => $this->financingDataTypes,
            "CardDataCardHolderNames" => $this->cardDataCardHolderNames,
            "CardDataType" => $this->cardDataType,
            "FinancingDataType" => $this->financingDataType,
            "CardDataCardHolderName" => $this->cardDataCardHolderName,
            "Type" => $this->type,
            "FinancingDataInstallmentsNumber" => $this->financingDataInstallmentsNumber,
        ], function($val) { return !empty($val); });
    }
}