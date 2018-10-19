<?php
/**
 * Created by PhpStorm.
 * User: adriano
 * Date: 19/10/18
 * Time: 09:03
 */

namespace PayGo\Transactions\Contracts\Query;

use PayGo\Transactions\Constants\SourceConst;

/**
 * Class Query
 * @package PayGo\Transactions\Contracts\Query
 */
class Query implements \JsonSerializable
{
    /**
     * TODO: Não implementado nas apis, por enquanto tem apenas o parâmetro "LastUniqueSearchedId"
     *
     * @var integer
     */
    private $from;

    /**
     * @var integer
     */
    private $limit;

    /**
     * @var Filters
     */
    private $filters;

    /**
     * @var Source
     */
    private $source;

    /**
     * Como padrão ignora retorno do cupom fiscal
     *
     * @var array
     */
    private $exclude = [SourceConst::FULL_RECEIPT_COPY];

    /**
     * @var array|Sort
     */
    private $sort;

    /**
     * @var integer
     */
    private $lastUniqueSearchedId;

    /**
     * @return int
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param int $from
     * @return Query
     */
    public function setFrom($from)
    {
        $this->from = $from;
        return $this;
    }

    /**
     * @return int
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @param int $limit
     * @return Query
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @return Filters
     */
    public function getFilters()
    {
        return $this->filters;
    }

    /**
     * @param Filters $filters
     * @return Query
     */
    public function setFilters($filters)
    {
        $this->filters = $filters;
        return $this;
    }

    /**
     * @return Source
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param Source $source
     * @return Query
     */
    public function setSource($source)
    {
        $this->source = $source;
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
     * @return Query
     */
    public function setExclude($exclude)
    {
        $this->exclude = $exclude;
        return $this;
    }

    /**
     * @return array|Sort
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param array|Sort $sort
     * @return Query
     */
    public function setSort($sort)
    {
        $this->sort = $sort;
        return $this;
    }

    /**
     * @return int
     */
    public function getLastUniqueSearchedId()
    {
        return $this->lastUniqueSearchedId;
    }

    /**
     * @param int $lastUniqueSearchedId
     * @return Query
     */
    public function setLastUniqueSearchedId($lastUniqueSearchedId)
    {
        $this->lastUniqueSearchedId = $lastUniqueSearchedId;
        return $this;
    }

    /**
     * @return array|mixed
     */
    public function jsonSerialize()
    {
        return array_filter([
            "From" => $this->from,
            "Limit" => $this->limit,
            "Source" => $this->source,
            "Exclude" => $this->exclude,
            "Filters" => $this->filters,
            "Sort" => $this->sort,
            "LastUniqueSearchedId" => $this->lastUniqueSearchedId,
        ], function($val) { return !empty($val); });
    }
}