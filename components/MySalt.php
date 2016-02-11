<?php

class MySalt{

	public static function generate_salt(){
		$unique_random_string = md5 (uniqid(mt_rand(), true));

		$base64_string = base64_encode($unique_random_string);

		$modified_base64_string = str_replace('+', '.', $base64_string);

		$salt = substr($modified_base64_string, 0, 22);

		return $salt;
	}
}



?>