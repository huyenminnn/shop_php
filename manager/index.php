
<?php 
session_start();
$mod = isset($_GET['mod'])?$_GET['mod']:'login';
$act = isset($_GET['act'])?$_GET['act']:'formlogin';

switch ($mod) {
	case 'login':
		require_once('controllers/LoginController.php');
		$login_controller = new LoginController();
		switch ($act) {
			case 'formlogin':
				$login_controller->formlogin();
				break;
			case 'login':
				$login_controller->login();
				break;
			case 'logout':
				$login_controller->logout();
				break;
			default:
				echo "ERROR";
				break;
		}
		break;
	case 'dashboard':
		if (isset($_SESSION)&&$_SESSION['islogin']==1) {
		require_once('views/dashboard/dashboard.php');
			
		}else{
			header('location: ?mod=login');
		}
		
		break;

	case 'sale':
		if (isset($_SESSION)&&$_SESSION['islogin']==1) {
			require_once('controllers/SaleController.php');
			$sale_controller = new SaleController();
			switch ($act) {
				case 'list_customer':
					$sale_controller->list_customer();
					break;
				case 'purchase':
					$sale_controller->purchase();
					
					break;
				case 'sale':
					$sale_controller->sale();
					
					break;
				case 'addToCart':
					$sale_controller->addToCart();
					
					break;
				case 'minus':
					$sale_controller->minus();
					break;
				case 'delete':
					$sale_controller->delete();
					break;
				case 'payment':
					$sale_controller->payment();
					break;
				case 'detail':
					$sale_controller->detail();
					break;
				case 'detail_online':
					$sale_controller->detail_online();
					break;
				default:
					# code...
					break;
			}
			
		}else{
			header('location: ?mod=login');
		}
		
		break;
	case 'product':
		if (isset($_SESSION)&&$_SESSION['islogin']==1) {
		require_once('controllers/ProductController.php');
		$product_controller = new ProductController();

		switch ($act) {
		case 'list':
		$product_controller->list();
		break;
		case 'add':
		$product_controller->add();
		break;
		case 'store':
		$product_controller->store();
		break;
		case 'detail':
		$product_controller->detail();
		break;
		case 'edit':
		$product_controller->edit();
		break;
		case 'update':
		$product_controller->update();
		break;
		case 'delete':
		$product_controller->delete();
		break;
		default:
		echo "<br>không có gì hết.";
		break;
		}
	}else{
		header('location: ?mod=login');
	}
	break;

	case 'customer':
	if (isset($_SESSION)&&$_SESSION['islogin']==1) {
	require_once('controllers/CustomerController.php');
	$customer_controller = new CustomerController();

	switch ($act) {
		case 'list':
		$customer_controller->list();
		break;
		case 'add':
		$customer_controller->add();
		break;
		case 'store':
		$customer_controller->store();
		break;
		case 'detail':
		$customer_controller->detail();
		break;
		case 'edit':
		$customer_controller->edit();
		break;
		case 'update':
		$customer_controller->update();
		break;
		case 'delete':
		$customer_controller->delete();
		break;
		default:
		echo "<br>không có gì hết.";
		break;
		}}else{
			header('location: ?mod=login');
		}
	break;

	case 'employee':
	if (isset($_SESSION)&&$_SESSION['islogin']==1) {
	require_once('controllers/EmployeeController.php');
	$employee_controller = new EmployeeController();

	switch ($act) {
		case 'list':
		$employee_controller->list();
		break;
		case 'add':
		$employee_controller->add();
		break;
		case 'store':
		$employee_controller->store();
		break;
		case 'detail':
		$employee_controller->detail();
		break;
		case 'edit':
		$employee_controller->edit();
		break;
		case 'update':
		$employee_controller->update();
		break;
		case 'delete':
		$employee_controller->delete();
		break;
		default:
		echo "<br>không có gì hết.";
		break;
	}}else{
		header('location: ?mod=login');
	}
	break;

	case 'category':
	if (isset($_SESSION)&&$_SESSION['islogin']==1) {
	require_once('controllers/CategoryController.php');
	$category_controller = new CategoryController();

	switch ($act) {
		case 'list':
		$category_controller->list();
		break;
		case 'add':
		$category_controller->add();
		break;
		case 'store':
		$category_controller->store();
		break;
		case 'detail':
		$category_controller->detail();
		break;
		case 'edit':
		$category_controller->edit();
		break;
		case 'update':
		$category_controller->update();
		break;
		case 'delete':
		$category_controller->delete();
		break;
		default:
		echo "<br>không có gì hết.";
		break;
	}}else{
		header('location: ?mod=login');
	}
	break;

	case 'bill':
	if (isset($_SESSION)&&$_SESSION['islogin']==1) {
	require_once('controllers/BillController.php');
	$bill_controller = new BillController();

	switch ($act) {
		case 'list':
		$bill_controller->list();
		break;
		
		case 'update':
		$bill_controller->update();
		break;
		case 'delete':
		$bill_controller->delete();
		break;
		default:
		echo "<br>không có gì hết.";
		break;
	}}else{
		header('location: ?mod=login');
	}
	break;

	case 'billOl':
	if (isset($_SESSION)&&$_SESSION['islogin']==1) {
	require_once('controllers/BillOnlineController.php');
	$bill_controller = new BillOnlineController();

	switch ($act) {
		case 'list':
		$bill_controller->list();
		break;
		
		case 'update':
		$bill_controller->update();
		break;
		case 'delete':
		$bill_controller->delete();
		break;
		default:
		echo "<br>không có gì hết.";
		break;
	}}else{
		header('location: ?mod=login');
	}
	break;
}
?>