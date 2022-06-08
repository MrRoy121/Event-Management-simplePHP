
<!-- 
    This Is Copyrighted to Mr.ROY121 
    Please Contact Becfore Using it..
    Email: nilashishroyjoy@gmail.com
 -->
 
 <?php
define('DB_HOST', "localhost");
define('DB_USER', "root");
define('DB_PASS', "");
define('DB_NAME', "web");

$conn = new mysqli("localhost", "root", "", "web");
 
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>