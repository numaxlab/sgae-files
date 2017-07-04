<?php

namespace NumaxLab\Sgae\Records;


class Session extends AbstractRecord
{
    const RECORD_TYPE = 1;

    /**
     * @var int
     */
    private $filmsQty;

    /**
     * @var int
     */
    private $ticketsQty;

    /**
     * @var float
     */
    private $earnings;

    /**
     * Session constructor.
     */
    public function __construct()
    {

    }

    /**
     * @param int $filmsQty
     * @return Session
     */
    public function setFilmsQty($filmsQty)
    {
        $this->filmsQty = $filmsQty;
        return $this;
    }

    /**
     * @param int $ticketsQty
     * @return Session
     */
    public function setTicketsQty($ticketsQty)
    {
        $this->ticketsQty = $ticketsQty;
        return $this;
    }

    /**
     * @param float $earnings
     * @return Session
     */
    public function setEarnings($earnings)
    {
        $this->earnings = $earnings;
        return $this;
    }

    /**
     * @return int
     */
    public function getFilmsQty()
    {
        return $this->filmsQty;
    }

    /**
     * @return int
     */
    public function getTicketsQty()
    {
        return $this->ticketsQty;
    }

    /**
     * @return float
     */
    public function getEarnings()
    {
        return $this->earnings;
    }

    public function toLine()
    {
        // TODO: Implement toLine() method.
    }

    public function fromLine($line)
    {
        // TODO: Implement fromLine() method.
    }
}
