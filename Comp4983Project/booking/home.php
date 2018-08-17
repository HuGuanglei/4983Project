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
  <title>home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>function jump(obj){
      var a = document.getElementsByName("bBtn"); 
      var n = a.length;
      var c="";
      for (var i=0; i<n; i++)
      {
             var c = obj.id;
             $.ajax({  
                      type:'GET',
                      url:"home.php",  
                      data:{name: c},  
                      success: function(data)
                      {  
                      }  
              }); 
             break; 
      }
  	location.href="book.php";
  }</script>
</head>
<body>
<?php 
  require("connection.php");
?>



<div class="jumbotron text-center">
  <h1>Welcome to CAR Resource Booking System</h1>
</div>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="home.php">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="cancel.php">View Booking</a></li>
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
    <th>Usage</th>
  	<th></th>
  </thead>
  <tbody>
  	<?php
        date_default_timezone_set("America/Halifax");
        $_SESSION[date] = date("Y-m-d");
  		  $sql = "SELECT * FROM room";
      	$result = mysqli_query($conn,$sql);
      	while($row = mysqli_fetch_assoc($result))
      	{
      		echo "<tr>
      			      <td>".$row['name']."</td>
                  <td>".$row['roomUsage']."</td>
      			      <td><button type='button' class='btn btn-default' name='bBtn' id='".$row['name']."' onclick='jump(this);'>book</button></td>
      			  <tr>";
      	}    	
  	?>
  	
  </tbody>
</table>
</div>
<?php 
    if(isset($_GET['name']))
    {
      $_SESSION[name] = $_GET['name'];
    }
    
              
?>

</body>
</html>