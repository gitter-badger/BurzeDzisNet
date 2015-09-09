# Documentation

## Creating remote client

```php
namespace BurzeDzisNet;

$burzeDzisNet = new BurzeDzisNet(
    new Endpoint('Your API key')
);
```

## Remote calls

#### Getting location

Get the coordinates for the specified locality according to the list of village on the burze.dzis.net website.

```php
$burzeDzisNet->getLocation("Madrid");
```

#### Finding a storm

If you're interested in information about Storm - check if a given point with a specified radius of monitoring registered lightnings.

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

Check if a given API key is athorized by burze.dzis.net soap server.

```php
$burzeDzisNet->verifyApiKey("Verified API key");
```

