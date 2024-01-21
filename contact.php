<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$server="localhost";
$user="root";
$pass="";
$db="community connect";
$error=$error2="";
$conn=mysqli_connect($server,$user,$pass,$db);
if(isset($_POST['send']))
{
    $firstname=mysqli_real_escape_string($conn,$_POST['fn']);
    $lastname=mysqli_real_escape_string($conn,$_POST['ln']);
    $gender=mysqli_real_escape_string($conn,$_POST['g']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $tel=mysqli_real_escape_string($conn,$_POST['contact']);
    $comment=mysqli_real_escape_string($conn,$_POST['comment']);

    $query="INSERT INTO reviewer (Firstname,Lastname,Gender,Email,Contact,comment,time) VALUES('$firstname','$lastname','$gender','$email','$tel','$comment',now())";
    $result=mysqli_query($conn,$query);
    if($result)
    {
            $error="Sent successfully!";
           // mysqli_stmt_close($stmt);
           // exit();
        }
        else
        {
          $error="Something went wrong";
          echo mysqli_error($conn);
        }
   /* }
    else
    {
        $error="Something went wrong";
    }*/
}

  mysqli_close($conn);
?>

<!DOCTYPE html>
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
    <li><a href="meet the voive.php">👥 Meet the Voices</a></li>
    <li><a href="events.php">📅 Upcoming Events</a></li>
    <li><a href="#"><i class='bx bx-laptop'>Profile</i></a>
    <div class="sub-menu-1">
      <ul>
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
    
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
            <br>
            <p><?php echo $error;?></p>
            <p><center><b>Fill out this form for any comment.</b></center></p><br>
            <p><b>Firstname:</b><input type="text"name="fn"placeholder="Type your first name"size="60"> 
                <br>
                <p><b>Lastnames:</b><input type="text"name="fn"placeholder="Type your last name"size="60"> 
                <br>
                        <b>Gender:</b><select name="g" id="s">
                    <option>Select your gender</option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Other</option>
            </select>
          <br>
                <b>Email:</b><input type="text"name="email or contact"placeholder="Type your email"size="60">
                <br>
                <b>contact:</b><input type="text"name="email or contact"placeholder="Type your phone number"size="60">
                <br>
                
            <p id="comment"><b>Comment:</b></p>
            <textarea id="Comment" name="comment" rows="5" cols="50"></textarea>
            <br>            
            <br>

                <input type="submit" name="send" id="button"onclick="comment()"value="Submit">
            <script>
              function comment()
              {
                alert("<?php echo $error;?>");
              }
              </script>
            </p>
        </form>
        <br>
        <br>
        <br>
          <div class="footer">
            <div class="col-1">
            <h3>USEFUL LINKS</h3> 
            <a href="community connect.php">Home</a>
            <a href="about.php">About</a>  
            <a href="meet the voice.php">meet the voice</a>  
            <a href="contact.php">Contact</a>  
              
      
            </div>
           <div class="col-2">
           <h3>NEWSLETTER</h3>
           <form action="newletter.php" method="post">
            <input type="email" name="email" placeholder="Your Email Address" required>
           </br>
            <button type="submit">SUBSCRIBE NOW</button>
           </form>
          </div>
          <div class="col-3">
            <h3>CONTACT</h3>
            <p>KK441ST31</br>Kicukiro, Kigali</p>
            <div class="social-icon">
              <i class='bx bxl-facebook-circle'></i>
              <a href="https://www.youtube.com/watch?v=P6D1clAMFyw"><i class='bx bxl-youtube' ></i></a>
            
          </div>
          </div>
          </div>
      </body>
      </html>