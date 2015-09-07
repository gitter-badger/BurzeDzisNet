<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace BurzeDzisNet;

use PHPUnit_Framework_TestCase;

/**
 * {@see Endpoint} test
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class EndpointTest extends PHPUnit_Framework_TestCase
{

    /**
     * @covers BurzeDzisNet\Credential::getApiKey
     */
    public function testGetApiKey()
    {
        $credential = new Endpoint("https://burze.dzis.net/soap.php?WSDL", "MyApiKey");
        $this->assertSame("MyApiKey", $credential->getApiKey());
    }

    /**
     * @covers BurzeDzisNet\Credential::getWSDL
     */
    public function testGetWSDL()
    {
        $credential = new Endpoint("https://burze.dzis.net/soap.php?WSDL", "MyApiKey");
        $this->assertSame("https://burze.dzis.net/soap.php?WSDL", $credential->getWSDL());
    }

    /**
     * @covers BurzeDzisNet\Credential::getClient
     */
    public function testGetClient()
    {
        $credential = new Endpoint(
            \sprintf("%s%sExampleWSDL.xml", __DIR__, \DIRECTORY_SEPARATOR),
            "MyApiKey"
        );
        $client = $credential->getClient();
        $client2 = $credential->getClient();
        $this->assertInstanceOf("SoapClient", $client);
        $this->assertEquals($client, $client2);
        $this->assertNotSame($client, $client2);
    }

    /**
     * @covers BurzeDzisNet\Credential::getClient
     *
     * @expectedException SoapFault
     */
    public function testGetClientInvalidWSDL()
    {
        $credential = new Endpoint(
            \sprintf("%s%sInvalidExampleWSDL.xml", __DIR__, \DIRECTORY_SEPARATOR),
            "MyApiKey"
        );
        $credential->getClient();
    }

    /**
     * @covers BurzeDzisNet\Credential::__construct
     */
    public function test__construct()
    {
        $credential = new Endpoint("https://burze.dzis.net/soap.php?WSDL", "MyApiKey");
        $this->assertSame("https://burze.dzis.net/soap.php?WSDL", $credential->getWSDL());
        $this->assertSame("MyApiKey", $credential->getApiKey());
    }

}
