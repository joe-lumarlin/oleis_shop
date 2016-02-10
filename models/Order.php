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



		public static function getOrdersList(){

			$db = DB::getConnection();

			$result = $db->query ('SELECT id, user_name, user_phone, date, status FROM product_order ORDER BY id DESC');
			$ordersList = array();

			$count = 0;
			while($row = $result->fetch()){
				$ordersList[$count]['id'] = $row['id'];
				$ordersList[$count]['user_name'] = $row['user_name'];
				$ordersList[$count]['user_phone'] = $row['user_phone'];
				$ordersList[$count]['date'] = $row['date'];
				$ordersList[$count]['status'] = $row['status'];

				$count ++;
			}

			return $ordersList;
		}



		public static function getStatusText($status){

			switch($status){
				case '1':
						return 'новый заказ';
						break; 
				case '2':
						return 'в обработке';
						break;
				case '3':
						return 'доставляется';
						break;
				case '4':
						return 'закрыт';
						break;
			}
		}






		public static function getOrderById($order_id){

			$order_id = intval($order_id);

			$db = DB::getConnection();

			$query = 'SELECT * FROM product_order WHERE id = :id';

			$result = $db->prepare($query);
			$result->bindParam(':id', $order_id, PDO::PARAM_INT);
			$result->setFetchMode(PDO::FETCH_ASSOC);
			$result->execute();

			return $result->fetch();
		}




		public static function updateOrderById($id, $userName, $userPhone, $userComment, $date, $status){

			$db = DB::getConnection();

			$query = "UPDATE product_order 
					SET 
					user_name = :user_name,
					user_phone = :user_phone,
					user_comment = :user_comment,
					date = :date,
					status = :status
					WHERE id = :id";

			$result = $db->prepare($query);
			$result->bindParam(':id', $id, PDO::PARAM_INT);
			$result->bindParam(':user_name', $userName, PDO::PARAM_STR);
			$result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR); 
			$result->bindParam(':user_comment', $userComment, PDO::PARAM_STR); 
			$result->bindParam(':date', $date, PDO::PARAM_STR); 
			$result->bindParam(':status', $status, PDO::PARAM_INT); 

			return $result->execute();
		}

		public static function deleteOrder($order_id){
			$order_id = intval($order_id);

			$db = DB::getConnection();

			$query = 'DELETE FROM product_order WHERE id = :id';
	
			$result = $db->prepare($query);
			$result->bindParam(':id', $order_id, PDO::PARAM_INT);
	
			return $result->execute();
		}


		





	}





?>