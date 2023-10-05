<?php 
namespace Model;
use Model\Connection;

class Persons extends Connection{
	protected $table;
	
	public function query($sql){
		$this->query =  $this->connection->query($sql);
	}

	public function getAll($table){
		$sql = "SELECT * FROM {$table}";
		$this->query($sql);
		$response = $this->query->fetch_all(MYSQLI_ASSOC);
		return $response;
	}

	public function find($table, $data){
		$fields = array_keys($data);
		$fields = implode('',$fields);
		$values = array_values($data);
		$values = implode("",$values);
		$sql = "SELECT * FROM {$table} WHERE {$fields} = {$values}";
		$this->query($sql);
		$response = $this->query->fetch_all(MYSQLI_ASSOC);
		return $response;
	}

	public function create($table, $data){
		$fields = array_keys($data);
		$fields = implode(', ',$fields);
		$values = array_values($data);
		$values = "'".implode("', '",$values). "'";
		$sql = "INSERT INTO {$table}({$fields}) VALUES({$values})";
		$this->query($sql);
		$search = [
			'id' => $this->connection->insert_id
		];
		$response = $this->find($table,$search);
		return $response;
	}

	public function update($table, $data){
		$keyField = array_keys($data['primary_key']);
		$keyField = implode("",$keyField);
		$keysValues  = array_values($data['primary_key']);
		$keysValues = implode("",$keysValues);
		$search = [
			"{$keyField}" => $keysValues
		];
		$data = $this->find($table,$search);
		if(count($data)>0){
			$updatedFields = [];
			foreach ($data["values"] as $key => $value) {
				$updatedFields[] = "{$key} = '{$value}'";
			}
			$updatedFields = implode(', ',$updatedFields);
			$sql = "UPDATE {$table} SET {$updatedFields} WHERE {$keyField} = {$keysValues}";
			$this->query($sql);
			$search = [
				'id' => $keysValues
			];
			$respone =  $this->find($table,$search);
		}else{
			$response = "Update: No data found with {$keyField}={$keysValues}";
		}
		return $response;
		
	}
	
	public function delete($table, $data){
		$keyField = array_keys($data['primary_key']);
		$keyField = implode("",$keyField);
		$keysValues  = array_values($data['primary_key']);
		$keysValues = implode("",$keysValues);
		$search = [
			"{$keyField}" => $keysValues
		];
		$data = $this->find($table,$search);
		if(count($data)>0){
			$sql = "DELETE FROM {$table} WHERE {$keyField} = {$keysValues}";
			$this->query($sql);
			$response = "Succesfully deleted {$keyField}:{$keysValues} from {$table}";
		}else{
			$response = "Delete: No data found with {$keyField}={$keysValues}";
		}
		return $response;
	}


}

?>