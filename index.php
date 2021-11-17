<!DOCTYPE html>
<html lang="en">
	<head>

		<title>Online Invigilator</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "stylesheet" type="text/css" href="admin/css/bootstrap.css" />
		<link rel = "stylesheet" type="text/css" href="admin/css/style.css" />
		<style>
body, html {
  height: 100%;
  margin: 0;
}

.bg {
  /* The image used */
  background-image: url("bg.png");

  /* Full height */
  height: 100%; 

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
</style>
	</head>
<body>

	
	<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
		<div class="container-fluid">
				<h2></h2>

			<label class="navbar-brand">Online Invigilator</label>
		
		</div>
	</nav>


	<?php include 'login.php'?>
	<div class="bg"></div>

	<div id = "footer">
		<label class = "footer-title">&copy; Online Invigilator <?php echo date("Y", strtotime("+8 HOURS"))?></label>
	</div>
</body>
</html>