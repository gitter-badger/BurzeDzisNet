<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace BurzeDzisNet;

/**
 * Location represents the coordinates (DMS) for the specified locality
 *
 * Location has a properties describing it's:
 * - coordinate x
 * - coordinate y
 * - name
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class Location
{
    /**
     * Coordinate X
     *
     * @var float coordinate X
     */
    protected $x = 0.0;

    /**
     * Coordinate Y
     *
     * @var float coordinate Y
     */
    protected $y = 0.0;

    /**
     * Location name
     *
     * @var string location name
     */
    protected $name = "";

    /**
     * New Location
     *
     * @param float $x coordinate x
     * @param float $y coordinate y
     * @param string $name location name
     */
    public function __construct($x, $y, $name)
    {
        $this->x = $x;
        $this->y = $y;
        $this->name = $name;
    }

    /**
     * Get string representation
     *
     * Location is represented as a literal "Name[x, y]".
     *
     * @return string literal representation of this location
     */
    public function __toString()
    {
        return \sprintf("%s[%s, %s]", $this->getName(), $this->getX(), $this->getY());
    }

    /**
     * Get Location name
     *
     * @return string location name
     */
    public function getName()
    {
        return $this->name;
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
     * Indicates whether some other Location is equal to this one
     *
     * Two locations points to the same coordinates are considered equal.
     *
     * @param Location $location other location
     * @return bool true if this location is the equal to some other location; false otherwise
     */
    public function equals(Location $location)
    {
        return ($this->getX() + $this->getY()) === ($location->getX() + $location->getY());
    }

}
