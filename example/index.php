<?php

namespace BurzeDzisNet;

require_once "../vendor/autoload.php";

// User configuration

define("API_KEY", "Your API key");
define("MY_LOCATION", "Wrocław");
define("MONITORING_RADIUS", 50);

try {

    $burzeDzisNet = new BurzeDzisNet(
        new Endpoint(\API_KEY)
    );

    $point = $burzeDzisNet->locate(\MY_LOCATION);
    $storm = $burzeDzisNet->getStorm($point, \MONITORING_RADIUS);
    $weatherAlert = $burzeDzisNet->getWeatherAlert($point);

    include_once "template.html";

} catch (\Exception $e) {
    \error_log($e);
    throw $e;
}