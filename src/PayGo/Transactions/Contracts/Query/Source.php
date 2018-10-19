<?php
/**
 * Created by PhpStorm.
 * User: adriano
 * Date: 19/10/18
 * Time: 12:40
 */

namespace PayGo\Transactions\Contracts\Query;


class Source implements \JsonSerializable
{
    /**
     * @var array
     */
    private $include;

    /**
     * @var array
     */
    private $exclude;

    /**
     * @return array
     */
    public function getInclude()
    {
        return $this->include;
    }

    /**
     * @param array $include
     * @return Source
     */
    public function setInclude($include)
    {
        $this->include = $include;
        return $this;
    }

    /**
     * @return array
     */
    public function getExclude()
    {
        return $this->exclude;
    }

    /**
     * @param array $exclude
     * @return Source
     */
    public function setExclude($exclude)
    {
        $this->exclude = $exclude;
        return $this;
    }

    public function jsonSerialize()
    {
        return array_filter([
            "Include" => $this->include,
            "Exclude" => $this->exclude,
        ], function($val) { return !empty($val); });
    }

}