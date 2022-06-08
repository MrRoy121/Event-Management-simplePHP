
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

if($_SERVER['REQUEST_METHOD']=='POST'){

		$imgFile = $_FILES['user_image']['name'];
  		$tmp_dir = $_FILES['user_image']['tmp_name'];
  		$imgSize = $_FILES['user_image']['size'];

  if(empty($imgFile)){
   $errMSG = true;
   echo '<script>alert("Please Select Image File.")</script>';
  }
  else
  {
   $upload_dir = 'user_images/';
 
   $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));
  
  
   $valid_extensions = array('jpeg', 'jpg', 'png');
  
   $userpic = rand(1000,1000000).".".$imgExt;
   if(in_array($imgExt, $valid_extensions)){   
    if($imgSize < 5000000)    {
    $stmt1 = mysqli_query($conn,"SELECT usrimg FROM user WHERE email ='".$_SESSION["email"]."'");
    if($stmt1){
        while($row = mysqli_fetch_array($stmt1))
    {
        $usrimg = "$row[usrimg]";
        unlink("user_images/".$usrimg['userimg']);
    }}
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
			$stmt = mysqli_query($conn, "UPDATE user SET usrimg='".$userpic."' WHERE email='".$_SESSION["email"]."'");
  
        if($stmt){
					header("location: page-1.php");
					echo '<script>alert("Image Updated Successfully")</script>';
				} else {
					echo '<script>alert("Cannot complete user registration")</script>';
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
</head>

<body>
 <div class="conForm">
            <div class="section-header"> 
    		<h2>Update Image Form</h2>
        </div>
    		<form name="myform" method="post" enctype="multipart/form-data" action="" > 
							 <span id="ferror" class = "error"></span>
			<div>
        				<h4 style="color: gray; font-size: 16px;">Upload An Image</h4>
							<input class="mb-3" type="file" name="user_image" accept="image/*" style="margin-left: 35px; padding: 10px;" /></div>
							<div class="mb-3">
                            </div>
					<div ><input type="submit" id="signup" class="submitBnt" name="signup" value="Update" ></div> 
					
		    </form>
    	</div>  
</body>
</html>
