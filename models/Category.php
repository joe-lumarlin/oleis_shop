<?php 

class Category{

	public static function getCategoriesList(){
		
		$db = DB::getConnection();

		$categoryList = array();

		$result  = $db->query('SELECT * FROM category '
		 						.'ORDER BY sort_order ASC');

		$count = 0;
		while ($row = $result->fetch()){
			$categoryList[$count]['id'] = $row['id'];
			$categoryList[$count]['name'] = $row['name'];
			$categoryList[$count]['sort_order'] = $row['sort_order'];
			$categoryList[$count]['status'] = $row['status'];

			$count++;
		}
		return $categoryList;
	}






	public static function getCategoryById($category_id){
		
		$category_id = intval($category_id);

		if($category_id){

			$db = DB::getConnection();

			$result = $db->query('SELECT * FROM category WHERE id = '.$category_id . ' ORDER BY sort_order ASC');
			$result->setFetchMode(PDO::FETCH_ASSOC);

			return $result->fetch();
		}

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



	public static function createNewCategory($options){

		$db = DB::getConnection();

		$query = 'INSERT INTO category '
				.'(name, sort_order, status) '
				.'VALUES '
				.'(:name, :sort_order, :status) ';

		$result = $db->prepare($query);
		$result->bindParam(':name', $options['name'], PDO::PARAM_STR);
		$result->bindParam(':sort_order', $options['sort_order'], PDO::PARAM_INT);
		$result->bindParam(':status', $options['status'], PDO::PARAM_INT);

		return $result->execute();
	}




	public static function updateCategory($id, $options){

		$db = DB::getConnection();

		$query = 'UPDATE category SET 
					name = :name,
					sort_order = :sort_order,
					status = :status
					WHERE id = :id';

		$result = $db->prepare($query);
		$result->bindParam(':name', $options['name'], PDO::PARAM_STR);
		$result->bindParam(':sort_order', $options['sort_order'], PDO::PARAM_INT);
		$result->bindParam(':status', $options['status'], PDO::PARAM_INT);
		$result->bindParam(':id', $id, PDO::PARAM_INT);

		return $result->execute();
	}





	public static function deleteCategory($category_id){

		$category_id = intval($category_id);

		$db = DB::getConnection();

		$query = 'DELETE FROM category WHERE id = :id';

		$result = $db->prepare($query);
		$result->bindParam(':id', $category_id, PDO::PARAM_INT);

		return $result->execute();
	}
}


?>