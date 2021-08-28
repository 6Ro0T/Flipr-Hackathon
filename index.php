<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="icon" href="favicon.ico" type="image/x-icon"/>

<title>MYNCC:Login</title>

<!-- Bootstrap Core and vandor -->
<link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css" />

<!-- Core css -->
<link rel="stylesheet" href="../assets/css/style.min.css"/>

</head>
<body class="font-muli theme-cyan gradient">
<form action="index.php" method="Post">
<div class="auth option2">
    <div class="auth_left">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <a class="header-brand" href="../index.html"><i class="fa fa-graduation-cap brand-logo"></i></a>
                    <div class="card-title mt-3">Student Login</div>
                    
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
				<div class="text-center">
                    <div class="text-muted mt-4">Are you an Admin? <a href="../admin/index.php">Click Here</a></div>
                </div>
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
<script src="../assets/bundles/lib.vendor.bundle.js"></script>

<!-- Start project main js  and page js -->
<script src="../assets/js/core.js"></script>
</body>
</html>