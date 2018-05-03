<?php


namespace App\Controllers;


use App\Repositories\UserRepository;

class AuthController {
	protected $repository;

	public function __construct() {
		$this->repository = new UserRepository();
	}

	function register() {

		if (is_null($_POST['name']) || is_null($_POST['password'])) {
			redirect(url('/'));
		}
		$conn = db()->connection();
		$name = $conn->real_escape_string($_POST['name']);
		$email = $conn->real_escape_string($_POST['email']);
		$phone = $conn->real_escape_string($_POST['phone']);
		$password = $conn->real_escape_string($_POST['password']);

		$user = $this->repository->insert(compact('name', 'email', 'phone', 'password'));
		$_SESSION['user'] = $user;

		redirect(url('/'));

	}

	function login() {

		if (empty($_POST['name']) || empty($_POST['password'])) {
			redirect(url('/'));
		}
		$user_name = db()->connection()->real_escape_string($_POST['name']);
		$user = $this->repository->find(['name' => $user_name]);
		$password = $_POST['password'];
		if (is_null($user)) {
			redirect(url('/'));
			return;
		}
		if ($user_name != $user->name || $password != $user->password) {
			redirect(url('/'));
			return;
		}
		if ($user->name == ADMIN_USERNAME && $user->password == ADMIN_PASSWORD) {
			$user->is_admin = true;
			redirect(url('/admin/products'));
		} else {
			redirect(url('/'));
		}
		$_SESSION['user'] = $user;
	}


	function logout() {
		if (isset($_SESSION['user'])) {
			unset($_SESSION['user']);
		}
		redirect(url('/'));
	}


}