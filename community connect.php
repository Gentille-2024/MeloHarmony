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
        }
        else
        {
          $error="Something went wrong";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="stylehome.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    
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
<br>
<br>
  <p>&nbsp;&nbsp;&nbsp;&nbsp;Welcome to Meloharmony, where the power of melody and harmony converge to create a harmonious musical experience.</p>
<br>
  <div class="main_all">
      <div class="main1">
      <br>
  <br>
 <p>"MeloHarmony" is a creative and compact name that suggests a focus on melodic elements and harmony within the choir.</p>
      <br>
      <br>
            </div>
      <div class="main2">
      <br>
        <br>
        <br>
        <br>
    
          <b><h2>VISION</h2></b>
          <br>
          <br>

         <p>"To inspire and uplift our community through the power of song, fostering joy, unity, and cultural enrichment."</p>
                      </div>
      <div class="main3">
        <br>
        <br>
        <br>

              <b><h2>MISSION</h2></b>
              <br>
        <br>
              <p>"To bring together diverse voices, creating a supportive platform for singers to share their talents, enrich the community through musical experiences, and promote a sense of connection and belonging."</p><br> 

              </div>
              <br>
              <br>
              <br>
              
  </div>        
  <br>
  <br>
  <br>
  <br>
    <div class="footer">
      <div class="col-1">
      <h3>USEFUL LINKS</h3> 
      <a href="community connect.php">Home</a>
      <a href="about.php">About</a>  
      <a href="meet the voice.php">meet the voice</a>  
      <a href="events.php">Upcoming events</a>  
        

      </div>
     <div class="col-2">
     <h3>NEWSLETTER</h3>
     <p><?php echo $error;?></p>
     <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
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
        <i class='bx bxl-youtube' ></i>
        <i class='bx bxl-whatsapp' ></i>
        <i class='bx bxl-instagram' ></i>
        <i class='bx bxl-linkedin-square' ></i>      
    </div>
    </div>
    </div>
</body>
</html>