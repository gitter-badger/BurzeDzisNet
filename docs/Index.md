# About burze.dzis.net website

The following website is created for users who seek for a solution, which can enable them to receive notification on weather hazards such as: lightnings, tornadoes, strong winds, heavy precipitation and low and high air temperatures.

Visit [burze.dzis.net](http://www.burze.dzis.net) for more details

# Access to aplication programming interface

To get your credentials create free account on burze.dzis.net and request for API key.

# Remote calls

##### boolean BurzeDzisNet::verifyApiKey(string $apiKey)
checks if a given API key is authorized

##### Point BurzeDzisNet::locate(string $localityName)
get the point representing DMS coordinates for the specified locality according to the list of village on the site

##### Storm BurzeDzisNet::getStorm(Point $locality, [int $monitoringRadius])
checks if a given point with a specified radius of monitoring registered lightnings

##### WeatherAlert BurzeDzisNet::getWeatherAlert(Point $locality)
checks if a given point, issued weather warnings. __Only the Polish area__.
 
#Example of usage 
```php
namespace BurzeDzisNet;

try {

    $burzeDzisNet = new BurzeDzisNet(
        new Endpoint('Api key')
    );

    $madrid = $burzeDzisNet->locate("Madrid");

    $storm = $burzeDzisNet->getStorm($madrid);
    $weatherAlert = $burzeDzisNet->getWeatherAlert($madrid);
    $heat = $weatherAlert->getAlert('heat');

    echo \sprintf("Madrid: Point (%.2f, %.2f) Lightnings: %d Heat: %d",
        $madrid->getX(),
        $madrid->getY(),
        $storm->getLightnings(),
        $heat->getLevel()
    );
    
} catch (\Exception $e) {
    \error_log($e);
    throw $e;
}

```

# Resources for programmers
- [Application programming interface](https://github.com/krzysiekpiasecki/BurzeDzisNet/blob/master/docs/api/API-documentation.zip)
- [Software metrics](https://github.com/krzysiekpiasecki/BurzeDzisNet/blob/master/docs/SoftwareMetrics.md)


