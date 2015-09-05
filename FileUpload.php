<?php
require_once("File.php");
//echo $_GET["id"];

/*if(isset($_GET["id"])){
	$sessionID = $_GET["id"];
	//$_GET["id"]=$sessionID;
	//echo $sessionID;
}*/
if(isset($_FILES['fileToUpload'])){
	$file = $_FILES['fileToUpload'];
    $fileCount = count($file["name"]);
	
	//Used only for viewing purposes
	$text = "";
	
	$file = new File();
	
	
    for($i = 0; $i < $fileCount; $i++){
		$fileUploaded = $file -> fileUpload($i);
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
			
	}
	
	//header("Location: UploadCVs.php");
	//die();
}

?>