<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace BurzeDzisNet;

use PHPUnit_Framework_TestCase;
use SoapHeader;

/**
 * {@see AuthCredential} test
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class AuthCredentialTest extends PHPUnit_Framework_TestCase
{

    /**
     * @covers BurzeDzisNet\AuthCredential::getApiKey
     */
    public function testGetApiKey()
    {
        $credential = new AuthCredential(new Credential("https://burze.dzis.net/soap.php?WSDL", "MyApiKey"));
        $this->assertSame("MyApiKey", $credential->getApiKey());
    }

    /**
     * @covers BurzeDzisNet\AuthCredential::getWSDL
     */
    public function testGetWSDL()
    {
        $credential = new AuthCredential(new Credential("https://burze.dzis.net/soap.php?WSDL", "MyApiKey"));
        $this->assertSame("https://burze.dzis.net/soap.php?WSDL", $credential->getWSDL());
    }

    /**
     * @covers BurzeDzisNet\AuthCredential::getClient
     */
    public function testGetClient()
    {
        $credential = new AuthCredential(
            new Credential(
                \sprintf("%s%sExampleWSDL.xml", __DIR__, \DIRECTORY_SEPARATOR),
                "MyApiKey"
            )
        );

        $client = $credential->getClient();
        $client2 = $credential->getClient();
        $this->assertInstanceOf("SoapClient", $client);
        $this->assertEquals($client, $client2);
        $this->assertNotSame($client, $client2);

        $headerExists = false;
        $headerKeyApi = new SoapHeader(
            \sprintf("%s%sExampleWSDL.xml", __DIR__, \DIRECTORY_SEPARATOR),
            "KeyAPI",
            "MyApiKey",
            false
        );
        foreach ($client->__default_headers as $header) {
            if ($header == $headerKeyApi) {
                $headerExists = true;
                break;
            }
        }
        $this->assertTrue($headerExists, "Non-existent header: KeyApi");
    }

    /**
     * @covers BurzeDzisNet\AuthCredential::getClient
     *
     * @expectedException SoapFault
     */
    public function testGetClientInvalidWSDL()
    {
        $credential = new AuthCredential(
            new Credential(
                \sprintf("%s%sInvalidExampleWSDL.xml", __DIR__, \DIRECTORY_SEPARATOR),
                "MyApiKey"
            )
        );
        $credential->getClient();
    }

    /**
     * @covers BurzeDzisNet\AuthCredential::__construct
     */
    public function test__construct()
    {
        $credential = new AuthCredential(new Credential("https://burze.dzis.net/soap.php?WSDL", "MyApiKey"));
        $this->assertSame("https://burze.dzis.net/soap.php?WSDL", $credential->getWSDL());
        $this->assertSame("MyApiKey", $credential->getApiKey());
    }

}
