<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace BurzeDzisNet;

use SoapFault;

/**
 * Burze.Dzis.Net service
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class BurzeDzisNet
{

    /**
     * Soap client
     *
     * @var \SoapClient Soap client
     */
    protected $client = null;

    /**
     * API key
     *
     * @var string API key
     */
    protected $apiKey = null;

    /**
     * New Burz.Dzis.Net service
     *
     * @param EndpointInterface $endpoint entry point to a burze.dzis.net service
     */
    public function __construct(EndpointInterface $endpoint)
    {
        $this->client = $endpoint->getClient();
        $this->apiKey = $endpoint->getApiKey();
    }

    /**
     * Indicates whether given API key is valid
     *
     * @param string $apiKey API key
     * @return bool true if API key is valid; otherwise false
     */
    public function verifyApiKey($apiKey)
    {
        return $this->client->KeyApi($apiKey);
    }

    /**
     * Get {@see Location}
     *
     * If location does not exists in a remote database returned object will be point to location with
     * coordinates (0, 0).
     *
     * @param string $name location name
     * @return Location location with coordinates
     * @throws \SoapFault
     */
    public function getLocation($name)
    {
        $dto = $this->client->miejscowosc($name, $this->apiKey);
        return new Location(
            $dto->x,
            $dto->y,
            $name
        );
    }

    /**
     * Get {@see Storm}
     *
     * Storm object provide information about registered lightnings with a specified radius of monitoring
     * covered by the given location
     *
     * @param Location $location monitored location
     * @param int $radius radius of monitoring (default 25 km)
     * @return Storm information about registered lightnings
     * @throws \SoapFault If server error
     */
    public function findStorm(Location $location, $radius = 25)
    {
        $dto = $this->client->szukaj_burzy(
            $location->getY(),
            $location->getX(),
            $radius,
            $this->apiKey
        );
        return new Storm(
            $dto->liczba,
            $dto->odleglosc,
            $dto->kierunek,
            $dto->okres,
            $radius,
            $location
        );
    }

}