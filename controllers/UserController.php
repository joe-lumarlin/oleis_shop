<?php
	class UserController{

		public function actionRegister(){

			$name = "";
			$password = "";
			$email = "";



			if(isset($_POST['submit'])){
				$name = $_POST['name'];
				$password = $_POST['password'];
				$email = $_POST['email'];				
			}



			$errors = false;


			if(!User::checkName($name)){
				$errors[] = 'Имя не должно быть короче 4 символов';
			}



			if(!User::checkPassword($password)){
				$errors[] = 'Пароль не должен быть короче 6 символов';
			}



			if(!User::checkEmail($email)){
				$errors[] = 'Неправльный email';
			}


			if(User::chekEmailExists($email)){
				$errors[] = 'Такой email уже используется';
			}


			if($errors == false){
				$result = User::register($name, $password, $email);
			}


			require_once(ROOT. '/views/user/register.php');

			return true;
		}
	}

?>