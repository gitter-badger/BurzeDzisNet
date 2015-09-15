<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace BurzeDzisNet;

/**
 * Weather alert
 *
 * @see https://burze.dzis.net/?page=severe_weather_alert_map_poland Alert scale
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class Alert
{

    /**
     * Alert level
     *
     * @var int alert level
     */
    protected $level = 0;

    /**
     * Start day
     *
     * @var string start day
     */
    protected $start = "";

    /**
     * End day
     *
     * @var string end day
     */
    protected $end = "";

    /**
     * New weather alert
     *
     * @param $level alert level
     * @param $start start day
     * @param $end end day
     */
    public function __construct($level, $start, $end)
    {
        $this->level = $level;
        $this->start = $start;
        $this->end = $end;
    }

    /**
     * Get alert level
     *
     * @see https://burze.dzis.net/?page=mapa_ostrzezen Alert scale
     * @return int alert level
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Get start day
     *
     * @return string start day
     */
    public function getStartDate()
    {
        return $this->start;
    }

    /**
     * Get end day
     *
     * @return string end day
     */
    public function getEndDate()
    {
        return $this->end;
    }

}