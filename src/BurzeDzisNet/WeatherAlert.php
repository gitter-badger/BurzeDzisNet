<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace BurzeDzisNet;

use OutOfBoundsException;
use IteratorAggregate;

/**
 * Weather alerts
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class WeatherAlert implements IteratorAggregate
{
    /**
     * Alerts
     *
     * @var array Alerts
     */
    protected $alerts = [];

    /**
     * Weather alerts
     *
     * @var WeatherAlert|null
     */
    protected $weatherAlert = null;

    /**
     * New WeatherAlert
     *
     * @param WeatherAlert|null $alerts weather alerts
     */
    public function __construct(WeatherAlert $alerts = null)
    {
        $this->weatherAlert = $alerts;
    }

    /**
     * Get new WeatherAlert extended by the new alerts
     *
     * @param Alert $alert alerts weather alerts
     * @param string $name alert name
     * @return WeatherAlert new weather alerts extended by the new alerts
     */
    public function withAlert($name, Alert $alert)
    {
        if ($this->hasAlert($name) === true) {
            throw new \InvalidArgumentException(\sprintf("Alert named %s exists", $name));
        }
        $weatherAlert = clone $this;
        $weatherAlert->weatherAlert = $this;
        $weatherAlert->alerts = [$name => $alert];
        return $weatherAlert;
    }

    /**
     * Get alert by name
     *
     * @param $name alert name
     * @return Alert alert
     * @throws OutOfBoundException there is no such an alert
     */
    public function getAlert($name)
    {
        if (isset($this->alerts[$name]) === true) {
            return $this->alerts[$name];
        }
        if ($this->weatherAlert != null) {
            return $this->weatherAlert->getAlert($name);
        }
        throw new OutOfBoundsException(\sprintf("There is no such an alert like %s", $name));
    }

    /**
     * Iterates over alerts
     *
     * @return \Iterator alert generator
     */
    public function getIterator()
    {
        foreach ($this->toArray() as $name => $alert) {
            yield $name => $alert;
        }
    }

    /**
     * Get all alerts as array
     *
     * @return array all alerts
     */
    public function toArray()
    {
        if ($this->weatherAlert != null) {
            return \array_merge($this->alerts, $this->weatherAlert->toArray());
        }
        return $this->alerts;
    }

    /**
     * Check if specified alert exists
     *
     * @param string $name string alert name
     * @return bool if specified alert exists return true; otherwise false
     */
    public function hasAlert($name)
    {
        if (isset($this->alerts[$name]) === true) {
            return true;
        }
        if ($this->weatherAlert != null) {
            return $this->weatherAlert->hasAlert($name);
        }
        return false;
    }
}