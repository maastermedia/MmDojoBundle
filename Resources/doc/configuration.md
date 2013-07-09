Configuration
=============

``` yaml
#app/config/config.yml
dojo:
    dojo_config:
        async: true
        parseOnLoad: true
        isDebug: false
        baseUrl: bundles/dojo/js/sources/dojo
        locale: de-de
        packages:
            -
              name: x
              location: <asset_path_to_x>
    theme: claro
```

Twig functions:
- dojo_config()

Twig globals:
- dojo_theme
- dojo_baseUrl, if baseUrl was configured 