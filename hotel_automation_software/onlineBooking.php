<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    // Define the database connection details
    include "bookingDatabase.php";
    $arrival = $_GET["arrival_date"];
    $leave = $_GET["leaving_date"];
    $name = $_GET["name"];
    $mail = $_GET["email"];
    $phone = $_GET["phone"];
    $roomType = $_GET["room-type"];
    // $token = $_GET["token"];
    
  

    // Check if the connection was successful
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    $query = "SELECT * 
        FROM BookingTable 
        WHERE room_type = '" . $_GET["room-type"] . "' ;";
    $result = mysqli_query($connection, $query);
    $numberOfRooms = mysqli_num_rows($result);
    $numberOfRooms = $numberOfRooms +1;
    if($numberOfRooms < 100){ //100 means number of rooms
        echo "room is available";
        $query = "INSERT INTO  BookingTable(arrival_date,leaving_date,name,email,phone,room_type,room_number) VALUES('$arrival','$leave','$name','$mail','$phone','$roomType','$numberOfRooms');";
        if (mysqli_query($connection, $query)) {
            ?><p  id="myParagraph"style="color: green; padding-left: 500px;"> "Rooms available"</p>    <?php 
        } else {
            echo "error:" . $query . mysqli_error($connection) . "<br>";
        }
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
    }else{
        ?> <h3 style="color: black; padding-left: 500px; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;"> 
        Dear <?php echo $name?>,
        <br> <br>
        Thank you for choosing to stay at <em style="color:blue">Hotel Blue</em> 
        Currently we dont have room's Please visit Again
        <br><br>
        Best regards, <br>
        Raghava <br>
        Hotel Blue<br>
        </h3>    <?php ;
    }
    ?>

</body>

</html>