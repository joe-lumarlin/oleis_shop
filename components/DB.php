<?php

class DB{
	public static function getConnection(){
		$paramsPath = ROOT. '/config/db_params.php';
		$params = include($paramsPath);

		$dsn = "mysql:host={$params['host']}; dbname={$params['db_name']}";
		$db = new PDO($params['user'], $params['password']);

		return $db;
	}


}


?>