<html>
<head>
<title>Add Task</title>
<script>
$(document).ready(
function() 
{
    $('#submitBtn').click(function(){
		$.post("TakeTask.php",
		    {
				taskName:$('#TaskName').val(),
				taskDes:$('#TaskDescription').val()
				
			},
			function(data)
			{
			
			}
		);
	});
}
);
</script>
</head>
<body>

<form method="post">
<label>Task Name</label>
<input id="TaskName" type="text"/>
<br><br>
<label>Task Description</label>
<input id="TaskDescription" type="text"/>
<input id="submitBtn" type="submit">
</form>
</body>
</html>