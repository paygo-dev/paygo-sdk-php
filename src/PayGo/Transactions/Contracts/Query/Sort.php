<?php

namespace PayGo\Transactions\Contracts\Query;

use PayGo\Transactions\Constants\SortModeConst;

/**
 * Class Sort
 * @package PayGo\Transactions\Contracts
 */
class Sort implements \JsonSerializable
{
    /**
     * @var string
     */
    private $field;

    /**
     * @var string
     */
    private $mode = SortModeConst::ASC;

    /**
     * @return array|mixed
     */
    public function jsonSerialize()
    {
        return array_filter([
            "Field" => $this->field,
            "Mode" => $this->mode,
        ], function($val) { return !empty($val); });
    }
}