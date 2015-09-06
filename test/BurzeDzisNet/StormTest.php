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
     * Test storm object
     *
     * @var Storm
     */
    protected $storm = null;

    /**
     * Setup test
     */
    public function setUp()
    {
        $myComplexTypeMiejscowosc = new \stdClass;
        $myComplexTypeMiejscowosc->x = 17.02;
        $myComplexTypeMiejscowosc->y = 51.07;
        $location = new Location($myComplexTypeMiejscowosc, "Wrocław");
        $myComplexTypeBurza = new \stdClass;
        $myComplexTypeBurza->liczba = 14;
        $myComplexTypeBurza->kierunek = "NE";
        $myComplexTypeBurza->odleglosc = 80.72;
        $myComplexTypeBurza->okres = 10;
        $this->storm = new Storm($myComplexTypeBurza, $location, 100);
    }

    /**
     * @covers BurzeDzisNet\Storm::getLocation
     */
    public function testGetLocation()
    {

        $myComplexTypeMiejscowosc = new \stdClass;
        $myComplexTypeMiejscowosc->x = 17.02;
        $myComplexTypeMiejscowosc->y = 51.07;
        $location = new Location($myComplexTypeMiejscowosc, "Wrocław");
        $this->assertTrue($this->storm->getLocation()->equals($location));
    }

    /**
     * @covers BurzeDzisNet\Storm::getNumber
     */
    public function testGetNumber()
    {
        $this->assertSame(14, $this->storm->getNumber());
    }

    /**
     * @covers BurzeDzisNet\Storm::getDirection
     */
    public function testGetDirection()
    {
        $this->assertSame("NE", $this->storm->getDirection());
    }

    /**
     * @covers BurzeDzisNet\Storm::getDistance
     */
    public function testGetDistance()
    {
        $this->assertSame(80.72, $this->storm->getDistance());
    }

    /**
     * @covers BurzeDzisNet\Storm::getPeriod
     */
    public function testGetPeriod()
    {
        $this->assertSame(10, $this->storm->getPeriod());
    }

    /**
     * @covers BurzeDzisNet\Storm::getRadius
     */
    public function testGetRadius()
    {
        $this->assertSame(100, $this->storm->getRadius());
    }

    /**
     * @covers BurzeDzisNet\Storm::__construct
     */
    public function test__construct()
    {
        $myComplexTypeMiejscowosc = new \stdClass;
        $myComplexTypeMiejscowosc->x = 17.02;
        $myComplexTypeMiejscowosc->y = 51.07;
        $location = new Location($myComplexTypeMiejscowosc, "Wrocław");
        $this->assertTrue($this->storm->getLocation()->equals($location));
        $this->assertSame(14, $this->storm->getNumber());
        $this->assertSame("NE", $this->storm->getDirection());
        $this->assertSame(80.72, $this->storm->getDistance());
        $this->assertSame(10, $this->storm->getPeriod());
        $this->assertSame(100, $this->storm->getRadius());
    }
}
