<?php

namespace NumaxLab\Sgae\Records;


use Stringy\Stringy;

class Session extends AbstractRecord
{
    const RECORD_TYPE = 1;

    /**
     * @var int
     */
    private $ticketsQty;

    /**
     * @var float
     */
    private $earnings;

    /**
     * @var Collection
     */
    private $works;

    /**
     * Session constructor.
     */
    public function __construct()
    {
        $this->works = new Collection();
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
     * @param \NumaxLab\Sgae\Records\Work $work
     * @return Session
     */
    public function addWork(Work $work)
    {
        $this->works->push($work);
        return $this;
    }

    /**
     * @return int
     */
    public function getFilmsQty()
    {
        return $this->works->count();
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

    /**
     * @return \NumaxLab\Sgae\Records\Collection
     */
    public function getWorks()
    {
        foreach ($this->works as $key => $work) {
            $work->setPropertyCode($this->getPropertyCode())
                ->setSessionDatetime($this->getSessionDatetime());

            $this->works->put($key, $work);
        }

        return $this->works;
    }

    /**
     * @return string
     */
    public function toLine()
    {
        $line = $this->getLineCommonPart();
        $line .= self::RECORD_TYPE;
        $line .= Stringy::create((string) $this->getFilmsQty())->padLeft(2, '0');
        $line .= Stringy::create((string) $this->getTicketsQty())->padLeft(5, '0');
        $line .= Stringy::create(number_format($this->getEarnings(), 2, '.', ''))->padLeft(8, '0');
        $line .= Stringy::create('')->padRight(55, ' ');

        return $line;
    }

    public function fromLine($line)
    {
        // TODO: Implement fromLine() method.
    }
}
