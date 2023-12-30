<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
</head>

<body>
    <?php
    include 'managerACcreateDatabase.php';
    $mail = $_GET["email"];
    $password = $_GET["password"];
    $secret = $_GET["secret"];

    if($secret != 2468){
        echo "entered wrong secret password";
    }else{
        if ($connection) {
            echo "connection established" . "<br>";
        } else {
            echo "Error:" . mysqli_error($sevenconnection) . "<br>";
        }
        $query = "SELECT * FROM manager;";
        $check = mysqli_query($connection, $query);
        if ($check) {
            echo "BookingTable is already exist"."<br>";
        } else {

            $query = "CREATE TABLE manager(Email VARCHAR(25), Password VARCHAR(25),SecretPassword VARCHAR(35));";

            if (mysqli_query($connection, $query)) {
                echo "manager table is created" . "<br>";
            } else {
                echo "error:" . $query . mysqli_error($connection);
            }
        }
        $query = "INSERT INTO  manager(Email,Password,SecretPassword) VALUES('$mail','$password','$secret');";
        if (mysqli_query($connection, $query)) {
            echo "record inserted " . "<br>";
        } else {
            echo "error:" . $query . mysqli_error($connection) . "<br>";
        }
        
    }

    
    ?>
     <button type="button"><a href="managerLogin.html">Manager Login</a></button>
</body>

</html><?php

