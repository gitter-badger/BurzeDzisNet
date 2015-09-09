<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace BurzeDzisNet;

use PHPUnit_Framework_TestCase;
use SoapFault;
use stdClass;

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
        $endpoint = $this->getMockBuilder("BurzeDzisNet\Endpoint")
            ->disableOriginalConstructor()
            ->setMethods(["getClient", "getApiKey"])
            ->getMock();
        $endpoint->expects($this->once())->method("getClient");
        $endpoint->expects($this->once())->method("getApiKey");
        new BurzeDzisNet($endpoint);
    }

    /**
     * @covers BurzeDzisNet\BurzeDzisNet::verifyApiKey
     */
    public function testVerifyApiKey()
    {
        $client = $this->getMockBuilder("SoapClient")
            ->disableOriginalConstructor()
            ->setMethods(["KeyApi"])
            ->getMock();
        $map = [
            ["ValidApiKey", true],
            ["InvalidApiKey", false]
        ];
        $client->method("KeyApi")->will($this->returnValueMap($map));
        $endpoint = $this->getMockBuilder("BurzeDzisNet\Endpoint")
            ->disableOriginalConstructor()
            ->setMethods(["getClient"])
            ->getMock();
        $endpoint->method("getClient")->willReturn($client);
        $burzeDzisNet = new BurzeDzisNet($endpoint);
        $this->assertTrue($burzeDzisNet->verifyApiKey("ValidApiKey"));
        $this->assertFalse($burzeDzisNet->verifyApiKey("InvalidApiKey"));
    }

    /**
     * @covers BurzeDzisNet\BurzeDzisNet::getLocation
     */
    public function testGetLocation()
    {
        $complexTypeLocation = new stdClass();
        $complexTypeLocation->x = 25.17;
        $complexTypeLocation->y = 54.41;
        $client = $this->getMockBuilder("SoapClient")
            ->disableOriginalConstructor()
            ->setMethods(["miejscowosc"])
            ->getMock();
        $client->method("miejscowosc")->willReturn($complexTypeLocation);
        $client->expects($this->once())->method("miejscowosc")->with("Wrocław", "MyApiKey");
        $endpoint = $this->getMockBuilder("BurzeDzisNet\Endpoint")
            ->disableOriginalConstructor()
            ->setMethods(["getClient", "getApiKey"])
            ->getMock();
        $endpoint->method("getClient")->willReturn($client);
        $endpoint->method("getApiKey")->willReturn("MyApiKey");
        $burzeDzisNet = new BurzeDzisNet($endpoint);
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
        $endpoint = $this->getMockBuilder("BurzeDzisNet\Endpoint")
            ->disableOriginalConstructor()
            ->setMethods(["getClient"])
            ->getMock();
        $endpoint->method("getClient")->willReturn($client);
        $burzeDzisNet = new BurzeDzisNet($endpoint);
        $burzeDzisNet->getLocation("Wrocław");
    }

    /**
     * @covers BurzeDzisNet\BurzeDzisNet::findStorm
     */
    public function testFindStorm()
    {
        $location = new Location(25.17, 54.41, "Wrocław");
        $client = $this->getMockBuilder("SoapClient")
            ->disableOriginalConstructor()
            ->setMethods(["szukaj_burzy"])
            ->getMock();
        $client->method("szukaj_burzy")->willReturn($this->getStormTO());
        $client->expects($this->once())->method("szukaj_burzy")->with(54.41, 25.17, 50, "MyApiKey");
        $endpoint = $this->getMockBuilder("BurzeDzisNet\Endpoint")
            ->disableOriginalConstructor()
            ->setMethods(["getClient", "getApiKey"])
            ->getMock();
        $endpoint->method("getClient")->willReturn($client);
        $endpoint->method("getApiKey")->willReturn("MyApiKey");
        $burzeDzisNet = new BurzeDzisNet($endpoint);
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
     * @expectedException SoapFault
     */
    public function testFindStormSoapFault()
    {
        $location = new Location(25.17, 54.41, "Wrocław");
        $soapFault = $this->getMockBuilder("SoapFault")->disableOriginalConstructor()->getMock();
        $client = $this->getMockBuilder("SoapClient")
            ->disableOriginalConstructor()
            ->setMethods(["szukaj_burzy"])
            ->getMock();
        $client->expects($this->once())->method("szukaj_burzy")->with(54.41, 25.17, 50, "MyApiKey");
        $client->method("szukaj_burzy")->willThrowException($soapFault);
        $endpoint = $this->getMockBuilder("BurzeDzisNet\Endpoint")
            ->disableOriginalConstructor()
            ->setMethods(["getClient", "getApiKey"])
            ->getMock();
        $endpoint->method("getClient")->willReturn($client);
        $endpoint->method("getApiKey")->willReturn("MyApiKey");
        $burzeDzisNet = new BurzeDzisNet($endpoint);
        $burzeDzisNet->findStorm($location, 50);
    }

    /**
     * Get Storm transfer object
     *
     * @return stdClass
     */
    protected function getStormTO() {
        $complexTypeStorm = new stdClass;
        $complexTypeStorm->liczba = 14;
        $complexTypeStorm->odleglosc = 80.72;
        $complexTypeStorm->kierunek = "NE";
        $complexTypeStorm->okres = 10;
    }
}
