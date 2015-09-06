<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace BurzeDzisNet;

use SoapFault;

/**
 * Burze.Dzis.Net credential
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class BurzeDzisNet
{

    /**
     * @var \SoapClient
     */
    protected $client = null;

    /**
     * @var null|string
     */
    protected $apiKey = null;

    /**
     * @param CredentialInterface $credential
     */
    public function __construct(CredentialInterface $credential)
    {
        $this->client = $credential->getClient();
        $this->apiKey = $credential instanceof AuthCredential ? null : $credential->getApiKey();
    }

    /**
     * @param $name
     * @return Location
     * @throws \SoapFault
     */
    public function getLocation($name)
    {
        return new Location(
            $this->client->miejscowosc($name, $this->apiKey),
            $name
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
            $this->client->szukaj_burzy(
                $location->getX(),
                $location->getY(),
                $distance,
                $this->apiKey
            ),
            $location
        );
    }

}