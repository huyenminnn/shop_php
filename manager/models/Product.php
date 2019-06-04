<?php 	
	include_once('Model.php');
	class Product extends Model{
		var $conn;
		var $table_name = 'products';
		var $primary_key = 'code';

		function getQuantity($code){
			$sql = "SELECT quantity FROM ".$this->table_name." WHERE ".$this->primary_key."='".$code."'";
			$data = $this->conn->query($sql)->fetch_assoc();
			return $data['quantity'];
		}	

		function reduceQuantity($now,$red,$code){
			$data = $now-$red;
			$sql = "UPDATE ".$this->table_name." SET quantity=".$data." WHERE ".$this->primary_key."='".$code."'";
			$result = $this->conn->query($sql);
			return $result;
		}	
	}
 ?>