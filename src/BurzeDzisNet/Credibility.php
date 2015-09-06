<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace BurzeDzisNet;

/**
 * Client credibility
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
interface Credibility
{
    /**
     * Get API client
     *
     * @return \SoapClient API client
     * @throws \SoapFault if the wsdl URI cannot be loaded
     */
    public function getClient();

    /**
     * Get URI of WSDL file
     *
     * @return string URI of WSDL file
     */
    public function getWSDL();

    /**
     * Get API key
     *
     * @return string API key
     */
    public function getApiKey();
}
