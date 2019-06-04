<?php 	
	include_once('Model.php');
	class BillDetailOnline extends Model{
		var $conn;
		var $table_name = 'bill_detail_online';

		function find($code){
			$data = array();
			$sql = "SELECT * FROM ".$this->table_name." WHERE id_bill='".$code."'";
			$result = $this->conn->query($sql);
			while($row = $result->fetch_assoc()){
				$data[] = $row;
			}
			
			return $data;
		}			
	}
 ?>