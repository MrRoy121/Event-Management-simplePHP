<!doctype html>
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
<link rel="stylesheet"href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background: #000;">

    <div class="section-header">
        <h1><b><strong>Events</strong></b></h1>
        <p>Text messaging, or texting, is the act of composing and sending electronic messages, typically consisting of alphabetic and <br>numeric characters, between two or.</p>
    </div>
    
    <div class="w3-container w3-cell" >
        <img src="images/pic2.jpg" class="img-responsive" alt="" style="margin-left:150px;">
      </div>
      
      <div class="w3-container  w3-cell" >
        <h2>Available Programs</h2>
            
<div class="container">  
<?php

include "config/config.php";
$result = mysqli_query($conn,"SELECT * FROM events");

while($row = mysqli_fetch_array($result))
{?>

            
    <div class="card border-secondary" style="width: 500px; height: 180px; margin-top: 20px; background: #000;">
     <div class="card-header border-secondary"><b><span style="margin-right: 330px"><?php echo  $row['time'] ;?></span><?php echo  $row['date'];?></b></div>
     <div class="card-body text-secondary">
    <h5 class="card-title"><b><?php echo  $row['name'] ;?><b></h5>
    <p class="card-text" style="font-size: 20px;"><?php echo  $row['place'] ;?><br><span style="font-size: 14px;" >Number Of Tickets: <?php echo  $row['Ticket'] ;?></span><span style="font-size: 15px; margin-left: 20px">Available Tickets: <?php echo  $row['avaiTicket'] ;?></span></p>
   <?php echo "<td><a  class = 'btn border-secondary' href='events.php?No={$row['No']}' style='font-size: 10px; padding: 10px; color: #fff; margin-left: 350px; margin-top: -50px;'> Buy Ticket </a></td>";?>
  </div>
  </div>


    <?php 
}
echo "<br>";
?>
    <a href="events1.php" class="btn btn-large border-secondary" style="margin-bottom: 25px; padding: 20px; font-size: 16px; margin-left: 200px">Upload Events</a>
 
</body>

</html>

<?php
if((!isset($_GET['No']))) {    
  }else{
    $No=$_GET['No']; 
    $avaiTicket= mysqli_query($conn, "SELECT avaiTicket from events Where No='$No'");

    while ($row = $avaiTicket->fetch_assoc()) {
      $row['avaiTicket']++;
      $upTicket = $row['avaiTicket'];
      $result = mysqli_query($conn, "UPDATE events SET avaiTicket='$upTicket' WHERE No='$No'");
      If($result){
          echo '<script>alert("Ticket Booked")</script>';
          header("location: events.php");
      }
  }
}
  
?>