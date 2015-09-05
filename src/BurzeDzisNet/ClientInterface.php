<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace BurzeDzisNet;

/**
 * API client
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
interface ClientInterface
{
    /**
     * Get API client
     *
     * @return \SoapClient API client
     * @throws \SoapFault
     */
    public function getClient();

    /**
     * Get URI of WSDL file
     *
     * @return string URI of WSDL file
     */
    public function getWSDL();

    /**
     * Get API credentials
     *
     * @return string API credentials
     */
    public function getApiKey();
}
