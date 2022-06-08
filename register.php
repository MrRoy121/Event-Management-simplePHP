<?php
include "config/config.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
	if( $_POST['name'] && $_POST['password']  && $_POST['conpassword'] && $_POST['phone'] && $_POST['city'] && $_POST['email']){
		$email = $_POST['email'];
		$password = $_POST['password'];
		$conpassword = $_POST['conpassword'];
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$city = $_POST['city'];
		$imgFile = $_FILES['user_image']['name'];
  		$tmp_dir = $_FILES['user_image']['tmp_name'];
  		$imgSize = $_FILES['user_image']['size'];

	$sql = $conn->prepare("SELECT * FROM user WHERE email = ?");
	$sql->bind_param("s",$email);
	$sql->execute();
	$sql->store_result();

	if($sql->num_rows > 0){
		echo '<script>alert("User is already Registered")</script>';
	} else if($password==$conpassword){ 
  if(empty($imgFile)){
   $errMSG = true;
   echo '<script>alert("Please Select Image File.")</script>';
  }
  else
  {
   $upload_dir = 'user_images/'; // upload directory
 
   $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
  
   // valid image extensions
   $valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions
  
   // rename uploading image
   $userpic = rand(1000,1000000).".".$imgExt;
   // allow valid image file formats
   if(in_array($imgExt, $valid_extensions)){   
    // Check file size '5MB'
    if($imgSize < 5000000)    {
     move_uploaded_file($tmp_dir,$upload_dir.$userpic);
	
    }
    else{
	  echo '<script>alert("Sorry, your file is too large.")</script>';
    }
   }
   else{
	$errMSG = true;
	   echo '<script>alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.")</script>';
   }
  }
		if (!isset($errMSG)){
			$stmt = $conn->prepare("INSERT INTO user (name,phone,email,city,usrimg,password) VALUES( '$name', '$phone', '$email', '$city', '$userpic', '$password')");
   				
				if($stmt->execute()){
					header("location: login.php");
					echo '<script>alert("User Registered Successfully")</script>';
				} else {
					echo '<script>alert("Cannot complete user registration")</script>';
				}
			
		}
	}else{  
		echo '<script>alert("Password Must Be Same!")</script>';
		}}
}
?>

<!DOCTYPE html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="stylesheet" href="css/main.css">
</head>

<body>
 <div class="conForm">
            <div class="section-header"> 
    		<h2>Register Form</h2>
        	<h4>Sign Up with the form below.</h4>
        </div>
    		<form name="myform" method="post" enctype="multipart/form-data" action="" onsubmit="return validateform()" > 
							 <span id="ferror" class = "error"></span>
				<table style="margin: auto;"> 
					<tr> <td><div class="mb-3">
						 <input type="text" class="form-control" name="name" placeholder="Name"/>
							 <span id="nameerror" class = "error"></span>
						 </div></td> 
					<td><div class="mb-3"> 
							 <input type="text" class="form-control" name="city" placeholder="City"/> 
							 <span id="cityerror" class = "error"></span></div></td></tr>
					<tr>  <td><div class="mb-3"> 
						<input type="tel" class="form-control" name="phone" placeholder="Phone" /> 
							 <span id="phoneerror" class = "error"></span></div></td> 
					<td><div class="mb-3"> 
						<input type="email" class="form-control" name="email" placeholder="E-Mail"/>
							 <span id="emailerror" class = "error"></span></div></td></tr> 
					<tr> <td><div class="mb-3"> 
						<input type="password" class="form-control" name="password" placeholder="Password"/> 
							 <span id="pass" class = "error"></span></div></td> 
					<td><div class="mb-3"> <input type="password" class="form-control" name="conpassword" placeholder="Confirm Password" /> 
							 <span id="cpass" class = "error"></span></div></td></tr> </tr> 
					</table><div>
        				<h4 style="color: gray; font-size: 16px;">Upload An Image</h4>
							<input class="mb-3" type="file" name="user_image" accept="image/*" style="margin-left: 35px; padding: 10px;" /></div>
							<div class="mb-3">
                            <h9><input type="checkbox">I agree with the <a href="">Terms & Conditions</a> for Registration.</h9>
                        </div>
					<div ><input type="submit" id="signup" class="submitBnt" name="signup" value="Sign Up" ></div> 
					
            <p>Already have an account? <a href="login.php"> Login here </a></p><br>
		    </form>
    	</div>  	
<script>
function validateform(){  

	var name=document.myform.name.value;  
	var email=document.myform.email.value;  
	var phone=document.myform.phone.value;  
	var city=document.myform.city.value;  
	var password=document.myform.password.value; 	
	var secondpassword=document.myform.conpassword.value;
	var status=false;     
	var pattern=/^[a-zA-Z .]+$/;
	var phonePattern=/^\d{11}$/;

	if (name=="" || email=="" || city=="" || phone=="" || password=="" || secondpassword==""){  
		document.getElementById("ferror").innerHTML= "All Fields Are Requried";  
		return false;  
	}else {
		if(!name.match(pattern)){
	 	document.getElementById("nameerror").innerHTML="Invalid Name!";
	 	return false;
	 }if(name.length<3 || name.length>20){
	 	document.getElementById("nameerror").innerHTML="Name Should be 4-20 characters!";
	 	return false;
	 }if(!city.match(pattern)){
	 	document.getElementById("cityerror").innerHTML="Invalid City";
	 	return false;
	 }if(!phone.match(phonePattern)){
	 	document.getElementById("phoneerror").innerHTML="Invalid Phone Number!";
	 	return false;
	 }
	 }
}  

</script>
</body>
</html>
