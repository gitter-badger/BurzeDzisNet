<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace BurzeDzisNet;

use stdClass;

/**
 * Location
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class Location
{
    /**
     * @var float
     */
    protected $x = 0.0;

    /**
     * @var float
     */
    protected $y = 0.0;

    /**
     * @var string
     */
    protected $name = "";

    /**
     * @param $name
     * @param stdClass $myComplexTypeMiejscowosc
     */
    public function __construct($name, stdClass $myComplexTypeMiejscowosc)
    {
        $this->x = $myComplexTypeMiejscowosc->x;
        $this->y = $myComplexTypeMiejscowosc->y;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return \sprintf("%s[%s, %s]", $this->name, $this->x, $this->y);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @return float
     */
    public function getY()
    {
        return $this->y;
    }

}