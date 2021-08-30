<?php
include('session.php');
include('../conn.php');

$sql="select * from student where email='$user_check' and division='$user_role'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
?>
<?php
$flag=0;

if(isset($_POST['delete'])){
    $delete=mysqli_real_escape_string($conn,$_POST['delete']);
    $sql2="DELETE FROM `create_class` WHERE id='$delete'";
    $result3=mysqli_query($conn,$sql2);
    if($result3)
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
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div>
              <a href='create_class.php' class="btn btn-primary">Create Class</a>
            </div>
            <?php if($flag) {?>
                    <div class="alert alert-success">
                    <Strong script="alert(DELETED);">Deleted Successfully</strong>
                    </div>
            <?php } ?>
            <?php
            $count=0;
            $sql1="select * from create_class where tea_name='$user_check'";
            $result1=mysqli_query($conn,$sql1);
            $count=mysqli_num_rows($result1);
            if($count){
              while($row1=mysqli_fetch_array($result1)){  
              ?>
            <div class="card">
              <div class="text-center">
                <h4><i class="tx-medium"></i></h4>
              </div>
              
              <h4><i class="text-center"></i><?php echo $row1['class_name'];?></h4>
              <h4><i class="text-center"></i><?php echo $row1['name'];?></h4>

               <div class="btn-group btn-group-justified">
                <div class="btn-group">
                  <form action="view.php" method="POST"><button type="submit" class="btn btn-success" name='view' value="<?php echo $row1['id'];?>"><i class="fa fa-eye" style="font-size: 20px;"><span class="label label-success">View</span></i></button>
                  <input type="hidden" name="clsname" value="<?php echo $row1['class_name'];?>">
                  </form>
                </div>
                <div class="btn-group">

                  <form action="update.php" method="POST"><button type="submit" class="btn btn-warning" name='update' value="<?php echo $row1['id'];?>"><i class="fa fa-pencil-square-o" style="font-size: 20px;"><span class="label label-warning">Update</span></i></button></form>

                </div>
                <div class="btn-group">
                  <form action="index.php" method="POST"><button type="submit" class="btn btn-danger" name='delete' value="<?php echo $row1['id'];?>"><i class="fa fa-trash-o" style="font-size: 20px;"><span class="label label-danger">Delete</span></i></button></form>
                </div>
              </div>
            </div>
              <?php }}else {?>
            <div class="card">
            <h4><i class="text-center">Add a class to appear here</i></h4>
            </div>
            <?php }?>        
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
</body>

</html>
