<?php
	class CartController{
		public function actionAdd($product_id){

			// add product in cart
			Cart::addProduct($product_id);

			// redirect to previous page
			$referer = $_SERVER['HTTP_REFERER'];
			header("Location: $referer");
		}


		public function actionAddAjax($id){
			echo Cart::addProduct($id);
			return true;
		}


		public function actionIndex(){
			$categories = array();
			$categories = Category::getCategoriesList();

			$productInCart = false;

			/**
			 * get data from the cart
			 * @var array
			 */
			$productInCart = Cart::getProduct();

			if($productInCart){
				$productsIds = array_keys($productInCart);
				$products = Product::getProductByIds($productsIds);

				// get count of products
				$totalPrice = Cart::getTotalPrice($products); 
			}

			require_once(ROOT. '/views/cart/index.php');

			return true;
		}

		
	}




?>