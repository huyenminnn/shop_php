<?php 
	require_once('models/Bill.php');
	require_once('models/Customer.php');
	require_once('models/CustomerOnline.php');
	require_once('models/Product.php');
	require_once('models/BillOnline.php');
	require_once('models/Bill_detail.php');
	require_once('models/Bill_online_detail.php');
	require_once('models/Employee.php');
	class SaleController
	{	
		var $list_product;
		var $list_customer;
		function __construct(){
			$this->list_product = new Product();
			$this->list_customer = new Customer();
		}
		function list_customer(){
			if (isset($_SESSION['cart'])) {
				unset($_SESSION['cart']);
			}
			$data = $this->list_customer->All();
			require_once('views/sale/list_customer.php');
		}

		function purchase(){
			if (isset($_GET['code'])) {
				$code=$_GET['code'];
				$customer=$this->list_customer->find($code);
				$_SESSION['customer']=$customer;
				var_dump($_SESSION['customer']);
				header("Location: ?mod=sale&act=sale" );
			}else{
				header('Location: ?mod=sale&act=list_customer');
			}
		}

		function sale(){
			if (isset($_SESSION['customer'])) {
				$customer=$_SESSION['customer'];
				$products=$this->list_product->All();

				$cart=array();
				if (isset($_SESSION['cart'])) {
					$cart=$_SESSION['cart'];
				}
				require_once('views/sale/addToCart.php');
			}else{
				header('Location: ?mod=sale&act=list_customer');
			}
		}

		function addToCart(){
			$code = $_GET['code'];
			$product = $this->list_product->find($code);
			if (isset($_SESSION['cart'][$code])&&$_SESSION['cart'][$code]['quantity']<$product['quantity']) {
				$_SESSION['cart'][$code]['quantity']++;
			} else{		
				$product['quantity'] = 1;
				$_SESSION['cart'][$code] = $product;
			}
			header("location: ?mod=sale&act=sale");
		}
		
		function minus(){
			$code = $_GET['code'];
			if ($_SESSION['cart'][$code]['quantity']>1) {
				$_SESSION['cart'][$code]['quantity']--;
			} elseif ($_SESSION['cart'][$code]['quantity']=1) {
				unset($_SESSION['cart'][$code]);
			}
			header("location: ?mod=sale&act=sale");
		}

		function delete(){
			$code = $_GET['code'];
			unset($_SESSION['cart'][$code]);
			header("location: ?mod=sale&act=sale");
		}

		function update($code){
			$detail = new BillDetail();
			$products = $detail->find($code);
			$res = 1;
			foreach ($products as $product) {
				$productModel = new Product();
				$pro = $productModel->getQuantity($product['id_product']);
				if ($pro>=$product['quantity']) {
					$productModel->reduceQuantity($pro,$product['quantity'],$product['id_product']);
				}else{
					$res = 0;
				}
			}
			
		}

		function payment(){
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$id_employee = $_SESSION['login']['code'];
			$id_customer = $_SESSION['customer']['code'];
			if (isset($_SESSION['cart'])) {
				$cart = $_SESSION['cart'];

				$bill = array();
				$bill['code'] = $id_customer.'_'.$id_employee.'_'.time();
				$bill['id_customer'] = $id_customer;
				$bill['id_employee'] = $id_employee;
				$bill['timestamp'] = date('Y-m-d H:i:s');
				$bill['status'] = 1;

				$billModel = new Bill();
				$billModel->insert($bill);

				$total = 0;
				foreach ($cart as $product) {
					$detail['id_bill'] = $bill['code'];
					$detail['id_product'] = $product['code'];
					$detail['quantity'] = $product['quantity'];
					$detail['price'] = $product['price'];
					$detail['money'] = $product['price']*$product['quantity'];
					$total += $detail['money'];

					$billDetail = new BillDetail();
					$billDetail->insert($detail);
					//giam so luong
				}

				$upbill['code'] = $bill['code'];
				$upbill['money'] = $total;

				$billModel->update($upbill);
				$this->update($bill['code']);

				unset($_SESSION['cart']);
				unset($_SESSION['customer']);
	
				header('location: ?mod=sale&act=detail&code='.$bill['code']);
			} else {
				header('location: ?mod=sale&act=sale');

			}
		}

		function detail(){
			$code = $_GET['code'];
			$billModel = new Bill();
			$bill = $billModel->find($code);
			$customer = $this->list_customer->find($bill['id_customer']);

			$emp = new Employee();
			$employee = $emp->find($bill['id_employee']);
			$billDetail = new BillDetail();
			$detail = $billDetail->find($code);

			$total = 0;
			$products = array();
			foreach ($detail as $value) {
				$product = $this->list_product->find($value['id_product']);
				$product['quantity'] = $value['quantity'];
				$product['total'] = $value['money'];
				$total+=$product['total'];
				$products[] = $product;
			}

			require_once('views/sale/detail.php');
		}

		function detail_online(){
			$code = $_GET['code'];
			$billModel = new BillOnline();
			$bill = $billModel->find($code);
			$total = $bill['money'];
			$customerModel = new CustomerOnline();
			$customer = $customerModel->find($bill['id_customer']);

			$employee['name'] = 'online';
			$employee['code'] = 'null';
			$billDetail = new BillDetailOnline();
			$detail = $billDetail->find($code);

			
			$products = array();
			foreach ($detail as $value) {
				$product = $this->list_product->find($value['id_product']);
				$product['quantity'] = $value['quantity'];
				$product['total'] = $value['money'];
				
				$products[] = $product;
			}

			require_once('views/sale/detail.php');
		}
	}
 ?>