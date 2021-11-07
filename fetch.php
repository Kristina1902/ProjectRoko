<?php

require 'DbConnect.php';
// Fetch menus

if(isset($_POST['selectedMenu'])) {
    $selectedMenu = ($_POST['selectedMenu']);
    $db = new DbConnect;
    $conn = $db->connect();
    $stmt = $conn->prepare("SELECT `naziv_jela`, `cijena_jela`, `image` FROM `restaurant` WHERE `kategorija_jela` LIKE :selectedMenu"  );
    $stmt->execute([':selectedMenu' => $selectedMenu]);
    $kategorije = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($kategorije);
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    							$name = $_POST['name'];
    							$review = $_POST['review'];
                                $rating = $_POST['rating'];
                             $db = new DbConnect();
                               $conn = $db->connect();
                                $stmt = $conn->prepare ("INSERT INTO reviews( name, review, rating) VALUES (:name, :review, :rating)") ;
                           $stmt->execute(['name'=> $name, 'review' => $review, 'rating' => $rating]);
              
                    

                          };

function loadMenus() {
    $db = new DbConnect();
    $conn = $db->connect();
    $stmt = $conn->prepare("SELECT * FROM restaurant");
    $stmt->execute();
    $menus = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $menus;
}
// Fetch reviews 

function loadReviews() {
    $db = new DbConnect();
    $conn = $db->connect();
    $stmt = $conn->prepare("SELECT * FROM reviews ORDER BY id_review DESC" );
    $stmt->execute();
    $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $reviews;

}


function getReservation() {
    $db = new DbConnect();
    $conn = $db->connect();
    $stmt = $conn->prepare("SELECT `name`, `email`, `date`, `time`, `count` FROM reservations ORDER BY id DESC LIMIT 1");
    $stmt->execute();
    $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $reservations;

};



?>