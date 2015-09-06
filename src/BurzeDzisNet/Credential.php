<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace BurzeDzisNet;

use SoapClient;
use SoapFault;

/**
 * Client credential
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class Credential implements Credibility
{

    /**
     * URI of WSDL file
     *
     * @var string URI of WSDL file
     */
    protected $wsdl = "";

    /**
     * API key
     *
     * @var string API key
     */
    protected $apiKey = "";

    /**
     * Client Credential
     *
     * @param string $wsdl URI of WSDL file
     * @param string $apiKey API key
     */
    public function __construct($wsdl, $apiKey)
    {
        $this->wsdl = $wsdl;
        $this->apiKey = $apiKey;
    }

    /**
     * Get API client
     *
     * @return SoapClient API client
     * @throws SoapFault if the wsdl URI cannot be loaded
     */
    public function getClient()
    {
        return new SoapClient($this->wsdl);
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