<?php


namespace App\Controllers;

use App\Repositories\ProductRepository;

class PageController {

	function home() {
		view('home', ['products' => (new ProductRepository())->all()]);
	}


}