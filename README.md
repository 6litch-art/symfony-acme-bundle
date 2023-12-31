# Symfony Skeleton Bundle

ACME Skeleton for the integration of third-party bundles
============================

Installation
-----------

This bundle is setup to provide a ready-to-use skeleton. It includes some alternatives in the configuration and some basic features.
You can install this bundle using the command:
```
composer require glitchr/acme-bundle # Use this line for the stable release
composer require --dev glitchr/acme-bundle:dev-admin # Use this line to get thee current work-in-progress branch
```

Bundle information
------------------

The configuration of the bundle is automatic, if you configured the autoconfiguration/autowire options in your symfony project.

The bundle contains:
- A service class called "AcmeService", this one can be autowire to any Symfony class
- A controller class pointing to route "http://yourdomain.com/acme"
- A model entity named "Anvil"
- A configuration file should be located in ./config/packages/acme_bundle.yaml
  (https://github.com/symfony/recipes-contrib, it depends on symfony flex package..)
- A public directory installed in ./public/bundles/acme/ that contains a 'dummy' directory named assets

How to setup a controller?
--------------------------

The class are only loaded if required in one class of your Symfony project
For instance an example class would be display the welcome page of the bundle.

```
// ./src/Controller/AcmeController.php
<?php

namespace Base\Controller;

use Twig\Environment;
use Acme\Bundle\Service\AcmeService;

class AcmeController extends \Acme\Bundle\Controller\AcmeController
{
    public function __construct(Environment $twig, AcmeService $service)
    {
    }
}
```
