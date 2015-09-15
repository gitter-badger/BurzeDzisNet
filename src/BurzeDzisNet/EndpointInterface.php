<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace BurzeDzisNet;

/**
 * Endpoint interface is the entry point to a burze.dzis.net API
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
interface EndpointInterface
{
    /**
     * Get soap client in WSDL mode
     *
     * @return \SoapClient Soap client in WSDL mode
     * @throws \SoapFault if the WSDL URI cannot be loaded or parsed
     */
    public function getClient();

    /**
     * Get URI of WSDL file
     *
     * @return string URI of WSDL file
     */
    public function getWSDL();

    /**
     * Get used API key
     *
     * @return string used API key
     */
    public function getApiKey();
}
