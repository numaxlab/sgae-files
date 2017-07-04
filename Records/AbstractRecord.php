<?php

namespace NumaxLab\Sgae\Records;


use Carbon\Carbon;

abstract class AbstractRecord
{
    /**
     * @var int
     */
    protected $propertyCode;

    /**
     * @var \Carbon\Carbon
     */
    protected $sessionDatetime;

    /**
     * @param int $propertyCode
     * @return AbstractRecord
     */
    public function setPropertyCode($propertyCode)
    {
        $this->propertyCode = $propertyCode;
        return $this;
    }

    /**
     * @param \Carbon\Carbon $sessionDatetime
     * @return AbstractRecord
     */
    public function setSessionDatetime(Carbon $sessionDatetime)
    {
        $this->sessionDatetime = $sessionDatetime;
        return $this;
    }

    /**
     * @return int
     */
    public function getPropertyCode()
    {
        return $this->propertyCode;
    }

    /**
     * @return \Carbon\Carbon
     */
    public function getSessionDatetime()
    {
        return $this->sessionDatetime;
    }

    abstract public function toLine();

    abstract public function fromLine($line);
}
