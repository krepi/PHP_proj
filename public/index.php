<?php
require_once('debug.php');
require('..\app\config.php');
require ('..\app\Routes.php');

session_start();
use Krepski\Php_proj\Routes;

$route = new \Krepski\Php_proj\Routes();

$route->callLandingPage($_SERVER['REQUEST_URI']);






