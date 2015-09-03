<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace BurzeDzisNet;

use SoapClient;

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
}