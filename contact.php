<html>
<!-- 
    This Is Copyrighted to Mr.ROY121 
    Please Contact Becfore Using it..
    Email: nilashishroyjoy@gmail.com
 -->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="css/main.css">   
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body style="background: #000;">

        <div class="section-header">
                  <h2>Contact Us</h2>
                  <p>Text messaging, or texting, is the act of composing and sending electronic messages, typically consisting of alphabetic and <br>numeric characters, between two or.</p>
              </div>
    <div class="w3-cell-row" style="width:75%">
        <div class="w3-container w3-cell">
            <div class="conForm">       
                <div id="message"></div>
            <form method="POST" action="" name="me" onsubmit = "return contactvalidation()">
                <input name="uname" id="uname" type="text" placeholder="Your name..." size="70"><br>
                <input name="topic" id="email" type="topic" placeholder="Topic of Message..." size="70"><br>
                <textarea name="comments" id="comments" placeholder="Message..." rows="10" cols="70"></textarea><br>
                <input type="submit" id="submit" name="send" class="submitBnt" value="Send"><br>
              
          </form>
    </div>
        </div>
        <div class="w3-container w3-cell">
            <h3 style="margin-top:0;color:#fff;">Our Address</h3>
            <address style="color:#fff;">
                <strong>Roy Event Management Services</strong><br>
                1234 LamaBazar.<br>
                Sylhet, Syl<br>
                Bangladesh<br>
                <abbr title="Phone">Tel:</abbr> (+880) 1564-128374
            </address>
        </div>
      </div>

<script>
function contactvalidation(){

	var comments=document.me.comments.value; 
	var topic=document.me.topic.value;  
	var uname=document.me.uname.value; 
	if(topic == "" || uname == "" || comments == ""){
        alert("Type SomeThing");
		return false;
	}else
    alert("Message Send! Thanks for your feedback..");
}
</script> 

</body>

</html>
