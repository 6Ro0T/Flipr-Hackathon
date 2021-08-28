<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
  <!-- Bootstrap Core and vandor -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">

  <style type="text/css">
    ul{
      display: inline-block;
    }
    li{
      float: right;
      text-align: center;
      padding: 20px;
    }
    span{
      color: white;
    }
    button:hover{
      cursor: pointer;
    }
  </style>

  <script type="text/javascript">
    function display() {
    var x = new Date()
    var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
    hours = x.getHours( ) % 12;
    hours = hours ? hours : 12;
    var x1=x.getMonth() + 1+ "/" + x.getDate() + "/" + x.getFullYear(); 
    x1 = x1 + " - " +  hours + ":" +  x.getMinutes() + ":" +  x.getSeconds() + ":" + ampm;
    document.getElementById('date-time').innerHTML = x1;
    display_time();
     }
     function display_time(){
    var refresh=1000; // Refresh rate in milli seconds
    mytime=setTimeout('display()',refresh)
    }
    display_time()
  </script>

</head>
<body>
<section>
  <header style="background-color: black; width: 100%; height: 60px;">
    <div>
    <a href="../index.php" class="logo"><b>DASH<span>BOARD</span></b></a>
    <ul>
      <li><span id="date-time"></span></li>
      <li><button onclick="document.location.href='../index.php'">LOGOUT</button></li>
    </ul>
  </div>
  </header>
	
</section>
</body>
</html>