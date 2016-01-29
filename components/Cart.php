<?php 
	class Cart{
		public static function addProduct($id){
			$id = intval($id);

			// пустой массив для товаров в корзине
			$productInCart = array();

			// если в корзине уже есть товары то они хранятся в сесии
			if(isset($_SESSION['products'])){
				$productInCart = $_SESSION['products'];
			}



			if(array_key_exists($id, $productInCart)){
				$productInCart[$id]++;
			} else {
				$productInCart[$id] = 1;
			}

			$_SESSION['products'] = $productInCart;

			return self::countItems();
		}


		/**
		 * подсчет количества товаров в корзине (сессии)
		 * @return int 
		 */
		public static function countItems(){

			if(isset($_SESSION['products'])){
				$count = 0;
				foreach($_SESSION['products'] as $id => $quantity){
					$count += $quantity;
				} 
				return $count;
			} else {
				return 0;
			}
		}


		public static function getProduct(){
			if(isset($_SESSION['products'])){
				return $_SESSION['products'];
			}
			return fasle;
		}


		public static function getTotalPrice($products){
			$productInCart = self::getProduct();
			$total = 0;

			if($productInCart){
				foreach($products as $item){
				$total += $item['price'] * $productInCart[$item['id']];					
				}
			}
			return $total;
		}

	}





?>