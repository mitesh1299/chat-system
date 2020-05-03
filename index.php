<?php
include 'db.php';
 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>m</title>
		<link rel="stylesheet" href="style.css" media="all"/>
		<script>
		function ajax(){

			var req= new XMLHttpRequest();
			req.onreadystatechange = function(){
				 if(req.readyState == 4 && req.status == 200){
					 document.getElementById('chat').innerHTML = req.responseText;
				 }
			}
			req.open('GET','chat.php',true);
			req.send();
		}
		setInterval(function(){ajax()},1000);
		</script>
	</head>
<body onload="ajax();">
<h1 align="center"> CHAT SYSTEM </h1>
<div id="container">
	<div id="chat_box">
	<div id="chat"></div>
		</div>
		<form method="post" action="index.php">

		<input type="text" name="name" placeholder="Enter Name"/>
		<textarea name="msg" placeholder="Enter Text"></textarea>
		<input type="submit" name="submit" value="send it"/>
		</form>
		<?php
	if(isset($_POST['submit']))	{
		$name=$_POST['name'];
		$msg=$_POST['msg'];
$query="INSERT INTO chat(name,msg) VALUES ('$name','$msg')";
$run=$con->query($query);
if($run){
	echo"<embed loop='false' src='chat.wav' hidden='true' autoplay='true'/>";
}
}
		 ?>
		</div>
		</body>
		</html>
