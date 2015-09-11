# Point

```php
  namespace BurzeDzisNet;

  $burzeDzisNet = new BurzeDzisNet(
      new Endpoint(
          'https://www.burze.dzis.net/soap.php?WSDL',
          'Your API key'
      )
  );
  
  $point = $burzeDzisNet->getLocation("Madrid");
```

```
object(BurzeDzisNet\Point)#3 (3) {
    ["x":protected]=>
    float(-3.41)
    ["y":protected]=>
    float(40.23)
    ["name":protected]=>
    string(6) "Madrid"
  }
```
