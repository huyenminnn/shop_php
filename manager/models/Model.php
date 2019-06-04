<?php 
	include_once('Connection.php');
	class Model
	{
		var $table_name='';
		var $primary_key='';
		function __construct(){
			$connection = new Connection();
			$this->conn = $connection->conn;
		}

		function All(){
			$data = array();
			$sql = "SELECT * FROM ".$this->table_name;
			$result = $this->conn->query($sql);
			while($row = $result->fetch_assoc()){
				$data[] = $row;
			}
			return $data;
		}

		function find($code){
			$sql = "SELECT * FROM ".$this->table_name." WHERE ".$this->primary_key."='".$code."'";
			$data = $this->conn->query($sql)->fetch_assoc();
			return $data;
		}

		function delete($code){
			$sql = "DELETE FROM ".$this->table_name." WHERE ".$this->primary_key."='".$code."'";
			$result = $this->conn->query($sql);
			return $result;
		}

		function insert($data){
			if (isset($data['submit'])) {
				unset($data['submit']);
			}

			$column = '';
			$values = '';
			foreach ($data as $key => $value) {
				$column .= $key.",";
				$values .= "'".$value."',";
			}
			$column = trim($column,",");
			$values = trim($values,",");

			$sql = "INSERT INTO ".$this->table_name." (".$column.") VALUES (".$values.")";
			$result = $this->conn->query($sql);
			
			return $result;
		}

		function update($data){
			if (isset($data['submit'])) {
				unset($data['submit']);
			}
			
			$values ='';

			foreach ($data as $key => $value) {
				if ($key!=$this->primary_key) {
					$values .= $key."='".$value."',";
				}
			}
			$values = trim($values,",");

			$sql = "UPDATE ".$this->table_name." SET ".$values." WHERE ".$this->primary_key."='".$data[$this->primary_key]."'";
			$result = $this->conn->query($sql);
			return $result;
		}

	}
 ?>