<?php

namespace NumaxLab\Sgae;


class Dumper
{
    /**
     * @var string
     */
    private $endOfLine;

    /**
     * @var \NumaxLab\Sgae\SgaeFile
     */
    private $file;

    /**
     * Dumper constructor.
     * @param string $eol
     * @param \NumaxLab\Sgae\SgaeFile $file
     */
    public function __construct($eol, SgaeFile $file)
    {
        $this->endOfLine = $eol;
        $this->file = $file;
    }

    /**
     * @return string
     */
    public function dump()
    {
        $dump = '';

        /** @var \NumaxLab\Sgae\Records\Session $session */
        foreach ($this->file->getSessions() as $session) {
            $dump .= $session->toLine().$this->endOfLine;

            /** @var \NumaxLab\Sgae\Records\Work $work */
            foreach ($session->getWorks() as $work) {
                $dump .= $work->toLine().$this->endOfLine;
            }
        }

        return $dump;
    }
}
