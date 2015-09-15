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
     * @covers BurzeDzisNet\Storm::getLightnings
     */
    public function testGetLightnings()
    {
        $storm = new Storm(14, 80.72, "NE", 10, 50);
        $this->assertSame(14, $storm->getLightnings());
    }

    /**
     * @covers BurzeDzisNet\Storm::getDirection
     */
    public function testGetDirection()
    {
        $storm = new Storm(14, 80.72, "NE", 10, 50);
        $this->assertSame("NE", $storm->getDirection());
    }

    /**
     * @covers BurzeDzisNet\Storm::getDistance
     */
    public function testGetDistance()
    {
        $storm = new Storm(14, 80.72, "NE", 10, 50);
        $this->assertSame(80.72, $storm->getDistance());
    }

    /**
     * @covers BurzeDzisNet\Storm::getTimePeriod
     */
    public function testGetPeriod()
    {
        $storm = new Storm(14, 80.72, "NE", 10, 50);
        $this->assertSame(10, $storm->getTimePeriod());
    }

    /**
     * @covers BurzeDzisNet\Storm::getRadius
     */
    public function testGetRadius()
    {
        $storm = new Storm(14, 80.72, "NE", 10, 50);
        $this->assertSame(50, $storm->getRadius());
    }

    /**
     * @covers BurzeDzisNet\Storm::__construct
     */
    public function test__construct()
    {
        $storm = new Storm(14, 80.72, "NE", 10, 50);
        $this->assertSame(14, $storm->getLightnings());
        $this->assertSame("NE", $storm->getDirection());
        $this->assertSame(80.72, $storm->getDistance());
        $this->assertSame(10, $storm->getTimePeriod());
        $this->assertSame(50, $storm->getRadius());
    }
}
