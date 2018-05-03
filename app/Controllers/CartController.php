<?php


namespace App\Controllers;

use App\Repositories\ProductRepository;

class CartController {
	function index() {
		$products = $_SESSION['cart']->all();
		view('/cart', ['products' => $products]);
	}

	function store() {
		$product_id = db()->connection()->real_escape_string($_GET['product']);
		if (empty($product_id)) {
			redirect($_SERVER['HTTP_REFERER']);
			return;
		}
		if ($_SESSION['cart']->has($product_id)) {
			redirect($_SERVER['HTTP_REFERER']);
			return;
		}
		$product = (new ProductRepository())->find(['id' => $product_id]);
		if ($product) {
			$_SESSION['cart']->add($product);
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	function delete() {
		$product_id = $_GET['product'];
		$_SESSION['cart']->remove($product_id);
		redirect($_SERVER['HTTP_REFERER']);
	}

	function deleteAll() {

		$_SESSION['cart']->deleteAll();
		redirect($_SERVER['HTTP_REFERER']);
	}

	function sendEmail() {

		if (empty($_SESSION['cart'])) {
			redirect($_SERVER['HTTP_REFERER']);
			return;
		}

		if (!is_null($_POST['email'])) {
			$to = MANAGER_EMAIL;
			$subject = "ClotheShop cart";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: <' . filter_var($_POST['email']) . '>' . "\r\n";

			$productList = '';
			$products = $_SESSION['cars']->all();
			foreach ($products as $product) :
				$productList .= "
			<tr>
            <td>  $product->title </td>
            <td>  $product->price </td>
       		</tr>";
			endforeach;

			$message = "<html>
			<head>
    		<title>Cart list from ClotheShop</title>
			</head>
			<body>
			<table>
    		<thead>
    		<tr>
        	<th>Product Name</th>
        	<th>Price</th>
    		</tr>
    		</thead>
    		<tbody>
    		$productList
    		</tbody>
			</table>
			</body>
			</html>
			";

			mail($to, $subject, $message, $headers);
		}

	}


}