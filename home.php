<?php
require_once 'Login/core/init.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <p>&nbsp;&nbsp;&nbsp;&nbsp; Hello <a href="profile.php?user=<?php if(isset($_GET['name'])){echo$_GET['name'] ;} ?>"><?php if(isset($_GET['name'])){echo$_GET['name'] ;} ?></a>!</p>
    <ul>
    	<li><a href="Login/logout.php">Log out</a></li>
        <li><a href="Login/update.php"> Update details</a></li>
        <li><a href="Login/changepassword.php">Change password</a></li>
        
    
    </ul>

  <?php
    if(isset($_GET['name'])){$name = $_GET['name'] ;}
    $user='root';
	$pass='';
	$db='mysql:host=localhost;dbname=database_user';
	$databaseName = 'database_user';
  try {
    $dbh= new PDO($db,$user,$pass);

    
	$getUser = $dbh->prepare("SELECT user_ID FROM user where user.user_name='$name'");
	
	if($getUser->execute()) {
       $getUser->setFetchMode(PDO::FETCH_ASSOC);
    }
	$getID = $getUser->fetch();
    $id = $getID['user_ID'];
	
	$sql = $dbh->prepare("SELECT grpName,grpID,user_name FROM groups,user WHERE groups.creator=user.user_ID AND creator='$id'");
	
	if($sql->execute()) {
       $sql->setFetchMode(PDO::FETCH_ASSOC);
    }
  }
  catch(Exception $error) {
      echo '<p>', $error->getMessage(), '</p>';
  }
  ?>
</head>
<body>

<div class="container">
  <div class="jumbotron" style='margin-bottom: 0px; background:url("jambo.png"); background-position: 0% 25%; background-size:cover;background-repeat:no-repeat;
    color: white;
    text-shadow: black 0.3em 0.3em 0.3em; height:248px'>
    
  </div>
  <?php $user = $getUser->fetch(); ?>
  <div class="row">
    <div class="col-sm-6">
	<br><br>
		<button><a href="createGroup/createGroup.php?userID=<?php echo $id;?>">Create group</a></button>
      <h3>Your groups</h3>
      <ul>
	  <?php while($row = $sql->fetch()) { ?>       
                        
            <a href="groupHome/groupHome.php?grpID=<?php echo $row['grpID'];?>&user=<?php echo $id;?>"><li><?php echo "<pre><span class=\"inner-pre\" style=\"font-size: 16px; color: blue\"\">".$row['grpName']."\t\tCreated by :".$row['user_name']."</span></pre> "; ?></li></a>
            <?php }?>
                      
	  </ul>
    </div>
    
  </div>
</div>

</body>
</html>
