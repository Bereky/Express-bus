<?php include('../server.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Ticket</title>

    <!---- Link the stylesheet-->
    <link rel="stylesheet" href="../css/home.css">

    <style>
    

    #go-home{
        margin: 15px 0px 10px 0;
        float: right;
        height: 40px;
        width: 80px;
    }

    .landing .info{
        margin: 15px 20px 0 20px;
    }
    .printed-ticket{
        margin:10px;
        background-color: #e9e9e9;
        padding: 10px;
    }
    
    .ticket-form h2{
        text-align: center;
        padding: 10px;
        background-color: #a7ffc1;
    }
    
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
    h2{
    text-align: center;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-size: 20px;
    color: #00A2E8;
    box-shadow: 0px 0px 5px 0px;
    padding: 15px;
    }

.landing form{
    padding: 10px;
    margin-top: 50px;

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
    <?php if (isset($_SESSION['ticket-success'])):  ?>    
        <div class="home-nav">
        <div class="brand">
                <img src="../assets/busb.png" alt="">
                <h1>Express Bus</h1>
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
                <a href="../dashboard/home.php"><li class="">Dashboard</li> </a>
                <a href="./ticket.php"><li class="active">Ticket</li> </a>
                <?php if ($_SESSION["previlage"] == 'admin'):  ?>
                    <a href="../manage-bus/manage-bus.php"><li >Manage Bus</li> </a>
                    <a href="../manage-user/manage-user.php"><li >Manage User</li> </a>
                <?php endif ?>
            </ul>
        </div>
        <div class="ticket-success landing">
            <h2>Passanger Registered Successfully!</h2>
            <div class="printed-ticket ">
                    <div class="info">
                        <label class="id-label info" for="id">Ticket Number: </label>
                        <span class="pid info" > <?php echo $_SESSION['id'] ?></span><br>
                    </div>
                    <div class="info">
                        <label class="date-label info" for="date">Date: </label>
                        <span class="pdate info" > <?php echo $_SESSION['ticket-date'] ?></span><br>
                    </div>
                    <div class="info">
                        <label class="pass-label info" for="passanger-name">Passanger Name:</label>
                        <span class="pname info"><?php echo $_SESSION['passanger-fname']?></span>
                        <span class="pname info"><?php echo $_SESSION['passanger-lname']?></span><br>
                    </div>
                    <div class="info">
                    <label class="phone-label info" for="from">Passanger Phone:</label>
                    <span class="pphone info" > <?php echo $_SESSION['passanger-phone'] ?></span><br>    
                </div>
                    <div class="info">
                        <label class="origin-label info" for="from">Origin:</label>
                        <span class="porigin info" > <?php echo $_SESSION['origin'] ?></span><br>    
                    </div>
                    <div class="info">
                        <label class="dest-label info" for="destination">Destination:</label>
                        <span class="pdest info" > <?php echo $_SESSION['destination'] ?></span><br>    
                    </div>
                    <div class="info">
                        <label class="seat-label info" for="seat">Bus Number:</label>
                        <span class="pseat info" > <?php echo $_SESSION['bus-number'] ?></span><br>  
                    </div>
                    <div class="info">
                        <label class="seat-label info" for="seat">Seat Number:</label>
                        <span class="pseat info" > <?php echo $_SESSION['seatno'] ?></span><br>  
                    </div>

                    <div class="info">
                        <label class="price-label info" for="price">Transport Cost:</label>
                        <span class="price info" > <?php echo $_SESSION['trans-cost'] ?> ETB</span><br>  
                    </div>
                    <a href="./ticket.php"><button id="go-home" type="submit" name="go-home">Ok</button></a>

            </div>
        </div>
    <?php endif ?>
        
    </section>
</body>
</html>


