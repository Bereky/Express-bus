<?php include('../server.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket</title>

    <!---- Link the stylesheet-->
    <link rel="stylesheet" href="../css/home.css">
    
    <style>
    
.brand img{
    position: absolute;
    height: 60px;
    width: auto;
    margin: 15px 0 0 200px;
}
        .brand h1{
    color: #ffffff;
    position: absolute;
    margin: 25px 0 0 20px;
    font-size: 30px;
}
#next{
    margin: 10px 10px 10px 0;
    float: right;
    height: 40px;
    width: 80px;
}
h2{
    text-align: center;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-size: 20px;
    color: #00A2E8;
    box-shadow: 0px 0px 5px 0px;
    padding: 15px;
    width: auto;
}
.ticket-form{
        position: relative;
        top: 20px;
        height: 30em;
        width: 50em;
        left: 22em;
        box-shadow: 0px 0px 5px 0px;
}

.landing form{
    padding: 10px;
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

    <?php if (isset($_SESSION["username"])):  ?>    
        <div class="home-nav">
            <a href="../home.php">
            <div class="brand">
                <img src="../assets/busb.png" alt="">
                <h1>Express Bus</h1>
            </div>
            </a>
        
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
                <a href="../dashboard/home.php"><li class="">Dashboard</li> </a>
                <a href="./ticket.php"><li class="active">Ticket</li> </a>
                <?php if ($_SESSION["previlage"] == 'admin'):  ?>
                    <a href="../manage-bus/manage-bus.php"><li >Manage Bus</li> </a>
                    <a href="../manage-user/manage-user.php"><li >Manage User</li> </a>
                <?php endif ?>
            </ul>
        </div>
        <div class="landing">
            <h2>Ticket Area</h2>
        
            <form method="post" action="ticket.php" class="form">
                <label class="date-label" for="date">Date: </label>
                <input class="input" type="date" name="ticket-date" id="date" required><br>
                <label class="pass-label" for="passanger-name">Passanger Name:</label>
                <input class="input" type="text" name="passanger-fname" id="passanger" placeholder="Firstname"required>
                <input class="input" type="text" name="passanger-lname" id="passanger" placeholder="Lastname" required><br>
                <label class="phone-label" for="passanger-phone">Passanger Phone:</label>
                <input class="input" type="text" name="passanger-phone" id="passanger" placeholder="Phone Number"required><br>
                <label class="origin-label" for="from">Origin:</label>
                <select class="input" name="origin" id="bus-origin" required>
                    <option class="input" value="addisababa">Addis-Ababa</option>
                </select>
                <label class="dest-label" for="destination">Destination:</label>
                <select class="input" name="destination" id="bus-destination" required>
                    <option  value="jimma">Jimma</option>
                    <option  value="bahirdar">Bahir-Dar</option>
                    <option  value="hawassa">Hawassa</option>
                    <option  value="mekele">Mekele</option>
                </select><br>
                <button id="next" type="submit" name="check-ticket">Next</button>
            </form>
        </div>
    <?php endif ?>
        
    </section>
</body>
</html>


