<?php
    include_once("lib/functions.php");
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
    <b>Your Token Value is: 
       <?php 
            if(isset($token)) 
            {
                echo $token;
            }
            else
                echo "N/A";
        ?>
    </b>
</body>
</html>