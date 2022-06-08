<?php
include "config/config.php";

session_start();

if (!isset($_SESSION["email"])) {
    header("location: login.php");
}
if($_SERVER['REQUEST_METHOD']=='POST'){
	if( $_POST['ename'] && $_POST['place']  && $_POST['date'] && $_POST['time'] && $_POST['ticket']){
		$email = $_SESSION["email"];
		$place = $_POST['place'];
		$ename = $_POST['ename'];
		$date = $_POST['date'];
		$time = $_POST['time'];
		$ticket = $_POST['ticket'];
		$avaiticket = 0;

			$stmt = $conn->prepare("INSERT INTO events (name,place,email,date,time,Ticket,avaiTicket) VALUES( '$ename', '$place', '$email', '$date', '$time', '$ticket', '$avaiticket')");
   				
				if($stmt->execute()){
					header("location: events.php");
					echo '<script>alert("Event Uploaded Successfully")</script>';
				} else {
					echo '<script>alert("Cannot Upload Event")</script>';
				}
			
	}
}
?>

<!DOCTYPE html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet"href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>

<div class="w3-container w3-cell">
        <img src="images/pic2.jpg" class="img-responsive" alt=""  style="margin-left: 50px; margin-top: 200px;">
      </div>

      <div class="w3-container  w3-cell">
 <div class="conForm" style="margin-left: 200px;">
            <div class="section-header"> 
    		<h2 style="font-size: 50px;">Event Register Form</h2>
        	<h4>Add Event with the form below.</h4>
        </div>
    		<form name="myform" method="post" action="" onsubmit="return validate()" > 
							 <span id="ferror" class = "error"></span>
				<table style="margin: auto;"> 
					<tr> <td><div class="mb-3">
						 <input style="width: 500px;" type="text" class="form-control" name="ename" placeholder="Event Name"/>
						 </div></td> </tr>
					<tr>  <td><div class="mb-3"> 
                    <input type="text" class="form-control" name="place" placeholder="Event Place"/> </tr>
					<tr> <td><div class="mb-3"> 
						<input type="date" class="form-control" name="date" placeholder="Date"/> </tr>
                        <tr><td><div class="mb-3"> 
                        <input type="time" class="form-control" name="time" placeholder="Time" /> </tr>
                        <tr><td><div class="mb-3"> 
                        <input type="number" min="0" class="form-control" name="ticket" placeholder="Available Tickets" /> </tr>
					</table>
					<div ><input type="submit" id="signup" class="submitBnt" name="upload" value="Upload" ></div> 
					
		    </form>
    	</div>  
</div>	
</div>	
<script>
function validate(){  

	var name=document.myform.ename.value;  
	var place=document.myform.place.value;  
	var date=document.myform.date.value; 	
	var time=document.myform.time.value;
	var ticket=document.myform.ticket.value;

	if (name=="" || place=="" || date=="" || time=="" || ticket==""){  
		document.getElementById("ferror").innerHTML= "All Fields Are Requried";  
		return false;  
	}
}  

</script>
</body>
</html>
