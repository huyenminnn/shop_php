<?php 
	/**
	 * 
	 */
	require_once('models/Product.php');
	class HomeController
	{
		var $productModel;
		function __construct(){
			$this->productModel = new Product();
		}
		function show(){
			$data = $this->productModel->All();

			$overview = array_rand($data,16);
			$cart = array();
			if (isset($_SESSION['cart'])) {
				$cart = $_SESSION['cart'];
			}
			$num = count($cart);
			require_once('views/home.php');
		}

		function showAll(){
			$products = $this->productModel->All();
			$cart = array();
			if (isset($_SESSION['cart'])) {
				$cart = $_SESSION['cart'];
			}
			$num = count($cart);
			require_once('views/allProducts.php');

		}
	}
 ?>