<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace BurzeDzisNet;

use SoapHeader;

/**
 * Authorized soapClient
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class AuthClient implements ClientInterface
{
    /**
     * @var Client
     */
    protected $client = null;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client->getClient();
        $this->client->__setSoapHeaders(new SoapHeader($client->getWSDL(), "KeyAPI", [$client->getApiKey()], false));
    }

    /**
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }
}