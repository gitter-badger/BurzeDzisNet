<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace BurzeDzisNet;

use stdClass;

/**
 * Represents storm
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class Storm
{

    /**
     * @var int
     */
    protected $number = 0;

    /**
     * @var float
     */
    protected $distance = 0.0;

    /**
     * @var string
     */
    protected $direction = "";

    /**
     * @var int
     */
    protected $period = 0;

    /**
     * Location
     *
     * @var Location
     */
    protected $location = null;

    /**
     * @param Location $location
     * @param stdClass $myComplexTypeBurza
     */
    public function __construct(Location $location, stdClass $myComplexTypeBurza)
    {
        $this->location = $location;
        $this->number = $myComplexTypeBurza->liczba;
        $this->distance = $myComplexTypeBurza->odleglosc;
        $this->direction = $myComplexTypeBurza->kierunek;
        $this->period = $myComplexTypeBurza->okres;
    }

    /**
     * @return Location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return float
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * @return string
     */
    public function getDirection()
    {
        return $this->direction;
    }

    /**
     * @return int
     */
    public function getPeriod()
    {
        return $this->period;
    }

}