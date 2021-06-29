<?php

function db_connect()
{
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "it224_final";

    $conn = mysqli_connect($hostname, $username, $password, $database);

    if ($conn == FALSE)
    {
        echo "Error: " . mysqli_connect_error() . "<br/>";
        return null;
    }

    return $conn;
}

function db_disconnect($conn)
{
    mysqli_close($conn);
    return;
}


function checkUserAccessCookie()
{
    if (isset($_COOKIE["userAccess"]))
    {
        return true;
    }

    return false;
}

function getDefaultUserFromCookie()
{

    if (isset($_COOKIE["userLogin"]))
    {
        return $_COOKIE["userLogin"];
    }
    return "";
    
}

?>
