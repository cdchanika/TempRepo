<?php
require_once '../Login/core/init.php';


?>    

<html>
<head>
<title>iHack dashboard</title>

<p>Hello <a href="profile.php?user=<?php if(isset($_GET['name'])){echo$_GET['name'];} ?>"><?php if(isset($_GET['name'])){echo$_GET['name'];} ?></a>!</p>
    <u1>
    	<li><a href="../Login/logout.php">Log out</a></li>
        <li><a href="../Login/update.php"> Update details</a></li>
        <li><a href="../Login/changepassword.php">Change password</a></li>
    
    </u1>
<style>
#pageTop {
	background:url(imged/bbar.png) repeat-x;
	height: 90px;
}

#pageTop > #ptitle {
	font-family: "Comic Sans MS", cursive, sans-serif;
	font-size:80px;
	background-color:rad;
}

#pageTop > #prest {
	float: left;
	height: 90px;
	background-color:red;
}
#pageMiddle {
	float:left;
}
#pageMiddle > #postin {
	position:fixed;
	right: 10px;
	
	
}
#pageMiddle > #postin > #scrolld {
    background-color: lightblue;
    width: 850px;
    height: 100px;
    overflow: scroll;
	
}

textarea {
	height: 300px;
	width: 850px;
}

</style>

<script>
$(document).ready(
function() 
{
    $('#submitBtn').click(function(){
		$.post("FileUpload.php",
		    {
				postContent:$('#myPost').val()//,
				//value:$('#jbposition').val()
				
			},
			function(data)
			{
			//	$('#aa').val(data); 
			}
		);
	});
}
);
</script>
</head>
<body>
<div id="pageTop">
	<div id="ptitle"> iHack</div>
	
</div>
<div id="pageMiddle">
	<div id="leftSide">
	<section id = "">
	</div>
	<div id="postin">
		<form action="FileUpload.php?name=<?php if(isset($_GET['name'])){echo$_GET['name'];}?>" onsubmit="" enctype="multipart/form-data" method="POST">
			<textarea id="myPost" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')">
			Write to share
			</textarea> 
			<br/>
			<input id="customFile" type="file" class="file_input" name="fileToUpload[]">
			<input id="submitBtn" type="submit" value="Post">
		</form>
		<div id="scrolld">

		</div>
	</div>
</div>
<div id="pagebottom">
</div>
</body>
</html>