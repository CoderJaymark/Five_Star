<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="http://getbootstrap.com/2.3.2/assets/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="http://getbootstrap.com/2.3.2/assets/css/bootstrap-responsive.css">
	</head>
	<script language="javascript" type="text/javascript">
        function printDiv(divID) {
            //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML = 
              "<html><head><title></title></head><body>" + 
              divElements + "</body>";

            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage;

          
        }
    </script>
	<body style="margin:20px">
		<h2>Ticket information</h2>

		<div class="container">
			<div class="row-fluid" style="margin:20px">
				Hi {{$name}},<br><br>
				Print it.
				<div id="printable_area">
				<table>
					<tr>
						<td>From</td>
						<td>{{$from}}</td>
					</tr>
					<tr>
						<td>To</td>
						<td>{{$to}}</td>
					</tr>
					<tr>
						<td>Departure</td>
						<td>{{date('F j, Y', strtotime($departure))}}</td>
					</tr>
					<tr>
						<td>Time</td>
						<td>{{date('h:i A', strtotime($time))}}</td>
					</tr>
				</table>
				</div>
				<input type="button" value="Click here to print" onclick="javascript:printDiv('printable_area')" />
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

