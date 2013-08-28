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

baseUrl and location paths in the packages array will automatically get processed
with ``asset``, so only asset paths can be used.

Assetic support in Twig templates:
Insert into config.yml the following configuration with the values of all possible themes:

```yaml
#app/config/config.yml
assetic:
    variables:
      dojo_theme: [claro, nihilo, soria, tundra]
```

In debug mode, you have to disable use of the controller.

You can now use the variable in your twig template like this, e.g. stylesheets:

```twig
#layout.html.twig
  {% stylesheets
      "bundles/dojo/js/dojo/resources/dojo.css"
      "bundles/dojo/js/dijit/themes/{dojo_theme}/{dojo_theme}.css"
     filter="dojocssrewrite" vars=["dojo_theme"] %}
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset_url }}" />
  {% endstylesheets %}
```

If you want to use css rewriting, you *have* to use the `dojocssrewrite` filter,
because the standard `cssrewrite` filter doesn't know the assetic variables.

*Important*: You can *not* use the @Bundle notation with Assetic variables.

After all is setup or if some templates are changed,
you need to dump the assets with the `console assetic:dump` command.
