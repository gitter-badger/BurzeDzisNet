# About burze.dzis.net website

The following website is created for users who seek for a solution, which can enable them to receive notification on weather hazards such as: lightnings, tornadoes, strong winds, heavy precipitation and low and high air temperatures.

Visit [burze.dzis.net](http://www.burze.dzis.net) for more details

# Access to burze.dzis.net

To get your credentials create free account on burze.dzis.net and request for API Key.

# Aplication programming interface

###### Remote client

```php
namespace BurzeDzisNet;

$burzeDzisNet = new BurzeDzisNet(new Endpoint('Your API key'));
```

###### Coordinates for the locality

```php
$madrid = $burzeDzisNet->locate("Madrid");
```

###### Storm report

```php
$burzeDzisNet->getStormReport($madrid);
```

###### Weather alert


```php
$weatherAlert = $burzeDzisNet->getWeatherAlert($madrid);

$frost = $weatherAlert->getAlert('frost');
$heat = $weatherAlert->getAlert('heat');
$storm = $weatherAlert->getAlert('storm');
$wind = $weatherAlert->getAlert('wind');
$tornado = $weatherAlert->getAlert('tornado');
$precipitation = $weatherAlert->getAlert('precipitation');
```

# Resources for programmers
- [Application programming interface](https://github.com/krzysiekpiasecki/BurzeDzisNet/blob/master/doc/api/API-documentation.zip)
- [UML Class Diagram](https://github.com/krzysiekpiasecki/BurzeDzisNet/blob/master/doc/ClassDiagram.md)
- [Software metrics](https://github.com/krzysiekpiasecki/BurzeDzisNet/blob/master/doc/SoftwareMetrics.md)


