<?php
    function printError()
    {
        die("Oops!!! Some Error Occured :(");
    }

    function checkUnique($conn, $token)
    {
        $stmt = $conn -> prepare("Select uid from users where token = ?");
        if(!$stmt)
            printError();
        if($stmt -> bind_param("s", $token))
        {
            if($stmt -> execute())   
            {
                $stmt -> store_result();
                if($stmt -> num_rows)
                {
                    return false;
                }
                return true;
            }
            else
                printError();
        }
        else    
            printError();
        
    }

    function saveTokenInDB($conn, $token)
    {
        if(!checkUnique($conn, $token))
            return false;
        $stmt = $conn -> prepare("insert into users (token, firstVisit, lastVisit) VALUES(?, NOW(), NOW())");
        if(!$stmt)
            printError();
        
        if($stmt -> bind_param("s", $token))
        {
            if($stmt -> execute())   
            {
                return true;
            }
            else
                printError();
        }
        else    
            printError();
    }

    function mysqlConnectDB($db) 
    {
        $servername = "localhost";
        $username = "root";
        $password = "gard3ning";
        $dbname = $db; 
        $conn = new mysqli($servername, $username, $password, $dbname);
        if($conn -> connect_error)
            printError();
        return $conn;        
    }
?>