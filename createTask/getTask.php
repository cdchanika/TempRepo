<?php
$taskName="";
$taskDes="";
$assignedMember="";

if(isset($_POST['tname'])){
	$taskName=$_POST['tname'];
}

if(isset($_POST['tdes'])){
	$taskDes=$_POST['tdes'];
}

if(isset($_POST['member'])){
	$assignedMember=$_POST['member'];
}

$user='root';
	$pass='';
	$db='mysql:host=localhost;dbname=database_user';
	$databaseName = 'database_user';
  try {
    $dbh= new PDO($db,$user,$pass);

    $sql = $dbh->query("INSERT INTO tasks (taskName,taskDes,assigned) VALUES('$taskName','$taskDes',$assignedMember)");

    //if($sql->execute()) {
       //$sql->setFetchMode(PDO::FETCH_ASSOC);
    //}
  }
  catch(Exception $error) {
      echo '<p>', $error->getMessage(), '</p>';
  }

?>