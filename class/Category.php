<?php
class Category {	
   
	private $categoryTable = 'forum_category';
	private $topicTable = 'forum_topics';
	private $postTable = 'forum_posts';
	private $conn;
	
	public function __construct($db){
        $this->conn = $db;
    }	
	
	public function getCategoryList(){		
		$sqlQuery = "
			SELECT *
			FROM ".$this->categoryTable." ORDER BY category_id DESC";
		
		$stmt = $this->conn->prepare($sqlQuery);
		$stmt->execute();
		$result = $stmt->get_result();			
		return $result;	
	}
	
	public function getCategory(){
		if($this->category_id) {
			$sqlQuery = "
				SELECT name
				FROM ".$this->categoryTable." 
				WHERE category_id = ".$this->category_id;
			
			$stmt = $this->conn->prepare($sqlQuery);
			$stmt->execute();
			$result = $stmt->get_result();	
			$categoryDetails = $result->fetch_assoc();			
			return $categoryDetails;	
		}
	}
	
	public function getCategoryTopicsCount(){
		if($this->category_id) {
			$sqlQuery = "
				SELECT count(*) as total_topic
				FROM ".$this->topicTable." 
				WHERE category_id = ".$this->category_id;
			
			$stmt = $this->conn->prepare($sqlQuery);
			$stmt->execute();
			$result = $stmt->get_result();	
			$categoryDetails = $result->fetch_assoc();			
			return $categoryDetails['total_topic'];	
		}
	}
	
	public function getCategorypostsCount(){
		if($this->category_id) {
			$sqlQuery = "
				SELECT count(p.post_id) as total_posts
				FROM ".$this->postTable." as p
				LEFT JOIN ".$this->topicTable." as t ON p.topic_id = t.topic_id
				LEFT JOIN ".$this->categoryTable." as c ON t.category_id = c.category_id				
				WHERE c.category_id = ".$this->category_id;			
			$stmt = $this->conn->prepare($sqlQuery);
			$stmt->execute();
			$result = $stmt->get_result();	
			$categoryDetails = $result->fetch_assoc();			
			return $categoryDetails['total_posts'];	
		}
	}
	
}
?>