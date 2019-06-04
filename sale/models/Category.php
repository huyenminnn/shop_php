<?php 	
	include_once('Model.php');
	class Category extends Model{
		var $conn;
		var $table_name = 'categories';
		var $primary_key = 'code';		
	}
 ?>