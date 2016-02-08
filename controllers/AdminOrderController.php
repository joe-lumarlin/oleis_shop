<?php
	class AdminOrderController extends AdminBase{

		/**
		 * Order manage
		 * @return [type] [description]
		 */
		public function actionIndex(){

			// check access
			self::checkAdmin();	

			$ordersList = Order::getOrdersList();

			require_once(ROOT. '/views/admin_order/index.php');
			return true;
		}




		public function actionUpdate($order_id){
			self::checkAdmin();

			$order = Order::getOrderById($order_id);

			if(isset($_POST['submit'])){
				$userName = $_POST['userName'];
				$userPhone = $_POST['userPhone'];
				$userComment = $_POST['userComment'];
				$date = $_POST['date'];
				$status = $_POST['status'];


				// save changes
				Order::updateOrderById($order_id, $userName, $userPhone, $userComment, $date, $status);
	
            	header("Location: /admin/order/view/$order_id");
			}

			require_once(ROOT. '/views/admin_order/update.php');
		return true;
		}


		public function actionView($order_id){

			self::checkAdmin();

			$order = Order::getOrderById($order_id);

			$productsQuantity = json_decode($order['products'], true);

			$productsIds = array_keys($productsQuantity);

			$products = Product::getProductByIds($productsIds);

			require_once(ROOT . '/views/admin_order/view.php');
        return true;
		}




	}







?>