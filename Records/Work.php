<?php

namespace NumaxLab\Sgae\Records;

use Stringy\Stringy;

class Work extends AbstractRecord
{
    const RECORD_TYPE = 2;

    /**
     * @var string
     */
    private $title;

    /**
     * @var int
     */
    private $version;

    /**
     * @var int
     */
    private $language;

    public function __construct()
    {

    }

    /**
     * @param string $title
     * @return Work
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param int $version
     * @return Work
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @param int $language
     * @return Work
     */
    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @return int
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @return string
     */
    public function toLine()
    {
        $line = $this->getLineCommonPart();
        $line .= self::RECORD_TYPE;
        $line .= Stringy::create('')->padRight(15, ' ');
        $line .= Stringy::create('')->padLeft(6, '0');
        $line .= Stringy::create($this->getTitle())->substr(0, 40)->padRight(40, ' ');
        $line .= Stringy::create('')->padLeft(7, '0');
        $line .= $this->getVersion();
        $line .= $this->getLanguage();

        return $line;
    }

    public function fromLine($line)
    {
        // TODO: Implement fromLine() method.
    }
}
