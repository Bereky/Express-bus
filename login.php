<?php include('server.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!---- Link the stylesheet-->
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/login.css">
 

<style>

.login{
    display: flex;
    justify-content: center;
    margin-top: 80px;
    height: 28em;
    width: 28em;
    box-shadow: 0px 0px 1px 1px;
    transition: .3s;
    text-align: center;
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
    margin-top: 0px
}
.header li{
    
}
#login-btn:hover{
    background-color: #000000;
    transition: .3s;
    border-color: #181818;
}
.login h2{
    height: 50px;
    text-align: center;
    margin: 0  20px 10px 20px;
}

.login-error{
    text-align: center;
    height: 40px;
    width: auto;
    display: flex;
    justify-content: center;
}
.login-error-msg{
    height: 40px;
    width: 350px;
    background-color: #ff908c;
}
.login-error p{
    padding-top: 10px;
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
            <div class="login">
                <form method="post" action="login.php" class="form">
                    <h2>Log in</h2>
                    <div class="login-error">
                        <?php if (isset($_SESSION['login-failed'])): ?>
                            <div class="login-error-msg">
                                <p>Incorrect username or password</p>
                            </div>
                        <?php endif ?>
                    </div>
                    <input type="text" name="username" id="uname" placeholder="Username" required>
                    <input type="password" name="password" id="pswd" placeholder="Password" required>
                    <button type="submit" name="login" id="login-btn">Login</button>
                </form>
            </div>
        
    </section>
    <?php endif ?>
    <?php if (isset($_SESSION['username'])): ?>
        <?php 
        header('location: ./dashboard/home.php');
        ?>
    <?php endif ?>

</body>
</html>