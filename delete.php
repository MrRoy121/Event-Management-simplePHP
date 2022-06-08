
<!-- 
    This Is Copyrighted to Mr.ROY121 
    Please Contact Becfore Using it..
    Email: nilashishroyjoy@gmail.com
 -->
 
 <?php
include "config/config.php";
session_start();

if (!isset($_SESSION["email"])) {
    header("location: login.php");}

  $stmt = mysqli_query($conn,"SELECT usrimg FROM user WHERE email ='".$_SESSION["email"]."'");
  if($stmt){
    while($row = mysqli_fetch_array($stmt))
    {
    $usrimg = "$row[usrimg]";

    unlink("user_images/".$usrimg['userimg']);}
    
  $stmt_delete = mysqli_query($conn,"DELETE FROM user WHERE email ='".$_SESSION["email"]."'");
  If($stmt_delete){
    echo '<script>alert("Account deleted Successfully")</script>';
    header("location: login.php");

}

session_destroy();
}
?>