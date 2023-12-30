<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="icon" href="image/favicon.png" type="image/png" />
    <title>Royal Hotel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="vendors/linericon/style.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link
      rel="stylesheet"
      href="vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css"
    />
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css" />
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css" />
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/responsive.css" />
  </head>
  <body>
    <?php
    include "bookingDatabase.php";
    $query = "SELECT * FROM BookingTable ;";
    $result = mysqli_query($connection, $query);
    $numberOfRooms = mysqli_num_rows($result);
     ?> <h3 style="color: red;">Last Room number booked: <?php echo "$numberOfRooms"; ?> </h3> 
    
  <form action="booking.php" method="get">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <form>
            <div class="form-group">
              <label for="arrival-date">Arrival Date</label>
              <input
                type="date"
                class="form-control"
                id="arrival-date"
                name="arrival-date"
                required
              />
            </div>
            <div class="form-group">
              <label for="leaving-date">Leaving Date</label>
              <input
                type="date"
                class="form-control"
                id="leaving-date"
                name="leaving-date"
                required
              />
            </div>
            <div class="form-group">
              <label for="name">Name</label>
              <input
                type="text"
                class="form-control"
                id="name"
                name="name"
                required
              />
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input
                type="email"
                class="form-control"
                id="email"
                name="email"
                required
              />
            </div>
            <div class="form-group">
              <label for="phone">Phone Number</label>
              <input
                type="tel"
                class="form-control"
                id="phone"
                name="phone"
                required
              />
            </div>
            <div class="form-group">
              <label for="room-type">Room Type</label>
              <select
                class="form-control"
                id="room-type"
                name="room-type"
                required
              >
                <option value="single-bed-without-ac">
                  Single Bed Without AC
                </option>
                <option value="double-bed-without-ac">
                  Double Bed Without AC
                </option>
                <option value="single-bed-with-ac">Single Bed With AC</option>
                <option value="double-bed-with-ac">Double Bed With AC</option>
              </select>
            </div>
           <!-- <div class="form-group">
              <label for="token">Unique Token</label>
              <input
                type="text"
                class="form-control"
                id="token"
                name="token"
                required
              />
            </div>-->
            <div class="form-group">
              <label for="room-number">Room Number</label>
              <input
                type="number"
                class="form-control"
                id="room-number"
                name="room-number"
                required
              />
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
          
        </div>
      </div>
    </div>
  </form>
    </body>
  </body>
</html>
