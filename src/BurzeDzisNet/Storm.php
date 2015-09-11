<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace BurzeDzisNet;

/**
 * Storm represents information about registered lightnings with a specified radius of monitoring
 * covered by the given location
 *
 * Storm has properties describing:
 * - number (number of cloud-to-ground lightning in specified radius from a selected location)
 * - distance (distance to the nearest registered lightning in km)
 * - direction (direction to the nearest lightning [E, E, N, NW, W, SW, S, SE])
 * - period (number of minutes of time period containing the data [10, 15, 20 minutes])
 * - location (selected location)
 * - radius (radius covered by Point in km)
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class Storm
{

    /**
     * The number of cloud-to-ground lightning in specified radius from a selected location
     *
     * @var int number of minutes of time period containing the data
     */
    protected $number = 0;

    /**
     * The distance (km) to the nearest registered lightning
     *
     * @var float distance to the nearest registered lightning
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
     * @var int number of minutes of time period containing the data
     */
    protected $period = 0;

    /**
     * The radius covered by location
     *
     * @var int radius covered by location
     */
    protected $radius = 0;

    /**
     * Selected location
     *
     * @var Point selected location
     */
    protected $location = null;

    /**
     * New Storm
     *
     * @param int $number number of cloud-to-ground lightning in specified radius from a selected location
     * @param float $distance distance (km) to the nearest registered lightning
     * @param string $direction direction to the nearest lightning (E, E, N, NW, W, SW, S, SE)
     * @param int $period number of minutes of time period containing the data (10, 15, 20 minutes)
     * @param int $radius radius covered by location
     * @param Point $location selected location
     */
    public function __construct($number, $distance, $direction, $period, $radius, Point $location)
    {
        $this->number = $number;
        $this->distance = $distance;
        $this->direction = $direction;
        $this->period = $period;
        $this->radius = $radius;
        $this->location = $location;
    }

    /**
     * Get selected location
     *
     * @return Point Selected location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Get the number of cloud-to-ground lightning in specified radius from a selected location
     *
     * @see getRadius radius covered by Point
     * @see getLocation seletected location
     * @return int number of cloud-to-ground lightning in specified radius from a selected location
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Get the distance to the nearest registered lightning
     *
     * @return float distance to the nearest registered lightning
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
     * @return int number of minutes of time period containing the data
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * Get radius covered by Point
     *
     * @see getLocation seletected location
     * @return int radius covered by location
     */
    public function getRadius()
    {
        return $this->radius;
    }

}