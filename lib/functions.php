<?php
    function javascript($code)
    {
        echo "<script type=\"text/javascript\">".$code."</script>";
    }

    function alert($message)
    {
        javascript("alert(\"".$message."\")");
    }

    function getRandomUniqueString($len)
    {
        $validChars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $randString = "";
        for($i = 0; $i < $len; $i++)
        {
            $randString .= $validChars[rand(0, strlen($validChars) - 1)];
        }
        return $randString;
    }

    function SetTrackingCookie()
    {
        setcookie("token", getRandomUniqueString(32), time() + 30 * 60);  //expires in 30 minutes. The length of random string is 32.
    }

    function validate($str)
    {
        return htmlentities(trim($str));
    }
?>