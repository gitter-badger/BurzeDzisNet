<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace BurzeDzisNet;

use PHPUnit_Framework_TestCase;

/**
 * {@see Storm} test
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class StormTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers BurzeDzisNet\Storm::getLocation
     */
    public function testGetLocation()
    {
        $location = new Location(17.02, 51.07, "Wrocław");
        $storm = new Storm(14, 80.72, "NE", 10, 50, $location);
        $this->assertTrue($storm->getLocation()->equals($location));
    }

    /**
     * @covers BurzeDzisNet\Storm::getNumber
     */
    public function testGetNumber()
    {
        $storm = new Storm(14, 80.72, "NE", 10, 50, new Location(17.02, 51.07, "Wrocław"));
        $this->assertSame(14, $storm->getNumber());
    }

    /**
     * @covers BurzeDzisNet\Storm::getDirection
     */
    public function testGetDirection()
    {
        $storm = new Storm(14, 80.72, "NE", 10, 50, new Location(17.02, 51.07, "Wrocław"));
        $this->assertSame("NE", $storm->getDirection());
    }

    /**
     * @covers BurzeDzisNet\Storm::getDistance
     */
    public function testGetDistance()
    {
        $storm = new Storm(14, 80.72, "NE", 10, 50, new Location(17.02, 51.07, "Wrocław"));
        $this->assertSame(80.72, $storm->getDistance());
    }

    /**
     * @covers BurzeDzisNet\Storm::getPeriod
     */
    public function testGetPeriod()
    {
        $storm = new Storm(14, 80.72, "NE", 10, 50, new Location(17.02, 51.07, "Wrocław"));
        $this->assertSame(10, $storm->getPeriod());
    }

    /**
     * @covers BurzeDzisNet\Storm::getRadius
     */
    public function testGetRadius()
    {
        $storm = new Storm(14, 80.72, "NE", 10, 50, new Location(17.02, 51.07, "Wrocław"));
        $this->assertSame(50, $storm->getRadius());
    }

    /**
     * @covers BurzeDzisNet\Storm::__construct
     */
    public function test__construct()
    {
        $location = new Location(17.02, 51.07, "Wrocław");
        $storm = new Storm(14, 80.72, "NE", 10, 50, $location);
        $this->assertTrue($storm->getLocation()->equals($location));
        $this->assertSame(14, $storm->getNumber());
        $this->assertSame("NE", $storm->getDirection());
        $this->assertSame(80.72, $storm->getDistance());
        $this->assertSame(10, $storm->getPeriod());
        $this->assertSame(50, $storm->getRadius());
    }
}
