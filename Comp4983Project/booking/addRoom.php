<?php
  session_start();
  if(isset($_SESSION['adminName']))
  {
  }
  else
  {
    header("Location: index.php");
  }
?>
<html lang="en">
<head>
  <title>addRoom</title>
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
  $sql = "SELECT * FROM room";
  $result = mysqli_query($conn,$sql);
  $nameErr = "";
  $usageErr = "";
  
  if(isset($_POST['submit']))
  {
    $rUsage = $_POST["rUsage"];
    $rName = $_POST["rName"];
    if(empty($_POST["rName"]))
    {
      $nameErr = "Room name cannot be empty.";
    }
    else
    {
      while($row = mysqli_fetch_assoc($result))
      {
        if($row["name"]==$_POST["rName"])
        {
          $nameErr = "Room already exist";
        }
      }
      mysqli_data_seek($result,0);
    }
  
    if(empty($_POST["rUsage"]))
    {
      $usageErr = "Room usage cannot be empty.";
    }
    

    if($nameErr=="" && $usageErr=="")
    {
      $sql="INSERT INTO room (name, roomUsage) VALUES ('$rName','$rUsage')";
      mysqli_query($conn,$sql);
      echo "<script type='text/javascript'>alert('Adding is successful!');</script>";
      echo "<script type='text/javascript'>location='admin.php';</script>";
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
        <li><a href="admin.php">Home <span class="sr-only">(current)</span></a></li>
        <li class="active"><a href="addRoom.php">Add Resource</a></li>
        <li><a href="addAdmin.php">Add Admin</a></li>
        <li><a href="changePassAdmin.php">Change Password</a></li>
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
          <label>Room Name</label>
          <input type="text" class="form-control"  name="rName" placeholder="Room Name" value="<?php echo $rName;?>">
        </div>
        <div class="form-group">
          <p  style="color:red"><?php echo $nameErr ?></p>
        </div>
        <div class="form-group">
          <label>Room Usage</label>
          <input type="text" class="form-control"  name="rUsage" placeholder="Room Usage" value="<?php echo $rUsage;?>">
        </div>
        <div class="form-group">
          <p  style="color:red"><?php echo $usageErr ?></p>
        </div>
        <div class="form-group">
          <button type="submit" name="submit" class="btn-login btn btn-block">Add Room</button>
        </div>
    </form>
    </div>
  </div>
</div>
</body>
</html>