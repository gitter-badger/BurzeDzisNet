<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace BurzeDzisNet;

use stdClass;

/**
 * Location represents the coordinates (DMS) for the specified locality
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
     * Locality name
     *
     * @var string locality name
     */
    protected $name = "";

    /**
     * Constructor
     *
     * @param stdClass $complexTypeMiejscowosc coordinates x and y
     * @param $name locality name
     */
    public function __construct(stdClass $complexTypeMiejscowosc, $name)
    {
        $this->x = $complexTypeMiejscowosc->x;
        $this->y = $complexTypeMiejscowosc->y;
        $this->name = $name;
    }

    /**
     * Get string representation
     *
     * Location is represented by literal "LocalityName[CoordinateX, CoordinateY]".
     *
     * @return string string representation
     */
    public function __toString()
    {
        return \sprintf("%s[%s, %s]", $this->name, $this->x, $this->y);
    }

    /**
     * Indicates whether some other Location is equal to this one
     *
     * Two equal Locations must have the same:
     * - locality name,
     * - coordinate x,
     * - coordinate y.
     *
     * @param Location $location other location
     * @return bool true if this location is the equal to some other location; false otherwise
     */
    public function equals(Location $location)
    {
        return $location == (string) $this;
    }

    /**
     * Get locality name
     *
     * @return string locality name
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

}
