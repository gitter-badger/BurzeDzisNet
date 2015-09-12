## About burze.dzis.net website

The following website is created for users who seek for a solution, which can enable them to receive notification on weather hazards such as: lightnings, tornadoes, strong winds, heavy precipitation and low and high air temperatures.

Visit [burze.dzis.net](http://www.burze.dzis.net) for more details

## Access to burze.dzis.net

To get your credentials create free account on burze.dzis.net and request for API Key.

## Aplication programming interface

#### Creating remote client

```php
namespace BurzeDzisNet;

$burzeDzisNet = new BurzeDzisNet(new Endpoint('Your API key'));
```

#### Getting coordinates for the locality

```php
$madrid = $burzeDzisNet->locate("Madrid");
```

#### Getting storm report

```php
$burzeDzisNet->getStorm($madrid, 50);
```

#### Getting weather alert
```php
$alert = $burzeDzisNet->getWeatherAlert($madrid);

$frost = $alert->getAlert('frost');
$heat = $alert->getAlert('heat');
$storm = $alert->getAlert('storm');
$wind = $alert->getAlert('wind');
$tornado = $alert->getAlert('tornado');
$precipitation $alert->getAlert('precipitation');
```

## Other remote calls

#### Verifying API key

```php
$authorized = $burzeDzisNet->verifyApiKey("Some API key");
```

