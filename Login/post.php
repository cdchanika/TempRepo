<?php
require_once 'core/init.php';

$addpost=new Addpost();

try{
				$addpost->Createpost(array(
				'description'=>Input::get('postContent'),
				'file_path'=>Input::get('file_path')			
				
				
				));
				
				
				redirect::to('../Interfaces/timeline.php');
				
			}catch(Exception $e){
				die($e->getMessage());
			}