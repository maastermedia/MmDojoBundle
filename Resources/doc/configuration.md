Configuration
=============

``` yaml
#app/config/config.yml
dojo:
    dojo_config:
        async: true
        parseOnLoad: true
        isDebug: false
        locale: de-de
        packages:
            -
              name: X
              location: <route_to_x>
    theme: claro
```

Twig functions:
- dojo_config()

Twig globals:
- dojo_theme