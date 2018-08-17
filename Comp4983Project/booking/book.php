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
	<title>book</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="//apps.bdimg.com/libs/jqueryui/1.10.4/css/jquery-ui.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="//apps.bdimg.com/libs/jquery/1.10.2/jquery.min.js"></script>
  	<script src="//apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>	  

</head>
<body>
<?php 
  	require("connection.php");
	$sql = "SELECT * FROM bookinginfo where date='$_SESSION[date]' and name='$_SESSION[name]'";
    $result = mysqli_query($conn,$sql);
    $j=8;
    

?>
	<div class="jumbotron text-center">
	  <h1>Welcome to CAR Resource Booking System</h1>
	</div>

	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li><a href="home.php">Home <span class="sr-only">(current)</span></a></li>
	        <li><a href="cancel.php">View Booking</a></li>
	        <li><a href="changePassUser.php">Change Password</a></li>
	        <li><a href="about.php">About</a></li>
	        <li><a href="contact.php">Contact</a></li>
	        <li><a href="logout.php">logout</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>

	<div class="container col-md-4 col-md-offset-4">
		<p>click to choose date：<input type="text" id="datepicker" size="30"></p><br><br>
		

		<table class="table" >
			<thead>
			<th>Room name</th>
			<th>Time</th>
			<th>Status</th>
			<th>Booked By</th>
		  	<th></th>
		    </thead>
		    <tbody>
			<?php
				date_default_timezone_set("America/Halifax");
			  	for($i=0;$i<12;$i++)
			  	{

			  		$status="available";
			  		$time=mktime(8+$i,0,0);
			  		$time1=mktime(8+$i+1,0,0);
			  		while($row = mysqli_fetch_assoc($result))
			  		{
			  			$sTime = strtotime($row["startTime"]);
		      			$eTime = strtotime($row["endTime"]);
		      			if($time==$sTime)
			      		{
			      			$status="unavailable";
			      			$uName=$row['user'];
			      		}
			  		}
			  		mysqli_data_seek($result,0);
			  		if($_SESSION[date]==date("Y-m-d"))
			  		{
			  			if(date("H:i:s")< date("H:i:s",$time))
			  			{
			  				echo "<tr><td>".$_SESSION[name]."</td><td>".date("H:i",$time)."-".date("H:i",$time1)."</td><td>". $status.
						  	"</td>";

						  	if($status=="unavailable")
						  	{
						  		echo "<td>".$uName."</td><td></td></tr>"; 
						  	}
						  	else
						  	{
						  		echo "<td></td><td><input type='checkbox' id='".$j."' name='check' value=''></td></tr>"; 
						  	}
			  			}
			  			$j++;
			  			
				  		
			  		}
			  		else
			  		{
			  			echo "<tr><td>".$_SESSION[name]."</td><td>".date("H:i",$time)."-".date("H:i",$time1)."</td><td>". $status.
					  	"</td>";

					  	if($status=="unavailable")
					  	{
					  		echo "<td>".$uName."</td><td></td></tr>"; 
					  	}
					  	else
					  	{
					  		echo "<td></td><td><input type='checkbox' id='".$j."' name='check' value=''></td></tr>"; 
					  	}
				  		$j++;
			  		}
			  		
			  	}

			  	
			  ?>
		  	</tbody>
		</table>
		<input type="button" name="book" value="book" onclick="function1()">
	</div>
	<script>
	function myFunction1(){
		var a = document.getElementsByName("check"); 
	   	var n = a.length;
	   	var b = "";
	   	var count=0;
	   	for (var i=0; i<n; i++)
	   	{
	        if(a[i].checked)
	        {
	        	count++;
	        	var b=a[i].id;
	        	$.ajax({  
							type:'GET',
							url:"book.php",  
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
	    	alert("Booking is successful!");

	}
	    

	function function1(){
		myFunction1();
		location.href="book.php";
	}



	$(function(){
	    $("#datepicker").datepicker({
	    	onSelect: function(dateText, inst) {
	    	var da = $("#datepicker").datepicker({ dateFormat: 'yy-mm-dd' }).val(); 
		    $.ajax({  
							type:'GET',
							url:"book.php",  
							data:{date: da},  
							success: function(data)
							{  
							}  
						});
			location.href=("book.php");  
		}}).datepicker("setDate", new Date("<?php echo $_SESSION[date]; ?> "));
		$("#datepicker").datepicker( "option", "dateFormat", "yy-mm-dd" );  
  	});

	</script>

	<?php
		if(isset($_GET['text']))
		{
			$date = $_SESSION[date];
			$key = $_GET["text"];
	        $t1=date("H:i",mktime($key,0,0));
	        $t2=date("H:i",mktime($key+1,0,0));
	        $sql1="INSERT INTO bookinginfo (date, name, startTime, endTime,user) VALUES ('$date','$_SESSION[name]','$t1','$t2','$_SESSION[username]')";
	        mysqli_query($conn,$sql1);
	        
		}

		if(isset($_GET['date']))
		{
			$dateK = $_GET["date"];
			$_SESSION[date]=$dateK;
		}
	?>
</body>
</html>