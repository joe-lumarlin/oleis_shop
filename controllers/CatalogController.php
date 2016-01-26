<?php

class CatalogController{

	public function actionIndex(){

		$categories = array();
		$categories = Category::getCategoriesList();

		$latestProduct = array();
		$latestProduct = Product::getLatestProducts(12);

		require_once (ROOT . '/views/catalog/index.php');

		return true;
	}

	public function actionCategory($categoryId, $page = 1){
		
		$categories = array();
		$categories = Category::getCategoriesList();

		$categoryProduct = array();
		$categoryProduct = Product::getProductsListByCategory($categoryId, $page);

		/**
		 * count of products item in same category_id
		 * @var int
		 */
		$total = Product::getTotalProductsInCategory($categoryId);

		$pagination = new Pagination($total, $page, PRODUCT::SHOW_BY_DEFAULT, 'page-');


		require_once (ROOT . '/views/catalog/category.php');

		return true;
	}

}



?>