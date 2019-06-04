<?php 	
	include_once('Model.php');
	class Employee extends Model{
		var $conn;
		var $table_name = 'employees';
		var $primary_key = 'code';	

		function check($data){
			$res = $this->find($data['code']);
			if ($res!=null && md5($data['password'])==$res['password']) {
				return $res;
			}else return null;
		}	
	}
 ?>