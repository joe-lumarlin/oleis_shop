<?php

return array(

	// product
	'product/([0-9]+)' => 'product/view/$1',   						// actionView in ProductController

	// catalog 	
	'catalog' => 'catalog/index', 									// actionIndex in CatalogController  
	
	// product categoty
	'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',  // actionCategory in CatalogController
	'category/([0-9]+)' => 'catalog/category/$1',					// actionCategory in CatalogController

	'cart/add/([0-9]+)' => 'cart/add/$1',							// actionAdd in CartController
	'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1',					// actionAddAjax in CartController
	'cart/delete/([0-9]+)' => 'cart/delete/$1',						// actionDelete in CatrController
	'cart/checkout' => 'cart/checkout',								// actionCheckout in CartController
	'cart' => 'cart/index',											// actionIndex in CartController

	'user/register' => 'user/register', 							// actionRegister in UserController
	'user/login' => 'user/login',									//actionLogin in UserController
	'user/logout' => 'user/logout',									//actionLogin in UserController
	'cabinet/edit' => 'cabinet/edit',								// actionEdit in CabinetController
	'cabinet' => 'cabinet/index', 									// actionIdex in UserController

	// admin manage product   
    'admin/product/create' => 'adminProduct/create',				// actionCreate in AdminProductController
    'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',	// actionUpdate in AdminProductController
    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',	// actionDelete in AdminProductController
    'admin/product' => 'adminProduct/index',						// actionIndex in AdminProductController

	# admin category
	'admin/category/create' => 'adminCategory/create',				// actionCreate in AdminCategoryController
	'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',	// actionUpdate in AdminCategoryController
	'admin/category/delete/([0-9]+)' =>	'adminCategory/delete/$1',	// actiondelete in AdminCategoryController
	'admin/category' => 'adminCategory/index',						// actionIdx in AdminCategoryController

	# admin order manage    
    'admin/order/update/([0-9]+)' => 'adminOrder/update/$1',		// actionUpdate in AdminOrderController
    'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',		// actionDelete in AdminOrderController
    'admin/order/view/([0-9]+)' => 'adminOrder/view/$1',			// actionView in AdminOrderController
    'admin/order' => 'adminOrder/index',							// actionIndex in AdminOrderController

	# admin panel
	'admin' => 'admin/index',										// actionIndex in AdminController

	# about shop
	'contacts' => 'site/contact',
	'about' => 'site/about',
	
	// main page
	'' => 'site/index',   	 										// actionIndex in SiteController
);

?>