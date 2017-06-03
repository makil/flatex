# Expressive Skeleton and Installer



## Skeleton Development

This section applies only if you cloned this repo with `git clone`, not when you
installed expressive with `composer create-project ...`.

If you want to run tests against the installer, you need to clone this repo and
setup all dependencies with composer.  Make sure you **prevent composer running
scripts** with `--no-scripts`, otherwise it will remove the installer and all
tests.

```bash
$ composer update --no-scripts
$ composer test
```

