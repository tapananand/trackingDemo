<?php
    include_once("lib/utility.php");
    if(isset($_COOKIE['token']))
    {
        $token = validate($_COOKIE['token']);
        echo "set";
    }
    else
    {
        echo "Not set";
    }
?>