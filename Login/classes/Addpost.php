<?php
//require_once 'core/init.php';
class Addpost{
	private $db,
			$membername,
			$description;
	
	private function construct(){
		$this->db = DB::getInstance();
		}
	public function Createpost($fields =array()){
		if(!$this->db->insert('post',$fields)){
			throw new Exception('There was a problem creating a post');
			}
		}	
	//public function deletepost()
	
	
	}
	
