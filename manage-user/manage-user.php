<?php include('../server.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage User</title>

    <!---- Link the stylesheet-->
    <link rel="stylesheet" href="../css/home.css">
    <style>
*{
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}

#bus-origin{
    padding: 15px;
    margin: 0 100px 0 20px;
    width: 150px;
}

.side-list{
    font-size: 15px;
    padding: 20px;
    list-style-type: none;
    margin-top: 50px;
    background-color: #8cdcff;
}

#check{
    float: right;
    margin: 120px 10px 10px 0;
    float: right;
    height: 40px;
    width: 80px;
}

.avail{
    text-align: center;
    width: 100;
    height: 90px;
    background-color: #a7ffc1;
    padding: 10px 0 0 0;
    margin: 10px;
}
    
.available-dest{
    padding: 40px;
    margin-top: 50px;
}

.not-avail{
    text-align: center;
    width: 100;
    height: 90px;
    background-color: #ff769c;
    padding: 10px 0 0 0;
    margin: 10px;
}

.avail-element{
    padding: 5px;
}

.side-nav{
    position: absolute;
    height: 535px;
    width: 250px;
    display: inline;
    background-color: #8cdcff;
    box-shadow: 2px 8px 25px 0px; 
}

.landing h3{
    text-align: center;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-size: 21px;
    color: #00A2E8;
    box-shadow: 0px 0px 5px 0px;
    padding: 15px;
}

.manage-user{
    display: flex;
    justify-content: center;
    height: 50px;
    width: 100%;
    border-radius: 5px;
    cursor: pointer;
    box-shadow: 1px 1px 5px 0px;
}

.register-user{
    text-align: center;
    transition: .4s;
    border-radius: 5px;
    border-color: #000000;
    cursor: pointer;
    padding: 15px 360px 0 360px;
}

.edit-user{
    transition: .4s;
    border-radius: 5px;
    border-color: #000000;
    cursor: pointer;
    padding: 15px 150px 0 160px;
}

.register-user{}

.register-user h5{
    width: 100px;
}
.active{
    background-color: #8cdcff;
    box-shadow: 2px 1px 5px 0px; 
}

.register{
    margin: 0 50px 50px 50px;
}
#bus-origin{
    padding: 15px;
    margin: 0 70px 0 65px;
    width: 150px;
}
#price{
    margin-left: 48px;
    padding: 15px;
    width: 200px;
}
#assign-btn{
    margin: 30px 10px 10px 0;
    float: right;
    height: 40px;
    width: 80px;
}
.check{
    display: none;
    margin: 20px;
}
#check-btn{
    margin: 10px 10px 10px 0;
    height: 40px;
    width: 80px;
}

.bus-info{
    background-color: #f0f0f0;
    height: 180px;
    padding: 20px;
}

.assign-status{
    height: 50px;
    width: auto;
    margin: 5px;
    padding: 5px;
    text-align: center;
}
.assign-status p{
    margin-top: 15px;
}
.input{
    margin: 5px 0px 15px 0;
}
#input{
    padding: 15px;
    width: 300px;
}
#input-p{
    padding: 15px;
    width: 100px;
}
#register-btn{
    margin: 0px 10px 10px 0;
    height: 40px;
    width: 80px;
    float: right;
}

.landing{
    position: relative;
    top: 20px;
    height: 36.5em;
    width: 51em;
    left: 22em;
    box-shadow: 0px 0px 5px 0px;
    margin-bottom: 10px;
}
.side-nav{
    position: absolute;
    height: 100vh;
    width: 250px;
    display: inline;
    background-color: #8cdcff;
    box-shadow: 2px 8px 25px 0px; 
}
#status-s{
    background-color: #8cffbc;
    text-align: center;
    margin: 5px;
    width: 800px;
    height: 50px;
}
#status-f{
    background-color: #ff908c;
    text-align: center;
    margin: 5px;
    width: 800px;
    height: 50px;
}
.reg-status p{
    padding-top: 20px;
}

.reg-status{
    margin: 0 20px 30px 20px;
    height: 40px;
    width: auto;
    display: flex;
    justify-content: center;
}
.brand img{
    position: absolute;
    height: 60px;
    width: auto;
    margin: 15px 0 0 200px;
}
</style>

</head>
<body>
    <section>
    <?php if (isset($_SESSION['success'])): ?>
            <?php
                unset($_SESSION['success']);
            ?>
    <?php endif ?>
    <?php if (isset($_SESSION['ticket-success'])): ?>
            <?php
                unset($_SESSION['ticket-success']);
            ?>
    <?php endif ?>
    <?php if (isset($_SESSION["username"])):  ?>    
        <div class="home-nav">
        <div class="brand">
                <a href="#"><img src="../assets/busb.png" alt=""><h1>Express Bus</h1></a>
                
            </div>
            <div class="actions">
                <ul class="action-list">
                    <li><img src="../assets/us.png" alt=""><p class="current-user">
                    <?php   echo $_SESSION['username']; ?> 
                    </p>
                    </li>
                    <li><a href="../login.php?logout='1'">
                    <button type="submit" name="logout" id="logout-btn">Logout</button>
                    </a></li>
                </ul>
            </div>
        </div>
        <div class="side-nav">
            <ul class="side-list">
            <?php if ($_SESSION["previlage"] == 'admin'):  ?>
                <a href="../dashboard/home.php"><li class="">Dashboard</li> </a>
                <a href="../ticket/ticket.php"><li >Ticket</li> </a>
                    <a href="../manage-bus/manage-bus.php"><li >Manage Bus</li> </a>
                    <a href="./manage-user.php"><li class="active">Manage User</li> </a>

                <?php endif ?>
            </ul>
        </div>
        <div class="landing" id="landing">
            <h3>Manage User</h3>
            <div class="manage">
                <div class="manage-user">
                    <div class="register-user active" id="register">
                        <h5>Register User</h5>
                    </div>
                   <!---- <a href="./edit-user.php">
                    <div class="edit-user" id="edit-user" >
                        <h5>Edit User</h5>
                    </div>
                    </a> ------>
                    
                </div>
                <div class="reg-status">

            <?php if (isset($_SESSION['register-success'])): ?>
                <?php
                    unset($_SESSION['register-failed']);
                ?>
                <div class="register-success" id="status-s">
                    <p>Successfully Registered</p>
                </div>
            <?php endif ?>
            <?php if (isset($_SESSION['register-failed'])): ?>
                <?php
                    unset($_SESSION['register-success']);
                ?>
                <div class="register-failed" id="status-f">
                <p>Username or Email is taken</p>
                </div>
            <?php endif ?>
            </div>

                <div class="register"  id="register-form">
                    <form method="post" action="manage-user.php" class="form">
                        <label class="username-label" for="username">Username</label><br>
                        <input class="input" type="text" name="username" id="input" placeholder="Username"required><br>
                        <label class="email-label" for="from">Email</label><br>
                        <input class="input" type="email" name="email" id="input" placeholder="Email"required><br>
                        
                        <label class="password-label" for="password">Password</label><br>
                        <input class="input" type="password" name="password" id="input" placeholder="Password"required><br>
                        <label class="previlage-label input" for="previlage">Previlage</label><br>
                        <select class="input" name="previlage" id="input-p" required>
                            <option  value="agent">Agent</option>
                            <option  value="admin">Admin</option>
                        </select><br>
                        <button id="register-btn" type="submit" name="register">Register</button>
                    </form>
                </div>
                <!--- <div---- class="check" id="edit-form">
                    <div class="user-list">
                        
                        
                    </div>
            </div---->
            </div>
            
        </div>
    <?php endif ?>
    
    </section>
    <?php if (isset($_SESSION['ticket-success'])): ?>
            <?php
                echo "Session Expired";
            ?>
    <?php endif ?>



    <script type="text/javascript">
        
        let assign = document.getElementById('register');
        let check = document.getElementById('edit-user');

        let assignForm = document.getElementById('register-form');
        let checkForm = document.getElementById('edit-form');
        let landing = document.getElementById('landing');

        function activeAssign(){
           
            
            check.classList.remove('active');
            assign.classList.add('active');
            assignForm.style.display = 'block';
            checkForm.style.display = 'none';
            landing.style.height = '38em';

        }

        function activeCheck(){
           
            check.classList.add('active');
            assign.classList.remove('active');
            assignForm.style.display = 'none';
            checkForm.style.display = 'block';
            landing.style.height = '30em';
        }


    </script>
</body>
</html>


