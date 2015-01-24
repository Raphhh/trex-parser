<?php
namespace TRex\Parser;

/**
 * Class Analyzer
 * parses code and file and extracts statements
 *
 * @package TRex\Parser
 * @author Raphaël Lefebvre <raphael@raphaellefebvre.be>
 */
class ClassAnalyzer
{
    /**
     * include the file and return the classes.
     *
     * @param string $filePath
     * @return \ReflectionClass[]
     */
    public function getClassReflectionsFromFile($filePath)
    {
        require_once $filePath;
        return $this->getClassReflections(file_get_contents($filePath));
    }

    /**
     * returns the classes form an included code.
     *
     * @param string $code
     * @return \ReflectionClass[]
     */
    public function getClassReflections($code)
    {
        $result = [];
        foreach ($this->getClassNames($code) as $className) {
            $result[$className] = new \ReflectionClass($className);
        }
        return $result;
    }

    /**
     * @param string $code
     * @return string[]
     */
    private function getClassNames($code)
    {
        $tokenizer = new Tokenizer();
        return $tokenizer->getInstantiableClassNames($code);
    }
}
