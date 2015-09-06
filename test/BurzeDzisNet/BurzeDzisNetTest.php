<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace BurzeDzisNet;

use PHPUnit_Framework_TestCase;
use stdClass;
use SoapFault;

/**
 * {@see BurzeDzisNet} test
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class BurzeDzisNetTest extends PHPUnit_Framework_TestCase
{

    /**
     * @covers BurzeDzisNet\BurzeDzisNet::__construct
     */
    public function test__construct()
    {
        $client = $this->getMockBuilder("SoapClient")
            ->disableOriginalConstructor()
            ->getMock();
        $credential = $this->getMockBuilder("BurzeDzisNet\Credential")
            ->setConstructorArgs([$client, "MyApiKey"])
            ->setMethods(["getClient", "getApiKey"])
            ->getMock();
        $credential->expects($this->once())->method("getClient");
        $credential->expects($this->once())->method("getApiKey");
        new BurzeDzisNet($credential);
    }

    /**
     * @covers BurzeDzisNet\BurzeDzisNet::apiKey
     */
    public function testApiKey()
    {
        $client = $this->getMockBuilder("SoapClient")
            ->disableOriginalConstructor()
            ->setMethods(["KeyApi"])
            ->getMock();
        $map = [
            ["Valid", true],
            ["Invalid", false]
        ];
        $client->method("KeyApi")->will($this->returnValueMap($map));
        $credential = $this->getMockBuilder("BurzeDzisNet\Credential")
            ->disableOriginalConstructor()
            ->setMethods(["getClient"])
            ->getMock();
        $credential->method("getClient")->willReturn($client);
        $burzeDzisNet = new BurzeDzisNet($credential);
        $this->assertTrue($burzeDzisNet->apiKey("Valid"));
        $this->assertFalse($burzeDzisNet->apiKey("Invalid"));
    }

    /**
     * @covers BurzeDzisNet\BurzeDzisNet::__construct
     */
    public function test__constructWithAuthCredential()
    {
        $client = $this->getMockBuilder("SoapClient")
            ->disableOriginalConstructor()
            ->getMock();
        $credential = $this->getMockBuilder("BurzeDzisNet\Credential")
            ->setConstructorArgs([$client, "MyApiKey"])
            ->setMethods(["getClient", "getApiKey"])
            ->getMock();
        $authCredential = $this->getMockBuilder("BurzeDzisNet\AuthCredential")
            ->setConstructorArgs([$credential])
            ->setMethods(["getClient"])
            ->getMock();
        $authCredential->expects($this->once())->method("getClient");
        new BurzeDzisNet($authCredential);
    }

    /**
     * @covers BurzeDzisNet\BurzeDzisNet::getLocation
     */
    public function testGetLocation()
    {
        $complexTypeLocation = new stdClass;
        $complexTypeLocation->x = 25.17;
        $complexTypeLocation->y = 54.41;
        $client = $this->getMockBuilder("SoapClient")
            ->disableOriginalConstructor()
            ->setMethods(["miejscowosc"])
            ->getMock();
        $client->method("miejscowosc")->willReturn($complexTypeLocation);
        $client->expects($this->once())->method("miejscowosc")->with("Wrocław", "MyApiKey");
        $credential = $this->getMockBuilder("BurzeDzisNet\Credential")
            ->disableOriginalConstructor()
            ->setMethods(["getClient", "getApiKey"])
            ->getMock();
        $credential->method("getClient")->willReturn($client);
        $credential->method("getApiKey")->willReturn("MyApiKey");
        $burzeDzisNet = new BurzeDzisNet($credential);
        $location = $burzeDzisNet->getLocation("Wrocław");
        $this->assertInstanceOf("BurzeDzisNet\Location", $location);
        $this->assertSame("Wrocław", $location->getName());
        $this->assertSame(25.17, $location->getX());
        $this->assertSame(54.41, $location->getY());
    }

    /**
     * @covers BurzeDzisNet\BurzeDzisNet::getLocation
     * @expectedException SoapFault
     */
    public function testGetLocationSoapFault()
    {
        $soapFault = $this->getMockBuilder("SoapFault")->disableOriginalConstructor()->getMock();
        $client = $this->getMockBuilder("SoapClient")
            ->disableOriginalConstructor()
            ->setMethods(["miejscowosc"])
            ->getMock();
        $client->method("miejscowosc")->willThrowException($soapFault);
        $credential = $this->getMockBuilder("BurzeDzisNet\Credential")
            ->disableOriginalConstructor()
            ->setMethods(["getClient"])
            ->getMock();
        $credential->method("getClient")->willReturn($client);
        $burzeDzisNet = new BurzeDzisNet($credential);
        $burzeDzisNet->getLocation("Wrocław");
    }

    /**
     * @covers BurzeDzisNet\BurzeDzisNet::getLocation
     */
    public function testGetLocationWithAuthCredential()
    {
        $complexTypeLocation = new stdClass;
        $complexTypeLocation->x = 25.17;
        $complexTypeLocation->y = 54.41;
        $client = $this->getMockBuilder("SoapClient")
            ->disableOriginalConstructor()
            ->setMethods(["miejscowosc"])
            ->getMock();
        $client->method("miejscowosc")->willReturn($complexTypeLocation);
        $client->expects($this->once())->method("miejscowosc")->with("Wrocław", null);
        $credential = $this->getMockBuilder("BurzeDzisNet\AuthCredential")
            ->disableOriginalConstructor()
            ->setMethods(["getClient", "getApiKey"])
            ->getMock();
        $credential->method("getClient")->willReturn($client);
        $credential->method("getApiKey")->willReturn("MyApiKey");
        $burzeDzisNet = new BurzeDzisNet($credential);
        $location = $burzeDzisNet->getLocation("Wrocław");
        $this->assertInstanceOf("BurzeDzisNet\Location", $location);
        $this->assertSame("Wrocław", $location->getName());
        $this->assertSame(25.17, $location->getX());
        $this->assertSame(54.41, $location->getY());
    }

    /**
     * @covers BurzeDzisNet\BurzeDzisNet::findStorm
     */
    public function testFindStorm()
    {
        $complexTypeLocation = new stdClass;
        $complexTypeLocation->x = 25.17;
        $complexTypeLocation->y = 54.41;
        $location = new Location($complexTypeLocation, "Wrocław");
        $complexTypeStorm = new stdClass;
        $complexTypeStorm->liczba = 14;
        $complexTypeStorm->odleglosc = 80.72;
        $complexTypeStorm->kierunek = NE;
        $complexTypeStorm->okres = 10;
        $client = $this->getMockBuilder("SoapClient")
            ->disableOriginalConstructor()
            ->setMethods(["szukaj_burzy"])
            ->getMock();
        $client->method("szukaj_burzy")->willReturn($complexTypeStorm);
        $client->expects($this->once())->method("szukaj_burzy")->with(54.41, 25.17, 50, "MyApiKey");
        $credential = $this->getMockBuilder("BurzeDzisNet\Credential")
            ->disableOriginalConstructor()
            ->setMethods(["getClient", "getApiKey"])
            ->getMock();
        $credential->method("getClient")->willReturn($client);
        $credential->method("getApiKey")->willReturn("MyApiKey");
        $burzeDzisNet = new BurzeDzisNet($credential);
        $storm = $burzeDzisNet->findStorm($location, 50);
        $this->assertTrue($storm->getLocation()->equals($location));
        $this->assertSame("NE", $storm->getDirection());
        $this->assertSame(50, $storm->getRadius());
        $this->assertSame(80.72, $storm->getDistance());
        $this->assertSame(14, $storm->getNumber());
        $this->assertSame(10, $storm->getPeriod());
    }

    /**
     * @covers BurzeDzisNet\BurzeDzisNet::findStorm
     */
    public function testFindStormWitAuthCredential()
    {
        $complexTypeLocation = new stdClass;
        $complexTypeLocation->x = 25.17;
        $complexTypeLocation->y = 54.41;
        $location = new Location($complexTypeLocation, "Wrocław");
        $complexTypeStorm = new stdClass;
        $complexTypeStorm->liczba = 14;
        $complexTypeStorm->odleglosc = 80.72;
        $complexTypeStorm->kierunek = NE;
        $complexTypeStorm->okres = 10;
        $client = $this->getMockBuilder("SoapClient")
            ->disableOriginalConstructor()
            ->setMethods(["szukaj_burzy"])
            ->getMock();
        $client->method("szukaj_burzy")->willReturn($complexTypeStorm);
        $client->expects($this->once())->method("szukaj_burzy")->with(54.41, 25.17, 50, null);
        $credential = $this->getMockBuilder("BurzeDzisNet\AuthCredential")
            ->disableOriginalConstructor()
            ->setMethods(["getClient", "getApiKey"])
            ->getMock();
        $credential->method("getClient")->willReturn($client);
        $credential->method("getApiKey")->willReturn("MyApiKey");
        $burzeDzisNet = new BurzeDzisNet($credential);
        $storm = $burzeDzisNet->findStorm($location, 50);
        $this->assertTrue($storm->getLocation()->equals($location));
        $this->assertSame("NE", $storm->getDirection());
        $this->assertSame(50, $storm->getRadius());
        $this->assertSame(80.72, $storm->getDistance());
        $this->assertSame(14, $storm->getNumber());
        $this->assertSame(10, $storm->getPeriod());
    }

    /**
     * @covers BurzeDzisNet\BurzeDzisNet::getLocation
     * @expectedException SoapFault
     */
    public function testFindStormSoapFault()
    {

        $complexTypeLocation = new stdClass;
        $complexTypeLocation->x = 25.17;
        $complexTypeLocation->y = 54.41;
        $location = new Location($complexTypeLocation, "Wrocław");
        $soapFault = $this->getMockBuilder("SoapFault")->disableOriginalConstructor()->getMock();
        $client = $this->getMockBuilder("SoapClient")
            ->disableOriginalConstructor()
            ->setMethods(["szukaj_burzy"])
            ->getMock();
        $client->method("szukaj_burzy")->willThrowException($soapFault);
        $credential = $this->getMockBuilder("BurzeDzisNet\Credential")
            ->disableOriginalConstructor()
            ->setMethods(["getClient"])
            ->getMock();
        $credential->method("getClient")->willReturn($client);
        $burzeDzisNet = new BurzeDzisNet($credential);
        $burzeDzisNet->findStorm($location, 50);
    }

}
