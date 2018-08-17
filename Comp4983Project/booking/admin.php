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
  <title>admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>function function3(obj){
      var a = document.getElementsByName("dBtn"); 
      var n = a.length;
      var d="";
      for (var i=0; i<n; i++)
      {
             var d = obj.id;
             $.ajax({  
                      type:'GET',
                      url:"admin.php",  
                      data:{rName: d},  
                      success: function(data)
                      {  
                      }  
              }); 
             break; 
      }
    alert("The record is deleted successfully!");
    location.href="admin.php";
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
        <li class="active"><a href="admin.php">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="addRoom.php">Add Resource</a></li>
        <li><a href="addAdmin.php">Add Admin</a></li>
        <li><a href="changePassAdmin.php">Change Password</a></li>
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
        $sql = "SELECT * FROM room";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result))
        {
          echo "<tr>
                  <td>".$row['name']."</td>
                  <td>".$row['roomUsage']."</td>
                  <td><button type='button' class='btn btn-default' name='dBtn' id='".$row['name']."' onclick='function3(this);'>delete</button></td>
              <tr>";
        }     
    ?>
    
  </tbody>
</table>
</div>
<?php 
    if(isset($_GET['rName']))
    {
      $key = $_GET["rName"];
      $sql1 = "DELETE FROM room WHERE name ='$key' ";
      mysqli_query($conn,$sql1);
    }
    
              
?>
</body>
</html>