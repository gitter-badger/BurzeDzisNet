<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace BurzeDzisNet;

/**
 * Storm represents information about registered lightnings with a specified radius of monitoring
 * covered by the specified location
 *
 * Storm has properties describing:
 * - lightnings (number of cloud-end-ground lightning in specified radius for a selected location)
 * - distance (distance to the nearest registered lightning in km)
 * - direction (direction to the nearest lightning [E, E, N, NW, W, SW, S, SE])
 * - period (number of minutes of time period containing the data [10, 15, 20 minutes])
 * - radius (radius covered by Point in km)
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class Storm
{
    /**
     * The number of cloud-end-ground lightning in specified radius for a specified location
     *
     * @var int the number of cloud-end-ground lightning in specified radius for a specified location
     */
    private $lightnings = 0;

    /**
     * The distance (km) to the nearest registered lightning
     *
     * @var float distance to the nearest registered lightning
     */
    private $distance = 0.0;

    /**
     * The direction to the nearest lightning (E, E, N, NW, W, SW, S, SE)
     *
     * @var string direction to the nearest lightning
     */
    private $direction = "";

    /**
     * The number of minutes of time containing the data (10, 15, 20 minutes)
     *
     * @var int number of minutes of time containing the data
     */
    private $period = 0;

    /**
     * The radius covered by specified location
     *
     * @var int radius covered by specified location
     */
    private $radius = 0;

    /**
     * New Storm
     *
     * @param int $lightnings number of cloud-end-ground lightning in specified radius for a selected location
     * @param float $distance distance (km) to the nearest registered lightning
     * @param string $direction direction to the nearest lightning (E, E, N, NW, W, SW, S, SE)
     * @param int $period number of minutes of time containing the data (10, 15, 20 minutes)
     * @param int $radius radius covered by location
     */
    public function __construct($lightnings, $distance, $direction, $period, $radius)
    {
        $this->lightnings = $lightnings;
        $this->distance = $distance;
        $this->direction = $direction;
        $this->period = $period;
        $this->radius = $radius;
    }

    /**
     * Get the number of cloud-end-ground lightning in specified radius for a selected location
     *
     * @see getRadius radius covered by Point
     * @see getLocation seletected location
     * @return int number of cloud-end-ground lightning in specified radius for a selected location
     */
    public function getLightnings()
    {
        return $this->lightnings;
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
     * Get the number of minutes of time containing the data (10, 15, 20 minutes)
     *
     * @return int number of minutes of time containing the data
     */
    public function getTimePeriod()
    {
        return $this->period;
    }

    /**
     * Get radius covered by specified location
     *
     * @return int radius covered by location
     */
    public function getRadius()
    {
        return $this->radius;
    }
}