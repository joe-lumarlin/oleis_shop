<?php 

class Category{

	public static function getCategoriesList(){
		
		$db = DB::getConnection();

		$categoryList = array();

		$result  = $db->query('SELECT id, name FROM category '
		 						.'ORDER BY sort_order ASC');

		$count = 0;
		while ($row = $result->fetch()){
			$categoryList[$count]['id'] = $row['id'];
			$categoryList[$count]['name'] = $row['name'];
			$count++;
		}
		return $categoryList;
	}







	public static function getCategoriesListAdmin(){

		$db = DB::getConnection();

		$query = 'SELECT id, name, sort_order, status FROM category ORDER BY sort_order ASC';
		$result = $db->query($query);

		$categoryList = array();

		$count = 0;
		while($row = $result->fetch()){
			$categoryList[$count]['id'] = $row['id'];
			$categoryList[$count]['name'] = $row['name'];
			$categoryList[$count]['sort_order'] = $row['sort_order'];
			$categoryList[$count]['status'] = $row['status'];
			$count ++;
		}
		return $categoryList;
	}

}


?>