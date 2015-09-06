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
        $location = new Location($this->myComplexTypeMiejscowosc, "Wrocław");
        $this->assertSame(17.02, $location->getX());
    }

    /**
     * @covers BurzeDzisNet\Location::getY
     */
    public function testGetY()
    {
        $location = new Location($this->myComplexTypeMiejscowosc, "Wrocław");
        $this->assertSame(51.07, $location->getY());
    }

    /**
     * @covers BurzeDzisNet\Location::__toString
     */
    public function test__toString()
    {
        $location = new Location($this->myComplexTypeMiejscowosc, "Wrocław");
        $this->assertSame("Wrocław[17.02, 51.07]", $location->__toString());
    }

    /**
     * @covers BurzeDzisNet\Location::__construct
     */
    public function test__construct()
    {
        $location = new Location($this->myComplexTypeMiejscowosc, "Wrocław");
        $this->assertSame("Wrocław", $location->getName());
        $this->assertSame(51.07, $location->getY());
        $this->assertSame(17.02, $location->getX());
    }

    /**
     * @covers BurzeDzisNet\Location::getName
     */
    public function testGetName()
    {
        $location = new Location($this->myComplexTypeMiejscowosc, "Wrocław");
        $this->assertSame($location->getName(), "Wrocław");
    }

    /**
     * @covers BurzeDzisNet\Location::equals
     */
    public function testEquals()
    {
        $location = new Location($this->myComplexTypeMiejscowosc, "Wrocław");

        $myComplexTypeMiejscowosc2 = new \stdClass;
        $myComplexTypeMiejscowosc2->x = 21.02;
        $myComplexTypeMiejscowosc2->y = 52.12;
        $location2 = new Location($myComplexTypeMiejscowosc2, "Warszawa");

        $myComplexTypeMiejscowosc3 = new \stdClass;
        $myComplexTypeMiejscowosc3->x = 21.02;
        $myComplexTypeMiejscowosc3->y = 52.12;
        $location3 = new Location($myComplexTypeMiejscowosc2, "Stolica");

        $this->assertTrue($location->equals($location));
        $this->assertTrue($location->equals(clone $location));
        $this->assertTrue($location2->equals($location3));
        $this->assertFalse($location->equals($location2));
        $this->assertFalse($location2->equals($location));
    }

}
