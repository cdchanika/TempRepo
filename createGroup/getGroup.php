<?php
$grpName="";
$grpDes="";
$creator="";

if(isset($_POST['grpName'])){
	$grpName=$_POST['grpName'];
}

if(isset($_POST['grpDes'])){
	$grpDes=$_POST['grpDes'];
}

if(isset($_GET['userID'])){
	$creator=$_GET['userID'];
}
 //echo $creator;
    $user='root';
	$pass='';
	$db='mysql:host=localhost;dbname=database_user';
	$databaseName = 'database_user';
  try {
    $dbh= new PDO($db,$user,$pass);

    $sql = $dbh->query("INSERT INTO groups (grpName,grpDes,creator) VALUES('$grpName','$grpDes',$creator)");
	$grpID = $dbh->prepare("SELECT max(grpID) from groups where grpName='$grpName'");
		
    if($grpID->execute()) {
       $grpID->setFetchMode(PDO::FETCH_ASSOC);
    }
	$row = $grpID->fetch();
	$gr = $row['grpID'];
	echo $gr;
  }
  catch(Exception $error) {
      echo '<p>', $error->getMessage(), '</p>';
  }

  //header("Location: ../groupHome/groupHome.php?grpID=".$gr."&user=".$creator."");
  //die();

?>