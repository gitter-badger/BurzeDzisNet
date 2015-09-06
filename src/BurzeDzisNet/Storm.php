<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace BurzeDzisNet;

use stdClass;

/**
 * Storm
 *
 * Storm has properties describing:
 * - number (number of cloud-to-ground lightning in specified radius from a selected location)
 * - distance (distance to the nearest registered lightning in km)
 * - direction (direction to the nearest lightning [E, E, N, NW, W, SW, S, SE])
 * - period (number of minutes of time period containing the data [10, 15, 20 minutes])
 * - location (selected location)
 * - radius (radius covered by Location in km)
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class Storm
{

    /**
     * The number of cloud-to-ground lightning in specified radius from a selected location
     *
     * @var int the number of minutes of time period containing the data
     */
    protected $number = 0;

    /**
     * The distance (km) to the nearest registered lightning
     *
     * @var float the distance to the nearest registered lightning
     */
    protected $distance = 0.0;

    /**
     * The direction to the nearest lightning (E, E, N, NW, W, SW, S, SE)
     *
     * @var string direction to the nearest lightning
     */
    protected $direction = "";

    /**
     * The number of minutes of time period containing the data (10, 15, 20 minutes)
     *
     * @var int the number of minutes of time period containing the data
     */
    protected $period = 0;

    /**
     * The radius covered by Location
     *
     * @var int radius covered by Location
     */
    protected $radius = 0;

    /**
     * Selected location
     *
     * @var Location selected location
     */
    protected $location = null;

    /**
     * Constructor
     *
     * Storm data transfer object $myComplexTypeBurza must have properties:
     * - number => $myComplexTypeBurza->liczba
     * - distance => $myComplexTypeBurza->odleglosc
     * - direction = $myComplexTypeBurza->kierunek
     * - period  $myComplexTypeBurza->okres
     *
     * @param stdClass $myComplexTypeBurza storm data transfer object
     * @param Location $location selected location
     * @param int $radius radius covered by Location
     */
    public function __construct(stdClass $myComplexTypeBurza, Location $location, $radius)
    {
        $this->location = $location;
        $this->radius = $radius;

        $this->number = $myComplexTypeBurza->liczba;
        $this->distance = $myComplexTypeBurza->odleglosc;
        $this->direction = $myComplexTypeBurza->kierunek;
        $this->period = $myComplexTypeBurza->okres;
    }

    /**
     * Get selected location
     *
     * @return Location Selected location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Get the number of cloud-to-ground lightning in specified radius from a selected location
     *
     * @see getRadius
     * @see getLocation
     * @return int the number of cloud-to-ground lightning in specified radius from a selected location
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Get the distance to the nearest registered lightning
     *
     * @return float The distance to the nearest registered lightning
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * Get direction to the nearest lightning (E, E, N, NW, W, SW, S, SE)
     *
     * @return string direction to the nearest lightning
     */
    public function getDirection()
    {
        return $this->direction;
    }

    /**
     * Get the number of minutes of time period containing the data (10, 15, 20 minutes)
     *
     * @return int the number of minutes of time period containing the data
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * Get radius covered by Location
     *
     * @return int The radius covered by Location
     */
    public function getRadius()
    {
        return $this->radius;
    }

}