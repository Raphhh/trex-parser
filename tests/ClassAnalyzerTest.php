<?php
namespace TRex\Parser;

/**
 * Class AnalyzerTest
 * @package TRex\Parser
 * @author Raphaël Lefebvre <raphael@raphaellefebvre.be>
 */
class ClassAnalyzerTest extends \PHPUnit_Framework_TestCase
{

    /**
     *
     */
    public function testGetClassReflectionsFromFile()
    {
        $analyzer = new ClassAnalyzer();
        $result = $analyzer->getClassReflectionsFromFile(__DIR__ . '/resources/tokenizerClasses.php');
        $this->assertCount(2, $result);
        $this->assertSame('Foo\Bar\class2', $result['Foo\Bar\class2']->getName());
        $this->assertSame('Foo\Bar\class3', $result['Foo\Bar\class3']->getName());
    }

    /**
     *
     */
    public function testGetClassReflections()
    {
        $filePath = __DIR__ . '/resources/tokenizerClasses.php';
        require_once $filePath;

        $analyzer = new ClassAnalyzer();
        $result = $analyzer->getClassReflections(file_get_contents($filePath));
        $this->assertCount(2, $result);
        $this->assertSame('Foo\Bar\class2', $result['Foo\Bar\class2']->getName());
        $this->assertSame('Foo\Bar\class3', $result['Foo\Bar\class3']->getName());
    }
}
