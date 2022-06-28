<?php include('../server.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!---- Link the stylesheet-->
    <link rel="stylesheet" href="../css/home.css">
    <style>
        *{
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
        .brand img{
    position: absolute;
    height: 60px;
    width: auto;
    margin: 15px 0 0 200px;
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
    height: 100;
    width: 250px;
    display: inline;
    background-color: #8cdcff;
    box-shadow: 2px 8px 25px 0px; 
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
            <?php if ($_SESSION["username"]): ?>
                <a href="./home.php"><li class="active">Dashboard</li> </a>
                <a href="../ticket/ticket.php"><li >Ticket</li> </a>
            <?php endif ?>
            <?php if ($_SESSION["previlage"] == 'admin'):  ?>
                <a href="../manage-bus/manage-bus.php"><li >Manage Bus</li> </a>
                <a href="../manage-user/manage-user.php"><li >Manage User</li> </a>
            <?php endif ?>
            </ul>
        </div>
        <div class="landing">
            <h1>Express Bus Transport Service</h1>
            <div class="available">
                <h2>Check Available Destinations</h2>
                <div class="available-dest">
                    <form method="post" action="home.php" class="form">
                        <label class="origin-label" for="from">Origin:</label>
                        <select class="input" name="origin" id="bus-origin" required>
                            <option class="input" value="addisababa">Addis Ababa</option>
                            <option class="input" value="jimma">Jimma</option>
                            <option class="input" value="hawassa">Hawassa</option>
                            <option class="input" value="mekele">Mekele</option>
                        </select>
                        <label class="dest-label" for="destination">Destination:</label>
                        <select class="input" name="destination" id="bus-destination" required>
                            <option  value="jimma">Jimma</option>
                            <option  value="bahirdar">Bahir Dar</option>
                            <option  value="hawassa">Hawassa</option>
                            <option  value="mekele">Mekele</option>
                        </select><br>
                        <button id="check" type="submit" name="check-destination">Check</button>
                    </form>
            <?php if (isset($_SESSION['check-available'])): ?>
                <?php if (isset($_SESSION['seat-available'])): ?>
                    <?php
                        unset($_SESSION['not-available']);
                    ?>
                    <?php echo "<div class='avail'>"; ?>
                    <?php echo "<p class='avail-element' for='origin'>Origin:"; ?>
                    <?php echo $_SESSION['org']; ?>
                    <?php echo "<p class='avail-element' for='destination'>Destination:"; ?>
                    <?php echo $_SESSION['dest']; ?>
                    <?php echo   "</p>"; ?>
                        <p class="avail-element" for="seats"><?php echo $_SESSION['seat-available']?> Seats are available!</p>
                    <?php echo "</div>"; ?>
                <?php endif ?>
            <?php endif ?>
            <?php if (isset($_SESSION['not-available'])): ?>
                <?php
                    unset($_SESSION['seat-available']);
                ?>
                <?php echo "<div class='not-avail'>"; ?>
                <?php echo "<p class='avail-element' for='origin'>Not Available</p>"; ?>
            <?php endif ?>
                   
                </div>
            </div>
        </div>
    <?php endif ?>
    
    </section>
    <?php if (isset($_SESSION['ticket-success'])): ?>
            <?php
                echo "Session Expired";
            ?>
    <?php endif ?>
</body>
</html>


