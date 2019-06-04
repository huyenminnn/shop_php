<?php 	
	include_once('Model.php');
	class Customer extends Model{
		var $conn;
		var $table_name = 'customers';
		var $primary_key = 'code';		
	}
 ?>