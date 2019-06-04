<?php 	
	include_once('Model.php');
	class CustomerOnline extends Model{
		var $conn;
		var $table_name = 'customers_online';
		var $primary_key = 'code';		
	}
 ?>