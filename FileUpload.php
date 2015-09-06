<?php
$group = 0;
if(isset($_GET['grpID'])){$group = $_GET['grpID'] ;}
//require_once 'Login/core/init.php';

//$addpost=new Addpost();

//echo $_GET["id"];

/*if(isset($_GET["id"])){
	$sessionID = $_GET["id"];
	//$_GET["id"]=$sessionID;
	//echo $sessionID;
}*/
$target_file="";
if(isset($_FILES['fileToUpload'])){
	$file = $_FILES['fileToUpload'];
    $fileCount = count($file["name"]);
		
		
    for($i = 0; $i < $fileCount; $i++){
		
		//$sessionID = $_SESSION['rSessionID'];
		//if (isset($_COOKIE['rSessionID'])){
			//$sessionID = $_COOKIE['rSessionID'];
		//}
		
		//echo $_GET["id"];
		//$sessionID = $_GET["id"];
		
	//	$sessionID="RS055";	
		
		/*echo "<ul id=\"fileList\"></ul>";
		if($fileUploaded != null){
			echo "<li>".$file["name"][$i]." upload is successful</li>";
		}else{
			echo "<li>".$file["name"][$i]." upload is unsuccessful</li>";
		}
		echo "</ul>";	*/
			
		
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"][$i]);
		$uploadOk = 1;
		$fileType = pathinfo($target_file,PATHINFO_EXTENSION);
		
		if(isset($_POST["submit"])){
			
		}
		// Check if file already exists
		if (file_exists($target_file)) {
			$uploadOk = 0;
		}
		
		// Check file size
		if ($_FILES["fileToUpload"]["size"][$i] > 2097152) {
			$uploadOk = 0;
		}
		
		//Check file type
		/*if ($fileType == "jpg" && $fileType == "jpeg" && $fileType == "png") {
			$uploadOk = 0;
		}else{
			$this->fileTypeIndicator = $fileType;
		}	*/	
		
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			//echo "Sorry, your file was not uploaded.";
			
			//return null;
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], $target_file)) {
				//echo "The file ". basename( $_FILES["fileToUpload"]["name"][$i]). " has been uploaded.";
				//return $target_file;
			} else {
				//echo "Sorry, there was an error uploading your file.";
				//return null;
			}
			
		}		
		
	
			
	}
	
	
	
	}

$filePath = $target_file;//.$file["name"][0];
	try{
		$postContent="";
		if(isset($_POST['postText'])){
			$postContent=$_POST['postText'];	
		}			
	}catch(Exception $e){
		die($e->getMessage());
	}
	$databaseName = 'database_user';	
	
	echo $filePath;
	$user='root';
	$pass='';
	$db='mysql:host=localhost;dbname=database_user';
	$databaseName = 'database_user';
  try {
    $dbh= new PDO($db,$user,$pass);
	$userID = $_GET['user'];
	
	$getMember = $dbh->prepare("SELECT MemberID from member,user where member.user_ID=user.user_ID and user.user_ID=$userID");
	
	if($getMember->execute()) {
       $getMember->setFetchMode(PDO::FETCH_ASSOC);
    }
	$member = $getMember->fetch();
	$memID = $member['MemberID'];
	
    $sql = $dbh->query("INSERT INTO POST (description,file_path,memberID) VALUES ('$postContent','$filePath',$memID)");

    //if($sql->execute()) {
       //$sql->setFetchMode(PDO::FETCH_ASSOC);
    //}
  }
  catch(Exception $error) {
      echo '<p>', $error->getMessage(), '</p>';
  }
		
	header("Location: groupHome/groupHome.php?grpID=".$group."&user=".$_GET['user']."");
	die();



?>