
<!-- 
    This Is Copyrighted to Mr.ROY121 
    Please Contact Becfore Using it..
    Email: nilashishroyjoy@gmail.com
 -->

<?php
session_start();
include "config/config.php";
 
 
if($_SERVER['REQUEST_METHOD']=='POST'){
$response = array();
if($_POST['email'] && $_POST['password']){


 $email = $_POST['email'];
 $password = $_POST['password']; 
 
 $stmt = $conn->prepare("SELECT name, email FROM user WHERE email = ? AND password = ?");
 $stmt->bind_param("ss",$email, $password);
 
 $stmt->execute();
 
 $stmt->store_result();
 
 if($stmt->num_rows > 0){
 
 $_SESSION["email"] = $email;
 $stmt->bind_result($name, $email);
 $stmt->fetch();
 
 
 header("location: page-1.php");
 echo '<script>alert("User login Successfully")</script>';

 }else{
	echo '<script>alert("Cannot complete user login")</script>';
 }
 }
 }
 
?>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/main.css">
<script src="js/validation.js"></script>
</head>

<body>

 <div class="conForm">
    <div class="section-header">
        	<h2>Login Form</h2>
        	<h4>Sign in with the form below.</h4></div>
        <div class="row justify-content-center mt-5">
            <div class="col-lg-4 col-md-6 col-sm-12">
        	<form action="login.php" method="post" id="member" name="mform" onsubmit="return validate()">
            	<input name="email" type="text" placeholder="E-Mail" id="email"/>
                <input name="password" type="password" placeholder="Password" id='password'/>
				<div><span id="error" class = "error"></span></div>
                <div ><input type="submit" id="signin" class="submitBnt" value="Sign In" ><br></div>

				<p>Don't have an account? <a href="register.php"> Create here </a></p><br>
            </form>
			</div>
		</div>
 </div>

</body>
 	
<script>
function validate(){  
 
	var email=document.mform.email.value;  
	var password=document.mform.password.value; 	

	if (email==null || email=="" || password==null || password==""){  
		document.getElementById("error").innerHTML= "All Fields Are Requried";
		return false;  
	}
}

</script>
</html>
