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
     * @covers BurzeDzisNet\Endpoint::getApiKey
     */
    public function testGetApiKey()
    {
        $endpoint = new Endpoint("MyApiKey");
        $this->assertSame("MyApiKey", $endpoint->getApiKey());
    }

    /**
     * @covers BurzeDzisNet\Endpoint::getWSDL
     */
    public function testGetWSDL()
    {
        $endpoint = new Endpoint("MyApiKey");
        $this->assertSame("https://burze.dzis.net/soap.php?WSDL", $endpoint->getWSDL());
    }

    /**
     * @covers BurzeDzisNet\Endpoint::getClient
     */
    public function testGetClient()
    {
        $endpoint = new Endpoint("MyApiKey");
        $client = $endpoint->getClient();
        $client2 = $endpoint->getClient();
        $this->assertInstanceOf("SoapClient", $client);
        $this->assertEquals($client, $client2);
        $this->assertNotSame($client, $client2);
    }

    /**
     * @covers BurzeDzisNet\Endpoint::getClient
     *
     * @expectedException SoapFault
     */
    public function testGetClientInvalidWSDL()
    {
        $endpoint = $this->getMockBuilder("Endpoint")
            ->disableOriginalConstructor()
            ->setMethods(["getWSDL", "getClient"])
            ->getMock();
        $endpoint->method("getWSDL")->willReturn(\sprintf("%s%sInvalidExampleWSDL.xml", __DIR__, \DIRECTORY_SEPARATOR));
        $this->assertTrue($endpoint->getClient());
    }

    /**
     * @covers BurzeDzisNet\Endpoint::__construct
     */
    public function test__construct()
    {
        $endpoint = new Endpoint("MyApiKey");
        $this->assertSame("https://burze.dzis.net/soap.php?WSDL", $endpoint->getWSDL());
        $this->assertSame("MyApiKey", $endpoint->getApiKey());
    }

}
