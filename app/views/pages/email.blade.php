<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="http://getbootstrap.com/2.3.2/assets/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="http://getbootstrap.com/2.3.2/assets/css/bootstrap-responsive.css">
	</head>
	<body style="margin:20px">
		<h2>Registration Confirmation</h2>

		<div class="container">
			<div class="row-fluid" style="margin:20px">
				Hi {{$Fname}},<br><br>
				Thank you for registering for our site. Below is the confirmation for your account activation. Please click it. <br>
				
				{{route("emailConf",$user_id)}}
				<br>
				<br>
				Thank you<br><br>

				Lyka<br>
				System Admin
				
			</div>
			<div class="row-fluid">
					
			</div>
		</div>
		<script type="text/javascript" src="http://getbootstrap.com/2.3.2/assets/js/jquery.js"></script>
	</body>
</html>

