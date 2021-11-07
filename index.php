<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Roko</title>
    <meta name="description" content="Family style modern restaurant offering farm-fresh ingredients and classic Croatian cuisine">
    <meta name="keywords" content="restaurant, croatian cuisine, fresh food, family restaurant">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style><?php include "style.css"; ?></style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Display:ital,wght@0,200;0,400;1,100;1,300&display=swap" rel="stylesheet">
    <?php include "navbar.php"; ?>
</head>
<body>
<!-- Filter menu   -->
 <script type="text/javascript">
 $(document).ready(function(){
     $("#fetchval").change(function(){
         var selectedMenu = $("#fetchval").val();
         if(selectedMenu == "all") {
            $('.menuDivsAll').css({display:"grid"});
           }else {
            $('.menuDivsAll').css({display:"none"});
           }
         $.ajax({
             url: 'fetch.php',
             method: 'post',
             data: 'selectedMenu=' + selectedMenu
         }).done(function(kategorije){
             kategorije = JSON.parse(kategorije);
             $('.menuDivs').empty();
         kategorije.forEach(function(kateg){
             $('.menuDivs').append('<div class="menuImg"> <img src ="./assets/' + kateg.image +'"> <div class="menuDescription">' + kateg.naziv_jela + ' - $' + kateg.cijena_jela +'</div></div>');
         })
         })
     })
        })
 </script>

    <div id="mainContainer">
        <div id="#headerContainer">
            <div class="headerDiv">
                <h1>Welcome to Roko</h1>
                <p>Life’s too short for boring food</p>
                <a class="primaryButton" href="reservation.php">Reservation</a>
            </div>
        </div>
      
        <div id="aboutUsContainer">
            <div class="aboutUsimg">
            <div class="aboutUsImgFirst"> 
                <img src="./assets/aboutUsFirst.jpeg" alt="chef image">
            </div>
            <div class="aboutUsImgSecond"> 
                <img src="./assets/aboutUsSecond.jpeg" alt="meal image">
            </div>
        </div>
            <div class="aboutUsDiv">
                <h2>About Us</h2>
                <p>Established in 1995., Roko restaurant offers farm-fresh ingredients and classic Croatian cuisine. Roko is tribute and thanks to everything Croatian cuisine has to offer. Only the highest quality meats, seasonal produce and ingredients are sourced locally from farms throughout Croatia.</p>
                <a class="secondaryButton" href="reservation.php">Reservation</a>
            </div>
        </div>

        <div id="midContentImg">
            <p>"You don't need a silver fork to eat good food." <br>
              <span style="font-size: 25px;">Paul Prudhomme</span> </p>   
        </div>


        <div id="chefsContainer">
            <h1>Our Team</h1>
            <div class="chefBox">
                <div class="chefImg">
                <img src="./assets/chef.jpeg" alt="">
            </div>
                <h4>John Welsh</h4>
                <p>Executive Chef</p>
            </div>
            <div class="chefBox">
                <div class="chefImg">
                <img src="./assets/pizzaChef.jpeg" alt="">
            </div>
                <h4>Joanna Rice</h4>
                <p>Pizza Specialist</p>
            </div>
            <div class="chefBox">
                <div class="chefImg">
                <img src="./assets/manager1.jpeg" alt="">
            </div>
                <h4>Richard Hanks</h4>
                <p>Manager/ Chef</p>
            </div>
        </div>

        <div id="menuContainer">
            <div class="menuHeader">
                <h4>Special Menu</h4>
                <p>We offer daily menus produced with high quality ingredients. </p>
            </div>
            <div class="menuOptions">
           <label for="fetchval">Choose menu: </label>
            <select name="fetchval" id="fetchval" >
            <option  value="all" >All</option>
            <option value="breakfast">Breakfast</option>
            <option value="lunch">Lunch</option>
            <option value="dinner">Dinner</option>
            <option value="drinks">Drinks</option>
            </select>  
            </div>

            <div class="menuDivs"></div>
            
            
<!-- Fetch all menu items  -->
            <div class="menuDivsAll" >
            <?php 
            require 'fetch.php';
            $menus = loadMenus();
            foreach($menus as $menu) {
                ?>
             <div class="menuImg"> <?php echo '<img src="./assets/'.$menu['image'].'"/>'; ?>
             <div class="menuDescription"><p><?php echo $menu['naziv_jela'] ?> - $<?php echo $menu['cijena_jela'] ?></p>
           </div>
           </div>
            <?php  } ?>
           </div>
           </div>
          <?php include "reviews.php"; ?>
    <?php include "footer.php"; ?>
    </div>
    

    
</body>
</html>