<?php
require_once '../Login/core/init.php';


?>
<p>Hello <a href="profile.php?user=<?php echo$_GET['name'] ; ?>"><?php echo$_GET['name'] ; ?></a>!</p>
    <u1>
    	<li><a href="../Login/logout.php">Log out</a></li>
        <li><a href="../Login/update.php"> Update details</a></li>
        <li><a href="../Login/changepassword.php">Change password</a></li>
    
    </u1>
    

<html>
<head>
<title>iHack dashboard</title>
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
		<form onsubmit="" method="POST">
			<textarea id= "myPost" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')">
			Write to share
			</textarea> 
			<br/>
			<input type="file" name="fileToUpload" id="fileToUpload">
			<input type="submit" value="post">
		</form>
		<div id="scrolld">

		</div>
	</div>
</div>
<div id="pagebottom">
</div>
</body>
</html>