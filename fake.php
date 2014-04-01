<?php

// require the Faker autoloader
require_once 'vendor/autoload.php';

// // setup the autoloading
// require_once '/vendor/autoload.php';
use Propel\Runtime\Propel;
use Propel\Runtime\Connection\ConnectionManagerSingle;
$serviceContainer = Propel::getServiceContainer();
$serviceContainer->setAdapterClass('bookstore', 'mysql');
$manager = new ConnectionManagerSingle();
$manager->setConfiguration(array (
  'dsn'      => 'mysql:host=localhost;dbname=change',
  'user'     => '',
  'password' => '',
));
$serviceContainer->setConnectionManager('bookstore', $manager);

// use Monolog\Logger;
// use Monolog\Handler\StreamHandler;
// $defaultLogger = new Logger('defaultLogger');
// $defaultLogger->pushHandler(new StreamHandler('/var/log/propel.log', Logger::WARNING));
// $serviceContainer->setLogger('defaultLogger', $defaultLogger);

// $generator = \Faker\Factory::create();
// $populator = new Faker\ORM\Propel\Populator($generator);
// $populator->addEntity('Author', 5);
// $populator->addEntity('Book', 10);
// $insertedPKs = $populator->execute();


