<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    
    </head>
    <style>
        .btn {
            background-color: #007bff;
            color: #fff;
            border-radius: 0.25rem;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.1rem;
            cursor: pointer;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #0069d9;
            color: #fff;
            text-decoration: none;
        }

    </style>
    <script>
    window.onload = function() {
      setTimeout(function() {
        document.getElementById("myParagraph").style.display = "none";
        document.getElementById("book").style.display = "none";
      }, 1000); // 1000 milliseconds = 1 seconds
    };
  </script>
</head>

<body>
    <?php
    include 'bookingDatabase.php';
    $arrival = $_GET["arrival-date"];
    $leave = $_GET["leaving-date"];
    $name = $_GET["name"];
    $mail = $_GET["email"];
    $phone = $_GET["phone"];
    $roomType = $_GET["room-type"];
    // $token = $_GET["token"];
    $RoomNumber = $_GET["room-number"];
  




    if ($connection) {
        ?><p  id="myParagraph"style="color: green; padding-left: 500px;"> "Dabase created"</p>    <?php 
    } else {
        ?><p  id="myParagraph"style="color: red; padding-left: 500px;"> "Dabase not created"</p>    <?php 
    }
    $query = "SELECT * FROM BookingTable;";
    $check = mysqli_query($connection, $query);
    if ($check) {
        ?><p  id="book"style="color: green; padding-left: 500px;"> "Booking table is already exist's"</p>    <?php 
    } else {

        $query = "CREATE TABLE BookingTable (
            
            arrival_date DATE NOT NULL,
            leaving_date DATE NOT NULL,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            phone VARCHAR(20) NOT NULL,
            room_type ENUM('single-bed-without-ac', 'double-bed-without-ac', 'single-bed-with-ac', 'double-bed-with-ac') NOT NULL,
            unique_token INT NOT NULL AUTO_INCREMENT,
            room_number INT(11) NOT NULL,
            PRIMARY KEY (unique_token)
            
          );";
        if (mysqli_query($connection, $query)) {
            ?><p  id="myParagraph"style="color: red; padding-left: 500px;"> "BookingTable is created"</p>    <?php 
        } else {
            echo "error:" . $query . mysqli_error($connection);
        }
        $query2 = "ALTER TABLE BookingTable AUTO_INCREMENT = 666666;";
       
        if ( mysqli_query($connection, $query2)) {
            ?><p  id="myParagraph"style="color: red; padding-left: 500px;"> "autoincremented "</p>    <?php 
        } else {
            echo "error:" . $query2 . mysqli_error($connection);
        }
    }

    echo "<br>";

    
    $query = "INSERT INTO  BookingTable(arrival_date,leaving_date,name,email,phone,room_type,room_number) VALUES('$arrival','$leave','$name','$mail','$phone','$roomType','$RoomNumber');";
    if (mysqli_query($connection, $query)) {
        ?><h3 style="color: black; padding-left: 500px; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;"> 
            Dear <?php echo $name?>,
            <br> <br>
            Thank you for choosing to stay at <em style="color:blue">Hotel Blue</em> during your upcoming trip.<br> 
            We are delighted to inform you that your reservation for <em style="color:blue"> <?php echo $roomType?>, </em>has been <br>
            confirmed for the dates of <em style="color:blue"> <?php echo $arrival?></em>, to <em style="color:blue"><?php echo $leave?></em>,. We appreciate your <br>
            trust in our hotel and we are committed to making your stay as comfortable and enjoyable as possible. <br> <br>

            Please do not hesitate to contact us if you need any assistance or if you have any special  <br>
            requests. Our staff is always available to help you with anything you may need. We look  <br>
            forward to welcoming you  soon and we hope that you will have a wonderful stay at our hotel. <br>
            <br><br>
            Best regards, <br>
            Raghava <br>
            Hotel Blue<br>
    </h3>    <?php 
    } else {
        echo "error:" . $query . mysqli_error($connection) . "<br>";
    }

    ?>
    <center><a href="index.html" class="btn">thanks for stying in our HOTEL BLUE</a></center>
</body>

</html><?php
