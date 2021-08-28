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
<form action="#" method="Post">

    <div class="row">
        <div class="col-md-5 offset-md-4">
            <div class="card-body">
                <div class="text-center">
                    <a class="header-brand" href="index.php"><i class="fa fa-graduation-cap brand-logo" style="font-size: 30px;"></i></a>
                    <div class="card-title mt-3"> Registration </div>    
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
                    <p id="validate-status" class="form-control"></p>
                </div>
                <script type="text/javascript">
                    $(document).ready(function(){
                        $("#exampleInputPassword2").keyup(validate);
                    });

                    function validate(){
                        var password1 = $("#exampleInputPassword1").val();
                        var password2 = $("#exampleInputPassword2").val();

                        if (password1 == password2){
                            $("#validate-status").text("Valid");
                            // document.getElementById('validate-status').style.background = "green";
                            document.getElementById('validate-status').style.color = "green";
                        }
                        else{
                            $("#validate-status").text("Invalid");
                            document.getElementById('validate-status').style.color = "red";
                        }
                    }
                </script>
                <div class="form-group" style="margin-left: 30%;">
                    <input type="radio" name="teacher" id="teacher" class="form-check-input" style="height: 20px; width: 20px;">
                        <label class="form-check-label" style="margin-left: 10px; font-size: 15px;">Teacher</label>
                    </input>
                </div>
                <div class="form-group" style="margin-left: 30%;">
                    <input type="radio" name="student" id="student" class="form-check-input" style="height: 20px; width: 20px;">
                        <label class="form-check-label" style="margin-left: 10px; font-size: 15px;">Student</label>
                    </input>
                </div>
                <div class="text-center">
                    <button class="btn btn-primary btn-block" title="">Register</button>
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