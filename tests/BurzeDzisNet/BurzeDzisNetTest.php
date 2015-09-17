<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace BurzeDzisNet;

use PHPUnit_Framework_TestCase;
use SoapClient;
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
            ["4d36bcb5c40", true],
            ["f892dbc042f3", false]
        ];
        $client->method("KeyApi")->will($this->returnValueMap($map));
        $endpoint = $this->getMockBuilder("BurzeDzisNet\Endpoint")
            ->disableOriginalConstructor()
            ->setMethods(["getClient"])
            ->getMock();
        $endpoint->method("getClient")->willReturn($client);
        $burzeDzisNet = new BurzeDzisNet($endpoint);
        $this->assertTrue($burzeDzisNet->verifyApiKey("4d36bcb5c40"));
        $this->assertFalse($burzeDzisNet->verifyApiKey("f892dbc042f3"));
    }

    /**
     * @covers BurzeDzisNet\BurzeDzisNet::locate
     */
    public function testLocate()
    {
        $remotePoint = new stdClass();
        $remotePoint->x = 25.17;
        $remotePoint->y = 54.41;
        $client = $this->getMockBuilder("SoapClient")
            ->disableOriginalConstructor()
            ->setMethods(["miejscowosc"])
            ->getMock();
        $client->method("miejscowosc")->willReturn($remotePoint);
        $client->expects($this->once())->method("miejscowosc")->with("Wrocław", "4d36bcb5c40");
        $endpoint = $this->getMockBuilder("BurzeDzisNet\Endpoint")
            ->disableOriginalConstructor()
            ->setMethods(["getClient", "getApiKey"])
            ->getMock();
        $endpoint->method("getClient")->willReturn($client);
        $endpoint->method("getApiKey")->willReturn("4d36bcb5c40");
        $point = (new BurzeDzisNet($endpoint))->locate("Wrocław");
        $this->assertInstanceOf("BurzeDzisNet\Point", $point);
        $this->assertSame(25.17, $point->getX());
        $this->assertSame(54.41, $point->getY());
    }

    /**
     * @covers BurzeDzisNet\BurzeDzisNet::locate
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
        (new BurzeDzisNet($this->getEndpoint($client)))->locate("Wrocław");
    }

    /**
     * @covers BurzeDzisNet\BurzeDzisNet::getStorm
     */
    public function testGetStormReport()
    {
        $client = $this->getMockBuilder("SoapClient")
            ->disableOriginalConstructor()
            ->setMethods(["szukaj_burzy"])
            ->getMock();
        $client->method("szukaj_burzy")->willReturn($this->getStormTO());
        $client->expects($this->once())->method("szukaj_burzy")->with(54.41, 25.17, 50, "4d36bcb5c40");
        $endpoint = $this->getMockBuilder("BurzeDzisNet\Endpoint")
            ->disableOriginalConstructor()
            ->setMethods(["getClient", "getApiKey"])
            ->getMock();
        $endpoint->method("getClient")->willReturn($client);
        $endpoint->method("getApiKey")->willReturn("4d36bcb5c40");
        $storm = (new BurzeDzisNet($endpoint))->getStorm(new Point(25.17, 54.41), 50);
        $this->assertSame("NE", $storm->getDirection());
        $this->assertSame(50, $storm->getRadius());
        $this->assertSame(80.72, $storm->getDistance());
        $this->assertSame(14, $storm->getLightnings());
        $this->assertSame(10, $storm->getTimePeriod());
    }

    /**
     * @covers BurzeDzisNet\BurzeDzisNet::getStorm
     * @expectedException SoapFault
     */
    public function testGetStormReportSoapFault()
    {
        $soapFault = $this->getMockBuilder("SoapFault")->disableOriginalConstructor()->getMock();
        $client = $this->getMockBuilder("SoapClient")
            ->disableOriginalConstructor()
            ->setMethods(["szukaj_burzy"])
            ->getMock();
        $client->expects($this->once())->method("szukaj_burzy")->with(54.41, 25.17, 50, "4d36bcb5c40");
        $client->method("szukaj_burzy")->willThrowException($soapFault);
        (new BurzeDzisNet($this->getEndpoint($client)))->getStorm(new Point(25.17, 54.41), 50);
    }

    /**
     * @covers BurzeDzisNet\BurzeDzisNet::getWeatherAlert
     */
    public function testGetWeatherAlert()
    {
        $client = $this->getMockBuilder("SoapClient")
            ->disableOriginalConstructor()
            ->setMethods(["ostrzezenia_pogodowe"])
            ->getMock();
        $client->method("ostrzezenia_pogodowe")->willReturn($this->getAlertTO());
        $client->expects($this->once())->method("ostrzezenia_pogodowe")->with(54.41, 25.17, "4d36bcb5c40");
        $endpoint = $this->getMockBuilder("BurzeDzisNet\Endpoint")
            ->disableOriginalConstructor()
            ->setMethods(["getClient", "getApiKey"])
            ->getMock();
        $endpoint->method("getClient")->willReturn($client);
        $endpoint->method("getApiKey")->willReturn("4d36bcb5c40");
        $alert = (new BurzeDzisNet($endpoint))->getWeatherAlert(new Point(25.17, 54.41));
        $this->assertFrost($this->getAlertTO(), $alert->getAlert("frost"));
        $this->assertHeat($this->getAlertTO(), $alert->getAlert("heat"));
        $this->assertWind($this->getAlertTO(), $alert->getAlert("wind"));
        $this->assertStorm($this->getAlertTO(), $alert->getAlert("storm"));
        $this->assertTornado($this->getAlertTO(), $alert->getAlert("tornado"));
        $this->assertPrecipitation($this->getAlertTO(), $alert->getAlert("precipitation"));
    }

    /**
     * @covers BurzeDzisNet\BurzeDzisNet::getWeatherAlert
     * @expectedException SoapFault
     */
    public function testGetWeatherAlertSoapFault()
    {
        $soapFault = $this->getMockBuilder("SoapFault")->disableOriginalConstructor()->getMock();
        $client = $this->getMockBuilder("SoapClient")
            ->disableOriginalConstructor()
            ->setMethods(["ostrzezenia_pogodowe"])
            ->getMock();
        $client->expects($this->once())->method("ostrzezenia_pogodowe")->with(54.41, 25.17, "4d36bcb5c40");
        $client->method("ostrzezenia_pogodowe")->willThrowException($soapFault);
        $endpoint = $this->getMockBuilder("BurzeDzisNet\Endpoint")
            ->disableOriginalConstructor()
            ->setMethods(["getClient", "getApiKey"])
            ->getMock();
        $endpoint->method("getClient")->willReturn($client);
        $endpoint->method("getApiKey")->willReturn("4d36bcb5c40");
        (new BurzeDzisNet($this->getEndpoint($client)))->getWeatherAlert(new Point(25.17, 54.41));
    }

    /**
     * Get Storm data object
     *
     * @return stdClass
     */
    protected function getStormTO()
    {
        $storm = new stdClass;
        $storm->liczba = 14;
        $storm->odleglosc = 80.72;
        $storm->kierunek = "NE";
        $storm->okres = 10;
        return $storm;
    }

    /**
     * Get Alert transfer object
     *
     * @return stdClass alert transfer object
     */
    protected function getAlertTO()
    {
        $alert = new stdClass();
        $alert->mroz = 1;
        $alert->mroz_od_dnia = "2015-12-10";
        $alert->mroz_do_dnia = "2016-02-12";
        $alert->upal = 2;
        $alert->upal_od_dnia = "2015-04-14";
        $alert->upal_do_dnia = "2015-05-20";
        $alert->wiatr = 3;
        $alert->wiatr_od_dnia = "2015-06-13";
        $alert->wiatr_do_dnia = "2015-08-16";
        $alert->burza = 2;
        $alert->burza_od_dnia = "2015-11-24";
        $alert->burza_do_dnia = "2015-12-28";
        $alert->traba = 5;
        $alert->traba_od_dnia = "2015-01-02";
        $alert->traba_do_dnia = "2015-08-09";
        $alert->opad = 2;
        $alert->opad_od_dnia = "2015-03-29";
        $alert->opad_do_dnia = "2015-07-30";
        return $alert;
    }

    /**
     * Assert frost alert
     *
     * @param stdClass $alertTO alert transfer object
     * @param Alert $frost frost alert
     */
    protected function assertFrost(stdClass $alertTO, Alert $frost)
    {
        $this->assertSame($alertTO->mroz, $frost->getLevel());
        $this->assertSame($alertTO->mroz_od_dnia, $frost->getStartDate());
        $this->assertSame($alertTO->mroz_do_dnia, $frost->getEndDate());
    }

    /**
     * Assert heat alert
     *
     * @param stdClass $alertTO alert transfer object
     * @param Alert $heat heat alert
     */
    protected function assertHeat(stdClass $alertTO, Alert $heat)
    {
        $this->assertSame($alertTO->upal, $heat->getLevel());
        $this->assertSame($alertTO->upal_od_dnia, $heat->getStartDate());
        $this->assertSame($alertTO->upal_do_dnia, $heat->getEndDate());
    }

    /**
     * Assert wind alert
     *
     * @param stdClass $alertTO alert transfer object
     * @param Alert $wind wind alert
     */
    protected function assertWind(stdClass $alertTO, Alert $wind)
    {
        $this->assertSame($alertTO->wiatr, $wind->getLevel());
        $this->assertSame($alertTO->wiatr_od_dnia, $wind->getStartDate());
        $this->assertSame($alertTO->wiatr_do_dnia, $wind->getEndDate());
    }

    /**
     * Assert storm alert
     *
     * @param stdClass $alertTO alert transfer object
     * @param Alert $storm storm alert
     */
    protected function assertStorm(stdClass $alertTO, Alert $storm)
    {
        $this->assertSame($alertTO->burza, $storm->getLevel());
        $this->assertSame($alertTO->burza_od_dnia, $storm->getStartDate());
        $this->assertSame($alertTO->burza_do_dnia, $storm->getEndDate());
    }

    /**
     * Assert tornado alert
     *
     * @param stdClass $alertTO alert transfer object
     * @param Alert $tornado tornado alert
     */
    protected function assertTornado(stdClass $alertTO, Alert $tornado)
    {
        $this->assertSame($alertTO->traba, $tornado->getLevel());
        $this->assertSame($alertTO->traba_od_dnia, $tornado->getStartDate());
        $this->assertSame($alertTO->traba_do_dnia, $tornado->getEndDate());
    }

    /**
     * Assert precipitation alert
     *
     * @param stdClass $alertTO alert transfer object
     * @param Alert $precipitation precipitation alert
     */
    protected function assertPrecipitation(stdClass $alertTO, Alert $precipitation)
    {
        $this->assertSame($alertTO->opad, $precipitation->getLevel());
        $this->assertSame($alertTO->opad_od_dnia, $precipitation->getStartDate());
        $this->assertSame($alertTO->opad_do_dnia, $precipitation->getEndDate());
    }

    /**
     * Get mocked endpoint with soap client
     *
     * @param SoapClient soap client
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getEndpoint(SoapClient $client)
    {
        $endpoint = $this->getMockBuilder("BurzeDzisNet\Endpoint")
            ->disableOriginalConstructor()
            ->setMethods(["getClient", "getApiKey"])
            ->getMock();
        $endpoint->method("getClient")->willReturn($client);
        $endpoint->method("getApiKey")->willReturn("4d36bcb5c40");
        return $endpoint;
    }

}
