<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$server="localhost";
$user="root";
$pass="";
$db="community connect";
$error="";
$conn=mysqli_connect($server,$user,$pass,$db);
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $query="INSERT INTO subscriber VALUES(?,now())";
    $stmt=mysqli_prepare($conn,$query);
    if($stmt)
    {
        mysqli_stmt_bind_param($stmt,"s",$email);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        if(!$result)
        {
            $error="Your comment is sent successfully!";
            mysqli_stmt_close($stmt);
            exit();
        }
        else
        {
          $error="Something went wrong";
        }
    }
}
