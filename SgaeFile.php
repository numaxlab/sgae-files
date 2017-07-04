<?php

namespace NumaxLab\Sgae;

use NumaxLab\Sgae\Records\Collection;

class SgaeFile
{
    /**
     * @var \NumaxLab\Sgae\Records\Collection
     */
    private $sessions;

    /**
     * @var \NumaxLab\Sgae\Records\Collection
     */
    private $works;

    public function __construct()
    {
        $this->sessions = new Collection();
        $this->works = new Collection();
    }

    /**
     * @return \NumaxLab\Sgae\Records\Collection
     */
    public function getSessions()
    {
        return $this->sessions;
    }

    /**
     * @return \NumaxLab\Sgae\Records\Collection
     */
    public function getWorks()
    {
        return $this->works;
    }

    public static function parse($input, $eol = PHP_EOL)
    {

    }

    public function dump($eol = PHP_EOL)
    {

    }
}
