# BurzeDzisNet

PHP client for [burze.dzis.net](https://burze.dzis.net)

# Example of usage

###### Getting a storm report for the Madrid

```php

    namespace BurzeDzisNet;
    
    $burzeDzisNet = new BurzeDzisNet(new Endpoint('Your API key'));
    $report = $burzeDzisNet->getStormReport($burzeDzisNet->locate("Madrid"));
    
```

# Class design

- __Completely immutable__
- Declarative over imperative
- No static methods, static properties, public constants or other helpers
- No null references
- Fully testing

# Resources
- [Documentation](https://github.com/krzysiekpiasecki/BurzeDzisNet/blob/master/doc/Index.md)
- [Application programming interface](https://github.com/krzysiekpiasecki/BurzeDzisNet/blob/master/doc/api/API-documentation.zip)
- [UML Class Diagram](https://github.com/krzysiekpiasecki/BurzeDzisNet/blob/master/doc/ClassDiagram.md)
- [Software metrics](https://github.com/krzysiekpiasecki/BurzeDzisNet/blob/master/doc/SoftwareMetrics.md)
- [Project licence](https://github.com/krzysiekpiasecki/BurzeDzisNet/blob/master/LICENCE.md)
