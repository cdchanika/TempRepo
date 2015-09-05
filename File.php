<?php 
class File{
	private $filePath = "";
	private $fileTypeIndicator = "";	
		
	public function __construct(){
		//
	}
		
	
	public function fileUpload($i){
		
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
			
			return null;
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], $target_file)) {
				//echo "The file ". basename( $_FILES["fileToUpload"]["name"][$i]). " has been uploaded.";
				return $target_file;
			} else {
				//echo "Sorry, there was an error uploading your file.";
				return null;
			}
			
		}		
		
	}	
	
}

?>

