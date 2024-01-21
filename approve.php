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
    $q = mysqli_query($conn,"SELECT * FROM user WHERE id = '$userid'");
    $row = mysqli_fetch_assoc($q);
    $fname=$row['Firstname'];
    $mname=$row['Middlename'];
    $lname=$row['Lastname'];
    $email1=$row['Email'];
    $gender= $row['Gender'];
    $phone= $row['Phone'];
    $role= $row['Role'];
    $s=$row['status'];
    if(isset($_POST['approve']))
    {
        $result=mysqli_query($conn,"UPDATE user SET STATUS=1 WHERE id='$userid'");
        if($result){
        $error="User approved successful!";
        $message=mysqli_real_escape_string($conn,$_POST['comment']);
        $quer=mysqli_query($conn,"INSERT INTO approvallog values('$login_session','$name','Approving','$message',NOW())");
        }
        else
        $error="Operation failed";
    }
    if(isset($_POST['disapprove']))
    {
        $result=mysqli_query($conn,"UPDATE user SET STATUS=0 WHERE id='$userid'");
        if($result)
        {
        $error="Disapproved successful!";
        $message=mysqli_real_escape_string($conn,$_POST['comment']);
        $quer=mysqli_query($conn,"INSERT INTO approvallog values('$login_session','$name','Disapprove','$message',NOW())");}
        else
        $error="Operation failed";
    }
}
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
        <br>
        <br>
                <h1 class="blue">Account Approval to <?php  echo $fname." by ";?>:</h1>
                <details>
                <summary><b>Click here to Approve</b> </summary>
                <p><b>Personal infomation</b></p>
                <table class="table">
                <tr>
                    <td><b>firstname:</b> </td>
                    <td><?php  echo $fname;?></td> 
                </tr>
                <tr>
                    <td><b>middlename:</b> </td>
                    <td><?php  echo $mname;?></td> 
                </tr>
                <tr>
                    <td><b>lastname:</b> </td>
                    <td><?php  echo " ".$lname;?></td>
                </tr>
                <tr>
                <tr>
                    <td>email:</td>
                    <td><?php  echo " ".$email1;?></td>
                </tr>
                <tr>
                    <td><b>gender:</b> </td>
                    <td><?php  echo " ".$gender;?></td>
                </tr>
                <tr>
                    <td><b>telephone:</b> </td>
                    <td><?php  echo $phone;?></td> 
                </tr>
                <tr>
                    <td><b>Role:</b> </td>
                    <td><?php  echo $role;?></td> 
                </tr>
                </table>
                <br>
                <br>
                <form class="form" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
                    <p>User status: <?php echo ($s==1)?"<b style=\"color:green\">APPROVED</b>":"<b style=\"color:red\">NOT APPROVED</b>";?></p>
                    <p id="message"><?php echo $error?></p>
                    <p>Comment:<b id='red'>*</b></p>
                    <textarea name="comment" id=""  rows="4"></textarea>
                    <?php
                   echo  ($s==1)?"<p><input type=\"submit\" value=\"Disapprove\"name=\"disapprove\"></p>":"<p><input type=\"submit\" value=\"Approve\"name=\"approve\"></p>";
                    ?>
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





