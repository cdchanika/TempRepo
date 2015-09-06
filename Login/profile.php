<?php
require_once 'core/init.php';

if(!$username = Input::get('user')){
	redirect::to('index.php');
	}else{
		$user = new User($username);
		if(!$user->exists()){
			redirect::to(404);
			}else{
				$data =$user->data();
				}
				?>
                
                <h3><?php echo escape($data->User_Name); ?></h3>
                <p>First name :<?php echo escape($data->First_Name);?></p>
                <p>Last name :<?php echo escape($data->Last_Name);?></p>
                <p>Email :<?php echo escape($data->E_mail);?></p>
                
                <?php
		}