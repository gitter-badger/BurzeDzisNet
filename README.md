# BurzeDzisNet

PHP client for [Burze.Dzis.Net](https://burze.dzis.net)

## Example

##### Creating client

```php
namespace BurzeDzisNet;

$burzeDzisNet = new BurzeDzisNet(
    new Endpoint('Your API key')
);
```
##### Locating Madrid
```php
$Madrid = $burzeDzisNet->getLocation("Madrid");
```
##### Finding a storm in a radius of 50 km from Madrid

```php
$storm = $burzeDzisNet->findStorm($Madrid, 50);
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
