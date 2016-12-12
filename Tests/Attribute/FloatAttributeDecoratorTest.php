<?php

namespace Markup\NeedleBundle\Tests\Filter;

use Markup\NeedleBundle\Attribute\FloatAttributeDecorator;

/**
* A test for a decorator for a filter that declares a float type (clocking any underlying type).
*/
class FloatAttributeDecoratorTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->filter = $this->createMock('Markup\NeedleBundle\Attribute\AttributeInterface');
        $this->decorator = new FloatAttributeDecorator($this->filter);
    }

    public function testIsFloatAttribute()
    {
        $this->assertTrue($this->decorator instanceof \Markup\NeedleBundle\Attribute\FloatAttributeInterface);
    }

    public function testIsAttribute()
    {
        $this->assertInstanceOf('Markup\NeedleBundle\Attribute\AttributeInterface', $this->decorator);
    }

    public function testOneToOneDecoration()
    {
        $name = 'filter';
        $displayName = 'Filter';
        $searchKey = 'fil_ter';
        $this->filter
            ->expects($this->any())
            ->method('getName')
            ->will($this->returnValue($name));
        $this->filter
            ->expects($this->any())
            ->method('getDisplayName')
            ->will($this->returnValue($displayName));
        $this->filter
            ->expects($this->any())
            ->method('getSearchKey')
            ->will($this->returnValue($searchKey));
        $this->assertEquals($name, $this->decorator->getName());
        $this->assertEquals($displayName, $this->decorator->getDisplayName());
        $this->assertEquals($searchKey, $this->decorator->getSearchKey());
    }
}
