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






		public function actionDelete($productId){
			Cart::deleteProduct($productId);

			// redirect to previous page
			$referer = $_SERVER['HTTP_REFERER'];
			header("Location: $referer");
		}

		



		public function actionCheckout(){
			// get data from Cart
			$productInCart = Cart::getProduct();
			
			if($productInCart == false){
				header("Location: /");
			}
			
			// get categories list for left menu
			$categories = Category::getCategoriesList();

			// get total price
			$productsId = array_keys($productInCart);
			$products = Product::getProductByIds($productsId);
			$totalPrice = Cart::getTotalPrice($products);

			// get count of products
			$totalQuantity = Cart::countItems();

			// fields for form
			$userName = false;
			$userPhone = false;
			$userComment = false;

			// the status of a successful checkout
			$result = false;

			// check is user guest
			if(!User::isGuest()){
				// if user not guest get his info from database
				$userId = User::checkLogged();
				$user = User::getUserById($userId);
				$userName = $user['name'];
			} else {
				// if user is guest -- the forms field will be empty
				$userId = false;
			}


				if(isset($_POST['submit'])){
	
					// read form data
					$userName = $_POST['userName'];
					$userPhone = $_POST['userPhone'];
					$userComment = $_POST['userComment'];
	
					// data validation
					$errors = false;
	
					if(!User::checkName($userName)){
						$errors[] = 'Wrong input name';
					}
	
					if(!User::checkPhoneNumber($userPhone)){
						$errors[] = 'Wrong intup Phone number';
					}
	
	
					if($errors == false){
						// data input correctly
						// save order in database	

						$result = Order::save($userName, $userPhone, $userComment, $userId, $productInCart);
	
						// send email
						if($result){
							
						// $adminEmail = 'jlumarlin@gmail.com';
						// $message = 'future link on admin part';
						// $subject = 'New order';
						// mail($adminEmail, $subject, $message);
	
						// clear the cart
						Cart::clear();
						}	
					}
				}


			require_once(ROOT. '/views/cart/checkout.php');

			return true;
		}

		
	}




?>