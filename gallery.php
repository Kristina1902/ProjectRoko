<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roko Restaurant Gallery</title>
    <style><?php include "style.css"; ?></style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Display:ital,wght@0,200;0,400;1,100;1,300&display=swap" rel="stylesheet">
</head>
<body>
    
</body>
</html>

<?php include "navbar.php"; ?>

<div id="gallery">
<div id="galleryHeader">
    <h2> Explore Our Gallery</h2>
</div>

    <div id="galleryWrap">
        <div class="galleryBox One">
        <img src="https://images.unsplash.com/photo-1514933651103-005eec06c04b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1374&q=80" alt="">
        </div>
        <div class="galleryBox Two">
            <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1470&q=80" alt="">
        </div>
        <div class="galleryBox Three">
            <img src="https://images.unsplash.com/photo-1502301103665-0b95cc738daf?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=928&q=80" alt="">
        </div>
        <div class="galleryBox Four">
            <img src="https://images.unsplash.com/photo-1579027989536-b7b1f875659b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1470&q=80" alt="">
        </div>
        <div class="galleryBox Five">
            <img src="https://images.unsplash.com/photo-1564759296729-771e78c26df7?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=928&q=80" alt="">
        </div>
        <div class="galleryBox Six">
            <img src="https://images.unsplash.com/photo-1517644493876-7864565e3bf9?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=687&q=80" alt="">
        </div>
    </div>
    <div class="modal">
<span class="close">×</span>
<img class="modalImage" id="img01" />
</div>
    </div>
    <script>
var modalEle = document.querySelector(".modal");
var modalImage = document.querySelector(".modalImage");
Array.from(document.querySelectorAll(".galleryBox")).forEach(item => {
   item.addEventListener("click", event => {
      modalEle.style.display = "block";
      modalImage.src = event.target.src;
   });
});
document.querySelector(".close").addEventListener("click", () => {
   modalEle.style.display = "none";
});
    </script>

<?php include "footer.php"; ?>