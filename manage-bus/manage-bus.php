<?php include('../server.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Bus</title>

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
.landing h3{
    text-align: center;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-size: 21px;
    color: #00A2E8;
    box-shadow: 0px 0px 5px 0px;
    padding: 15px;
}

.manage-bus{
    display: flex;
    justify-content: center;
    height: 50px;
    width: auto;
    border-radius: 5px;
    cursor: pointer;
    box-shadow: 2px 1px 5px 0px;
}

.assign-bus{
    transition: .4s;
    border-radius: 5px;
    border-color: #000000;
    cursor: pointer;
    padding: 15px 150px 0 180px;
}

.check-bus{
    transition: .4s;
    border-radius: 5px;
    border-color: #000000;
    cursor: pointer;
    padding: 15px 150px 0 150px;
}
.manage-bus h5{
    width: 90px;
}
.active{
    background-color: #8cdcff;
    box-shadow: 2px 1px 5px 0px; 
}

.assign{
    margin: 0 20px 20px 20px;
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

.bus-assign-status{
    display: flex;
    justify-content: center;
    width: 800px;
    height: 60px;
}
.assign-status-s{
    background-color: #8cffbc;
    height: 50px;
    width: 800px;
    margin: 5px;
    padding: 5px;
    text-align: center;
}
.assign-status-f{
    background-color: #ff908c;
    height: 50px;
    width: 800px;
    margin: 5px;
    padding: 5px;
    text-align: center;
}
.bus-assign-status p{
    margin-top: 15px;
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
                    <a href="./manage-bus.php"><li class="active">Manage Bus</li> </a>
                    <a href="../manage-user/manage-user.php"><li >Manage User</li> </a>
                <?php endif ?>
            </ul>
        </div>
        <div class="landing">
            <h3>Manage Bus</h3>
            <div class="manage">
                <div class="manage-bus">
                    <div class="assign-bus active" id="assign" onclick="activeAssign()">
                        <h5>Assign Bus</h5>
                    </div>
                    <a href="./checkbus.php">
                    <div class="check-bus" id="check-bus" onclick="activeCheck()">
                        <h5>Check Bus</h5>
                    </div>
                    </a>
                </div>
                <div class="bus-assign-status">
                <?php if (isset($_SESSION['assign-success'])): ?>
                <div class="assign-status-s">
                    <p>Bus assigned Successfully!</p>
                </div>
                <?php endif ?>
                <?php if (isset($_SESSION['assign-failed'])): ?>
                <div class="assign-status-f">
                    <p>Bus is already assigned!</p>
                </div>
                <?php endif ?>
                </div>
                
                <div class="assign"  id="assign-form">
                    <form method="post" action="manage-bus.php" class="form">
                        <label class="bus-label" for="bus-number">Bus Number:</label>
                        <input class="input" type="text" name="bus-number" id="passanger" placeholder="Enter Bus Number"required><br>
                        <label class="origin-label" for="from">Origin:</label>
                        <select class="input" name="origin" id="bus-origin" required>
                            <option class="input" value="addis">Addis-Ababa</option>
                            <option  value="bahir-dar">Bahir-Dar</option>
                            <option  value="hawassa">Hawassa</option>
                            <option  value="mekele">Mekele</option>
                        </select>
                        <label class="dest-label" for="destination">Destination:</label>
                        <select class="input" name="destination" id="bus-destination" required>
                            <option  value="jimma">Jimma</option>
                            <option  value="bahir-dar">Bahir-Dar</option>
                            <option  value="hawassa">Hawassa</option>
                            <option  value="mekele">Mekele</option>
                        </select><br>
                        <label class="price-label" for="assign-price">Set Price:</label>
                        <input class="input" type="text" name="price" id="price" placeholder="Price"required>
                        <button id="assign-btn" type="submit" name="assign-bus">Assign</button>
                    </form>
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



    <script type="text/javascript">
        
        let assign = document.getElementById('assign');
        let check = document.getElementById('check-bus');

        let assignForm = document.getElementById('assign-form');
        let checkForm = document.getElementById('check-form');

        function activeAssign(){
            check.classList.remove('active');
            assign.classList.add('active');
            assignForm.style.display = 'block';
            checkForm.style.display = 'none';
        }

        function activeCheck(){
            check.classList.add('active');
            assign.classList.remove('active');
            assignForm.style.display = 'none';
            checkForm.style.display = 'block';

        }


    </script>
</body>
</html>


