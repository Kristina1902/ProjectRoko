<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Display:ital,wght@0,200;0,400;1,100;1,300&display=swap" rel="stylesheet">
  <style><?php include "style.css"; ?></style>
  <?php include "navbar.php"; ?>
<div class="confirmationContainer">
<?php 
  require 'fetch.php';
  $reservations = getReservation();
  foreach($reservations as $reservation){
?>
    <div class="confirmationHeader">
    <h4>Thank you for booking a table <?php echo($reservation['name']);?>! </h4>
    <p>You will receive a confirmation email.</p>
    </div>
<div class="confirmationDiv">
<div class="confirmationBox">
    <img src="./assets/calendar.png" alt="">
    <p><?php echo($reservation['date']);?> </p>
</div>
<div class="confirmationBox">
    <img src="./assets/clock.png" alt="">
    <p><?php  echo($reservation['time'])?></p>
</div>
<div class="confirmationBox">
    <img src="./assets/group.png" alt="">
    <p><?php echo($reservation['count']);?></p>
</div>
</div>
<?php }; ?>
</div>

<?php include "footer.php"; ?>