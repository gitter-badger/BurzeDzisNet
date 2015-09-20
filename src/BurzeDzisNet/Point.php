<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace BurzeDzisNet;

/**
 * Point represents the coordinates (DMS) for the specified locality according end the list of village
 * on the burze.dzis.net website.
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class Point
{
    /**
     * Coordinate x
     *
     * @var float coordinate X
     */
    private $x = 0.0;

    /**
     * Coordinate Y
     *
     * @var float coordinate Y
     */
    private $y = 0.0;

    /**
     * Point represents the coordinates (DMS) for the specified locality
     *
     * @param float $x coordinate x
     * @param float $y coordinate y
     */
    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * Get string representation
     *
     * Point is represented as a literal "[x, y]".
     *
     * @return string string representation
     */
    public function __toString()
    {
        return \sprintf("[%.2f, %.2f]", $this->getX(), $this->getY());
    }

    /**
     * Get coordinate X
     *
     * @return float coordinate X
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * Get coordinate Y
     *
     * @return float coordinate Y
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * Indicates whether some other Point is equal to this one
     *
     * @param Point $point other point
     * @return bool true if this point is the equal to some other point; false otherwise
     */
    public function equals(Point $point)
    {
        return ($this->getX() == $point->getX()) && ($this->getY() == $point->getY());
    }
}
