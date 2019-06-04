<?php 
session_start();
	$mod = isset($_GET['mod'])?$_GET['mod']:'home';
	$act = isset($_GET['act'])?$_GET['act']:'';

	switch ($mod) {
		case 'home':
			require_once('controllers/HomeController.php');
			$home_controller = new HomeController();
			$home_controller->show();
			break;
		case 'allProduct':
			require_once('controllers/HomeController.php');
			$home_controller = new HomeController();
			$home_controller->showAll();
			break;
		case 'cart':
			require_once('controllers/CartController.php');
			$cart_controller = new CartController();
			switch ($act) {
				case 'addToCart':
					$cart_controller->addToCart();
					break;
				case 'addToCart1':
					$cart_controller->addToCart1();
					break;
				case 'addToCart2':
					$cart_controller->addToCart2();
					break;
				case 'show':
					$cart_controller->show();
					break;
				case 'minus':
					$cart_controller->minus();
					
					break;
				case 'bill':
					$cart_controller->bill();
					break;
				case 'bill_detail':
					$cart_controller->bill_detail();
					break;
				default:
					# code...
					break;
			}
			break;
		default:
			# code...
			break;
	}
 ?>