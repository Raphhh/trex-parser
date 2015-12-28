<?php
namespace TRex\Parser;

class ClassNameTest extends \PHPUnit_Framework_TestCase
{

    /**
     *
     * @param string $className
     * @param string $baseName
     *
     * @dataProvider provideGetBaseName
     */
    public function testGetBaseName($className, $baseName)
    {
        $className = new ClassName($className);
        $this->assertSame($baseName, $className->getBaseName());
    }

    /**
     * @return array
     */
    public function provideGetBaseName()
    {
        return [
            [
                'className' => 'Foo',
                'baseName' => 'Foo',
            ],
            [
                'className' => '\Foo',
                'baseName' => 'Foo',
            ],
            [
                'className' => 'Bar\Bar\Foo',
                'baseName' => 'Foo',
            ],
            [
                'className' => '\Bar\Bar\Foo',
                'baseName' => 'Foo',
            ],
        ];
    }

    /**
     * @param string $className
     * @param string $namespace
     *
     * @dataProvider provideGetNamespace
     */
    public function testGetNamespace($className, $namespace)
    {
        $className = new ClassName($className);
        $this->assertSame($namespace, $className->getNamespace());
    }

    /**
     * @return array
     */
    public function provideGetNamespace()
    {
        return [
            [
                'className' => 'Foo',
                'namespace' => '',
            ],
            [
                'className' => '\Foo',
                'namespace' => '',
            ],
            [
                'className' => 'Bar\Bar\Foo',
                'namespace' => 'Bar\Bar',
            ],
            [
                'className' => '\Bar\Bar\Foo',
                'namespace' => 'Bar\Bar',
            ],
        ];
    }

    /**
     * @param string $className
     * @param string $result
     *
     * @dataProvider provideSplit
     */
    public function testSplit($className, $result)
    {
        $className = new ClassName($className);
        $this->assertSame($result, $className->split());
    }

    /**
     * @return array
     */
    public function provideSplit()
    {
        return [
            [
                'className' => 'Foo',
                'result' => ['Foo'],
            ],
            [
                'className' => '\Foo',
                'result' => ['Foo'],
            ],
            [
                'className' => 'Bar\Bar\Foo',
                'result' => ['Bar', 'Bar', 'Foo'],
            ],
            [
                'className' => '\Bar\Bar\Foo',
                'result' => ['Bar', 'Bar', 'Foo'],
            ],
        ];
    }

    public function testToString()
    {
        $className = new ClassName('\Foo\Bar');
        $this->assertSame('Foo\Bar', (string)$className);
    }
}
