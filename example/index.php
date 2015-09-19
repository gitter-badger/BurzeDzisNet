<?php

namespace BurzeDzisNet;

require_once "../vendor/autoload.php";

define("API_KEY", "");
define("MY_LOCATION", "Budapest");
define("MONITORING_RADIUS", 250);

try {

    if (\API_KEY === "") {
        require_once "apikey.html";
        exit();
    }

    $burzeDzisNet = new BurzeDzisNet(
        new Endpoint(\API_KEY)
    );

    if ($burzeDzisNet->verifyApiKey(API_KEY) === false) {
        require_once "403.html";
        exit();
    }

    $point = $burzeDzisNet->locate(\MY_LOCATION);
    $storm = $burzeDzisNet->getStorm($point, \MONITORING_RADIUS);
    $weatherAlert = $burzeDzisNet->getWeatherAlert($point);


    require_once "layout.html";

} catch (\Exception $e) {
    \error_log($e);
    throw $e;
}
