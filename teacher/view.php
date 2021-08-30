<?php
include('session.php');
include('../conn.php');

$sql="select * from student where email='$user_check' and division='$user_role'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
?>
<?php
$flag=0;
if(isset($_POST['message'])){
    $cname=$_POST['clsname'];
    echo $cname;
    $message=mysqli_real_escape_string($conn,$_POST['message']);
    echo $message;
    $sql1="INSERT INTO `message`(`class_name`, `message`) VALUES ('$cname','$message')";
    $result=mysqli_query($conn,$sql1);
    if($result)
        $flag=1;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Dashboard</title>

  <!-- Favicons -->
  <link href="../img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="../css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="../lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet">
  <script src="../lib/chart-master/Chart.js"></script>

  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet">

</head>

<body>
  <section id="container">
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <!-- <div class="fa fa-bars " data-placement="right" data-original-title="Toggle Navigation"></div> -->
      </div>
      <!--logo start-->
      <a href="index.php" class="logo"><b><?php echo $row['name'];?></b></a>
      <!--logo end-->
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li style="margin-top: 20px; margin-right: 20px;"><span id="date-time" style="color: white; "></span></li>
          <li><a class="logout" href="logout.php">Logout</a></li>
        </ul>
      </div>
    </header>

    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

          <p class="centered"><img src="../img/ranjith.png" class="img-circle" width="80"></p>

          <li class="mt">
            <a class="active" href="index.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-tasks"></i>
              <span>Task</span>
              </a>
            <ul class="sub">

              <li><a href="assignment.php">Assignments</a></li>
              <li><a href="quiz.php">Small Quiz</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-calendar"></i>
              <span>Calendar</span>
              </a>
            <ul class="sub">
              <li><a href="#">Schedules</a></li>
              <li><a href="#">Syllabus Calendar</a></li>
              <li><a href="#">Class Time Table</a></li>
              <li><a href="#">Holidays</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-video-camera"></i>
              <span>Meet</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class=" fa fa-book"></i>
              <span>Notes</span>
              </a>
            <ul class="sub">
              <li><a href="#">Textbooks</a></li>
              <li><a href="#">Teacher Notes</a></li>
              <li><a href="#">Student's Written Notes</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-comments-o"></i>
              <span>Chat Room</span>
              </a>
            <ul class="sub">
              <li><a href="#">Lobby</a></li>
              <li><a href="#"> Chat Room</a></li>
            </ul>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
   
    <section id="main-content">
      <section class="wrapper">
        <div class="row mt">
          <div class="col-lg-12 col-md-6 col-sm-6">
                <?php
                
                if(isset($_POST['view'])){
                $view=$_POST['view'];
                $name=$_POST['clsname'];
                $sql1="select * from create_class where id ='$view'";
                $result1=mysqli_query($conn,$sql1);
                $row1=mysqli_fetch_array($result1);
				
                ?>

              <div class="col-lg-12 col-md-6 col-sm-6 mb">
                <div class="steps pn">
                  <label for="op1">Class Name:<?php echo $row1['class_name'];?></label>
                  <label for="op2">Subject Name:<?php echo $row1['subject'];?></label>
                  <label for="op3">Section:<?php echo $row1['section'];?></label>
                  <label for="op4">Room Number:<?php echo $row1['room'];?></label>
                </div>
                <?php }?>
                <br><br>
                <h4 class="title">Post Queries</h4>
                <form action="view.php" method="POST">
                <div class="form-group">
                  
                <input type="hidden" name="clsname" value="<?php echo $name; ?>">
                <textarea class="form-control" name="message" id="contact-message" placeholder="Your Message" rows="5" data-rule="required" data-msg="Please write something for us"></textarea>
                <br>
                <button type="submit" class="btn btn-primary btn-lg btn-block">POST</button>
                </div>
                </form>
                 <?php if($flag) {?>
                        <div class="alert alert-success">
                        <Strong>Message Posted ....</strong>
                        </div>
                        <?php } ?>
              </div>
            <div class="col-lg-12 col-md-6">
              <button type="button" class="btn btn-primary btn-lg btn-block" onclick="window.location.href='index.php'">Go Back</button>
              <br>
              <?php
                $sql="select * from message";
                $result=mysqli_query($conn,$sql);
                $value=mysqli_fetch_array($result);
                $rows=mysqli_num_rows($result);
                if($rows){?>
                  <div class="card">
                  <p><?php echo $value['message'];?>
                  </div>
                <?php } else{?>    
               <div class="col-lg-12 col-md-6 col-sm-6 mb">
               <div class="card">
              <?php echo "Post a message to appear here"?>
              <p>
              </div>
              </div>
                <?php }?>
            </div>
               
        </div>
        </div>
        <!--/ row -->
      </section>
    </section>
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="../lib/jquery/jquery.min.js"></script>

  <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="../lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="../lib/jquery.scrollTo.min.js"></script>
  <script src="../lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="../lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="../lib/common-scripts.js"></script>
  <script type="text/javascript" src="../lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="../lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="../lib/sparkline-chart.js"></script>
  <script src="../lib/zabuto_calendar.js"></script>
  <script type="text/javascript">

  </script>
</body>

</html>
