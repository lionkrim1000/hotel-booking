<?php
    include_once 'admin/include/class.user.php'; 
    $user=new User(); 

    $roomname=$_GET['roomname'];

    if(isset($_REQUEST[ 'submit'])) 
    { 
        extract($_REQUEST); 
        $result=$user->booknow($checkin, $checkout, $name, $phone,$roomname);
        if($result)
        {
            echo "<script type='text/javascript'>
                  alert('".$result."');
             </script>";
        }


        
    }


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Hotel Booking</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="admin/css/reg.css" type="text/css">
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( ".datepicker" ).datepicker({
                  dateFormat : 'yy-mm-dd'
                });
  } );
  </script>

    
</head>

<body>
    <div class="container">
      
      
       <img class="img-responsive" src="images/home_banner.jpg" style="width:100%; height:180px;">      
        

      <div class="well">
            <h2>Book Now: <?php echo $roomname; ?></h2>
            <hr>
            <form action="" method="post" name="booking">
              

            <div class="form-group">
                    <label for="checkin">Check In:</label>&nbsp;&nbsp;&nbsp;
                    <input type="text" class="datepicker" id="checkin" name="checkin">
                </div>

                <div class="form-group">
                    <label for="checkout">Check Out:</label>&nbsp;
                    <input type="text" class="datepicker" id="checkout" name="checkout">
                </div>

                <div class="form-group" required>
                    <label for="name">Enter Your Full Name:</label>
                    <input type="text" class="form-control" name="name" placeholder="Name" required>
                </div>

                <div class="form-group" required>
                    <label for="phone">Enter Your Phone Number:</label>
                    <input type="text" class="form-control" name="phone" placeholder="018XXXXXXX" required>
                </div>

                <input type="hidden" id="date_booked" name="date_booked">

                
                <script>
                    var checkinInput = document.getElementById('checkin');
                    var checkoutInput = document.getElementById('checkout');
                    var form = document.getElementById('bookingForm');

                    checkinInput.addEventListener('change', function() {
                        // Ensure that check-in date is not after the check-out date
                        if (checkoutInput.value && new Date(this.value) > new Date(checkoutInput.value)) {
                            this.value = '';
                            alert("Check-in date cannot be after check-out date");
                        }
                    });

                    checkoutInput.addEventListener('change', function() {
                        // Ensure that check-out date is not before the check-in date
                        if (checkinInput.value && new Date(this.value) < new Date(checkinInput.value)) {
                            this.value = '';
                            alert("Check-out date cannot be before check-in date");
                        }
                    });

                    form.addEventListener('submit', function(event) {
                        // Ensure that check-in date is not after the check-out date
                        if (new Date(checkinInput.value) > new Date(checkoutInput.value)) {
                            event.preventDefault(); // Prevent form submission
                            alert("Check-in date cannot be after check-out date");
                            return; // Added return statement to exit the function
                        }

                    // Set the date_booked field to the current date
                    var dateBookedInput = document.getElementById('date_booked');
                    var currentDate = new Date();
                    var formattedDate = currentDate.toISOString().split('T')[0];
                    dateBookedInput.value = formattedDate;
                    });
                </script>



                


                 
               
                <button type="submit" class="btn btn-lg btn-primary button" name="submit">Book Now</button>

               <br>
                <div id="click_here">
                    <a href="index.php">Back to Home</a>
                </div>


            </form>
        </div>
        
        



    </div>
    
    
    
    
    






    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
</body>

</html>