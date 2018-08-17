<?php
  session_start();
?>
<html lang="en">
<head>
  <title>index</title>
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

  $name = "";
  $pass = "";
  $role = "";
  $error = "";

  if(isset($_POST['submit']))
  {
    $name = $_POST['name'];
    $pass = $_POST['password'];
    $role = $_POST['role'];

    
  
    if($role == "" || $name == "" || $pass == "")
    {
      $error="Input cannot be empty";
    }

   
    elseif($role=="User")
    {
      $sql = "SELECT * FROM login WHERE username= '$name' and password = '$pass' and roles = '$role'";
      $result = mysqli_query($conn,$sql);
      $num_rows = mysqli_num_rows($result);
    
      if ($num_rows != 0) 
      {
        $_SESSION['username']=$name;
        echo "<script type='text/javascript'>location='home.php';</script>";
      } 
      else 
      {
        $error= "username or password error.";
      }
      $conn->close();
    }
    else
    {
      $sql = "SELECT * FROM login WHERE username= '$name' and password = '$pass' and roles = '$role'";
      $result = mysqli_query($conn,$sql);
      $num_rows = mysqli_num_rows($result);
      if ($num_rows != 0) 
      {
         $_SESSION['adminName']=$name;
         echo "<script type='text/javascript'>location='admin.php';</script>";
      } 
      else 
      {
        $error= "username or password error.";
      }
    }
  }
?>

<div class="jumbotron text-center">
  <h1>Welcome to CAR Resource Booking System</h1>
</div>
  
<div class="container">
  <div class="row">
    <div class="wrap-login col-md-4 col-md-offset-4" >
      <h2 style="margin-bottom:20px;">Please Login</h2>
      <h2 style="margin-bottom:20px;">Or Register</h2>
      <form method="post">
        <div class="form-group">
          <label>Username</label>
          <input type="text" class="form-control"  name="name" placeholder="Username" value="<?php echo $name;?>">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" name="password"  placeholder="Password" >
        </div>
        <div class="form-group">
          <label>Role</label>
          <select class="form-control" name="role">
            <option value="User" <?php if (isset($role) && $role=="User") echo "selected";?>>User</option>
            <option value="Admin" <?php if (isset($role) && $role=="Admin") echo "selected";?>>Administrator</option>
          </select>
        </div>
        <div class="form-group">
          <p  style="color:red"><?php echo $error ?></p>
        </div>
        <div class="form-group">
          <button type="submit" name="submit" class="btn-login btn btn-block">Login</button>
        </div>
        <div class="form-group">
          <button type="button" name="register" class="btn-login btn btn-block" style="background-color:red" onclick="location.href='register.php'">Register</button>
        </div>
    </form>
    </div>
  </div>
</div>
</body>
</html>