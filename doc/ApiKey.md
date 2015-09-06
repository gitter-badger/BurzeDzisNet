# ApiKey

```php
  namespace BurzeDzisNet;

  $burzeDzisNet = new BurzeDzisNet(
      new Credential(
          'https://www.burze.dzis.net/soap.php?WSDL',
          'Your API key'
      )
  );
  
  $credible = $burzeDzisNet->apiKey("Some other Api Key");
```