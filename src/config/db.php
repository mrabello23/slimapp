<?php 

/**
* 
*/
class db
{
	private $dbhost = 'localhost';
	private $dbname = 'slimapp';
	private $dbuser = 'root';
	private $dbpass = '123456';

	public function connect()
	{
		$mysqlSDN = "mysql:host={$this->dbhost};dbname={$this->dbname}";
		$dbConnection = new PDO($mysqlSDN, $this->dbuser, $this->dbpass);
		$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		return $dbConnection;
	}
}