<?php


namespace App\Controllers;


use App\Repositories\ProductRepository;

class ProductController {
	protected $repository;

	public function __construct() {
		$this->repository = new ProductRepository();
	}

	function index() {

		$products = $this->repository->all();
		view('admin.products-list', ['products' => $products]);
	}

	function create() {
		view('admin.product-form');
	}

	function edit() {
		/**
		 * verific daca exista variabila $product... si daca nu... intorc de unde a facut request-ul.
		 */
		if (!isset($_GET['product'])) {
			redirect(url('admin/products'));
		}
		$product_id = db()->connection()->real_escape_string($_GET['product']);
		$product = $this->repository->find(['id' => $product_id]);

		view('admin.product-form', ['product' => $product]);
	}

	function delete() {
		if (!isset($_GET['product'])) {
			redirect($_SERVER['HTTP_REFERER']);
		}
		$product_id = db()->connection()->real_escape_string($_GET['product']);
		$this->repository->delete(['id' => $product_id]);

		redirect(url('admin/products'));
	}

	function store() {
		$conn = db()->connection();
		if (is_null($_POST['title']) || is_null($_POST['price'])) {
			redirect(url('admin/product/create'));
		}
		$title = $conn->real_escape_string($_POST['title']);
		$description = $conn->real_escape_string($_POST['description']);
		$price = $conn->real_escape_string($_POST['price']);
		$image = $conn->real_escape_string($_POST['image']);
		$this->repository->insert(compact('title', 'description', 'price', 'image'));
		redirect(url('admin/products'));

	}

	function update() {
		if (!isset($_GET['product'])) {
			redirect($_SERVER['HTTP_REFERER']);
		}
		$conn = db()->connection();
		$product_id = $conn->real_escape_string($_GET['product']);
		if (is_null($this->repository->find(['id' => $product_id]))) {
			redirect(url('admin/products'));
		}
		if (is_null($_POST['title']) || is_null($_POST['price'])) {
			redirect(url('admin/products'));
		}
		$title = $conn->real_escape_string($_POST['title']);
		$description = $conn->real_escape_string($_POST['description']);
		$price = $conn->real_escape_string($_POST['price']);
		$image = $conn->real_escape_string($_POST['image']);
		$params = compact('title', 'description', 'price', 'image');

		$this->repository->update($params, ['id' => $product_id]);

		redirect(url('admin/products'));

	}

}