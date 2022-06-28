<?php 
    session_start();
    $email = "";
    $username = "";
    $accountNo = "";
    $fname = "";

    //connecting the database
    $db = mysqli_connect('localhost', 'root', '', 'registration');
 

    if (!$db) {
        die("connection failed" . mysqli_connect_error());
         echo "Connection Fail";
    }

    if (isset($_POST['login'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);

            $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
            $result = mysqli_query($db, $query);

            if(mysqli_num_rows($result) == 1){
            $queryprevilage = "SELECT previlage FROM users WHERE username='$username' AND password='$password'";
            $resultprev = mysqli_query($db, $queryprevilage);
            $prev = mysqli_fetch_assoc($resultprev);
            $previlageval = $prev["previlage"];
                // log the user in

            $_SESSION['username'] = $username;
            $_SESSION['previlage'] = $previlageval;
            unset($_SESSION['login-failed']);
            header('location: home.php');
            }
            else{

                $_SESSION['login-failed'] = 'true';
                header('location: login.php');
        }
    }

    //logout 
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: index.php');
    }

    //passanger variables
    $id;
    $date;
    $passanger;
    $origin;
    $destination;
    $seat = 1;
    $trans_cost = 0;

    // if the ticket is submitted
    if(isset($_POST['check-ticket'])) {
        $date = mysqli_real_escape_string($db, $_POST['ticket-date']);
        $passangerFname = mysqli_real_escape_string($db, $_POST['passanger-fname']);
        $passangerLname = mysqli_real_escape_string($db, $_POST['passanger-lname']);
        $passangerPhone = mysqli_real_escape_string($db, $_POST['passanger-phone']);
        $origin = mysqli_real_escape_string($db, $_POST['origin']);
        $destination = mysqli_real_escape_string($db, $_POST['destination']);

        $_SESSION['passanger-fname'] = $passangerFname;

        //check the available seats
        $query_1 = "SELECT * FROM passanger WHERE destination='$destination'";
        $result = mysqli_query($db, $query_1);
        $seat = mysqli_num_rows($result);
        $seatnumber = ++$seat;

        $query_3 = "SELECT price FROM bus WHERE destination='$destination'";
        $result_3 = mysqli_query($db, $query_3);
        $cost = mysqli_fetch_assoc($result_3);
        $trans_cost = $cost["price"];

        $query_4 = "SELECT busnumber FROM bus WHERE destination='$destination'";
        $result_4 = mysqli_query($db, $query_4);
        $number = mysqli_fetch_assoc($result_4);
        $busnumber = $number["busnumber"];

        if($seat<= 50){

            $id = rand(2345678,9876543);

            //add the ticket into database
            $queryinsert = "INSERT INTO passanger (id, date, fname, lname, phone, origin, destination, busnumber, seatnumber, paid) VALUES ('$id' , '$date', '$passangerFname','$passangerLname', '$passangerPhone', '$origin', '$destination', $busnumber, $seatnumber, $trans_cost)";
            mysqli_query($db, $queryinsert);

            $_SESSION['passanger-fname'] = strtoupper($passangerFname); 
            $_SESSION['passanger-lname'] = strtoupper($passangerLname);
            $_SESSION['passanger-phone'] = $passangerPhone;
            $_SESSION['id'] = $id;
            $_SESSION['ticket-date'] = $date;
            $_SESSION['origin'] =  strtoupper($origin);
            $_SESSION['destination'] = strtoupper($destination);
            $_SESSION['bus-number'] = $busnumber;
            $_SESSION['seatno'] = ++$seat;
            $_SESSION['trans-cost'] = $trans_cost;

        }
        else{
            echo "No avaliable seats";
        }
        header('location: ../ticket/ticket-final.php');
        
    }

    //if the destination is not full register the passanger      
    
    if(isset($_POST['print-ticket'])) {
        $date = mysqli_real_escape_string($db, $_POST['ticket-date']);
        $passangerFname = mysqli_real_escape_string($db, $_POST['passanger-fname']);
        $passangerLname = mysqli_real_escape_string($db, $_POST['passanger-lname']);
        $origin = mysqli_real_escape_string($db, $_POST['origin']);
        $destination = mysqli_real_escape_string($db, $_POST['destination']);
        
        

        //fetch the price 
        $query_3 = "SELECT price FROM bus WHERE destination='$destination'";
        $result_3 = mysqli_query($db, $query_3);
        $cost = mysqli_fetch_assoc($result_3);
        $trans_cost = $cost["price"];

        $_SESSION['ticket-success'] = "ticket success";

        header('location: ../ticket/print-ticket.php');
    }

    // if the ticket is canceled
    if(isset($_POST['cancel-ticket'])) {
        $id =  $_SESSION['id'];
        //delete the ticket info from database
        $query_4 = "DELETE FROM passanger WHERE id='$id'";
        mysqli_query($db, $query_4);
        
        unset($_SESSION['passanger-name']);
        header('location: ../ticket/ticket.php');
    }

    //for the check destination
    if(isset($_POST['check-destination'])) {
        $origin = mysqli_real_escape_string($db, $_POST['origin']);
        $destination = mysqli_real_escape_string($db, $_POST['destination']);

        $query_2 = "SELECT * FROM bus WHERE origin='$origin' AND destination='$destination'";
        $result2 = mysqli_query($db, $query_2);
        $busavail = mysqli_num_rows($result2);

        if($busavail == 1){
            $query_1 = "SELECT * FROM passanger WHERE origin='$origin' AND destination='$destination'";
            $resultseat = mysqli_query($db, $query_1);
            $seat = mysqli_num_rows($resultseat);

            $_SESSION['org'] = strtoupper($origin);
            $_SESSION['dest'] = strtoupper($destination);
            $_SESSION['seat-available'] = 50 - $seat;
            $_SESSION['check-available'] = 'available';
        }else{
            unset($_SESSION['check-available']);
            $_SESSION['not-available'] = true;
        }
        
        header('location: ../dashboard/home.php');

    }

    if(isset($_POST['register'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $previlage = mysqli_real_escape_string($db, $_POST['previlage']);

        $query_user = "SELECT * FROM users WHERE username='$username'";
        $result2 = mysqli_query($db, $query_user);
        $userexist = mysqli_num_rows($result2);

        $query_email = "SELECT * FROM users WHERE email='$email'";
        $result3 = mysqli_query($db, $query_email);
        $emailexist = mysqli_num_rows($result3);

        if ($userexist == 0 && $emailexist == 0) {
            $query_register = "INSERT INTO users (username, email, password, previlage) VALUES ('$username', '$email', '$password','$previlage')";
            mysqli_query($db, $query_register);
            
            unset($_SESSION['register-failed']);
            
            $_SESSION['register-success'] = 'success';
            header('location: manage-user.php');
        }else{
            unset($_SESSION['register-success']);
            $_SESSION['register-failed'] = 'failed';
            header('location: manage-user.php');
        }
    }

    if(isset($_POST['assign-bus'])) {
        $busnumber = mysqli_real_escape_string($db, $_POST['bus-number']);
        $origin = mysqli_real_escape_string($db, $_POST['origin']);
        $destination = mysqli_real_escape_string($db, $_POST['destination']);
        $price = mysqli_real_escape_string($db, $_POST['price']);
        
        $query_bus = "SELECT * FROM bus WHERE busnumber='$busnumber'";
        $resultx = mysqli_query($db, $query_bus);
        $busexist = mysqli_num_rows($resultx);

        if($busexist == 0){
            $query_insert_bus = "INSERT INTO bus (origin, destination, busnumber, price) VALUES ('$origin', '$destination', '$busnumber','$price')";
            mysqli_query($db, $query_insert_bus);

            $_SESSION['assign-success'] = 'success';
            header('location: manage-bus.php');
        }else{
            $_SESSION['assign-failed'] = 'success';
            header('location: manage-bus.php');
        }
    }

    //check bus form handler
    if (isset($_POST['check-bus'])) {
        $busnumber = mysqli_real_escape_string($db, $_POST['bus-number']);

        $query_bus = "SELECT * FROM bus WHERE busnumber='$busnumber'";
        $resultx = mysqli_query($db, $query_bus);
        $busexist = mysqli_num_rows($resultx);

        if($busexist){
            //get the origin
            $query_org = "SELECT origin FROM bus WHERE busnumber='$busnumber'";
            $resulto = mysqli_query($db, $query_org);
            $orgndt = mysqli_fetch_assoc($resulto);
            $orgn = $orgndt["origin"];
            //get the destination
            $query_dest = "SELECT destination FROM bus WHERE busnumber='$busnumber'";
            $resultd = mysqli_query($db, $query_dest);
            $destdt = mysqli_fetch_assoc($resultd);
            $destn = $destdt["destination"];
            
            $_SESSION['busn'] = $busnumber;
            $_SESSION['orgn'] = strtoupper($orgn);
            $_SESSION['destn'] = strtoupper($destn);

            unset($_SESSION['buscheck-failed']);
            $_SESSION['buscheck-success'] = 'success';

            header('location: checkbus.php');
        }else{
            unset($_SESSION['buscheck-success']);
            $_SESSION['buscheck-failed'] = 'success';
            header('location: checkbus.php');
        }

    }

    // Users data 

?>