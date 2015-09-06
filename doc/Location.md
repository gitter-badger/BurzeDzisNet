# Location

```php
  namespace BurzeDzisNet;

  $burzeDzisNet = new BurzeDzisNet(
      new Credential(
          'https://www.burze.dzis.net/soap.php?WSDL',
          'Your API key'
      )
  );
  
  $location = $burzeDzisNet->getLocation("Madrid");
```

```
object(BurzeDzisNet\Location)#3 (3) {
    ["x":protected]=>
    float(-3.41)
    ["y":protected]=>
    float(40.23)
    ["name":protected]=>
    string(6) "Madrid"
  }
```
