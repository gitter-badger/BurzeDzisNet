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

## Class design

- Totally immutable,
- Declarative over imperative,
- Without static methods, properties, public consts,
- No null references

## Resources
- [Documentation](https://github.com/krzysiekpiasecki/BurzeDzisNet/blob/master/doc/index.md)
- [Application programming interface](https://github.com/krzysiekpiasecki/BurzeDzisNet/blob/master/doc/api/API-documentation.zip)
- [UML Class Diagram](https://github.com/krzysiekpiasecki/BurzeDzisNet/blob/master/doc/ClassDiagram.md)
- [Software metrics](https://github.com/krzysiekpiasecki/BurzeDzisNet/blob/master/doc/SoftwareMetrics.md)
- [Project licence](https://github.com/krzysiekpiasecki/BurzeDzisNet/blob/master/LICENCE.md)
