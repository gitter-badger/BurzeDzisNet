# searchStorm


```php
  namespace BurzeDzisNet;

  $burzeDzisNet = new BurzeDzisNet(
      new Credential(
          'https://www.burze.dzis.net/soap.php?WSDL',
          'Your API key'
      )
  );
  
  $storm = $burzeDzisNet->searchStorm(
      $burzeDzisNet->getLocation("Madrid"),
      50
  );  
```

```
object(BurzeDzisNet\Storm)#5 (6) {
  ["number":protected]=>
  int(2)
  ["distance":protected]=>
  float(17.18)
  ["direction":protected]=>
  string(2) "SW"
  ["period":protected]=>
  int(15)
  ["radius":protected]=>
  int(50)
  ["location":protected]=>
  object(BurzeDzisNet\Location)#3 (3) {
    ["x":protected]=>
    float(-3.41)
    ["y":protected]=>
    float(40.23)
    ["name":protected]=>
    string(6) "Madrid"
  }
}
```