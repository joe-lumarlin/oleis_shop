<?php

	class Order{

		public static function save($userName, $userPhone, $userComment, $userId, $products){

			$db = DB::getConnection();

			$query = 'INSERT INTO product_order (user_name, user_phone, user_comment, user_id, products) '
					. 'VALUES (:user_name, :user_phone, :user_comment, :user_id, :products)';

			$products = json_encode($products);

			$result = $db->prepare($query);
			$result->bindParam(':user_name', $userName, PDO::PARAM_STR);
			$result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
			$result->bindParam(':user_comment', $userComment, PDO::PARAM_STR);
			$result->bindParam(':user_id', $userId, PDO::PARAM_STR);
			$result->bindParam(':products', $products, PDO::PARAM_STR);

			return $result->execute();		

		}





	}





?>