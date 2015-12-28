<?php
namespace TRex\Parser;

/**
 * Class ClassName
 * @package TRex\Parser
 * @author Raphaël Lefebvre <raphael@raphaellefebvre.be>
 */
class ClassName 
{
    /**
     *
     */
    const NAMESPACE_SEPARATOR = '\\';

    /**
     * @var string
     */
    private $className;

    /**
     * @param string$className
     */
    public function __construct($className)
    {
        $this->className = $this->filter(trim($className));
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getClassName();
    }

    /**
     * Getter of $className
     *
     * @return string
     */
    public function getClassName()
    {
        return $this->className;
    }

    /**
     * @return string
     */
    public function getBaseName()
    {
        return $this->filter(substr($this->className, strrpos($this->className, self::NAMESPACE_SEPARATOR)));
    }

    /**
     * @return string
     */
    public function getNamespace()
    {
        return $this->filter(substr($this->className, 0, strrpos($this->className, self::NAMESPACE_SEPARATOR)));
    }

    /**
     * @return array
     */
    public function split()
    {
        return explode(self::NAMESPACE_SEPARATOR, $this->className);
    }

    /**
     * @param $str
     * @return string
     */
    private function filter($str)
    {
        return trim(trim($str), self::NAMESPACE_SEPARATOR);
    }
}
