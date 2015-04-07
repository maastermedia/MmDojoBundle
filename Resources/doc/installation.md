Installation
============

Prerequisites
-------------

**Translations**
If you wish to use translation, you have to make sure you have translator
enabled in your config.

``` yaml
# app/config/config.yml
framework:
    translator: ~
```

Installation
------------

Download DojoBundle to the ``vendor`` directory. You can use the Symfony's vendor
script for the automated procces. Add the following in your ``deps`` file:

```
[DojoBundle]
    git=http://github.com/maastermedia/DojoBundle.git
    target=/bundles/Dojo/DojoBundle
```

and run the vendors script to download bundle::

``` bash
php bin/vendors install
```

If you prefer instead to use git submodules, then run the following:

``` bash
git submodule add http://github.com/maastermedia/DojoBundle.git vendor/bundles/Dojo/DojoBundle
git submodule update --init
```

Next, be sure to enable Dojo bundle in your autoload.php and AppKernel.php files:

``` php
// app/AppKernel.php
public function registerBundles()
{
    return array(
        // ...
        new Dojo\DojoBundle\DojoBundle(),
        // ...
    );
}
```