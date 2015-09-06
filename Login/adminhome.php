<?php
require_once 'core/init.php';
echo '<p>You are an administrator!</p> ';
?>
<p>Hello <a href="profile.php?user=<?php echo$_GET['name'] ; ?>"><?php echo$_GET['name'] ; ?></a>!</p>
    <u1>
    	<li><a href="logout.php">Log out</a></li>
        <li><a href="update.php"> Update details</a></li>
        <li><a href="changepassword.php">Change password</a></li>
    
    </u1>
