<?php

require_once(__DIR__ . '/../Framework/Loader.php');
$loader->addNamespacePath('Blog\\',__DIR__.'/../src/Blog');
$loader->addNamespacePath('Framework\\',__DIR__.'/../framework');

$app = new \Framework\Application(__DIR__.'/../app/config/config.php');
$app->run();
