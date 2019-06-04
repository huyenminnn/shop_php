<?php 	
	include_once('Model.php');
	class Bill extends Model{
		var $conn;
		var $table_name = 'bills';
		var $primary_key = 'code';	


	}
 ?>