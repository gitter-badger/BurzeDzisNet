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
        $myComplexTypeMiejscowosc = new \stdClass;
        $myComplexTypeMiejscowosc->x = 17.02;
        $myComplexTypeMiejscowosc->y = 51.07;
        $location = new Location($myComplexTypeMiejscowosc, "Wrocław");
        $myComplexTypeBurza = new \stdClass;
        $myComplexTypeBurza->liczba = 14;
        $myComplexTypeBurza->kierunek = "NE";
        $myComplexTypeBurza->odleglosc = 80.72;
        $myComplexTypeBurza->okres = 10;
        $storm = new Storm($myComplexTypeBurza, $location, 100);

        $this->assertTrue($storm->getLocation()->equals($location));
    }

    /**
     * @covers BurzeDzisNet\Storm::getNumber
     */
    public function testGetNumber()
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
        $storm = new Storm($myComplexTypeBurza, $location, 100);

        $this->assertSame(14, $storm->getNumber());
    }

    /**
     * @covers BurzeDzisNet\Storm::getDirection
     */
    public function testGetDirection()
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
        $storm = new Storm($myComplexTypeBurza, $location, 100);

        $this->assertSame("NE", $storm->getDirection());
    }

    /**
     * @covers BurzeDzisNet\Storm::getDistance
     */
    public function testGetDistance()
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
        $storm = new Storm($myComplexTypeBurza, $location, 100);

        $this->assertSame(80.72, $storm->getDistance());
    }

    /**
     * @covers BurzeDzisNet\Storm::getPeriod
     */
    public function testGetPeriod()
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
        $storm = new Storm($myComplexTypeBurza, $location, 100);

        $this->assertSame(10, $storm->getPeriod());
    }

    /**
     * @covers BurzeDzisNet\Storm::getRadius
     */
    public function testGetRadius()
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
        $storm = new Storm($myComplexTypeBurza, $location, 100);

        $this->assertSame(100, $storm->getRadius());
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
        $myComplexTypeBurza = new \stdClass;
        $myComplexTypeBurza->liczba = 14;
        $myComplexTypeBurza->kierunek = "NE";
        $myComplexTypeBurza->odleglosc = 80.72;
        $myComplexTypeBurza->okres = 10;
        $storm = new Storm($myComplexTypeBurza, $location, 100);

        $this->assertTrue($storm->getLocation()->equals($location));
        $this->assertSame(14, $storm->getNumber());
        $this->assertSame("NE", $storm->getDirection());
        $this->assertSame(80.72, $storm->getDistance());
        $this->assertSame(10, $storm->getPeriod());
        $this->assertSame(100, $storm->getRadius());
    }
}
