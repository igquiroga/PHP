<?php
namespace Model;
use Model\Connection;
use Model\Persons;

class IndexQuery{
	public static function table($data){
		$table = '
		<table class="paleBlueRows">
			<thead>
				<tr>
					<th>ID</th>
					<th>NAME</th>
				</tr>
			</thead>
			<tbody>';
		foreach($data as $element){
			$table.='
				<tr>
					<td>'.$element["id"].'</td>
					<td>'.$element["name"].'</td>
				</tr>
			';
		}
		$table.='
			</tbody>
		</table>
		';
		return $table;
	}
	
	public static function search_empty($search){
		foreach($search as $key => $value){
			if(empty($value)){
				return False;
			}
		}
		return True;
	}
	
	public static function getAll(){
		$persons = new Persons();
		if(!($persons->checkConnection())){return "Error in Database: ".$persons->connectionStatus['error'];}

		$data = $persons->getAll(DB_TABLE_PERSONS); 
		if(count($data)>0){
			$result = self::table($data);
		}else{
			$result = "No data found";
		}
		return $result;
		
	}
	
	public static function find(){
		$persons = new Persons();
		if(!($persons->checkConnection())){return "Error in Database: ".$persons->connectionStatus['error'];}
		$form_data = [
			'id' => $_POST["search"],
		];
		if(self::search_empty($form_data)){
			$search = $form_data;
			$data = $persons->find(DB_TABLE_PERSONS,$search);
			$result =  '<p>No data found</p>';
			if(count($data)>0){
				$result = '<p>ID: '.$data[0]['id'].', NAME:'.$data[0]['name'].'</p>';
			}
		}else{
			$result =  "Fill out all find required fields";
		}
		return $result;
	}
	
	public static function create(){
		$persons = new Persons();
		if(!($persons->checkConnection())){return "Error in Database: ".$persons->connectionStatus['error'];}
		$form_data = [
			'name' => $_POST["name-save"]
		];
		if(self::search_empty($form_data)){
			$input = $form_data;
			$data = $persons->create(DB_TABLE_PERSONS,$input); 
			$result = "New data added (id: {$data[0]['id']}, name: {$data[0]['name']})";
		}else{
			$result = "Fill out all save required fields";
		}
		return $result;
	}
	
	public static function update(){
		$persons = new Persons();
		if(!($persons->checkConnection())){return "Error in Database: ".$persons->connectionStatus['error'];}
		$form_data = [
			'id' => $_POST['id-update'],
			'name' => $_POST['name-update']
		];
		if(self::search_empty($form_data)){
			$input = [
				'primary_key' => [
					'id' => $form_data['id']
				],
				'values' => [
					'name' => $form_data['name']
				]
			];
			$data = $persons->update(DB_TABLE_PERSONS,$input); 
			$result = $data;
		}else{
			$result = "Fill out all update required fields";
		}
		return $result;
	}
	
	public static function delete(){
		$persons = new Persons();
		if(!($persons->checkConnection())){return "Error in Database: ".$persons->connectionStatus['error'];}
		$form_data = [
			'id' => $_POST['id-delete'],
		];
		if(self::search_empty($form_data)){
			$input = [
				'primary_key' => [
					'id' => $form_data['id']
				],		
			];
			$data = $persons->delete(DB_TABLE_PERSONS,$input); 
			$result = $data;
		}else{
			$result = "Fill out all delete required fields";
		}
		return $result;
	}
}


?>