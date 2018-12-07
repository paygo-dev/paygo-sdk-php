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
     * @return string
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * @param string $field
     * @return Sort
     */
    public function setField($field)
    {
        $this->field = $field;
        return $this;
    }

    /**
     * @return string
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * @param string $mode
     * @return Sort
     */
    public function setMode($mode)
    {
        $this->mode = $mode;
        return $this;
    }

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