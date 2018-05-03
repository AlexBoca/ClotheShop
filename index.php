<?php

spl_autoload_register(function ($class_name) {
	include __DIR__ . '/' . $class_name . '.php';
});

require 'config.php';
include 'common.php';

session_start();

//unset($_SESSION['cart']);

if (!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = new \App\Cart();
}
//dd($_SESSION['cart']->deleteAll());
$route = new \App\Route();
include 'routes.php';


/*
 * Obtinem controlerul pe baza requestului
 *
 * */

$request_url = str_replace('/' . SITE_NAME, '', $_SERVER['REQUEST_URI']);
if (strpos($request_url, '?') !== false) {
	$request_url = explode('?', $request_url)[0];
}


$route = $route->get($request_url);


$controller = new $route['controller'];

call_user_func([$controller, $route['action']]);
db()->connection()->close();
















