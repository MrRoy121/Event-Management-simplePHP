<html>
<!-- 
    This Is Copyrighted to Mr.ROY121 
    Please Contact Becfore Using it..
    Email: nilashishroyjoy@gmail.com
 -->
 
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/main.css"> 
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>

<?php
include "config/config.php";
session_start();

if (!isset($_SESSION["email"])) {
    header("location: login.php");
  }
$stmt = $conn->prepare("Select usrimg from user where email='".$_SESSION["email"]."'");
 
 $stmt->execute();
 
 $stmt->bind_result($aaa);
 
 $products = array(); 
 
 while($stmt->fetch()){
 $temp = array();
 $temp['aaa'] = $aaa; 
 array_push($temp);
 }
 ?>

    <div class="section-header">
              <h2 >Playlist</h2>
          
              <p1 style=" color: white; font-size: 18px; font-family:'Courier New'; margin-left: 15px; margin-bottom: 75px; "> Current User E-mail : <?php echo $_SESSION["email"];?>.</p1>
              <img src="user_images/<?php echo implode(" ",$temp);?>" class="img-circle" alt="User Pic" height="40" weight="25" style="border-radius: 50%; margin-top: -120px; margin-left: 15px; display:inline;">
            </div>
<div class="center">
<section id="Play" >
<?php

if((!isset($_GET['No']))) {    
}else{
  $id=$_GET['No']; 
    $result = mysqli_query($conn,"SELECT * FROM playlist where No=" . $id);
    if($result){
        while($row = mysqli_fetch_array($result))
        {
        echo "<tr>";
        $cover = "music/$row[cover]";
        $song = "music/$row[song]";
?>

<img src="<?php echo $cover; ?>" alt="Cover" height="300" weight="200" style = "margin: auto;"><br>
<h><?php  ?></h>
    <h><b><?php echo "<td><b>" . $row['title'] . "</b></td>";?></b></h><br><br>
    <h><?php echo "<td>" . $row['singer'] . "</td>";?></h><br><br>

    <style>
.demo {
  width: 600px;
  height: 60px;
	border-color: #2bff18;
  align: center;
  border: 30px;
  margin-bottom: 10px;
}
</style>

<audio class="demo" controls autoplay>
  <source src="<?php echo $song; ?>" type="audio/mpeg">
Your browser does not support the audio element.
</audio><br>

          </section>
          <?php
        echo "<br><td>" . $row['details'] . "</td>";
        echo "</tr>";
        }
        echo "</table>";
        }
    }
if(isset($_GET['On'])) {  
  $id=$_GET['On'];   
  $result = mysqli_query($conn,"SELECT * FROM playlist where No=" . $id);
    if($result){
      while($row = mysqli_fetch_array($result))
      {
         $cover = "music/$row[cover]";
         $song = "music/$row[song]";
         if( unlink($song)){
            unlink($cover);
            mysqli_query($conn,"DELETE FROM playlist where No=" . $id);
            echo "<br><h4><b>Song Deleted?<b></h4><br>";
          }
       }
   }
  }


?>  
        </div>
      
          <h4><b>Update Required</b></h4>
          <p> To play the media you need to select a song from billow.</p>
      




</body>

</html>
<?php

$sql = "SELECT No FROM user WHERE email='".$_SESSION["email"]."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {

    $result = mysqli_query($conn,"SELECT * FROM playlist WHERE user='". $row["No"]. "'");
echo '<br><br><h4 align="center"><b>All Songs</b></h4><br>';
echo "<table border='5px' align='center' class='center' style='width: 80%;'>
<tr>
<th style='width: 5%;'>NO</th><th style='width: 20%;'>title</th><th style='width: 15%;'>singer</th><th>details</th><th>Play here</th><th>Delete</th></tr>";//<th>song</th><th>cover</th>

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td><b>" . $row['No'] . "</b></td>";
echo "<td><b>" . $row['title'] . "</b></td>";
echo "<td><b>" . $row['singer'] . "</b></td>";
echo "<td><p >" . $row['details'] . "</p></td>";
// echo "<td>" . $row['song'] . "</td>";
// $cover = "music/$row[cover]";?>
 <!-- <td><img src="<?php //echo $cover; ?>" alt="Cover" height="70px" weight="50px" style = "margin: auto;"><br></td> -->
<?php
echo "<td><a  class = 'a' href='playlist.php?No={$row['No']}' > Play </a></td>";
echo "<td><a  class = 'a' href='playlist.php?On={$row['No']}' > Delete </a></td>";
echo "</tr>";
}
echo "</table>";

echo "<br>";

}
} 

?>

<div style = "margin-left: auto; margin-right: auto;" >
        <a href='upload.php'> <button class="btn btn-large" style = "  width:25%;">Upload Song</button></a>

 </div>


<script>
function test() {
  alert('Sorry! I am still working on Upload Songs.');
}

</script>
<style>
        td {
            text-align: center;
            padding: 15px;
        }
        .a{
          font-size: 20px;
          padding: 5px;
          text-align: center;
          text-decoration: none;
	        color: #fff;
	        background: black;
        }
.a:hover {
	background: #e63d00;
	color: #ffffff;
}


.demo {
  width: 600px;
  height: 60px;
  align: center;
  margin-bottom: 10px;
}
</style>