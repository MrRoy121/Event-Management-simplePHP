
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
	if( $_POST['name'] && $_POST['singer']  && $_POST['comments']){
		$comments = $_POST['comments'];
		$name = $_POST['name'];
		$singer = $_POST['singer'];
		$imgFile = $_FILES['image']['name'];
  		$tmp_dir = $_FILES['image']['tmp_name'];
  		$imgSize = $_FILES['image']['size'];

		$mgFile = $_FILES['song']['name'];
  		$mp_dir = $_FILES['song']['tmp_name'];
  		$mgSize = $_FILES['song']['size'];

  if(empty($imgFile)){
   $errMSG = true;
   echo '<script>alert("Please Select A Cover Photo.")</script>';
  }else if(empty($mgFile)){
	$errMSG = true;
	echo '<script>alert("Please Select The Song.")</script>';
   }else{
   $upload_dir = 'music/'; // upload directory
 
   $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
   $mgExt = strtolower(pathinfo($mgFile,PATHINFO_EXTENSION)); // get image extension
  
   // valid image extensions
   $valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions
   $valid_extension = array('mp3'); // valid extensions


   // rename uploading image
   $rand = rand(1000,1000000).".".$imgExt;
   $ran = rand(1000,1000000).".".$mgExt;

   // allow valid image file formats
   if(in_array($imgExt, $valid_extensions)&& in_array($mgExt, $valid_extension)){   
    if($imgSize < 5000000 && $mgSize < 15000000 )    {
     move_uploaded_file($tmp_dir,$upload_dir.$rand);
     move_uploaded_file($mp_dir,$upload_dir.$ran);

	 $sql = "SELECT No FROM user WHERE email='".$_SESSION["email"]."'";
	 $result = $conn->query($sql);
	 
	 if ($result->num_rows > 0) {
	   while($row = $result->fetch_assoc()) {
		
		$no = $row["No"];

	 	$stmt = $conn->prepare("INSERT INTO playlist (title,singer,details,song,cover,user) VALUES( '$name', '$singer', '$comments', '$ran', '$rand','$no')");
				if($stmt->execute()){
					header("location: playlist.php");
					echo '<script>alert("Song Added Successfully")</script>';
				} else {
					echo '<script>alert("Cannot complete user registration")</script>';
				}
			}}

    }
    else{
	  echo '<script>alert("Sorry, your files Are too large.")</script>';
    }
   }
   else{
	$errMSG = true;
	   echo '<script>alert("Sorry,files format is not allowed.")</script>';
   }
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
    		<h2>Upload Song</h2>
        	<h4>Select Image Files and Mp3 Files for the Song.</h4>
        </div>
    		<form name="myform" method="post" enctype="multipart/form-data" action="" onsubmit="return validateform()" > 
							 <span id="ferror" class = "error"></span>
				<table style="margin: auto;"> 
					<tr> <td><div class="mb-3">
						 <input type="text" class="form-control" name="name" placeholder="Name"/>
							 <span id="nameerror" class = "error"></span>
						 </div></td> 
					<td><div class="mb-3"> 
							 <input type="text" class="form-control" name="singer" placeholder="Singer"/> 
							 <span id="singererror" class = "error"></span></div></td></tr>
					<tr > <td colspan="2"><div class="mb-3"> 
						<textarea name="comments" id="comments" placeholder="Description..." rows="7" cols="50"></textarea>
							<span id="phoneerror" class = "error"></span></div></td></tr> 
					<tr> <td>
						
					<h4 style="color: gray; font-size: 16px;">Upload Cover Image</h4>
							<input class="mb-3" type="file" name="image" accept="image/*"  style="margin-left: 35px; padding: 10px;" /></div>

							<div>
				</td>
				<td>
						
				<h4 style="color: gray; font-size: 16px;">Upload The Mp3</h4>
							<input class="mb-3" type="file" name="song" accept="audio/*" style="margin-left: 35px; padding: 10px;" /></div>

							<div>
						</td></tr>
					</table>
					<div ><input type="submit" id="signup" class="submitBnt" name="signup" value="Post Song" ></div> 
		    </form>
    	</div>  	
<script>
function validateform(){  

	var name=document.myform.name.value;  
	var singer=document.myform.singer.value;  

	if (name=="" || singer=="" ){  
		document.getElementById("ferror").innerHTML= "All Fields Are Requried";  
		return false;  
	}
}  

</script>
</body>
</html>