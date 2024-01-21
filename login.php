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
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $q="SELECT * FROM user where email=? AND password=?";
    $s=mysqli_prepare($conn,$q);
    if($s)
    {
    mysqli_stmt_bind_param($s,'ss',$email,$password);
    mysqli_stmt_execute($s);
    $re=mysqli_stmt_get_result($s);
    $row=mysqli_fetch_row($re);
    if($row>=1){
       mysqli_stmt_close($s);
            $w=mysqli_query($conn,"SELECT Role from user where EMAIL='$email'  AND password='$password'");
            //$r=mysqi_result($w)
            $t=mysqli_fetch_row($w);
            if($t[0]=='member'){
            $_SESSION['login_user']=$email;
            header("location:user dashboard.php?usernames=".urlencode($firstname));
           
            exit();
            }
            else
            {
                $_SESSION['login_user']=$email;
                header("location:Admin dashboard.php?usernames=".urlencode($firstname));
                exit();
            }
    }
    else
    {
        $error="Invalid Username and Password";
    }
    }else
    {
      $error="Something went wrong";
    }
}

  mysqli_close($conn);
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home Page</title>
        <link rel="stylesheet" href="stylehome.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <style>
          body{
    padding-top: -10px;
    padding-left:0px ;
    align-content: center;
    font-family:Roboto, "Cantarell", Arial, sans-serif;
    font-size: inherit;
    background-repeat: no-repeat;
    background-image:url('backg.png');

}
.main{
    margin-top: 300px;
    width: 400px;
}
h2{
    color: rgba(41, 103, 219, 0.984);
    font-family:Roboto, "Cantarell", Arial, sans-serif;
}
label{
    border-radius: 8px;
    width: 100px;
    height: 15px;
    padding: 30px;
    font-size:20px;
}
form{
    width: 500px;
    border-radius:30px;
    margin:auto;
    padding-left:00px;
    border-left: 3px dodgerblue solid;
    border-radius:20px ;
    padding: 25px;
    background-color: azure;
}
#regist{
    padding-top: 40px;
    padding-bottom: 20px;
}
#button{
    font-size:25px;
    font-weight: 400;
    width: 90%;
    color: white;
    background-color:rgba(41, 103, 219, 0.984);
    padding: auto;
}
#red{
    color: red;
}
        </style>
    </head>
    <body>
        <div class="menu-bar">
        <ul>
    <li class="logo"><a href="community connect.php">Community Connect<br> MeloHarmony</a></li>
    <li><a href="about.php">🎵About Us</i></a></li>
    <li><a href="meet the voice.php">👥 Meet the Voices</a></li>
    <li><a href="events.php">📅 Upcoming Events</a></li>
    <li><a href="#"><i class='bx bx-laptop'>Profile</i></a>
    <div class="sub-menu-1">
      <ul>
            <li class="hover_me"><a href="login.php">Login</a><i class='bx bxs-chevron-right'></i>
              <li class="hover_me"><a href="create new acc.php">Create account</a><i class='bx bxs-chevron-right'></i>
            </li>
          </ul>
        </div>
        </li>
      </ul>
        </div>
      </header>
    <body>
     
       <p>
        <form action="#" method="post"><br>
         <center><h1>LOGIN</h1></center>
         <br>
         <p><?php echo $error;?></p>
          <center><p>PLease fill out this form to login</p></center>
          <br>
        <b> Email:</b> <input type="text"name="email" id="space" placeholder="Type your email"size="60"><br>
        <br>
        <b> password:</b><br> <input type="password"name="password" id="space"placeholder="Type your password"size="60"><br>
        <br>
            <button type="submit" style="width: 100%;background-color: lightgreen; padding: 7px;border-radius: 5px; ">Login</button>
        <br><br>
        
        </form>

       </p>
    </body>
</html>
