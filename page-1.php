<?php
include "config/config.php";
session_start();

if (!isset($_SESSION["email"])) {
    header("location: login.php");}
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
    <html>
 

<head>
<meta charset="utf-8">
<link rel="stylesheet"href="https://www.w3schools.com/w3css/4/w3.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<section class="banner" id="banner">
  <header id="header">
    <div> <img src="images/p.png" height="50" weight="45" style="margin-top: 15px; margin-left: 15px; display:inline;">
    <p1 style="display:inline;  color: white; font-size: 16px; font-family:'Courier New'; margin-left: 15px; "> Current User E-mail : <?php echo $_SESSION["email"];?>.</p1>
    <img src="user_images/<?php echo implode(" ",$temp);?>" class="img-circle" alt="User Pic" height="40" weight="25" style="border-radius: 50%; margin-top: 15px; margin-left: 15px; display:inline;">
    <nav class="navigation" >
		  <li><a href="#banner">Home</a></li>
          
      <li><a href="events.php">Events</a></li>
      <li><a href="playlist.php">Playlist</a></li>
          <li class="dropdown">
            <a class="dropbtn">Login/Register
              <i class="fa fa-caret-down"></i>
            </a>
            <div class="dropdown-content">
              <a href="login.php">Login</a>
              <a href="register.php">Register</a>
              <a href="update.php">Update User Info</a>
              <a href="logout.php">Logout</a>
            </div></a></li>
          <li><a href="#dev">Devolopers details</a></li> 
      </nav>
  </header>

      <div class="banner-text">
        <h1>Event Management</h1>
        <p>Light Up Spcial Occations</p>  
    </div>
    
    <div class="sidenav">
      <a href="#dev" style="margin-top: 550px;">About</a>
      <a href="contact.php">Contact</a>
      <a href="logout.php">Logout</a>
      <a href="delete.php">Delete User</a>
    </div>
</section>

  <div>
      <h2 style="text-align:center;">Don't Miss This Event</h2>
      <h4 style="text-align:center;">There is lots of thing coming in this event, Every part of the event is important. Get every details of this huge event</h4> 
        <a href="events.php" class="btn btn-large">Events</a> <br><br><br><br>
  </div>
<section id="services" class="services">

  <div>
                <h2 >News & Updates</h2><br><br><br>
                <p >his text is styled with some of the text formatting properties. The heading uses the text-align, <br>text-transform, and color properties. The paragraph is indented,</p>
            </div>

        <div class="services-content">
          <h4>Musical Night</h4>
		  <b>Day 1</b>
          <p>his text is styled with some of the text formatting properties. The heading uses the text-align, text-transform, and color properties. The paragraph is indented,</p>
        </div>
    
        <div class="services-content">
          <h4>Dancing Night</h4>
		  <b>Day 2</b>
          <p>his text is styled with some of the text formatting properties. The heading uses the text-align, text-transform, and color properties. The paragraph is indented,</p>
        </div>
      </div> 
      
        <div class="services-content">
          <h4>Food Night</h4>
		  <b>Day 3</b>
          <p>his text is styled with some of the text formatting properties. The heading uses the text-align, text-transform, and color properties. The paragraph is indented,</p>
        </div>
      </div> 
  </div>
</section> 


<section id="dev" >

      <div class="section-header">
                <h2>Devolopers Details</h2>
                <p>The Devolopers details and others members details is described billow.</p>
            </div>

            <div class="w3-cell-row" style="width:50%; margin-left: 350px;">
              <div class="w3-container w3-cell">
            <img id="borderimg" src="images/bitmap.png" height="170" width="150" style="margin-left: 40px;">
          </div>

            <div class="w3-container w3-cell">

            <h4>Nilashish Roy</h4>
            <h5>Founder</h5>
            <p>B.sc 4th year Computer Science and Engineering Student at <br><strong>Leading University, Sylhet</strong></p>
          
          <span class="social-icons">
            <li><a href="#"><span class="fa fa-facebook"></span></a></li>
            <li><a href="#"><span class="fa fa-twitter"></span></a></li> 
            <li><a href="#"><span class="fa fa-google-plus"></span></a></li> 
          </span>
          </div>
  </div>
</section>



<footer class="center" style="margin-top: 100px;">
  <div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=24.48721375490907,%2091.74317138650099&t=k&z=15&ie=UTF8&iwloc=&output=embed" ></iframe><br></div></div>
</footer>

</body>

</html>
