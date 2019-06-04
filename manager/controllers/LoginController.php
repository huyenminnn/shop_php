<?php 
// session_start();
require_once('models/Employee.php');

class LoginController {
	function formlogin(){
		require_once('views/login/login.php');
	}
	function login(){
		$data=$_POST;
		$employee=new Employee();
		$result=$employee->check($data);
		if (($result)!=null) {
			$_SESSION['login']=$result;
			$_SESSION['islogin']=1;
			header('Location: ?mod=dashboard&act=list');
		}else{
			setcookie('msg','ID or password is not correct!!!',time()+1);
			header('Location: ?mod=login&act=formlogin');
		}
	}
	function logout(){
		unset($_SESSION['login']);
		unset($_SESSION['islogin']);
		header('location: ?mod=login&act=formlogin');
	}
}


 ?>