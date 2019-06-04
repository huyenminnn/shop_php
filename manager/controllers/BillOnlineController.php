<?php 
	require_once('models/BillOnline.php');
	require_once('models/Bill_online_detail.php');
	require_once('models/Product.php');

	class BillOnlineController
	{	
		var $model;

		function __construct(){
			$this->model = new BillOnline();

		}
		function list(){
			$data = $this->model->All();
			require_once('views/bill/list.php');
		}

		function update(){
			$code = $_GET['code'];
			$detail = new BillDetailOnline();
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
			if ($res) {
				$data['code'] = $code;
				$data['status'] = 1;
				$status = $this->model->update($data);
			} else{
				setcookie('msg',"Not enough product.",time()+1);

			}
			header("location: ?mod=billOl&act=list");
			

		
		}

		function delete(){
			$code = $_GET['code'];
			$status = $this->model->delete($code);

			if ($status==true) {
				setcookie('msg','Xoá thành công',time()+1);
				
			} else {
				setcookie('msg_fail','Xoá thất bại.',time()+1);
				
			}
			header('location: index.php?mod=billOl&act=list');
		}
	}
 ?>