<?php

class AdminController extends AdminBase {
	
	/**
	 * action for start admin page
	 * @return boolean 
	 */
	public function actionIndex(){
	
		// check access
		self::checkAdmin();	

		// include view
		require_once(ROOT. '/views/admin/index.php');

		return true;
	}	
}





?>