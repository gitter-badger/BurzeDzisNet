<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace BurzeDzisNet;

use PHPUnit_Framework_TestCase;

/**
 * {@see Location} test
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class LocationTest extends PHPUnit_Framework_TestCase
{

    /**
     * @covers BurzeDzisNet\Location::getX
     */
    public function testGetX()
    {
        $myComplexTypeMiejscowosc = new \stdClass;
        $myComplexTypeMiejscowosc->x = 17.02;
        $myComplexTypeMiejscowosc->y = 51.07;
        $location = new Location($myComplexTypeMiejscowosc, "Wrocław");
        $this->assertSame(17.02, $location->getX());
    }

    /**
     * @covers BurzeDzisNet\Location::getY
     */
    public function testGetY()
    {
        $myComplexTypeMiejscowosc = new \stdClass;
        $myComplexTypeMiejscowosc->x = 17.02;
        $myComplexTypeMiejscowosc->y = 51.07;
        $location = new Location($myComplexTypeMiejscowosc, "Wrocław");
        $this->assertSame(51.07, $location->getY());
    }

    /**
     * @covers BurzeDzisNet\Location::__toString
     */
    public function test__toString()
    {
        $myComplexTypeMiejscowosc = new \stdClass;
        $myComplexTypeMiejscowosc->x = 17.02;
        $myComplexTypeMiejscowosc->y = 51.07;
        $location = new Location($myComplexTypeMiejscowosc, "Wrocław");
        $this->assertSame("Wrocław[17.02, 51.07]", $location->__toString());
    }

    /**
     * @covers BurzeDzisNet\Location::__construct
     */
    public function test__construct()
    {
        $myComplexTypeMiejscowosc = new \stdClass;
        $myComplexTypeMiejscowosc->x = 17.02;
        $myComplexTypeMiejscowosc->y = 51.07;
        $location = new Location($myComplexTypeMiejscowosc, "Wrocław");
        $this->assertSame("Wrocław", $location->getName());
        $this->assertSame(51.07, $location->getY());
        $this->assertSame(17.02, $location->getX());
    }

    /**
     * @covers BurzeDzisNet\Location::getName
     */
    public function testGetName()
    {
        $myComplexTypeMiejscowosc = new \stdClass;
        $myComplexTypeMiejscowosc->x = 17.02;
        $myComplexTypeMiejscowosc->y = 51.07;
        $location = new Location($myComplexTypeMiejscowosc, "Wrocław");
        $this->assertSame($location->getName(), "Wrocław");
    }

    /**
     * @covers BurzeDzisNet\Location::equals
     */
    public function testEquals()
    {
        $myComplexTypeMiejscowosc = new \stdClass;
        $myComplexTypeMiejscowosc->x = 17.02;
        $myComplexTypeMiejscowosc->y = 51.07;

        $myComplexTypeMiejscowosc2 = new \stdClass;
        $myComplexTypeMiejscowosc2->x = 21.02;
        $myComplexTypeMiejscowosc2->y = 52.12;

        $location = new Location($myComplexTypeMiejscowosc, "Wrocław");
        $location2 = new Location($myComplexTypeMiejscowosc2, "Warszawa");

        $this->assertTrue($location->equals($location));
        $this->assertTrue($location->equals(clone $location));
        $this->assertFalse($location->equals($location2));
        $this->assertFalse($location2->equals($location));
    }

}
