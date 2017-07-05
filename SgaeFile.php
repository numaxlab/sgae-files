<?php

namespace NumaxLab\Sgae;

use NumaxLab\Sgae\Records\Collection;
use NumaxLab\Sgae\Records\Session;

class SgaeFile
{
    /**
     * @var \NumaxLab\Sgae\Records\Collection
     */
    private $sessions;

    /**
     * SgaeFile constructor.
     */
    public function __construct()
    {
        $this->sessions = new Collection();
    }

    /**
     * @param \NumaxLab\Sgae\Records\Session $session
     * @return SgaeFile
     */
    public function addSession(Session $session) {
        $this->sessions->push($session);
        return $this;
    }

    /**
     * @return \NumaxLab\Sgae\Records\Collection
     */
    public function getSessions()
    {
        return $this->sessions;
    }

    public static function parse($input, $eol = PHP_EOL)
    {

    }

    /**
     * @param string $eol
     * @return string
     */
    public function dump($eol = PHP_EOL)
    {
        $dumper = new Dumper($eol, $this);

        return $dumper->dump();
    }
}
