<?php
class User{
	private $db,
			$_data,
			$_sessionName,
			$_cookieName,
			$_isLoggedIn;
	public function __construct($user=null){
		$this->_db = DB::getInstance();
		
		$this->_sessionName = config::get('session/session_name');
		$this->_cookieName = config::get('remember/cookie_name');
		if(!$user){
			if(Session::exists($this->_sessionName)){
				$user = Session::get($this->_sessionName);
				if($this->find($user)){
					$this->_isLoggedIn=true;
					}else{
						//process logout
						redirect::to('index.php');
					}
				
				}
			}else{
				$this->find($user);
				}
		}
	
	public function update($fields = array(),$id=null){
		if(!$id && $this->isLoggedIn()){
			$id=$this->data()->User_ID;
			
			}
		
		if(!$this->_db->update('user',$id,$fields)){
			throw new Exception("There was a problem creating an account");
			}
		
		}
	
	
	
	public function create($fields =array()){
		if(!$this->_db->insert('user',$fields)){
			throw new Exception('There was a problem creating an account');
			}
		}	
	public function find($user = null){
		if($user){
			$field = (is_numeric($user))? 'User_ID' : 'User_Name';
			$data = $this->_db->get('user',array($field, '=', $user));
			
			if($data->count()){
				$this->_data= $data->first();
				return true;
				}
			}
			return false;
		}
	
	public function login($User_Name = null, $Password  = null,$remember=false ){
		
		
		if(!$User_Name && !$Password && $this->exists()){
			Session::put($this->_sessionName, $this->data()->User_ID);
			
			}else{
				$user = $this->find($User_Name);
		
		if($user){
			if($this->data()->Password=== Hash::make($Password,$this->data()->salt)){
				Session::put($this->_sessionName,$this->data()->User_ID);
				if($remember){
					$hash =Hash::unique();
					$hashCheck = $this->_db->get('users_sessions',array('users_id', '=',$this->data()->User_ID));
					if(!$hashCheck->count()){
						$this->_db->insert('users_sessions',array(
						'users_id' => $this->data()->User_ID,
						'hash' =>$hash
						));
						}else{
							$hash = $hashCheck->first()->hash;
							}
							cookie::put($this->_cookieName,$hash,config::get('remember/cookie_expiry'));
					
					}
				return true;
				

				}
			}
		}
		
		
		return false;
		}
	
	public function hasPermission($key){
		$group = $this->_db->get('groups',array('User_ID','=',$this->data()->group));
		if($group->count()){
			$permissions= json_decode($group->first()->permission,true);
			if($permissions[$key]== true){
				return true;
				}
			}
			return false;
		
		}
	public function exists(){
		return (!empty($this->_data)) ? true: false ;
		}
	
	public function logout(){
		
		$this->_db->delete('users_sessions',array('users_id','=',$this->data()->User_ID));
		
		Session::delete($this->_sessionName);
		cookie::delete($this->_cookieName);
		}
	
	public function data(){
		return $this->_data;
		}
	public function isLoggedIn(){
		return $this->_isLoggedIn;
		}
	}