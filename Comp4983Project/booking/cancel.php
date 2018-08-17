<?php
  session_start();
   if(isset($_SESSION['username']))
  {
  }
  else
  {
    header("Location: index.php");
  }
?>
<html lang="en">
<head>
  <title>cancel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php 
  	require("connection.php");
  	date_default_timezone_set("America/Halifax");

	$date = date("Y-m-d"); 
	$cTime= date("H:i:s");
	$sql = "SELECT * FROM bookinginfo where date='$date' and startTime>'$cTime' and user='$_SESSION[username]' ";
    $result = mysqli_query($conn,$sql);
    $sql = "SELECT * FROM bookinginfo where date>'$date' and user='$_SESSION[username]' ";
    $result1 = mysqli_query($conn,$sql);
?>
	<div class="jumbotron text-center">
		  <h1>Welcome to CAR Resource Booking System</h1>
	</div>

	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li><a href="home.php">Home <span class="sr-only">(current)</span></a></li>
	        <li class="active"><a href="cancel.php">View Booking</a></li>
	        <li><a href="changePassUser.php">Change Password</a></li>
	        <li><a href="about.php">About</a></li>
	        <li><a href="contact.php">Contact</a></li>
	        <li><a href="logout.php">logout</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>

	<div class="container col-md-6 col-md-offset-3">
		<table class="table ">
		  <thead>
		  	<th>Room name</th>
		  	<th>Date</th>
		  	<th>Start Time</th>
		  	<th>End Time</th>
		  	<th></th>
		  </thead>
		  <tbody>
		  	<?php 
		  		while($row = mysqli_fetch_assoc($result))
		  		{
		  			echo "<tr><td>".$row[name]."</td><td>".$row[date]."</td><td>".$row[startTime]."</td><td>". $row[endTime].
		  			"</td><td><input type='checkbox' id='".$row[bookingID]."' name='checkbox' value=''></td></tr>";
		  		}
		  		while($row = mysqli_fetch_assoc($result1))
		  		{
		  			echo "<tr><td>".$row[name]."</td><td>".$row[date]."</td><td>".$row[startTime]."</td><td>". $row[endTime].
		  			"</td><td><input type='checkbox' id='".$row[bookingID]."' name='checkbox' value=''></td></tr>";
		  		}
		  	?>
		  </tbody>
		</table>
		<input type="button" name="cancel" value="cancel" onclick="function2()">
	</div>

	<script>
		function myFunction2(){
				var a = document.getElementsByName("checkbox"); 
			   	var n = a.length;
			   	var b = "";
			   	var count=0
			   	for (var i=0; i<n; i++)
			   	{
			   		
			        if(a[i].checked)
			        {
			        	count++;
			        	var b=a[i].id;
			        	$.ajax({  
									type:'GET',
									url:"cancel.php",  
									data:{text: b},  
									success: function(data)
									{  
									}  
								}); 
			        }
			    }

			    if(count==0)
			    {
			    	alert("Nothing is chosen!");
			    }
			    else
			    {
			    	alert("canceling is successful!");

				}
			}

		function function2(){
			myFunction2();
			location.href="cancel.php";
		}
	</script>

	<?php 
		if(isset($_GET['text']))
		{
			$key = $_GET["text"];
	        $sql1 = "DELETE FROM bookinginfo WHERE bookingID='$key' ";
	        mysqli_query($conn,$sql1);
		} 
	?>

</body>
</html>