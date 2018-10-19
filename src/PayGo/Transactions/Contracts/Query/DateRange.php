<?php
/**
 * Created by PhpStorm.
 * User: adriano
 * Date: 19/10/18
 * Time: 09:25
 */

namespace PayGo\Transactions\Contracts\Query;

/**
 * Class DateRange
 * @package PayGo\Transactions\Contracts\Query
 */
class DateRange implements \JsonSerializable
{
    /**
     * @var \DateTime
     */
    private $fromDate;

    /**
     * @var \DateTime
     */
    private $endDate;

    /**
     * @var \DateTime
     */
    private $fromDateTime;

    /**
     * @var \DateTime
     */
    private $endDateTime;

    /**
     * @return \DateTime
     */
    public function getFromDate()
    {
        return $this->fromDate;
    }

    /**
     * @param \DateTime $fromDate
     * @return DateRange
     */
    public function setFromDate(\DateTime $fromDate)
    {
        $this->fromDate = $fromDate;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param \DateTime $endDate
     * @return DateRange
     */
    public function setEndDate(\DateTime $endDate)
    {
        $this->endDate = $endDate;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getFromDateTime()
    {
        return $this->fromDateTime;
    }

    /**
     * @param \DateTime $fromDateTime
     * @return DateRange
     */
    public function setFromDateTime(\DateTime $fromDateTime)
    {
        $this->fromDateTime = $fromDateTime;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEndDateTime()
    {
        return $this->endDateTime;
    }

    /**
     * @param \DateTime $endDateTime
     * @return DateRange
     */
    public function setEndDateTime(\DateTime $endDateTime)
    {
        $this->endDateTime = $endDateTime;
        return $this;
    }

    public function jsonSerialize()
    {
        $data = [];
        if(!empty($this->fromDate))
            $data = array_merge($data, [
                "From" => $this->fromDate->format('Y-m-d'),
            ]);

        if(!empty($this->endDate))
            $data = array_merge($data, [
                "End" => $this->endDate->format('Y-m-d'),
            ]);

        if(!empty($this->fromDateTime))
            $data = array_merge($data, [
                "From" => $this->fromDateTime->format('Y-m-d H:i:s'),
            ]);

        if(!empty($this->endDateTime))
            $data = array_merge($data, [
                "End" => $this->endDateTime->format('Y-m-d H:i:s'),
            ]);

        return array_filter($data, function($val) { return !empty($val); });
    }
}