<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace BurzeDzisNet;

use SoapHeader;

/**
 * API credential with authorization header
 *
 * Calling method {@see getClient} returns {@link \SoapClient http://php.net/manual/en/class.soapclient.php} with
 * authorization header.
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class AuthCredential implements EndpointInterface
{
    /**
     * Client credential
     *
     * @var Endpoint client credential
     */
    protected $credential = null;

    /**
     * Constructor
     *
     * @param Endpoint $client client credential
     */
    public function __construct(Endpoint $client)
    {
        $this->credential = $client;
    }

    /**
     * Get API credential
     *
     * Returns {@link \SoapClient http://php.net/manual/en/class.soapclient.php} with
     * authorization header.
     *
     * @return SoapClient API client with authorization header
     * @throws SoapFault if the wsdl URI cannot be loaded
     */
    public function getClient()
    {
        $client = $this->credential->getClient();
        $client->__setSoapHeaders(
            new SoapHeader(
                $this->credential->getWSDL(),
                "KeyAPI",
                [$this->credential->getApiKey()],
                false
            )
        );
        return $client;
    }

    /**
     * Get API key
     *
     * @return string API key
     */
    public function getApiKey()
    {
        return $this->credential->getApiKey();
    }

    /**
     * Get URI of WSDL file
     *
     * @return string URI of WSDL file
     */
    public function getWSDL()
    {
        return $this->credential->getWSDL();
    }

}