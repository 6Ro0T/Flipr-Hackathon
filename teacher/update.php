<?php
$flag=0;
include('session.php');
include('../conn.php');
$sql="select * from student where email='$user_check' and division='$user_role'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
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
          <p class="centered"><img src="../img/ui-sam.jpg" class="img-circle" width="80"></p>
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
          <div class="col-lg-10 col-md-6 col-sm-6">
            
            <div class=" mt ">
			<?php if($flag) {?>
                    <div class="alert alert-success">
                    <Strong script="alert(1);">Registered Successfully</strong>
                    </div>
                <?php } ?>
              <form method="POST" action="create_class.php">
               <?php
                
                if(isset($_POST['update'])){
                $update=$_POST['update'];
                echo $update;
                $sql1="select * from create_class where tea_name ='$update'";
                $result1=mysqli_query($conn,$sql1);
                $row1=mysqli_fetch_array($result1);
				
                ?>
              <div class="form-group">
              
              <div class="row mt">
              </div>
                <div class="row mt">
                  <label class="col-md-2 col-form-label">Course Name <span class="text-danger">*</span></label>
                  <div class="col-md-6">
                  <input type="text" class="form-control"name="cname" value="<?php echo $row1['class_name'];?>" required>
                  <input type="hidden" value="<?php echo $row['email'];?>" name="email">
                  </div>
                </div>
                <div class="row mt">
                  <label class="col-md-2 col-form-label">Subject<span class="text-danger">*</span></label>
                  <div class="col-md-6">
                  <input type="text" class="form-control"name="subject" value="<?php echo $row1['subject'];?>" required>
                  </div>
                </div>
                <div class="row mt">
                  <label class="col-md-2 col-form-label">Section<span class="text-danger">*</span></label>
                  <div class="col-md-6">
                  <input type="text" class="form-control"name="section" value="<?php echo $row1['section'];?>" required>
                  </div>
                </div>
                <div class="row mt">
                  <label class="col-md-2 col-form-label">Room <span class="text-danger">*</span></label>
                  <div class="col-md-6">
                  <input type="text" class="form-control"name="room" value="<?php echo $row1['room'];?>" required>
                  </div>
                </div>
				
                <div class="row mt">
                <div class="text-center">
                <button class="btn btn-primary" name="create_class">Update</button>
                </div>
                </div>
              </div>
              </form>
            </div>
			<?php } ?>
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
