<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace BurzeDzisNet;

/**
 * Burze.Dzis.Net endpoint
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class BurzeDzisNet
{

    /**
     * @var \SoapClient
     */
    protected $endpoint = null;

    /**
     * @var null|string
     */
    protected $apikey = null;

    /**
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->endpoint = $client->getClient();
        $this->apikey = $client instanceof AuthClient ? null : $client->getApiKey();
    }

    /**
     * @param $name
     * @return Location
     * @throws \SoapFault
     */
    public function getLocation($name)
    {
        return new Location(
            $name,
            $this->endpoint->miejscowosc($name, $this->apikey)
        );
    }

    /**
     * @param Location $location
     * @param int $distance
     * @return Storm
     * @throws \SoapFault
     */
    public function findStorm(Location $location, $distance)
    {
        return new Storm(
            $location,
            $this->endpoint->szukaj_burzy(
                $location->getX(),
                $location->getY(),
                $distance,
                $this->apikey
            )
        );
    }

}