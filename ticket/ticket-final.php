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
    *{
        margin: 0;
        padding: 0;
    }

    body{
        margin: 0;
        padding: 0;
        background-color: #f3f8e7;
    }

    a{
        text-decoration: none;
        color: black;
    }

    .brand img{
    position: absolute;
    height: 60px;
    width: auto;
    margin: 15px 0 0 200px;
}


    @media screen and (max-width: 860px) {
        .home-nav{
            height: 180px;
            width: 100;    
        }
        
    }


    .user{
        color: #b7e057;
        left: 90vw;
    }

    .brand h1{
    color: #ffffff;
    position: absolute;
    margin: 25px 0 0 20px;
    font-size: 30px;
}

    #cancel{
        margin: 50px 10px 10px 0;
        float: right;
        height: 40px;
        width: 80px;
    }
    #next{
    margin: 50px 10px 10px 0;
    float: right;
    height: 40px;
    width: 80px;
}

    .landing .info{
        margin: 10px;
    }
    h2{
    text-align: center;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-size: 20px;
    color: #00A2E8;
    box-shadow: 0px 0px 5px 0px;
    padding: 15px;
}
.ticket-form{
        position: relative;
        top: 20px;
        height: 30em;
        width: 50em;
        left: 22em;
        box-shadow: 0px 0px 5px 0px;
        padding: 10px;
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
    <?php if (isset($_SESSION['passanger-fname'])):  ?>    
        <div class="home-nav">
        <div class="brand">
                <img src="../assets/busb.png" alt="">
                <h1>Express Bus</h1>
            </div>
            <div class="actions">
                <ul class="action-list">
                    <li><img src="../assets/us.png" alt=""><p class="current-user">
                    <?php echo $_SESSION['username']; ?>
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
            <form method="post" action="ticket-final.php" class="form">
                <div class="info">
                    <label class="id-label info" for="id">Ticket Number: </label>
                    <span class="pid info" name="id"> <?php echo $_SESSION['id'] ?></span><br>
                </div>
                <div class="info">
                    <label class="date-label info" for="date">Date: </label>
                    <span class="pdate info" name="date"> <?php echo $_SESSION['ticket-date'] ?></span><br>
                </div>
                <div class="info">
                    <label class="pass-label info" for="passanger-name">Passanger Name:</label>
                    <span class="pname info"><?php echo $_SESSION['passanger-fname']?></span>
                    <span class="pname info"><?php echo $_SESSION['passanger-lname']?></span><br>
                </div>
                <div class="info">
                    <label class="phone-label info" for="from">Passanger Phone:</label>
                    <span class="porigin info" > <?php echo $_SESSION['passanger-phone'] ?></span><br>    
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
                    <span class=" info" > <?php echo $_SESSION['trans-cost'] ?> ETB</span><br>  
                </div>
                <button id="cancel" type="submit" name="cancel-ticket">Cancel</button>
                <button id="next" type="submit" name="print-ticket">Print</button>
            </form>
        </div>
    <?php endif ?>
        
    </section>
</body>
</html>


