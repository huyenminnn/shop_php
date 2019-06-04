<?php 
	session_start();
	include_once('sendmail.php');
	if (isset($_POST['submit'])) {
		if (isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['addr'])) {
			$name = $_POST['name'];
			$email = $_POST['email'];
			$addr = $_POST['addr'];

			$data = array(
				'name' => $name,
				'email' => $email,
				'addr'=>$addr
			);

			$_SESSION['user'] = $data;
		}
	}

	ob_start();
	include_once('email_template.php');
	$contents = ob_get_contents();
	send_email($email,'Huyen',$contents,"Thư cảm ơn!");

	unset($_SESSION['cart']);
	header('Location: index.php');
?>