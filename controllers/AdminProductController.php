<?php

class AdminProductController extends AdminBase {

	public function actionIndex(){

		self::checkAdmin();

		$productList = Product::getProuctsList();

		require_once(ROOT. '/views/admin_product/index.php');

		return true;
	}

	


	public function actionDelete($product_id){

		self::checkAdmin();

		if(isset($_POST['submit'])){
			Product::deleteProductById($product_id);

			header('Location: /admin/product');
		}

		require_once(ROOT. '/views/admin_product/delete.php');
		return true;		
	}




	public function actionCreate(){
		
		self::checkAdmin();

		// get data for uper list
		$categoriesList = Category::getCategoriesListAdmin();

		if(isset($_POST['submit'])){
			$options['name'] = $_POST['name'];
			$options['category_id'] = $_POST['category_id'];
			$options['code'] = $_POST['code'];
			$options['price'] = $_POST['price'];
			$options['availability'] = $_POST['availability'];
			$options['brand'] = $_POST['brand'];
			$options['description'] = $_POST['description'];
			$options['is_new'] = $_POST['is_new'];
			$options['is_recommended'] = $_POST['is_recommended'];
			$options['status'] = $_POST['status'];

			$errors = false;

			if(!isset($options['name']) || empty($options['name'])){
				$errors[] = 'Заполните поля!';
			}

			if($errors == false){
				$id = Product::createProduct($options);

				// images download
				
			header('Location: /admin/product');

			}
		}
		require_once(ROOT. '/views/admin_product/create.php');
		return true;
	}




	public function actionUpdate($id){
		self::checkAdmin();

		// get data for uper list
		$categoriesList = Category::getCategoriesListAdmin();

		$product = Product::getProductById($id);

		if(isset($_POST['submit'])){
			$options['name'] = $_POST['name'];
			$options['category_id'] = $_POST['category_id'];
			$options['code'] = $_POST['code'];
			$options['price'] = $_POST['price'];
			$options['availability'] = $_POST['availability'];
			$options['brand'] = $_POST['brand'];
			$options['description'] = $_POST['description'];
			$options['is_new'] = $_POST['is_new'];
			$options['is_recommended'] = $_POST['is_recommended'];
			$options['status'] = $_POST['status'];

				if(Product::updateProductById($id, $options)){
					// image
				}
			header('Location: /admin/product');
		}
		require_once(ROOT. '/views/admin_product/update.php');
		return true;
	}

}






?>