# BurzeDzisNet

PHP client for [burze.dzis.net](https://burze.dzis.net)

## Example of usage

```php
    namespace BurzeDzisNet;
    
    $burzeDzisNet = new BurzeDzisNet(new Endpoint('Your API key'));
    $report = $burzeDzisNet->getStormReport($burzeDzisNet->locate("Madrid"));
```

## Class design

__Completely immutable__ - Declarative over imperative - Fully tested - Low complexity - No static methods, static properties, public constants - No null references

##Resources
- [Documentation](https://github.com/krzysiekpiasecki/BurzeDzisNet/blob/master/docs/Index.md)
- [Application programming interface](https://github.com/krzysiekpiasecki/BurzeDzisNet/blob/master/docs/api/API-documentation.zip)
- [Software metrics](https://github.com/krzysiekpiasecki/BurzeDzisNet/blob/master/docs/SoftwareMetrics.md)
