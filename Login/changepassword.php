<?php
require_once 'core/init.php';
$user =new User();
if(!$user->isLoggedIn()){
	redirect::to('index.php');
	}
if(Input::exists()){
	if(Token::check(Input::get('token'))){
		$validate =new Validate();
		$validation =$validate->check($_POST,array(
			'password_current'=>array(
				'required'=>true,
				'min'=>6
				),
			'newpassword'=>array(
				'required'=>true,
				'min'=>6
			),
			'newpassword_again'=>array(
				'required'=>true,
				'min'=>6,
				'matches'=>'newpassword'
				)
		));
		
		if($validation->passed()){
			if(Hash::make(Input::get('password_current'),$user->data()->salt) !==$user->data()->Password){
				echo 'Your current password is wrong';
				
				}else{
					$salt = Hash::salt(32);
					$user->update(array(
						'Password'=>Hash::make(Input::get('newpassword'),$salt),
						'salt'=>$salt
					
					));
					Session::flash('home','Your password has been changed!');
					redirect::to('index.php');
					}
				
			
			}else{
				foreach($validation->errors() as $error){
					echo $error,'<br>';
					}
				
				}
		
		}
	}
?>





<form action ="" method="post">
	<div class ="field">
    	<label for ="password_current"> Current password</label>
        <input type="password" name="password_current" id="password_current">
    </div>
    
    <div class ="field">
    	<label for ="newpassword"> Newpassword</label>
        <input type="password" name="newpassword" id="newpassword">
    </div>
    
    <div class ="field">
    	<label for ="newpassword_again"> Newpassword again</label>
        <input type="password" name="newpassword_again" id="newpassword_again">
    </div>
    
    <input type="submit" value="change">
    <input type="hidden" name="token" value="<?php echo Token::generate();?>">
</form>
    