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
</head>
<body>
<?php 
  require("connection.php");
  $pError = $opError = "";
  $sql = "SELECT * FROM login where username ='$_SESSION[username]' ";
  $result = mysqli_query($conn,$sql);
  
  if(isset($_POST['submit']))
  {
    if(empty($_POST["oPass"]))
    {
      $opError="Input cannot be empty.";
    }
    else
    {
      $row = mysqli_fetch_assoc($result);
      if($row["password"]!=$_POST["oPass"])
      {
        $opError="Old Password Error.";
      }
    }


    if(empty($_POST['nPass'])|| empty($_POST['nPass1']))
    {
      $pError="Input cannot be empty.";
    }
    else
    {
      if(strlen($_POST["nPass"])<6)
        {
          $pError="Password should countain 6 characters at least";
        }
        else
        { 
          if($_POST["nPass"]!=$_POST["nPass1"])
          {
            $pError="confirm password error";
          }
        } 
    }

    if($opError=="" && $pError=="")
    {
      $sql="UPDATE login SET password='$_POST[nPass]' WHERE username='$_SESSION[username]' ";
      mysqli_query($conn,$sql);
      echo "<script type='text/javascript'>alert('Password is changed successfully!');</script>";
      echo "<script type='text/javascript'>location='home.php';</script>";
    }
  }
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
        <li class="active"><a href="changePassUser.php">Change Password</a></li>
         <li><a href="logout.php">logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <div class="row">
    <div class="wrap-login col-md-4 col-md-offset-4" >
      <h2 style="margin-bottom:20px;">Please Fill The Form</h2>
      <form method="post">
        <div class="form-group">
          <label>Old Password</label>
          <input type="password" class="form-control"  name="oPass" placeholder="Password" value="<?php echo $oPass;?>">
        </div>
        <div class="form-group">
          <p  style="color:red"><?php echo $opError ?></p>
        </div>
        <div class="form-group">
          <label>New Password</label>
          <input type="password" class="form-control"  name="nPass" placeholder="Password" value="<?php echo $nPass;?>">
        </div>
        <div class="form-group">
          <label>Confirm New Password</label>
          <input type="password" class="form-control"  name="nPass1" placeholder="Password" value="<?php echo $nPass1;?>">
        </div>
        <div class="form-group">
          <p  style="color:red"><?php echo $pError ?></p>
        </div>
        <div class="form-group">
          <button type="submit" name="submit" class="btn-login btn btn-block">Change</button>
        </div>
    </form>
    </div>
  </div>
</div>
</body>
</html>