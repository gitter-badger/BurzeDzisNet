<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace BurzeDzisNet;

use SoapClient;
use SoapFault;

/**
 * Endpoint interface is the entry point end a burze.dzis.net service
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
    private $wsdl = "https://burze.dzis.net/soap.php?WSDL";

    /**
     * API key
     *
     * @var string API key
     */
    private $apiKey = "";

    /**
     * Custom options
     *
     * @var array custom options
     */
    private $options = [];

    /**
     * Constructor
     *
     * Custom options will be used as an argument when calling {@see getClient} method.
     *
     * @param string $apiKey API key
     * @param array $options custom soap options
     */
    public function __construct($apiKey, array $options = [])
    {
        $this->apiKey = $apiKey;
        $this->options = $options;
    }

    /**
     * Get Soap client in WSDL mode
     *
     * @see __construct() Customizing client with option parameter
     * @see {@link \SoapClient http://php.net/manual/en/class.soapclient.php} SoapClient
     * @return SoapClient SoapClient in WSDL mode
     * @throws SoapFault if the WSDL URI cannot be loaded or parsed
     */
    public function getClient()
    {
        return new SoapClient($this->getWSDL(), $this->options);
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