# About burze.dzis.net website

The following website is created for users who seek for a solution, which can enable them to receive notification on weather hazards such as: lightnings, tornadoes, strong winds, heavy precipitation and low and high air temperatures.

Visit [burze.dzis.net](http://www.burze.dzis.net) for more details

# Access to burze.dzis.net

To get your credentials create free account on burze.dzis.net and request for API key.

# Aplication programming interface

__Remote client__

```php
    $burzeDzisNet = new \BurzeDzisNet\BurzeDzisNet(
        new \BurzeDzisNet\Endpoint('Your API key')
    );
```


__Locality coordinates__

```php
    $madrid = $burzeDzisNet->locate("Madrid");
```

__Storm report__

```php
    $report = $burzeDzisNet->getStormReport($madrid);
```

__Weather alert__


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
- [Application programming interface](https://github.com/krzysiekpiasecki/BurzeDzisNet/blob/master/docs/api/API-documentation.zip)
- [Software metrics](https://github.com/krzysiekpiasecki/BurzeDzisNet/blob/master/docs/SoftwareMetrics.md)


