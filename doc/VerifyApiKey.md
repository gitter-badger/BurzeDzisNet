# verifyApiKey

```php
  namespace BurzeDzisNet;

  $burzeDzisNet = new BurzeDzisNet(
      new Endpoint(
          'https://www.burze.dzis.net/soap.php?WSDL',
          'Your API key'
      )
  );
  
  $credible = $burzeDzisNet->verifyApiKey("Some other Api Key");
```