<?php

return array(

	// товар
	'product/([0-9]+)' => 'product/view/$1',   						// actionView in ProductController

	// каталог 	
	'catalog' => 'catalog/index', 									// actionIndex in CatalogController  
	
	// категория товаров
	'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',  	// actionCategory in CatalogController
	'category/([0-9]+)' => 'catalog/category/$1',					// actionCategory in CatalogController
	
	// main page
	'' => 'site/index',   	 										// actionIndex in SiteController
);

?>