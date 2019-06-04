<?php 
	/**
	 * 
	 */
	require_once('models/Product.php');
	require_once('models/Bill.php');
	require_once('models/Bill_detail.php');
	require_once('models/Customer_online.php');


	class CartController
	{
		var $productModel;
		var $billModel;
		var $billDetailModel;
		var $customerModel;
		function __construct(){
			$this->productModel = new Product();
			$this->billModel = new Bill();
			$this->billDetailModel = new BillDetail();
			$this->customerModel = new CustomerOnline();
		}
		function addToCart(){
			$code = $_GET['code'];
			
			if (isset($_SESSION['cart'][$code])) {
				$_SESSION['cart'][$code]['quantity']++;
			} else{
				$product = $this->productModel->find($code);
				$product['quantity'] = 1;
				$_SESSION['cart'][$code] = $product;
			}
			header("location: ?mod=cart&act=show");
		}
		function addToCart1(){
			$code = $_GET['code'];
			
			if (isset($_SESSION['cart'][$code])) {
				$_SESSION['cart'][$code]['quantity']++;
			} else{
				$product = $this->productModel->find($code);
				$product['quantity'] = 1;
				$_SESSION['cart'][$code] = $product;
			}
			header("location: ?mod=home");
		}
		function addToCart2(){
			$code = $_GET['code'];
			
			if (isset($_SESSION['cart'][$code])) {
				$_SESSION['cart'][$code]['quantity']++;
			} else{
				$product = $this->productModel->find($code);
				$product['quantity'] = 1;
				$_SESSION['cart'][$code] = $product;
			}
			header("location: ?mod=allProduct");
		}

		function show(){
			$cart = array();
			if (isset($_SESSION['cart'])) {
				$cart = $_SESSION['cart'];
			}
			$num = count($cart);
			include_once('views/cart.php');
		}

		function minus(){
			$code = $_GET['code'];
			
			if ($_SESSION['cart'][$code]['quantity']>1) {
				$_SESSION['cart'][$code]['quantity']--;
			} elseif ($_SESSION['cart'][$code]['quantity']=1) {
				unset($_SESSION['cart'][$code]);
			}
			header("location: ?mod=cart&act=show");
		}

		function bill(){
			$data = $_POST;
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			
			if (isset($_SESSION['cart'])) {
				$cart = $_SESSION['cart'];

				$customer = array();
				$customer['code'] = "OL".$data['numphone'].time();
				$customer['name'] = $data['name'];
				$customer['numphone'] = $data['numphone'];
				$customer['email'] = $data['email'];
				$customer['address'] = $data['address'];

				$this->customerModel->insert($customer);


				$bill = array();
				$bill['code'] = "online_".$data['numphone']."_".time();
				$bill['id_customer'] = $customer['code'];
				$bill['id_employee'] = "";
				$bill['timestamp'] = date('Y-m-d H:i:s');
				$bill['status'] = 0;

				$this->billModel->insert($bill);

				$total = 0;
				foreach ($cart as $product) {
					$detail['id_bill'] = $bill['code'];
					$detail['id_product'] = $product['code'];
					$detail['quantity'] = $product['quantity'];
					$detail['price'] = $product['price'];
					$detail['money'] = $product['price']*$product['quantity'];
					$total += $detail['money'];

					
					$this->billDetailModel->insert($detail);
					//giam so luong
				}

				$upbill['code'] = $bill['code'];
				$upbill['money'] = $total+30000;

				$this->billModel->update($upbill);

				unset($_SESSION['cart']);
				
				
	
				header('location: ?mod=cart&act=bill_detail&code='.$bill['code']);
			} else {
				header('location: ?mod=cart&act=show');

			}

		}

		function bill_detail(){
			$code = $_GET['code'];
			$bill = $this->billModel->find($code);

			$customer = $this->customerModel->find($bill['id_customer']);

			$employee['name'] = 'online';
			$employee['code'] = 'null';
			
			$detail = $this->billDetailModel->find($code);

			
			$products = array();
			foreach ($detail as $value) {
				$product = $this->productModel->find($value['id_product']);
				$product['quantity'] = $value['quantity'];
				$product['total'] = $value['money'];				
				$products[] = $product;
			}
			$num = 0;
			$total1 = $bill['money'];
			
			require_once('views/detail.php');
$this->sendmail($customer,$products,$code,$bill,$total1);
		}

		function send_email($email_recive,$name,$contents,$subject){
			//https://www.google.com/settings/security/lesssecureapps
			// Khai báo thư viên phpmailer
	        require "phpmailer/PHPMailerAutoload.php";
	        require "phpmailer/class.phpmailer.php";
	        // Khai báo tạo PHPMailer
	        $mail = new PHPMailer();
	        //Khai báo gửi mail bằng SMTP
	        $mail->IsSMTP();
	        //Tắt mở kiểm tra lỗi trả về, chấp nhận các giá trị 0 1 2
	        // 0 = off không thông báo bất kì gì, tốt nhất nên dùng khi đã hoàn thành.
	        // 1 = Thông báo lỗi ở client
	        // 2 = Thông báo lỗi cả client và lỗi ở server
	        // To load the French version
	        $mail->setLanguage('vi', '/optional/path/to/language/directory/');
	        $mail->SMTPDebug  = 1;
					$mail->SMTPOptions = array (
			        'ssl' => array(
		        	'verify_peer'  => false,
		        	'verify_peer_name'  => false,
		        	'allow_self_signed' => true)
					);
	        $mail->CharSet="UTF-8";
	        $mail->Debugoutput = "html"; // Lỗi trả về hiển thị với cấu trúc HTML
	        $mail->Host       = "smtp.gmail.com"; //host smtp để gửi mail
	        $mail->Port       = 587; // cổng để gửi mail
	        $mail->SMTPSecure = "tls"; //Phương thức mã hóa thư - ssl hoặc tls
	        $mail->SMTPAuth   = true; //Xác thực SMTP
	        $mail->Username   = "auto.zentgroup@gmail.com"; // Tên đăng nhập tài khoản Gmail
	        $mail->Password   = "1@3$5^7*"; //Mật khẩu của gmail
	        $mail->SetFrom("zentgroup@gmail.com", "Zent Group"); // Thông tin người gửi
	        $mail->AddReplyTo("zentgroup@gmail.com","Zent Group");// Ấn định email sẽ nhận khi người dùng reply lại.
	        $mail->AddAddress($email_recive, $name);//Email của người nhận
	        //$mail->AddCC($email_recive, $name);//Email của người nhận
	        $mail->Subject = $subject; //Tiêu đề của thư
	        $mail->MsgHTML($contents); //Nội dung của bức thư.
	        // $mail->MsgHTML(file_get_contents("email-template.html"), dirname(__FILE__));
	        // Gửi thư với tập tin html
	        $mail->AltBody = "Nội dung thư";//Nội dung rút gọn hiển thị bên ngoài thư mục thư.
	        //$mail->AddAttachment("images/attact-tui.gif");//Tập tin cần attach

	        //Tiến hành gửi email và kiểm tra lỗi
	        if(!$mail->Send()) {
	          echo "Có lỗi khi gửi mail: " . $mail->ErrorInfo;
						return false;
	        } else {
	          echo "Đã gửi thư thành công!";
						return true;
	        }
		}

		function sendmail($customer,$prod,$code,$bill,$total1){
			$name = $customer['name'];
			$email =$customer['email'];
			$products = $prod;
			ob_start();
			include_once('email_template.php');
			$contents = ob_get_contents();
			$this->send_email($email,$name,$contents,"Bill in MINSHOP");
		}
	}	
 ?>