<?php
class Post {	
   
	private $postTable = 'forum_posts';
	private $conn;
	
	public function __construct($db){
        $this->conn = $db;
    }	
	
	public function getPost(){		
		$sqlQuery = "
			SELECT *
			FROM ".$this->postTable." ORDER BY post_id DESC LIMIT 3";
		
		$stmt = $this->conn->prepare($sqlQuery);
		$stmt->execute();
		$result = $stmt->get_result();			
		return $result;	
	}
	
	public function insert(){
		echo "===message===".$this->message."===topic id===".$this->topic_id."===userid==".$this->user_id;		
		if($this->message && $this->topic_id && $this->user_id) {

			$stmt = $this->conn->prepare("
				INSERT INTO ".$this->postTable."(`message`, `topic_id`, `user_id`)
				VALUES(?, ?, ?)");
						
			$stmt->bind_param("sii", $this->message, $this->topic_id, $this->user_id);
			
			if($stmt->execute()){	
				$lastPid = $stmt->insert_id;
				$sqlQuery = "
					SELECT post_id, message, topic_id, user_id, DATE_FORMAT(created,'%d %M %Y %H:%i:%s') AS post_date
					FROM ".$this->postTable." WHERE post_id = '$lastPid'";
				$stmt2 = $this->conn->prepare($sqlQuery);				
				$stmt2->execute();
				$result = $stmt2->get_result();
				$record = $result->fetch_assoc();
				echo json_encode($record);
			}		
		}
	}

	public function update(){
		
		if($this->post_id && $this->message) {

			$stmt = $this->conn->prepare("
				UPDATE ".$this->postTable." SET message = ? 
				WHERE post_id = ?");
						
			$stmt->bind_param("si", $this->message, $this->post_id);
			
			if($stmt->execute()){					
				$sqlQuery = "
					SELECT post_id, message, user_id, DATE_FORMAT(created,'%d %M %Y %H:%i:%s') AS post_date
					FROM ".$this->postTable." WHERE post_id = '".$this->post_id."'";
				$stmt2 = $this->conn->prepare($sqlQuery);				
				$stmt2->execute();
				$result = $stmt2->get_result();
				$record = $result->fetch_assoc();
				echo json_encode($record);
			}		
		}
	}
}
?>