# BurzeDzisNet

PHP client for [burze.dzis.net](https://burze.dzis.net)

## Example

##### Finding a storm in a radius of 50 km from Madrid

```php
namespace BurzeDzisNet;

$burzeDzisNet = new BurzeDzisNet(
    new Endpoint('Your API key')
);

$storm = $burzeDzisNet->getStormReport(
    $burzeDzisNet->locate("Madrid"),
    50
);
```

## Class design

- Completely immutable
- Declarative over imperative
- No static methods, static properties, public constants
- No null references

## Resources
- [Documentation](https://github.com/krzysiekpiasecki/BurzeDzisNet/blob/master/doc/Index.md)
- [Application programming interface](https://github.com/krzysiekpiasecki/BurzeDzisNet/blob/master/doc/api/API-documentation.zip)
- [UML Class Diagram](https://github.com/krzysiekpiasecki/BurzeDzisNet/blob/master/doc/ClassDiagram.md)
- [Software metrics](https://github.com/krzysiekpiasecki/BurzeDzisNet/blob/master/doc/SoftwareMetrics.md)
- [Project licence](https://github.com/krzysiekpiasecki/BurzeDzisNet/blob/master/LICENCE.md)
