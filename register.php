<?php 
include('conn.php');
$flag=0;
$count=0;
if(isset($_POST['register'])){
        $name=mysqli_real_escape_string($conn,$_POST['uname']);
        $email=mysqli_real_escape_string($conn,$_POST['email']);
        $passwd1=mysqli_real_escape_string($conn,$_POST['passwd1']);
        $passwd2=mysqli_real_escape_string($conn,$_POST['passwd2']);
        $division=mysqli_real_escape_string($conn,$_POST['division']);
        $newpass1=hash('sha256',$passwd1);
        $newpass2=hash('sha256',$passwd1);
        if(!empty($email) || !empty($passwd1) || !empty($email) || !empty($email)){
            $sql="SELECT * FROM `student` WHERE email='$email'";
            $check=mysqli_query($conn,$sql);
            $row=mysqli_fetch_array($check);
     
            $count = mysqli_num_rows($check);
            
            if($count==0){
                $sql1="INSERT INTO `student`(`name`,`email`, `password`, `password1`, `division`) VALUES ('$name','$email','$newpass1','$newpass2','$division')";
                $result=mysqli_query($conn,$sql1);
                if($result)
                    $flag=1;
            }
            
                
            
        }
        else
            echo" Empty values";
        
}
?>
<!doctype html>
<html lang="en" dir="ltr">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="favicon.ico" type="image/x-icon"/>

    <title>MYNCC:Register</title>


    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <!-- Bootstrap Core and vandor -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Core css -->
</head>
<body class="font-muli theme-cyan gradient">
    <header style="height: 85px; background: #22242a; border-bottom: 1px solid #393d46;">
        <div class="text-center">
            <div class="col-md-5 offset-md-4">
                    <a class="header-brand" href="register.php"><i class="fa fa-graduation-cap brand-logo" style="font-size: 30px; margin-top: 10px; color: #337ab7"></i></a>
                    <div class="card-title mt-3" style="color: white;"> Registration </div>    
                </div>
            </div>
    </header>
<form action="register.php" method="Post" style="margin-top: 20px;">

    <div class="row">
        <div class="col-md-5 offset-md-4">
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control" id="uname" placeholder="Enter Username" name="uname" required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"name="email" required/>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="passwd1" required/>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Confirm Password" name="passwd2" required/>
                </div>
                <div class="form-group">
                    <p id="validate-status" ></p>
                </div>
                <div class="">
                 <label for="role" >Choose a Module:</label>

                <select name="division"  required>
                <option >Select</option>
                <option value="teacher" >Teacher</option>
                <option value="student">Student</option>
                
                </select> 
                </div>
                <br>
                <script type="text/javascript">
                    $(document).ready(function(){
                        $("#exampleInputPassword2").keyup(validate);
                    });

                    function validate(){
                        var password1 = $("#exampleInputPassword1").val();
                        var password2 = $("#exampleInputPassword2").val();

                        if (password1 == password2){
                            // document.getElementById('validate-status').style.background = "green";
                            //document.getElementById('validate-status').style.color = "green";
                            document.getElementById('exampleInputPassword2').style.border = "1px solid green";
                            document.getElementById('exampleInputPassword1').style.border = "1px solid green";
                        }
                        else{
                            //document.getElementById('validate-status').style.color = "red";
                            document.getElementById('exampleInputPassword1').style.border = "1px solid red";
                            document.getElementById('exampleInputPassword2').style.border = "1px solid red";
                        }
                    }
                </script>

                <div class="text-center">
                <?php if($flag) {?>
                    <div class="alert alert-success">
                    <Strong script="alert(1);">Registered Successfully</strong>
                    </div>
                <?php } ?>
                <?php if($count) {?>
                <div class="alert alert-danger">
                <Strong>Already Registered</strong>
                </div>
                <?php } ?>
                </div>
                <div class="text-center">
                    <button class="btn btn-primary btn-block" type="submit" name='register' style="background-color: #286090;">Register</button>
                </div><br>
                <div class="text-center">
                    <button class="btn btn-primary btn-block" type="submit" name='signin' onclick="window.location.href='index.php';" style="background-color: #286090;">Sign In Again</button>
                </div>	
            </div>
        </div>        
    </div>
</form>


<!-- Start Main project js, jQuery, Bootstrap -->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>