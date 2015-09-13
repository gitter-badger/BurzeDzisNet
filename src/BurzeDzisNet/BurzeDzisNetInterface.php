<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace BurzeDzisNet;

/**
 * BurzeDzisNetInterface represents services provided by client of burze.dzis.net
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
interface BurzeDzisNetInterface
{
    /**
     * Indicates whether given API key is valid
     *
     * @param string $apiKey API key
     * @return bool true if API key is valid; otherwise false
     * @throws \SoapFault soap error
     */
    public function verifyApiKey($apiKey);

    /**
     * Get point representing location coordinates
     *
     * If no location returns coordinates [0,0]
     *
     * @param string $name location name
     * @return Point location coordinates
     * @throws \SoapFault soap error
     */
    public function locate($name);

    /**
     * Get storm report
     *
     * Storm object provide information about registered lightnings with a specified radius of monitoring
     * covered by the given location
     *
     * @param Point $point monitored location
     * @param int $radius radius of monitoring (default 25 km)
     * @return Storm information about registered lightnings
     * @throws \SoapFault soap error
     */
    public function getStormReport(Point $point, $radius);

    /**
     * Get weather alert for the given point
     *
     * @param Point $point location coordinates
     * @return WeatherAlert weather alerts
     */
    public function getWeatherAlert(Point $point);
}