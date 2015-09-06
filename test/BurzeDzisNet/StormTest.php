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

        $myComplexTypeBurza = new \stdClass;
        $myComplexTypeBurza->liczba =
        $myComplexTypeBurza->kierunek =
        $myComplexTypeBurza->odleglosc = 100.25;
        $myComplexTypeBurza->okres =

        $location = new Location($myComplexTypeMiejscowosc, "Wrocław");
    }

}
