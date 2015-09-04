<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace BurzeDzisNet;

/**
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
interface ClientInterface
{
    /**
     * @return \SoapClient
     */
    public function getClient();

    /**
     * @return string
     */
    public function getWSDL();

    /**
     * @return string
     */
    public function getApiKey();
}