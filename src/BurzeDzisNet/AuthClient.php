<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace BurzeDzisNet;

use SoapHeader;

/**
 * Authorized client
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
        $this->client = $client;
    }

    /**
     * @return Client
     * @throws SoapFault
     */
    public function getClient()
    {
        $client = $this->client->getClient();
        $client->__setSoapHeaders(
            new SoapHeader(
                $this->client->getWSDL(),
                "KeyAPI",
                [$this->client->getApiKey()],
                false
            )
        );
        return $client;
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->client->getApiKey();
    }

    /**
     * @return string
     */
    public function getWSDL()
    {
        return $this->client->getWSDL();
    }
}