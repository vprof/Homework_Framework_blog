A simple Web Framework
=============================

Silex is a PHP micro-framework to develop websites based on `Symfony


.. code-block:: php

    <?php

    require_once(__DIR__ . '/../Framework/Loader.php');

    $loader = Loader::getInstance();
    $loader->addNamespacePath('Blog\\',__DIR__.'/../src/Blog');
    $loader->addNamespacePath('Framework\\',__DIR__.'/../framework');
    $loader->register();

    $application = new \Framework\Application(__DIR__.'/../app/config/config.php');
    $application->run();

Framework works with PHP 5.4 or later.
