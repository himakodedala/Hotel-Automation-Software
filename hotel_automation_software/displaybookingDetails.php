<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statictsics</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
    window.onload = function() {
      setTimeout(function() {
        document.getElementById("myParagraph").style.display = "none";
      }, 1000); // 1000 milliseconds = 1 seconds
    };
  </script>
</head>
<body>
    <?php 
        $month = $_GET["month"];
        $year = $_GET["year"];
        $room_type = $_GET["bed-type"];
        include 'bookingDatabase.php';
        if($connection){
            ?><p  id="myParagraph"style="color: green; padding-left: 500px;"> "Dabase created"</p>    <?php 
        }else{
            ?><p  id="myParagraph"style="color: red; padding-left: 500px;"> "Dabase not created"</p>    <?php 
        }
        $query = "SELECT * 
        FROM BookingTable 
        WHERE room_type = '$room_type' 
        AND MONTH(arrival_date) = $month 
        AND YEAR(arrival_date) = $year;";
        $result = mysqli_query($connection, $query);
        if($result){
            echo "excuted";
        }else{
            echo "not excuted";
        }

        // Check if any data is returned
        if (mysqli_num_rows($result) > 0) {
            // Output table header
            echo "<table style='border-collapse: collapse; width: 100%;'>";
            echo "<tr style='border: 1px solid black;'><th style='padding: 10px; border: 1px solid black;'>Arrival Date</th><th style='padding: 10px; border: 1px solid black;'>Leaving Date</th><th style='padding: 10px; border: 1px solid black;'>Name</th><th style='padding: 10px; border: 1px solid black;'>Email</th><th style='padding: 10px; border: 1px solid black;'>Phone</th><th style='padding: 10px; border: 1px solid black;'>Room Type</th><th style='padding: 10px; border: 1px solid black;'>Token</th><th style='padding: 10px; border: 1px solid black;'>Room Number</th></tr>";
            
            // Output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr style='border: 1px solid black;'><td style='padding: 10px; border: 1px solid black;'>" . $row["arrival_date"] . "</td><td style='padding: 10px; border: 1px solid black;'>" . $row["leaving_date"] . "</td><td style='padding: 10px; border: 1px solid black;'>" . $row["name"] . "</td><td style='padding: 10px; border: 1px solid black;'>" . $row["email"] . "</td><td style='padding: 10px; border: 1px solid black;'>" . $row["phone"] . "</td><td style='padding: 10px; border: 1px solid black;'>" . $row["room_type"] . "</td><td style='padding: 10px; border: 1px solid black;'>" . $row["unique_token"] . "</td><td style='padding: 10px; border: 1px solid black;'>" . $row["room_number"] . "</td></tr>";
            }
            
            // Close the table
            echo "</table>";
        } else {
            echo "0 results";
        }
        
        

        $num_records = mysqli_num_rows(mysqli_query($connection, $query));
        
        ?>
        <h1>Room Availability</h1>
        <div id="piechart" style="width: 400px; height: 400px;"></div>
        <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Rooms', 'Number of Rooms'],
                ['Booked', <?php echo $num_records?>],
                ['Available',<?php echo 100 -  $num_records?>]
            ]);

            var options = {
                title: 'Room Availability',
                pieHole: 0.4,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
        <?php

    ?>
        
  
</body>
</html>