<?php include('server.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!---- Link the stylesheet-->
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/login.css">
 
<style>

.nav{
    height: 80px;
    width: 100%;
    background-color: #00A2E8;
    box-shadow: 5px 1px 15px;
    transition: .3s;
}

.nav img{
    position: absolute;
    height: auto;
    width: 120px;
    padding: 10px 0 0 100px;
}

.header{
    display: inline;
    justify-content: center;
    list-style-type: none;
    margin-top: 0px;
}

#login-btn:hover{
    background-color: #000000;
    transition: .3s;
    border-color: #ffffff;
}

.section{
    background: url('./assets/buswall.jpg') repeat;
    height: 100;
    width: 100%;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}

.front{
    background-color: rgba(47, 169, 240, 0.3);
    font-size: 30px;
    color: #ffffff;
    text-align: center;
    height: 18em;
    width: 100%;
    object-fit: fill;
    position: relative;
}

.front h1{
    margin: 150px 0 0 0;
}

.login-btn{
    color: #ffffff;
    font-size: 17px;
    text-align: center;
    width: 20em;
    height: 50px;
    transition: .2s;
    background-color: #00A2E8;
    padding: 15px;
    margin-top: 40px;
    border-radius: 15px;
    border-color: #00A2E8;
}

.login-btn:hover{
    color: #ffffff;
    background-color: #8cdcff;
    transition: .3s;
    border-color: #000000;
}

footer{
    display: block;
    text-align: center;
    padding: 20px;
}

</style>
</head>
<body>
    <?php if (!isset($_SESSION['username'])): ?>
                
    <div class="nav">
        <a href="./index.php">
            <ul class="header">
                <li><img src="./assets/busb.png" alt="" srcset=""></li>
                <li><h1 >Express Bus</h1></li>
            </ul>
        </a>
        
    </div>
    <section class="section">
            <div class="front">
                <h1 class="front-text">EXPRESS BUS TRANSPORT SERVICE</h1><br>
                <h4 class="front-texr">More than 4 Destinations Across Ethiopia</h4>
                <a href="./login.php"><button class="login-btn">Login</button></a>
            </div>
            
    </section>
    <footer class="footer">
                <p>All Rights Reserved</p>
            </footer>
    <?php endif ?>
    <?php if (isset($_SESSION['username'])): ?>
        <?php 
        header('location: ./dashboard/home.php');
        ?>
    <?php endif ?>

</body>
</html>