<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Create a Group</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>

</head>
<body id="main_body">
	
	<img id="top" src="top.png" alt="">
				<div height="800px" width="800px" id="form_container">

					<h1><a>Create a Group</a></h1>
					<form id="createGroup" class="appnitro"  method="post" action="getGroup.php?userID=<?php if(isset($_GET['userID'])){echo $_GET['userID'];}?>">
						<div class="form_description">
							<h2>Create a Group</h2>

						</div>
						<ul >

							<li id="li_1" >
								<label class="description" for="element_1">Group Name </label>
								<div>
									<input id="element_1" name="grpName" class="element text medium" type="text" maxlength="255" value=""/>
								</div>
							</li>		<li id="li_2" >
							<label class="description" for="element_2">Description </label>
							<div>
								<textarea id="element_2" name="grpDes" class="element textarea medium"></textarea>
							</div><p class="guidelines" id="guide_2"><small>Add a description for your team</small></p>
						</li>

							<li class="buttons">
								<input type="hidden" name="form_id" value="1049299" />

								<input id="saveForm" class="button_text" type="submit" name="submit" value="Create Group" />
							</li>
						</ul>
					</form>
					<div id="footer">

					</div>
				</div>
				
	
	</body>
</html>