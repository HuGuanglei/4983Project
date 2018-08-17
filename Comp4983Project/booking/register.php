<?php
  session_start();
?>
<html lang="en">
<head>
  <title>register</title>
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
  $uError = $pError = $eError = "";
  $sql = "SELECT * FROM login";
  $result = mysqli_query($conn,$sql);

  function test_input($data) 
  {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
  }

  if(isset($_POST['submit']))
  {
  	  $name=$_POST["name"];
	  
  	  if(empty($_POST["name"]))
  	  {
  	  	$uError = "Username cannot be empty.";
  	  }
  	  else
  	  {
  	  	  if(strlen($_POST["name"])<6)
  	  	  {
  	  	  	$uError = "Username should countain 6 characters at least.";
  	  	  }
  	  	  else
  	  	  {
  	  	  	  while($row = mysqli_fetch_assoc($result))
		  	  {
		  	  	if($row["username"]==$_POST["name"])
		  	  	{
		  	  		$uError = "Username is used by other people.";
		  	  	}
		  	  }
		  	  mysqli_data_seek($result,0);
  	  	  }
  	  }





  	  if(empty($_POST["password"]) || empty($_POST["password1"]))
  	  {
  	  	$pError="password cannot be empty.";
  	  }
  	  else
  	  {
  	  	if(strlen($_POST["password"])<6)
  	  	{
  	  		$pError="Password should countain 6 characters at least";
  	  	}
  	  	else
  	  	{	
  	  		if($_POST["password"]!=$_POST["password1"])
	  	  	{
	  	  		$pError="confirm password error";
	  	  	}
  	  	}	
  	  }



  	  if (empty($_POST["email"])) 
  	  {
    	$eError = "Email cannot be empty";
  	  } 
  	  else 
  	  {
  	  	$email = test_input($_POST["email"]);
	    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
	    {
	      $eError = "Invalid email format"; 
	    }
  	  }


  	  if($uError==""&&$pError==""&&$eError=="")
  	  {
  	  	$_SESSION['username']=$name;
  	  	$sql ="INSERT INTO login (username, password, roles) VALUES ('$name', '$_POST[password]', 'user')";
  	  	mysqli_query($conn,$sql);
  	  	echo "<script type='text/javascript'>alert('register successfully!');</script>";
  	  	echo "<script type='text/javascript'>location='home.php';</script>";
  	  }
  	}
?>

<div class="jumbotron text-center">
  <h1>Welcome to CAR Resource Booking System</h1>
</div>
  
<div class="container">
  <div class="row">
    <div class="wrap-login col-md-4 col-md-offset-4" >
      <h2 style="margin-bottom:20px;">Register</h2>
      <form method="post">
        <div class="form-group">
          <label>Username</label>
          <input type="text" class="form-control"  name="name" placeholder="Username" value="<?php echo $name;?>">
        </div>
        <div class="form-group">
          <p  style="color:red"><?php echo $uError ?></p>
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" name="password"  placeholder="Password" >
        </div>
        <div class="form-group">
          <label>Confirm Password</label>
          <input type="password" class="form-control" name="password1"  placeholder="Password" >
        </div>
        <div class="form-group">
          <p  style="color:red"><?php echo $pError ?></p>
        </div>
        <div class="form-group">
          <label>E-mail</label>
          <input type="text" class="form-control" name="email"  placeholder="email" value="<?php echo $email;?>">
        </div>
        <div class="form-group">
          <p  style="color:red"><?php echo $eError ?></p>
        </div>

        <div class="form-group">
          <button type="submit" name="submit" class="btn-login btn btn-block">Submit</button>
        </div>
    </form>
    </div>
  </div>
</div>
</body>
</html>