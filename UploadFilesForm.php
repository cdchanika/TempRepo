<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--
    <link href="css/bootstrap.min.css" rel="stylesheet">

	
	
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap.file-input.js"></script>
	
	<script src="jquery-ui-1.11.4/jquery-ui.js"></script>
    <title>CV & Recruitment Management System</title>
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
    
	-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="jquery/jquery.js"></script>
	<script>
		function _(el){
			return document.getElementById(el);
		}
		function uploadFile(){
			var file = _("customFile").files[0];
			// alert(file.name+" | "+file.size+" | "+file.type);
			var formdata = new FormData();
			formdata.append("customFile", file);
			var ajax = new XMLHttpRequest();
			ajax.upload.addEventListener("progress", progressHandler, false);
			ajax.addEventListener("load", completeHandler, false);
			ajax.addEventListener("error", errorHandler, false);
			ajax.addEventListener("abort", abortHandler, false);
			ajax.open("POST", "UploadFiles.php");
			ajax.send(formdata);
		}
		function progressHandler(event){
			_("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
			var percent = (event.loaded / event.total) * 100;
			_("progressBar").value = Math.round(percent);
			_("status").innerHTML = Math.round(percent)+"% uploaded... please wait";
		}
		function completeHandler(event){
			_("status").innerHTML = event.target.responseText;
			_("progressBar").value = 0;
		}
		function errorHandler(event){
			_("status").innerHTML = "Upload Failed";
		}
		function abortHandler(event){
			_("status").innerHTML = "Upload Aborted";
		}
		
	</script>
	
	
</head>

<body onload="fileUploadFunction()">

	
<div class="container">
	<h1 align="center">Input Files</h1>
	<hr>
	<form action="FileUpload.php" enctype="multipart/form-data" method="post">
		 <div>
			<!--<button>
				<i class="glyphicon glyphicon-plus"></i>
				<span>Add files ...</span>-->
				<input id="customFile" onchange="fileUploadFunction()" type="file" class="file_input" name="fileToUpload[]" multiple>
			<!--</button>-->
	
			<!--<button type="submit">
				<i class="glyphicon glyphicon-upload"></i>
				<span>Start upload</span>-->
				<input id="submitBtn" onclick="uploadFile()" name="submit" type="submit"/>
			<!--</button>		-->
		</div>	
	</form>
	
	<ul id="fileList"></ul>
</div>

<script>
		function fileUploadFunction(){
			var temp = document.getElementById("feedBack");
			
			if (temp != null) {
				temp.parentNode.removeChild(temp);
			}
			var x = document.getElementById("customFile");
			var txt = "";
			var list = document.getElementById("fileList");
			if ('files' in x) {
				if (x.files.length == 0) {
					txt = "Select files to upload.";
				} else {
					for (var i = 0; i < x.files.length; i++) {
						var listItem = document.createElement('li');
						listItem.setAttribute('class','list-group-item');
						txt += "<strong>File " + (i+1) + "</strong><br>";
						var file = x.files[i];
						if ('name' in file) {
							txt += "<strong>File name: </strong>" + file.name +" "+" "+" " ;
						}
						if ('size' in file) {
							txt += "<strong>Size: </strong>" + file.size + " bytes <br>";
						}
						listItem.innerHTML = txt;
						list.appendChild(listItem);
						txt = "";
					}
				}
			} 
			else {
				if (x.value == "") {
					txt += "Select files to upload.";
				} else {
					txt += "The files property is not supported by your browser!";
					txt  += "<br>The path of the selected file: " + x.value; // If the browser does not support the files property, it will return the path of the selected file instead. 
				}
			}
		}
	</script>
</body>