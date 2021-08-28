<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="icon" href="favicon.ico" type="image/x-icon"/>

<title>MYNCC:Login</title>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
<!-- Bootstrap Core and vandor -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- Core css -->


</head>
<body class="font-muli theme-cyan gradient">
<form action="index.php" method="Post">

    <div class="row">
        <div class="col-md-5 offset-md-4">
            <div class="card-body">
                <div class="text-center">
                    <a class="header-brand" href="../../../index.html"><i class="fa fa-graduation-cap brand-logo"></i></a>
                    <div class="card-title mt-3"> Login</div>
                    
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"name="email" required>
                </div>
                <div class="form-group">
                    
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"name="passwd" required>
                    <label class="form-label"><a href="forgot-password.html" class="float-right small">I forgot password</a></label>
                </div>
                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" />
                    <span class="custom-control-label">Remember me</span>
                    </label>
                </div>
                <div class="text-center">
                    <button class="btn btn-primary btn-block" title="">Sign in</button>
                    <?php
					
					if (isset($_GET["msg"]) == 'failed') {
						echo "Incorrect username or password";
}       			?>
                </div>
				
            </div>
        </div>        
    </div>

</form>

<?php

   include("conn.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,$_POST['email']);
      $passwd=$_POST['passwd'];
      $mypassword=hash('sha256',$passwd );
      echo $mypassword;
      
      $sql = "SELECT email FROM student WHERE email = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result);
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
      $sql1="select division from student where email='$myusername'";
      $result1=mysqli_query($conn,$sql1);
      $row1=mysqli_fetch_array($result1);
      $value=$row1["division"];
      if($count == 1) {
         //session_register("username");
         $_SESSION['login_user'] = $myusername;
         $_SESSION['role']=$value;
         if($value=='navy'){
         
            header("location: navy/navy.php");
         }
         elseif($value=='army'){
             header("location: army/army.php");
         }
         elseif($value=='airforce'){
             header("location: /airforce/airforce.php");
         }
      }else {
           header("location:index.php?msg=failed");
		 
      }
   }

?>

<!-- Start Main project js, jQuery, Bootstrap -->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>