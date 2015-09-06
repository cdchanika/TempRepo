<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Add Task</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>

<?php
  $user='root';
	$pass='';
	$db='mysql:host=localhost;dbname=database_user';
	$databaseName = 'database_user';
  try {
    $dbh= new PDO($db,$user,$pass);

    $sql = $dbh->prepare("SELECT user_name,user_ID FROM user,groups where groups.creator=user.user_ID");

    if($sql->execute()) {
       $sql->setFetchMode(PDO::FETCH_ASSOC);
    }
  }
  catch(Exception $error) {
      echo '<p>', $error->getMessage(), '</p>';
  }
  ?>

</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Add Task</a></h1>
		<form id="task" class="appnitro"  method="post" action="getTask.php">
					<div class="form_description">
			<h2>Add Task</h2>
			<p></p>
		</div>						
			<ul >
			
					<li id="li_1" >
		<label class="description" for="element_1">Task Name </label>
		<div>
			<input id="element_1" name="tname" class="element text medium" type="text" maxlength="255" value="" required /> 
		</div><p class="guidelines" id="guide_1"><small>Add a name for your task</small></p> 
		</li>		<li id="li_2" >
		<label class="description" for="element_2">Description </label>
		<div>
			<textarea id="element_2" name="tdes" class="element textarea medium"></textarea> 
		</div><p class="guidelines" id="guide_2"><small>Describe you task here</small></p> 
		</li>		<li id="li_3" >
		<label class="description" for="element_3">Assign Members</label>
		<div>
		<select class="element select medium" id="element_3" name="member" required > 
			<option value="" selected="selected"></option>
			<?php while($row = $sql->fetch()) { ?>       
            <option value="<?php echo $row['user_ID'] ?>" ><?php echo $row['user_name']; ?></option>            
            <li></li>
            <?php }?>
			

		</select>
		</div> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="1049301" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Create Task" />
		</li>
			</ul>
		</form>	
		<div id="footer">
			
		</div>
	</div>
	<img id="bottom" src="bottom.png" alt="">
	</body>
</html>