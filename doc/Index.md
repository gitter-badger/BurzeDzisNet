## About burze.dzis.net website

The following website is created for users who seek for a solution, which can enable them to receive notification on weather hazards such as: lightnings, tornadoes, strong winds, heavy precipitation and low and high air temperatures.

The website offers API for requesting for storm information on __Poland, Croatia, Czech, Germany, Nederlands, Slovakia, Slovenia teritories and boundries of Europe and provides weather alert for Poland__: intense frost/heat, strong wing intense participation (rainfall and snowfall), storms and tornados.

Visit [burze.dzis.net](http://www.burze.dzis.net) for more details


## Access to burze.dzis.net API

To get your credentials create free account on burze.dzis.net and request for API Key for your application.


## Remote calls

#### Creating remote client

```php
namespace BurzeDzisNet;

$burzeDzisNet = new BurzeDzisNet(
    new Endpoint('Your API key')
);
```

#### Getting location

Get the coordinates for the specified locality according to the list of village on the burze.dzis.net website.

```php
$burzeDzisNet->getLocation("Madrid");
```

#### Finding a storm

If you're interested in information about storm - check if a given point with a specified radius of monitoring registered lightnings.

```php
$burzeDzisNet->getStorm(
    $burzeDzisNet->getLocation("Madrid"),
    50 // radius of monitoring (km)
);
```

If you know exactly coordinates of location you are intrested in, you can ommit remote locating call.

```php
$burzeDzisNet->getStorm(
    new Location(-3.41, 40.23, "Madrid"),
    50
);
```

## Other remote calls

#### Verifying API key

Check if a given API key is authorized by burze.dzis.net soap server.

```php
$burzeDzisNet->verifyApiKey("Verified API key");
```

