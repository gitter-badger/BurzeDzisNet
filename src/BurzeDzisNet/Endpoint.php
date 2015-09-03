<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */


namespace BurzeDzisNet;


/**
 * Endpoint
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class Endpoint
{
    /**
     * @var \SoapClient
     */
    protected $soapClient = null;

    /**
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->soapClient = $client->getClient();
    }

    /**
     * @param string $name
     * @param string|null $apikey
     * @return \stdClass
     */
    public function getLocation($name, $apikey = null)
    {
        return $this->soapClient->miejscowosc($name, $apikey);
    }

    /**
     * @param float $x
     * @param float $y
     * @param int|null $r
     * @param string|null $apikey
     * @return \stdClass
     */
    public function findStorm($x, $y, $r = null, $apikey = null)
    {
        return $this->soapClient->szukaj_burzy($x, $y, $r, $apikey);
    }

}