# Drupal8 Custom Plugin(Calculator) Type

Drupal module demonstrating, how to create a custom plugin type(manager). This module provides a new plugin type "Calculator".

To add a new calculator plugin use the below anotation. 

```
/**
 * @Calculator(
 *   id = "area_calculator",
 *   title = "Area Calculator",
 *   description = @Translation("Area Calculator"),
 * )
 */
```
