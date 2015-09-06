<?php
require_once 'core/init.php';

if(Input::exists()){
	if(Token::check(Input::get('token'))){
		
		$validate =new Validate();
		$validation =$validate->check($_POST,array(
			'First_Name'=>array(
				'required'=> true,
				'min' => 2,
				'max' => 20,
				
				),
			'Last_Name'=>array(
				'required'=> true,
				'min' => 2,
				'max' => 20,
				
			),
			'User_Name'=>array(
				'required'=> true,
				'min' => 2,
				'max' => 30,
				'unique'=>'user'
				
			
			),
			'E_mail'=>array(
				'required'=> true,
				'min' => 2,
				'max' => 30,
				'unique'=>'user',
				'isemail'=>true
			),
			'Password'=>array(
				'required'=>true,
				'min'=>6
			),
			'password_again'=>array(
				'required'=>true,
				'matches'=>'Password'
				),
			
			
		
		));
		
		if($validation->passed()){
			$user=new User();
			
			$salt = Hash::salt(32);
			
			try{
				$user->create(array(
				'First_Name'=>Input::get('First_Name'),
				'Last_Name'=>Input::get('Last_Name'),
				'User_Name'=>Input::get('User_Name'),
				'E_mail'=>Input::get('E_mail'),
				'Password'=>Hash::make(Input::get('Password'),$salt),
				'group'=>1,
				'salt'=>$salt
				
				
				));
				
				Session::flash('home','You have been registered and can now log in!');
				redirect::to('index.php');
				
			}catch(Exception $e){
				die($e->getMessage());
			
			}
			}else{
				foreach($validation->errors() as$error){
					echo $error,'<br>';
					
					}
				}
	}
	}

?>


<form action="" method="post">
<div class="field">
	<label for= "First_Name">First Name</label>
    <input type="text" name="First_Name" id="First_Name" value="<?php echo escape(Input::get('First_Name'));?>" autocomplete="off">

</div>

<div class="field">
	<label for= "Last_Name">Last Name</label>
    <input type="text" name="Last_Name" id="Last_Name" value="<?php echo escape(Input::get('Last_Name'));?>" autocomplete="off">
</div>

<div class="field">
	<label for= "User_Name">Choose an user name</label>
    <input type="text" name="User_Name" id="User_Name" value="<?php echo escape(Input::get('User_Name'));?>" autocomplete="off">
</div>

<div class="field">
	<label for= "E_mail">Email address</label>
    <input type="text" name="E_mail" id="E_mail" value="<?php echo escape(Input::get('E_mail'));?>" autocomplete="off">
</div>

<div class="field">
	<label for= "Password">Choose a password</label>
    <input type="password" name="Password" id="Password" >
</div>

<div class="field">
	<label for= "password_again">Enter your password again</label>
    <input type="password" name="password_again" id="password_again" >
</div>


<input type="hidden" name="token" value="<?php echo Token::generate();?>" >
<input type="submit" value= "Register">
</form>
