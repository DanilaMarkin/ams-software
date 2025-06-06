<?php

// Константы
define("ROOT", dirname(__DIR__)); // Корневая папка
define("APP", ROOT . "/app");
define("CONTROLLERS", APP . "/controllers");
define("CORE", APP . "/core");
define("DATABASE", APP . "/database");
define("MODELS", APP . "/models");
define("VIEWS", APP . "/views");
define("PARTIALS", VIEWS . "/partials");
define("PUBLIC", ROOT . "/public");
define("JS", "/assets/js");


require_once CORE . "/Router.php"; // Маршрутизатор

$router = new Router();

$router->addRoute('/', 'CarController', 'displayCarsBeforeDate');
$router->addRoute('/cars-above-1000', 'CarController', 'displayCarsWithWork');
$router->addRoute('/sort-by-body', 'CarController', 'displayAllCarsSortedByBodyType');

$router->handleRequest();