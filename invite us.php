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
    $status=mysqli_real_escape_string($conn,$_POST['status']);
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $location=mysqli_real_escape_string($conn,$_POST['location']);
    $type=mysqli_real_escape_string($conn,$_POST['type']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $duration=mysqli_real_escape_string($conn,$_POST['duration']);
    $contact=mysqli_real_escape_string($conn,$_POST['contact']);
    $decription=mysqli_real_escape_string($conn,$_POST['description']);
    $query="INSERT INTO invite (status,name,location,type,email,duration,contact,description,time) VALUES(?,?,?,?,?,?,?,?,now())";
    $resul=mysqli_query($conn,"INSERT INTO invite (status,name,location,type,email,duration,contact,description,time) VALUES('$status','$name','$location','$type','$email','$duration','$contact','$decription',now())");
    echo mysqli_error($conn);
    $stmt=mysqli_prepare($conn,$query);
    if($stmt)
    {
        mysqli_stmt_bind_param($stmt,"ssssssss",$status,$name,$location,$type,$email,$duration,$contact,$description);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        if(!$result)
        {
            $error="Your invitation is sent successfully!";
            mysqli_stmt_close($stmt);
        }
        else
        {
          $error="Something went wrong1";
        }
    }
    else
    {
        $error="Something went wrong";
    }
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
            <p><center><b>Fill out this form to invite us.</b></center></p><br>
            <b>status:</b><select name="status" id="s">
                    <option>Select your status</option>
                    <option>Individual</option>
                    <option>Group</option>
            </select>
            <br>
              <br>
            <p><b>Name:</b><input type="text"name="name"placeholder="Type your name"size="60"> 
                <br>
                <br>
                <b>location:</b><input type="text"name="location"placeholder="Type your location"size="60"><br><br>
                <b>Type:</b><select name="type" id="s">
                    <option>Select the type of the song</option>
                    <option>Gospel</option>
                    <option>Traditional</option>
                    <option>Modern</option>
            </select>
          <br><br>
                <b>Email:</b><input type="text"name="email"placeholder="Type your email"size="60">
                <br><br>
                <b>Duration:</b><input type="text"name="duration"placeholder="How long is your party?"size="60">
                <br><br>
                <b>Contact:</b><input type="text"name="contact"placeholder="Type your phone number"size="13">
                <br>
                <br>
            <p id="Description"><b>Description:</b></p>
            <textarea id="Description" name="description" rows="5" cols="50"></textarea>
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