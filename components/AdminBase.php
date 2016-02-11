<?php

abstract class AdminBase {
	

	// check is user admin
	public static function checkAdmin(){
		
		$userId = User::checkLogged();

		$user = User::getUserById($userId);

		if($user['role'] == 'admin'){
			return true;
		}
		return false;
	}
}

?>