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
     * Alert level on scale
     *
     * @var int alert level
     */
    protected $level = 0;

    /**
     * Start day of weather alert
     *
     * @var string start day of weather alert
     */
    protected $start = "";

    /**
     * End day of weather alert
     *
     * @var string end day of weather alert
     */
    protected $end = "";

    /**
     * New weather alert
     *
     * @param $level level on alert scale
     * @param $start start day of weather alert
     * @param $end end day of weather alert
     */
    public function __construct($level, $start, $end)
    {
        $this->level = $level;
        $this->start = $start;
        $this->end = $end;
    }

    /**
     * Get level on alert scale
     *
     * @see https://burze.dzis.net/?page=mapa_ostrzezen Alert scale
     * @return int level on alert scale
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Get start day of weather alert
     *
     * @return string start day of alert
     */
    public function getStartDate()
    {
        return $this->start;
    }

    /**
     * Get end day of weather alert
     *
     * @return string end day of alert
     */
    public function getEndDate()
    {
        return $this->end;
    }

}