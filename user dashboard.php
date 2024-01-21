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
        width: 100%;
        margin-right: 100px;
        
    }
    hr{
        padding: 0;
        margin: 0;
    }
    .col1{
        padding-top: 0px;
        display: flex;
        width: 100%;
        border-right: 1px white solid;
        padding-left: 00px; ;
    }
    .col2{
        padding: 10px;
        width: 100px%;
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
        margin-top: 000px;
    }
</style>
<body>
    <header>
       <div class="heading">User Dashboard</div> 
    </header>
    <hr>
    <main>
        <div class="col1">
            <div class="bottom"><a href="#">Trending news</a></div>
            <div class="bottom"><a href="#">Rate Us</a></div>
            <div class="bottom"><a href="#">Profile</a></div>
            <div class="bottom"><a href="logout.php">logout</a></div>
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