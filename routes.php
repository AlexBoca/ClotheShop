<?php

$route->add('/', \App\Controllers\PageController::class, 'home');
$route->add('/cart', \App\Controllers\CartController::class, 'index');
$route->add('/cart/store', \App\Controllers\CartController::class, 'store');
$route->add('/cart/delete', \App\Controllers\CartController::class, 'delete');
$route->add('/cart/delete/all', \App\Controllers\CartController::class, 'deleteAll');
$route->add('/cart/send/email', \App\Controllers\CartController::class, 'sendEmail');
$route->add('/login', \App\Controllers\AuthController::class, 'login');
$route->add('/logout', \App\Controllers\AuthController::class, 'logout');
$route->add('/register', \App\Controllers\AuthController::class, 'register');

if (isset($_SESSION['user']) && $_SESSION['user']->is_admin) {
	$route->add('/admin/products', \App\Controllers\ProductController::class, 'index');
	$route->add('/admin/product/create', \App\Controllers\ProductController::class, 'create');
	$route->add('/admin/product/delete', \App\Controllers\ProductController::class, 'delete');
	$route->add('/admin/product/update', \App\Controllers\ProductController::class, 'update');
	$route->add('/admin/product/edit', \App\Controllers\ProductController::class, 'edit');
	$route->add('/admin/product/store', \App\Controllers\ProductController::class, 'store');
}