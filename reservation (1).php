<?php  require 'DbConnect.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $count = $_POST['count'];
        $db = new DbConnect();
        $conn = $db->connect();
        $stmt = $conn->prepare ("INSERT INTO reservations( name, email, date, time, count) VALUES (:name, :email, :date, :time, :count)") ;
        $stmt->execute(['name'=> $name, 'email' => $email, 'date' => $date, 'time' => $time, 'count' => $count]);
     header("Location: https://polaznik57.edunova.hr/reservationConfirmation.php");
      
};                      
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Display:ital,wght@0,200;0,400;1,100;1,300&display=swap" rel="stylesheet">
    <style><?php include "style.css"; ?></style>
    <?php include "navbar.php";?>
</head>
<body>
<div id="mainReservationContainer">
    <div class="reservationHeader">
        <h1>Reservation</h1>
    </div>
    <div class="formcontainer">
        <form action="" id="formSubmit" class="reservationForm" method="post" autocomplete="off">
         <div class="reservationDiv">
         <input type="date" name="date"  placeholder="Date" id="date" required >
         <input type="time"  id="time" name="time" placeholder="Time" required  >   
         <input type="number" min="0" placeholder="Number of guests" name="count" id="count" required>
         <input type="text" placeholder="Name" id="name" name="name" required>
         <input type="email" placeholder="Email" id="email" name="email" required>
         </div>
         <input type="submit"  name="submit" id="submit" class="secondaryButton" value="BOOK TABLE" >
         </form>
    </div>
</div>
<?php include "footer.php"; ?>
</body>
</html>