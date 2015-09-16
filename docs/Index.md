# About burze.dzis.net website

The following website is created for users who seek for a solution, which can enable them to receive notification on weather hazards such as: lightnings, tornadoes, strong winds, heavy precipitation and low and high air temperatures.

Visit [burze.dzis.net](http://www.burze.dzis.net) for more details

# Access to aplication programming interface

To get your credentials create free account on burze.dzis.net and request for API key.

# Remote calls

#### Verification of Api Key
#### Locality coordinates
#### Storm information
#### Weather aler

#### Example of usage 
```php
namespace BurzeDzisNet;

try {

    $burzeDzisNet = new BurzeDzisNet(
        new Endpoint('Api Key')
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


