# BurzeDzisNet

PHP client for burze.dzis.net API

## Example of usage
```php
  namespace BurzeDzisNet;

  $burzeDzisNet = new BurzeDzisNet(
      new Client(
          'https://www.burze.dzis.net/soap.php?WSDL',
          'Your credentials'
      )
  );
  
  $storm = $burzeDzisNet->findStorm(
      $burzeDzisNet->getLocation("Wrocław"),
      25
  );  
```
