<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace BurzeDzisNet;

use PHPUnit_Framework_TestCase;
use stdClass;

/**
 * {@see Location} test
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class LocationTest extends PHPUnit_Framework_TestCase
{
    /**
     * Location data object
     *
     * @var stdClass
     */
    protected $myComplexTypeMiejscowosc = null;

    /**
     * Set up the test
     */
    public function setUp()
    {
        $this->myComplexTypeMiejscowosc = new stdClass();
        $this->myComplexTypeMiejscowosc->x = 17.02;
        $this->myComplexTypeMiejscowosc->y = 51.07;
    }

    /**
     * @covers BurzeDzisNet\Location::getX
     */
    public function testGetX()
    {
        $location = new Location(17.02, 51.07, "Wrocław");
        $this->assertSame(17.02, $location->getX());
    }

    /**
     * @covers BurzeDzisNet\Location::getY
     */
    public function testGetY()
    {
        $location = new Location(17.02, 51.07, "Wrocław");
        $this->assertSame(51.07, $location->getY());
    }

    /**
     * @covers BurzeDzisNet\Location::__toString
     */
    public function test__toString()
    {
        $location = new Location(17.02, 51.07, "Wrocław");
        $this->assertSame("Wrocław[17.02, 51.07]", $location->__toString());
    }

    /**
     * @covers BurzeDzisNet\Location::__construct
     */
    public function test__construct()
    {
        $location = new Location(17.02, 51.07, "Wrocław");
        $this->assertSame("Wrocław", $location->getName());
        $this->assertSame(51.07, $location->getY());
        $this->assertSame(17.02, $location->getX());
    }

    /**
     * @covers BurzeDzisNet\Location::getName
     */
    public function testGetName()
    {
        $location = new Location(17.02, 51.07, "Wrocław");
        $this->assertSame($location->getName(), "Wrocław");
    }

    /**
     * @covers BurzeDzisNet\Location::equals
     */
    public function testEquals()
    {
        $location = new Location(17.02, 51.07, "Wrocław");
        $location2 = new Location(-3.41, 40.23, "Madrid");
        $this->assertTrue($location->equals($location));
        $this->assertTrue($location->equals(clone $location));
        $this->assertFalse($location->equals($location2));
    }
}
