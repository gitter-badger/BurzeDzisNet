# BurzeDzisNet

PHP client for [burze.dzis.net](https://burze.dzis.net)

#### Example of usage

__Getting a storm report for the Madrid__

```php
namespace BurzeDzisNet;

$burzeDzisNet = new BurzeDzisNet(new Endpoint('Your API key'));
$report = $burzeDzisNet->getStormReport($burzeDzisNet->locate("Madrid"));
```

#### Class design

__Completely immutable__ - Declarative over imperative - Fully tested - No static methods, static properties, public constants or other helpers - No null references

#### Resources
- [Documentation](https://github.com/krzysiekpiasecki/BurzeDzisNet/blob/master/doc/Index.md)
- [Application programming interface](https://github.com/krzysiekpiasecki/BurzeDzisNet/blob/master/docs/api/API-documentation.zip)
- [UML Class Diagram](https://github.com/krzysiekpiasecki/BurzeDzisNet/blob/master/docs/ClassDiagram.md)
- [Software metrics](https://github.com/krzysiekpiasecki/BurzeDzisNet/blob/master/docs/SoftwareMetrics.md)
- [Project licence](https://github.com/krzysiekpiasecki/BurzeDzisNet/blob/master/LICENCE.md)
