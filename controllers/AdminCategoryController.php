<?php

class AdminCategoryController extends AdminBase {

	public function actionIndex(){

		self::checkAdmin();

		$categoryList = Category::getCategoriesList();

		require_once(ROOT. '/views/admin_category/index.php');

		return true;
	}



	public function actionCreate(){
		
		self::checkAdmin();

		if(isset($_POST['submit'])){
			$options['name'] = $_POST['name'];
			$options['sort_order'] = $_POST['sort_order'];
			$options['status'] = $_POST['status'];

			$errors = false;

			if(!isset($options['name']) || empty($options['name'])){
				$errors[] = 'Заполните поля формы!';				
			}

			if($errors == false){
				$newCategory = Category::createNewCategory($options);

				header('Location: /admin/category');
			}
		}

		require_once(ROOT. '/views/admin_category/create.php');
		return true;
	}





	public function actionUpdate($id){

		self::checkAdmin();

		$category = Category::getCategoryById($id);

		if(isset($_POST['submit'])){
			$options['name'] = $_POST['name'];
			$options['sort_order'] = $_POST['sort_order'];
			$options['status'] = $_POST['status'];

			$errors = false;

			if(!isset($options['name']) || empty($options['name'])){
				$errors[] = 'Заполните поля формы!';				
			}

			if($errors == false){
				$updateCategory = Category::updateCategory($id, $options);

				header('Location: /admin/category');
			}
		}

		require_once(ROOT. '/views/admin_category/update.php');
		return true;

	} 



	public function actionDelete($category_id){

		if(isset($_POST['submit'])){
			Category::deleteCategory($category_id);

			header('Location: /admin/category');
		}
		require_once(ROOT. '/views/admin_category/delete.php');
		return true;
	}

}




?>