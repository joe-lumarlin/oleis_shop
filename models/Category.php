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

}


?>