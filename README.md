# phan-plugins
This is the repository of custom plugins for [Phan](https://github.com/phan/phan) (is a static analyzer for PHP).

## Setup
Install [php-ast](https://github.com/nikic/php-ast).

```
$ pecl install ast
```

Install `phan` with composer.

```bash
$ composer install
```

## Run

```bash
$ composer run phan
> PHAN_DISABLE_XDEBUG_WARN=1 vendor/bin/phan
example/InhibitedFunctions.php:18 InhibitedFunctions Do not use extract().
example/InhibitedVariables.php:13 InhibitedVariables Do not use $GLOBALS.
Script PHAN_DISABLE_XDEBUG_WARN=1 vendor/bin/phan handling the phan event returned with error code 1
```
