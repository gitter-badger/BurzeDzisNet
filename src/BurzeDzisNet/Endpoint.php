<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace BurzeDzisNet;

use SoapClient;
use SoapFault;

/**
 * Endpoint is the entry point to a burze.dzis.net service
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class Endpoint implements EndpointInterface
{

    /**
     * URI of WSDL file
     *
     * @var string URI of WSDL file
     */
    protected $wsdl = "https://burze.dzis.net/soap.php?WSDL";

    /**
     * API key
     *
     * @var string API key
     */
    protected $apiKey = "";

    /**
     * Constructor
     *
     * @param string $apiKey API key
     */
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * Get SoapClient in WSDL mode
     *
     * @see {@link \SoapClient http://php.net/manual/en/class.soapclient.php} SoapClient
     * @return SoapClient SoapClient in WSDL mode
     * @throws SoapFault if the WSDL URI cannot be loaded
     */
    public function getClient()
    {
        return new SoapClient($this->getWSDL());
    }

    /**
     * Get URI of WSDL file
     *
     * @return string URI of WSDL file
     */
    public function getWSDL()
    {
        return $this->wsdl;
    }

    /**
     * Get API key
     *
     * @return string API key
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

}