<?php
   include('../conn.php');
   session_start();
   
   $user_check = $_SESSION['email'];
   $user_role=$_SESSION['division'];
   
   $ses_sql = mysqli_query($conn,"select email from student where email = '$user_check' and division='$user_role' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   

   
   if(!isset($_SESSION['email']) || !isset($_SESSION['division'])){
      header("location:../index.php");
      die();
   }
?>