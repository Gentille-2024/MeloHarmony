<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
$server="localhost";
$user="root";
$pass="";
$db="community connect";
$error="";
$conn=mysqli_connect($server,$user,$pass,$db);
//include('session.php');
$userid=$_GET['userid'];
$error=$error1="";
if($conn)
{
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $q="SELECT * FROM user where email=?";
    $s=mysqli_prepare($conn,$q);
    mysqli_stmt_bind_param($s,'s',$email);
    mysqli_stmt_execute($s);
    $re=mysqli_stmt_get_result($s);
    $row=mysqli_fetch_row($re);
  if ($row==0){
    $fname=mysqli_real_escape_string($conn,$_POST['Firstname']);
    $mname=mysqli_real_escape_string($conn,$_POST['Middlename']);
    $lname=mysqli_real_escape_string($conn,$_POST['Lastname']);
    $email1=mysqli_real_escape_string($conn,$_POST['Email']);
    $gender=mysqli_real_escape_string($conn,$_POST['Gender']);    
    $phone=mysqli_real_escape_string($conn,$_POST['Phone']);
    $role=mysqli_real_escape_string($conn,$_POST['Role']);

    $password2=mysqli_real_escape_string($conn,$_POST['password2']);
    if($password1!=$password2)
    {
    $error1="Password not match?.";
    die("password must much");
    }
    if(empty($fname)||empty($password2)||empty($password1)||empty($tel)||empty($email)||empty($department)||empty($regno))
    {
     $error1="All field are required";
    }
    else
    {
    $hashed_password=password_hash($password1,PASSWORD_DEFAULT);
    $query="INSERT INTO user VALUES(?,?,?,?,?,?,?,0,now())";
    
    $stmt=mysqli_prepare($conn,$query);
    if($stmt)
    {
        mysqli_stmt_bind_param($stmt,"sssssss",$regno,$name,$email,$tel,$department,$role,$hashed_password);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        if(!$result)
        {
            header("location:profile.php");
            mysqli_stmt_close($stmt);
            exit();
        }
        else
        {
          $error="Something went wrong";
        }
    }
    else
      {
        $error="Something went wrong";
      }
      }
    }
    else
    {
      $error="User Already have any account pleese login!.";
    }
  }
 mysqli_close($conn);
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body,html{
        padding: o;
        margin: o;
        background-color: lightgrey;
    }
    .heading{
        text-align: center;
        font-family: 'Courier New', Courier, monospace;
        font-size: 30px;
        color:rgba(0, 0, 0, 0.718);
    }
    main{
        display: grid;
        width: 100%;
        margin-right: 100px;
        
    }
    hr{
        padding: 0;
        margin: 0;
    }
    .col1{
        padding-top: 0px;
        grid-column: 1;
        width: 30%;
        border-right: 1px white solid;
        padding-left: 100px; ;
    }
    .col2{
        padding: 10px;
        grid-column: 2;
        width: 75%;
    }
    .bottom{
        border-radius: 5px;
        font-size: 20px;
        margin: 10px;
        background-color: azure;
        width: 200px;
        padding: 10px;
    }
    .bottom a{
        text-align: center;
        text-decoration: none;
        color: black;
    }
    .down{
        margin-top: 500px;
    }
</style>
<body>
    <header>
       <div class="heading">Admin Dashboard</div> 
    </header>
    <hr>
    <main>
        <div class="col1">
        <a href="all users.php"><div class="bottom">Users</div></a>
        <a href="all subscribers.php"><div class="bottom">Subscribers</div></a>
        <a href="#"><div class="bottom">Feedback</div></a>
        <a href="all reviewers.php"> <div class="bottom">Comments</div></a>
        <a href="#"> <div class="bottom">Rate Us</div></a>
        <a href="all learners.php"> <div class="bottom">Registered</div></a>
        <a href="all tickets.php"> <div class="bottom">Booked tickets</div></a>
        <a href="all inviters.php"> <div class="bottom">Invite Us</div></a>
        <a href="upload.php"> <div class="bottom">Updoad</div></a>
        <a href="#"><div class="bottom">logout</div></a>
        </div>
        <div class="col2">
        <div class="col2">
    <h1 class="blue"><u></u>Add a User</h1>
       <?php echo $error; ?>
       <form action="" method="post" class="form2">
       <p>Firstname:<br><input type="text" name="fn" class="text"></p>
       <p>Middlename:<br><input type="text" name="midname" class="text"></p>
       <p>Lastname:<br><input type="text" name="lastname" class="text"></p>
           <p>Email:<br><input type="email" name="email" class="text"></p>
           <p>Telephone:<br><input type="tel" name="tel" class="text"></p>
           <?php 
           while($roww=mysqli_fetch_row($rest))
           {
           echo "<option>".$roww[0]."</option>";
           $i++;
           }
           ?>
          </select><br>
          Who are you:<br><select name="role" class="text">
             <option value=" member">memer user</option>
            <option value="Admin">Admin user</option>
          </select>
          
           </p>
           <p>id :<br><input type="text" name="id" class="text"></p>
        <label for="password">
          <u>C</u>reate password:&nbsp;&nbsp; &nbsp;
          <input type="password" name="password1"class="text" id="password1"placeholder="Create Password... " size="20"required/>
          <span id="togglePassword" onclick="togglePasswordVisibility()">👁️</span>
            <script>
              function togglePasswordVisibility() {
                        const passwordInput = document.getElementById('password1');
                        const toggleIcon = document.getElementById('togglePassword');
                        if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        toggleIcon.textContent = '👁️';
                        } else {
                         passwordInput.type = 'password';
                         toggleIcon.textContent = '👁️';
                         }
                         }
            </script>
          <br><br>
          <u>C</u>omfrim password:
          <input type="password" name="password2"placeholder="Comfirm Password... " class="text"size="20" required/>
        </label>
        <br/>
        <br/>
        <p><input type="submit"class="regist text" name="send" value="Register"/></p>
       </form>
    </div>
        </div>
        <hr>
    </main>
    <footer>
        <p align="center">&copy2024 all right are reserved.</p>
    </footer>
</body>
</html>