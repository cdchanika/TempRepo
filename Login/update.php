<?php
require_once 'core/init.php';
$user =new User();
if(!$user->isLoggedIn()){
	redirect::to('index.php');
	
	}
	
if(Input::exists()){
	if(Token::check(Input::get('token'))){
		
		$validate = new Validate();
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
			
			
		));
		if($validation->passed()){
			try{
				
				$user->update(array(
				'First_Name'=>Input::get('First_Name'),
				'Last_Name'=>Input::get('Last_Name')
				
				));
				Session::flash('home','Your details have been updated');
				redirect::to('index.php');
				
				}catch(Exception $e){
					die($e->getMessage());
					}
			
			}else{
				foreach($validation->errors() as $error){
					echo $error,'<br>';
					}
				}
		}
	}	
?>
<form action = "" method = "post">
	<div class = "field">
    	<label for ="First_Name">First Name</label>
        <input type="text" name="First_Name" value="<?php echo escape($user->data()->First_Name);?>">
    </div>
    
    <div class="field">
        <label for ="Last_Name">Last Name</label>
        <input type="text" name="Last_Name" value="<?php echo escape($user->data()->Last_Name);?>">
    </div>
    
       
        
        <input type ="submit" value="Update">
        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
        
        
</form>
        
        
