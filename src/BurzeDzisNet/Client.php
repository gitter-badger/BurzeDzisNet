<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace BurzeDzisNet;

use SoapClient;
use SoapFault;

/**
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class Client
{

    /**
     * @var string
     */
    protected $wsdl = "";

    /**
     * @var string
     */
    protected $apikey = "";

    /**
     * @param string $wsdl
     * @param string $apikey
     */
    public function __construct($wsdl, $apikey)
    {
        $this->wsdl = $wsdl;
        $this->apikey = $apikey;
    }

    /**
     * @return SoapClient
     * @throws SoapFault
     */
    public function getClient()
    {
        return new SoapClient($this->wsdl);
    }

    /**
     * @return string
     */
    public function getWSDL()
    {
        return $this->wsdl;
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->apikey;
    }
}