<!doctype html>
<html>



<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/main.css"> 
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>



    <div class="section-header">
              <h2 >Playlist</h2>
              <p >vText messaging, or texting, is the act of composing and sending electronic messages, typically consisting of alphabetic and <br>numeric characters, between two or.</p>
          </div>
<div class="center">
<section id="Play" >
<?php
include "config/config.php";
    
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
<!-- 
          <span class="play-icons clearfix">
            <li><a href="#"><span class="fa fa-fast-backward"></span></a></li>
            <li><a href="#"><span class="fa fa-step-backward"></span></a></li> 
            <li><a href="#"><span class="fa fa-pause"></span></a></li> 
            <li><a href="#"><span class="fa fa-play"></span></a></li>
            <li><a href="#"><span class="fa fa-stop-circle"></span></a></li> 
            <li><a href="#"><span class="fa fa-step-forward"></span></a></li> 
            <li><a href="#"><span class="fa fa-fast-forward"></span></a></li>
          </span>-->

          </section>
          <?php
        echo "<br><td>" . $row['details'] . "</td>";
        echo "</tr>";
        }
        echo "</table>";
        }
    }
?>  
        </div>
      
          <h4><b>Update Required</b></h4>
          <p> To play the media you need to select a song from billow.</p>
      




</body>

</html>
<?php
$result = mysqli_query($conn,"SELECT * FROM playlist");
echo '<br><br><h4 align="center"><b>All Songs</b></h4><br>';
echo "<table border='5px' align='center' class='center' style='width: 80%;'>
<tr>
<th style='width: 5%;'>NO</th>
<th style='width: 20%;'>title</th>
<th style='width: 15%;'>singer</th>
<th>details</th>
<th>song</th>
<th>cover</th>
<th>Play here</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td><b>" . $row['No'] . "</b></td>";
echo "<td><b>" . $row['title'] . "</b></td>";
echo "<td><b>" . $row['singer'] . "</b></td>";
echo "<td>" . $row['details'] . "</td>";
echo "<td>" . $row['song'] . "</td>";
$cover = "music/$row[cover]";?>
<td><img src="<?php echo $cover; ?>" alt="Cover" height="70px" weight="50px" style = "margin: auto;"><br></td>
<?php
echo "<td><a  class = 'a' href='playlist.php?No={$row['No']}' > Play </a></td>";
echo "</tr>";
}
echo "</table>";

echo "<br>";
?>
        <button class="btn btn-large" onclick='test();'>Upload Song</button>
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