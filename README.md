# BurzeDzisNet

PHP client for [burze.dzis.net](https://burze.dzis.net)

## Finding a storm

```php
  namespace BurzeDzisNet;

  $burzeDzisNet = new BurzeDzisNet(
      new Enpoint('Your API key')
  );
  
  $storm = $burzeDzisNet->findStorm(
      $burzeDzisNet->getLocation("Wrocław"),
      50
  );  
```

## Class design

- Completely immutable
- Declarative over imperative
- No static methods, properties, consts
- No null references

## Resources
- [Documentation](https://github.com/krzysiekpiasecki/BurzeDzisNet/blob/master/doc/index.md)
- [Application programming interface](https://github.com/krzysiekpiasecki/BurzeDzisNet/blob/master/doc/api/API-documentation.zip)
- [UML Class Diagram](https://github.com/krzysiekpiasecki/BurzeDzisNet/blob/master/doc/ClassDiagram.md)
- [Software metrics](https://github.com/krzysiekpiasecki/BurzeDzisNet/blob/master/doc/SoftwareMetrics.md)
- [Project licence](https://github.com/krzysiekpiasecki/BurzeDzisNet/blob/master/LICENCE.md)
