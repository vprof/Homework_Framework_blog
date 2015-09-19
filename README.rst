This is a PHP micro-framework to develop websites.
Framework works with PHP 5.4 or later.

.. code-block:: php

<?php

require_once(__DIR__ . '/../Framework/Loader.php');

$loader = Loader::getInstance();
$loader->addNamespacePath('Blog\\',__DIR__.'/../src/Blog');
$loader->addNamespacePath('Framework\\',__DIR__.'/../framework');
$loader->register();

$application = new \Framework\Application(__DIR__.'/../app/config/config.php');
$application->run();

Silex, a simple Web Framework
=============================

Silex is a PHP micro-framework to develop websites based on `Symfony
components`_:

.. code-block:: php

    <?php

    require_once __DIR__.'/../vendor/autoload.php';

    $app = new Silex\Application();

    $app->get('/hello/{name}', function ($name) use ($app) {
      return 'Hello '.$app->escape($name);
    });

    $app->run();

Silex works with PHP 5.5.9 or later.
