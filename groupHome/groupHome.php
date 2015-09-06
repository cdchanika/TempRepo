<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title></title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>
<style>
	.btn {
		background: #3498db;
		background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
		background-image: -moz-linear-gradient(top, #3498db, #2980b9);
		background-image: -ms-linear-gradient(top, #3498db, #2980b9);
		background-image: -o-linear-gradient(top, #3498db, #2980b9);
		background-image: linear-gradient(to bottom, #3498db, #2980b9);
		-webkit-border-radius: 28;
		-moz-border-radius: 28;
		border-radius: 28px;
		font-family: Arial;
		color: #ffffff;
		font-size: 20px;
		padding: 10px 20px 10px 20px;
		text-decoration: none;
	}

	.btn:hover {
		background: #3cb0fd;
		background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
		background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
		background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
		background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
		background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
		text-decoration: none;
	}
</style>
<?php
	$group=0;
    if(isset($_GET['name'])){$name = $_GET['name'] ;}
	if(isset($_GET['grpID'])){$group = $_GET['grpID'] ;}
    $user='root';
	$pass='';
	$db='mysql:host=localhost;dbname=database_user';
	$databaseName = 'database_user';
  try {
    $dbh= new PDO($db,$user,$pass);

    $sql = $dbh->prepare("SELECT description FROM post,member,groups where post.memberID=member.memberID and groups.grpID=member.grpID and groups.grpID=$group");
	
    if($sql->execute()) {
       $sql->setFetchMode(PDO::FETCH_ASSOC);
    }
		
  }
  catch(Exception $error) {
      echo '<p>', $error->getMessage(), '</p>';
  }
  ?>
</head>

<body id="main_body" >

	<table style="width: 1434px;">
		<tbody style="padding-left: 10px; padding-right: 10px">
		<tr>
			<td style="width: 20px">

			</td>
			<td style="width: 700px;">
				<img id="top" src="top.png" alt="">
				<div id="form_container" style="height: 360px;width: 960px;">


					<h1><a></a></h1>
					<form id="form_post" class="appnitro" enctype="multipart/form-data" method="post" action="../fileUpload.php?grpID=<?php echo $group?>&user=<?php echo $_GET['user']?>">

						<ul >

							<li id="li_1" >
								<label class="description" for="element_1">Add your posts here................ </label>
								<div>
									<textarea id="element_1" name="postText" class="element textarea medium"></textarea>
								</div>
							</li>		<li id="li_2" >
							<label class="description" for="element_2">Upload a File </label>
							<div>
								<input id="element_2" name="element_2" class="element file" type="file"/>
							</div>
						</li>

							<li class="buttons">
								<input type="hidden" name="form_id" value="1049299" />

								<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
							</li>
						</ul>
					</form>
					<div id="footer">

					</div>
				</div>
				<img id="bottom" src="bottom.png" alt="">
			</td>
			<td style="width: 583px;height: 380px;">
				<img id="top" src="top.png" alt="">
				<div id="form_container" style="height: 360px">


					<h1><a></a></h1>

					<div>
						<ul class="stack button-group">
							<li style="padding-top: 30px; list-style: none"><a href="#" class="btn">Add Member</a></li>
							<li style="padding-top: 30px; list-style: none"><a href="#" class="btn">Add Task</a></li>
							<li style="padding-top: 30px; list-style: none"><a href="#" class="btn">Add Events</a></li>
							<li style="padding-top: 30px;  list-style: none"><a href="#" class="btn">Add Threads</a></li>
						</ul>
					</div>

					<div id="footer">

					</div>
				</div>
				<img id="bottom" src="bottom.png" alt="">
			</td>
			<td style="width: 20px">

			</td>
		</tr>
		<tr>
			<td style="width: 20px">

			</td>
			<td>
				<img id="top" src="top.png" alt="">
				<div id="form_container" style="height: 700px;width: 960px;">
					<ul>
					<?php while($row = $sql->fetch()) { ?>       
                        
					<li><?php echo "<pre><span class=\"inner-pre\" style=\"font-size: 16px; color: blue\">".$row['description']."\t\t</span></pre> "; ?></li>
					<?php }?>
      					
					</ul>
					<div id="footer">
					</div>
				</div>
				<img id="bottom" src="bottom.png" alt="">
			</td>
		</tr>
		</tbody>
	</table>
	

	</body>
</html>