<?php
    include_once("lib/utility.php");
    $messageToTheUser = "";
    if(isset($_COOKIE["token"]))
    {
        $messageToTheUser = "You have been here before!!!";
        $token = validate($_COOKIE["token"]);
    }
    else
    {
        $messageToTheUser = "Seems to be your first time here!!!"; 
        SetTrackingCookie(); 
    }
?>
<html>
<head>
    <title>Tracker Home</title>
    <?php alert($messageToTheUser); ?>
</head>
<body>
    <h1>Hello Dear, I am going to track you :D</h1>
    <b>
       <?php 
            if(isset($token)) 
            {
                echo "Your Token Value is: $token";
            }
            else
                echo "No token is set. Please Refersh the page.";
        ?>
    </b>
</body>
</html>