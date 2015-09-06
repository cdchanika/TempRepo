<?php
require_once 'core/init.php';

if(Input::exists()){
	if(Token::check(Input::get('token'))){
		$validate= new Validate();
		$validation=$validate->check($_POST,array(
			'User_Name'=>array('required'=>true),
			'Password'=>array('required'=>true)
					
			));
		
		if($validation->passed()){
			$user=new User();
			
			$remember = (Input::get('remember')==='on') ? true : false;
			
			$login=$user->login(Input::get('User_Name'),Input::get('Password'),$remember);
			
			if($login){
				redirect::to('index.php');
				}else{
					echo '<p> Sorry logging in failed.</p>';
					}
		}else{
			foreach($validation->errors() as $error){
				echo $error,'<br>';
				
				}
				
				}
		}
	}

?>




<form action="" method="post">
	<div class="field">
    	<lable for="User_Name">Username</lable>
        <input type="text" name="User_Name" id="User_Name" autocomplete="off"  >
        
    </div>
    
    <div class="field">
    	<lable for="Password">Password</lable>
        <input type="password" name="Password" id="Password" autocomplete="off"  >
        
    </div>
    
    <div class="field">
    	<lable for = "remember">
        	<input type ="checkbox" name="remember" id="remember" /> Remember </label>
    </div>
    
    <input type="hidden" name="token" value="<?php echo Token::generate();?>" >
    <input type="submit" value="Log in" >
    
</form>
    
    