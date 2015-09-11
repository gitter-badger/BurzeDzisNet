<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace BurzeDzisNet;

use SoapFault;

/**
 * Burze.Dzis.Net service
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class BurzeDzisNet
{
    /**
     * Soap client
     *
     * @var \SoapClient Soap client
     */
    protected $client = null;

    /**
     * API key
     *
     * @var string API key
     */
    protected $apiKey = null;

    /**
     * New Burze.Dzis.Net service
     *
     * @param EndpointInterface $endpoint entry point to a burze.dzis.net
     */
    public function __construct(EndpointInterface $endpoint)
    {
        $this->client = $endpoint->getClient();
        $this->apiKey = $endpoint->getApiKey();
    }

    /**
     * Indicates whether given API key is valid
     *
     * @param string $apiKey API key
     * @return bool true if API key is valid; otherwise false
     * @throws \SoapFault soap error
     */
    public function verifyApiKey($apiKey)
    {
        return $this->client->KeyApi($apiKey);
    }

    /**
     * Get {@see Point}
     *
     * If no location returns coordinates [0,0]
     *
     * @param string $name location name
     * @return Point location coordinates
     * @throws \SoapFault soap error
     */
    public function locate($name)
    {
        $dto = $this->client->miejscowosc($name, $this->apiKey);
        return new Point(
            $dto->x,
            $dto->y
        );
    }

    /**
     * Get storm report
     *
     * Storm object provide information about registered lightnings with a specified radius of monitoring
     * covered by the given location
     *
     * @param Point $point monitored location
     * @param int $radius radius of monitoring (default 25 km)
     * @return Storm information about registered lightnings
     * @throws \SoapFault soap error
     */
    public function getStormReport(Point $point, $radius = 25)
    {
        $dto = $this->client->szukaj_burzy(
            $point->getY(),
            $point->getX(),
            $radius,
            $this->apiKey
        );
        return new Storm(
            $dto->liczba,
            $dto->odleglosc,
            $dto->kierunek,
            $dto->okres,
            $radius
        );
    }

    /**
     * Get weather alert for given point
     *
     * @param Point $point location coordinates
     * @return WeatherAlert weather alerts
     */
    public function getWeatherAlert(Point $point)
    {
        $dto = $this->client->ostrzezenia_pogodowe(
            $point->getX(),
            $point->getY(),
            $this->apiKey
        );
        return (new WeatherAlert())
            ->withAlert(
                "frost",
                new Alert(
                    $dto->mroz,
                    $dto->mroz_od_dnia,
                    $dto->mroz_do_dnia
                )

            )->withAlert(
                "heat",
                new Alert(
                    $dto->upal,
                    $dto->upal_od_dnia,
                    $dto->upal_do_dnia
                )

            )->withAlert(
                "wind",
                new Alert(
                    $dto->wiatr,
                    $dto->wiatr_od_dnia,
                    $dto->wiatr_do_dnia
                )

            )->withAlert(
                "storm",
                new Alert(
                    $dto->burza,
                    $dto->burza_od_dnia,
                    $dto->burza_do_dnia
                )

            )->withAlert(
                "tornado",
                new Alert(
                    $dto->traba,
                    $dto->traba_od_dnia,
                    $dto->traba_do_dnia
                )

            )->withAlert(
                "precipitation",
                new Alert(
                    $dto->opad,
                    $dto->opad_od_dnia,
                    $dto->opad_do_dnia
                )
            );
    }
}