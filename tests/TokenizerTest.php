<?php
namespace TRex\Parser;

/**
 * Class TokenizerTest
 * @package TRex\Parser
 * @author Raphaël Lefebvre <raphael@raphaellefebvre.be>
 */
class TokenizerTest extends \PHPUnit_Framework_TestCase
{
    public function testGetClassNames()
    {
        $tokenizer = new Tokenizer();
        $this->assertSame(
            array('Foo\Bar\class2', 'Foo\Bar\class3'),
            $tokenizer->getInstantiableClassNames(file_get_contents(__DIR__ . '/resources/tokenizerClasses.php'))
        );
    }
}
