<?php 
namespace Model;
require_once('Config/Config.php');
use mysqli;

class Connection{
	protected $host = DB_HOST;
	protected $user = DB_USER;
	protected $pass = DB_PASS;
	protected $name = DB_NAME;
	protected $connection;
	public $connectionStatus;

	public function __construct(){
		$this->connect();
	}

	protected function connect(){
		try{
			$connect = new mysqli($this->host,$this->user,$this->pass,$this->name);
			$this->connection = $connect;
			$this->connectionStatus = [
				'status' => True,
				'error' => ''
			];
		}catch(\Exception $e){
			$this->connectionStatus = [
				'status' => False,
				'error' => $e->getMessage()
			];
		}
	}

	public function checkConnection(){
		if($this->connectionStatus['status']){
			return True;
		}
		return False;
	}
}

?>