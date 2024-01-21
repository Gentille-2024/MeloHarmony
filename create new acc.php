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
    $q="SELECT * FROM user where email=?";
    $s=mysqli_prepare($conn,$q);
    mysqli_stmt_bind_param($s,'s',$email);
    mysqli_stmt_execute($s);
    $re=mysqli_stmt_get_result($s);
    $row=mysqli_fetch_row($re);
    if ($row==0){
    $firstname=mysqli_real_escape_string($conn,$_POST['fn']);
    $middlename=mysqli_real_escape_string($conn,$_POST['midn']);
    $lastname=mysqli_real_escape_string($conn,$_POST['last']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $gender=mysqli_real_escape_string($conn,$_POST['g']);
    $birth=mysqli_real_escape_string($conn,$_POST['birthdate']);
    $tel=mysqli_real_escape_string($conn,$_POST['tel']);
    $password1=mysqli_real_escape_string($conn,$_POST['pass']);
    $role=mysqli_real_escape_string($conn,$_POST['role']);
    $query="INSERT INTO user(Firstname,Middlename,Lastname,Email,Gender,BirthDate,Phone,password,Role,Time,status) VALUES(?,?,?,?,?,?,?,?,?,now(),0)";
    $stmt=mysqli_prepare($conn,$query);
    if($stmt)
    {
        mysqli_stmt_bind_param($stmt,"sssssssss",$firstname,$middlename,$lastname,$email,$gender,$birth,$tel,$password1,$role);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        if(!$result)
        {
          if($role=='Admin')
          {
            header("location:login.php?usernames=".urlencode($firstname));
            mysqli_stmt_close($stmt);
            exit();
          }
          else{
            header("location:login.php?usernames=".urlencode($firstname));
            mysqli_stmt_close($stmt);
            exit();
          }
        }
        else
        {
          $error="Something went wrong1";
        }
    }
    else
    {
        $error="Something went wrong".mysqli_error($conn);
    }
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
      <br>
      <br>
        <p><form action="" method="post">
          <center><h1>CREATE NEW ACCOUNT</h1></center>
          <br><p><?php echo $error;?></p>
          <center><p>PLease fill out this form to create new account</p></center>
          <br>
       <b> First name:</b><input type="text"name="fn"placeholder="Type your first name"size="60"><br>
       <br>
                <b>Midle name:</b><input type="text"name="midn"placeholder="Type your middle name"size="60"><br>
                <br>
                <b>Last name:</b><input type="text"name="last"placeholder="Type your last name"size="60"><br>
                <br>
                <b>Email:</b><input type="text"name="email"placeholder="Enter your email"size="60"><br>
                <br>

                <b>Gender:</b><select name="g" id="s">
                    <option select disabled>Select your gender</option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Other</option>
                    </select>
                    <br>
                    <br>
                    <div class="form_group">
                       <b> Birth date:</b> <input type="date" name="birthdate" placeholder="Birthdate" required class="form_control">
                </div>
                             <br>
                             <b>Phone:</b><input type="text"name="tel"placeholder="07********"><br>
<br>
                <b>ROLE:</b>
                <select name="role" id="">
                  <option value="member">member</option>
                  <option value="admin">Admin</option>
                </select>
<br>
                    <b>password:</b><input type="password"name="pass"placeholder="Type your password"size="60"><br>
                <br>
                <b>confirm your password:</b><input type="password"name="npass"placeholder="re-type your password"size="60"><br>
                <br>
                <br>
                <br>
                <br>
                    <button id="button" type="submit">Submit</button>
                </form>
            </p>

    </body>
</html>
