<?php 

	class Product{
		
		const SHOW_BY_DEFAULT = 9;

		/**
		 * определенное количество последних просмотренных продуктов
		 * @param  [int] $count [количество последних елементов продуктов]
		 * @return [array]  [масив данных из запроса]
		 */
		public static function getLatestProducts($count = self::SHOW_BY_DEFAULT){
			
			$count = intval($count);
			
			$db = DB::getConnection();

			$productList = array();

			$result = $db->query('SELECT id, name, price, is_new FROM product '
								. 'WHERE status = "1"'
								. 'ORDER BY id DESC '
								. 'LIMIT ' .$count);

			$count = 0;
			while($row = $result->fetch()){
				$productList[$count]['id'] = $row['id'];
				$productList[$count]['name'] = $row['name'];
				$productList[$count]['price'] = $row['price'];
				$productList[$count]['is_new'] = $row['is_new'];

				$count++;
			}

			return $productList;
		}



		/**
		 * лист товаров по выбраной категории
		 * @param  int $categoryId [параметр id категории, по умолчанию boolean = false]
		 * @return [array] [массив данных из запроса]
		 */
		public static function getProductsListByCategory($categoryId = false){
			$db = DB::getConnection();

			$products = array();

			$result = $db->query("SELECT id, name, price, is_new FROM product "
								. "WHERE status = '1' AND category_id = '$categoryId' "
								. "ORDER BY id DESC "
								. "LIMIT " .self::SHOW_BY_DEFAULT);

			$count = 0;
			while($row = $result->fetch()){
				$products[$count]['id'] = $row['id'];
				$products[$count]['name'] = $row['name'];
				$products[$count]['price'] = $row['price'];
				$products[$count]['is_new'] = $row['is_new'];

				$count++;
			}

			return $products;
		}




		public static function getProductById($id){
			$id = intval($id);

			if($id){
				$db = DB::getConnection();

				$result = $db->query('SELECT * FROM product WHERE id =' .$id);
				$result->setFetchMode(PDO::FETCH_ASSOC);

				return $result->fetch();
			}
		}

	}

?>