<?php
use Application\Controllers\HomeController;
use Application\Controllers\ContactController;
use Application\Providers\Doctrine;


return [

  'config.database' => function() {
    return parse_ini_file(base_path('app/Config/database.ini'));
  },
  HomeController::class => \DI\create()->constructor(\DI\get(Doctrine::class)),
  ContactController::class => \DI\create()->constructor(\DI\get(Doctrine::class)),

  Doctrine::class => function(\Psr\Container\ContainerInterface $container) {
    return new Doctrine($container);
  }
];



