<?php
abstract class Connect {
	const HOST = 'localhost';
	const DB_NAME = 'tech_uchet';
	const DB_USER = 'root';
	const DB_PASSWORD ='root';

	/**
	* @var PDO
	*/
	protected $db;
	function __construct() {
		try
		{
			$this->db = new PDO('mysql:host='.self::HOST.'; dbname='.self::DB_NAME, self::DB_USER, self::DB_PASSWORD);
			$this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$this->db->exec("set names utf8");
		}
		catch(PDOException $e) {
			echo $e->getMessage();
		}
	}
}



?>