<?php

class User{

	public static function register($name, $password, $email){
		$db = DB::getConnection();

		$query = 'INSERT INTO user (name, password, email) '
				. 'VALUES (:name, :password, :email)';		

		$result = $db->prepare($query);
		$result->bindParam(':name', $name, PDO::PARAM_STR);
		$result->bindParam(':password', $password, PDO::PARAM_STR);
		$result->bindParam(':email', $email, PDO::PARAM_STR);

		return $result->execute();
	}



	public static function checkName($name){
		if(strlen($name) >= 4){
			return true;
		}
		return false;
	}



	public static function checkPassword($password){
		if(strlen($password) >= 6){
			return true;
		}
		return false;		
	}



	public static function checkEmail($email){
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			return true;
		}
		return false;
	}


	public static function chekEmailExists($email){
		
		$db = DB::getConnection();

		$sql = 'SELECT COUNT(*) FROM user WHERE email = :email';

		$result = $db->prepare($sql);
		$result->bindParam(':email', $email, PDO::PARAM_STR);
		$result->execute();

		if($result->fetchColumn())
			return true;

		return false;
	}


	public static function checkUserData($email, $password){

		$db = DB::getConnection();

		$query = 'SELECT * FROM user WHERE email = :email AND password = :password';

		$result = $db->prepare($query);
		$result->bindParam(':email', $email, PDO::PARAM_STR);
		$result->bindParam(':password', $password, PDO::PARAM_STR);
		$result->execute();

		$user = $result->fetch();
		if($user){
			return $user['id'];
		} 
		return false;
	}

	public static function auth($userId){
		$_SESSION['user'] = $userId;
	}



	public static function checkLogged(){
		if(isset($_SESSION['user'])){
			return $_SESSION['user'];
		}

		header('Location: /user/login');
	}


	public static function isGuest(){
		if(isset($_SESSION['user'])){
			return false;
		}
		return true;
	}



	public static function getUserById($userId){

		$db = DB::getConnection();

		$query = 'SELECT * FROM user WHERE id = :id';

		$result = $db->prepare($query);
		$result->bindParam(':id', $userId, PDO::PARAM_INT);

		// date in array
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$result->execute();

		return $result->fetch();

	}


	public static function edit($id, $name, $password){
		$db = DB::getConnection();

		$query = 'UPDATE user SET name = :name, password = :password WHERE id = :id';

		$result = $db->prepare($query);
		$result->bindParam(':id', $id, PDO::PARAM_INT);
		$result->bindParam(':name', $name, PDO::PARAM_STR);
		$result->bindParam(':password', $password, PDO::PARAM_STR);

		return $result->execute();
	}


}

	


?>