<?php
    include_once('dbfunctions.php');
    function javascript($code)
    {
        echo "<script type=\"text/javascript\">".$code."</script>";
    }

    function alert($message)
    {
        javascript("alert(\"".$message."\")");
    }

    /*
        Returns a random alphanumeric string of length $len (32 by default)
    */
    function getRandomString($len = 32)
    {
        $validChars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $randString = "";
        for($i = 0; $i < $len; $i++)
        {
            $randString .= $validChars[rand(0, strlen($validChars) - 1)];
        }
        return $randString;
    }

    function SetTrackingCookie($len = 32)
    {
        $MAX_ITER = 5;
        $iter = 0;
        $conn = mysqlConnectDB("webtracking"); //connect to database webtracking
        while($iter < $MAX_ITER)
        {
            $token = getRandomString($len);
            if(saveTokenInDB($conn, $token)) //saveTokenInDB - Returns false if token was not unique
            {
                //expires in 30 minutes. The length of random string is 32.
                // Need to set domain = NULL as chrome prevents creration of cookie for localhost.
                setcookie("token", $token, time() + 30 * 60, "/webtracking", NULL, false, true); 
                break;
            }
            $iter++;
        }
        if($iter == $MAX_ITER)
            die("Some Error occured try again!");
    }

    function validate($str)
    {
        return mysql_real_escape_string(htmlentities(trim($str));
    }
?>