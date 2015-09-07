<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace BurzeDzisNet;

use SoapFault;

/**
 * Burze.Dzis.Net
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class BurzeDzisNet
{

    /**
     * API client
     *
     * @var \SoapClient API client
     */
    protected $client = null;

    /**
     * API key
     *
     * @var null|string API key
     */
    protected $apiKey = null;

    /**
     * Constructor
     *
     * If $credential instance of {@see AuthCredential} client will be send authorization header; otherwise API key
     * will be send with every remote call as an remote argument.
     *
     * @param EndpointInterface $credential API credential
     */
    public function __construct(EndpointInterface $credential)
    {
        $this->client = $credential->getClient();
        $this->apiKey = $credential instanceof AuthCredential ? null : $credential->getApiKey();
    }

    /**
     * Indicates whether given API key is credible
     *
     * @param $apiKey API key
     * @return bool true if API key is credible; otherwise false
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
     * @param $name location name
     * @return Location location with coordinates
     * @throws \SoapFault If server error
     */
    public function getLocation($name)
    {
        return new Location(
            $this->client->miejscowosc($name, $this->apiKey),
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
        return new Storm(
            $this->client->szukaj_burzy(
                $location->getY(),
                $location->getX(),
                $radius,
                $this->apiKey
            ),
            $location,
            $radius
        );
    }

}