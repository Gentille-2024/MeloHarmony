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
        <a href="all reviewers.php"> <div class="bottom">Comments</div></a>
        <a href="#"> <div class="bottom">Rate Us</div></a>
        <a href="all learners.php"> <div class="bottom">Registered</div></a>
        <a href="all tickets.php"> <div class="bottom">Booked tickets</div></a>
        <a href="all inviters.php"> <div class="bottom">Invite Us</div></a>
        <a href="upload.php"> <div class="bottom">Updoad</div></a>
        <a href="#"><div class="bottom">Settings</div></a>
        <a href="#"><div class="bottom">logout</div></a>
        </div>
        <div class="col2">

        </div>
        <hr>
    </main>
    <footer>
        <p align="center">&copy2024 all right are reserved.</p>
    </footer>
</body>
</html>