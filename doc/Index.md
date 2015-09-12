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
$burzeDzisNet->locate("Madrid");
```

#### Getting storm report

If you're interested in information about storm - check if a given point with a specified radius of monitoring registered lightnings.

```php
$burzeDzisNet->getStorm($burzeDzisNet->getLocation("Madrid"), 50);
```

You can ommit locating call, if you know exactly coordinates of point you are intrested in.

```php
$burzeDzisNet->getStormReport(new Point(-3.41, 40.23, "Madrid"), 50);
```

#### Getting weather alert
```php
$alert = $burzeDzisNet->getWeatherAlert($burzeDzisNet->getLocation("Madrid"));

$frost = $alert->getAlert('frost');
$heat = $alert->getAlert('heat');
$storm = $alert->getAlert('storm');
$wind = $alert->getAlert('wind');
$tornado = $alert->getAlert('tornado');
$precipitation $alert->getAlert('precipitation');
```

#### Iterating over alerts
```php
$alert = $burzeDzisNet->getWeatherAlert($burzeDzisNet->getLocation("Madrid"));

foreach($alert as $name => $data) {
    // string $name alert name
    // BurzeDzisNet/Alert $data alert data
}
```


## Other remote calls

#### Verifying API key

Check if a given API key is authorized by burze.dzis.net soap server.

```php
$burzeDzisNet->verifyApiKey("Some API key");
```

