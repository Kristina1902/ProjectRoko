<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div id="reviewsContainer">
<div class="reviews">
<h2>Customer Reviews</h4>


<script>
$(document).ready(function() {
    $('#reviewForm').on('submit', function(e) {
        
		var name = $('#name').val();
		var review = $('#review').val();
		var rating = $('#rating').val();
			$.ajax({
				url: "fetch.php",
				type: "POST",
				data: 'name='+name+'&review='+review+'&rating='+rating,
				cache: false,
				success: function(dataResult){
                 console.log('done')
				}
			});
	});
});
</script>
<?php
  $reviews = loadReviews();
  foreach($reviews as $review) {
?>

<div class="slideCol ">
<h2> <?php echo $review['name'] ?></h2>
<?php 
$stars = intVal($review['rating']);
for($i = 0; $i < $stars; $i++ ) {
    ?> 
   <?php echo '<i class="fas fa-star "></i>' ?>
<?php }
?>
<p><?php echo $review['review'] ?></p>
</div>
<?php  } ?> 
<div  class="reviewsBtnNext"></div>
<div  class="reviewsBtnPrev"></div>
</div>
</div>

<!-- Reviews form -->

<div class="reviewFormContainer">
  <h4>Leave us a review</h4>
  <button class="secondaryButton addReview" id="reviewSubmit">Add review</button>
  
<div class="reviewFormWrapper">
  <form action="" id="reviewForm" name="reviewForm" method="post" autocomplete="off">
      <label for="name">Name:</label>
    <input type="text" name="name" id="reviewName" required>
    <label for="reviewText">Comment:</label>
    <textarea name="review" id="review" cols="40" rows="5" required ></textarea>
    <label for="starRating">Star Rating:</label>
    <div class="rate">
    <input type="radio" name="rating" value="5" id="star5">
    <label for="star5"></label>
    <input type="radio" name="rating" value="4" id="star4">
    <label for="star4"></label>
    <input type="radio" name="rating" value="3" id="star3">
    <label for="star3"></label>
    <input type="radio" name="rating" value="2" id="star2">
    <label for="star2"></label>
    <input type="radio" name="rating" value="1" id="star1">
    <label for="star1"></label>
    </div>
    
    <input type="submit" class="secondaryButton" id="reviewSubmit" value="submit">
  </form>

  </div>
  </div>
  <script>

$('.addReview').click(function(){
  $('.reviewFormWrapper').css("display", "flex")
  $('.addReview').css("display", "none")
})



// Review Carousel

!(function(document){
    var itemClassName = "slideCol";
    items = document.getElementsByClassName(itemClassName),
    totalItems = items.length,
    slide = 0,
    moving = true;


  
function setInitialClasses() {

  items[totalItems - 1].classList.add("prev");
  items[0].classList.add("active");
  items[1].classList.add("next");
}

function setEventListeners() {
  var next = document.getElementsByClassName('reviewsBtnNext')[0],
      prev = document.getElementsByClassName('reviewsBtnPrev')[0];
  next.addEventListener('click', moveNext);
  prev.addEventListener('click', movePrev);
}


function moveNext() {

  if (!moving) {
 
    if (slide === (totalItems - 1)) {
      slide = 0;
    } else {
      slide++;
    }

    moveCarouselTo(slide);
  }
}

function movePrev() {
 
  if (!moving) {

    if (slide === 0) {
      slide = (totalItems - 1);
    } else {
      slide--;
    }
          
 
    moveCarouselTo(slide);
  }
}

function disableInteraction() {

  
  moving = true;

  setTimeout(function(){
    moving = false
  }, 500);
}

function moveCarouselTo(slide) {

  if(!moving) {
 
    disableInteraction();

    var newPrevious = slide - 1,
        newNext = slide + 1,
        oldPrevious = slide - 2,
        oldNext = slide + 2;

    if ((totalItems - 1) > 3) {

      if (newPrevious <= 0) {
        oldPrevious = (totalItems - 1);
      } else if (newNext >= (totalItems - 1)){
        oldNext = 0;
      }

      if (slide === 0) {
        newPrevious = (totalItems - 1);
        oldPrevious = (totalItems - 2);
        oldNext = (slide + 1);
      } else if (slide === (totalItems -1)) {
        newPrevious = (slide - 1);
        newNext = 0;
        oldNext = 1;
      }
   
      items[oldPrevious].className = itemClassName;
      items[oldNext].className = itemClassName;

      items[newPrevious].className = itemClassName + " prev";
      items[slide].className = itemClassName + " active";
      items[newNext].className = itemClassName + " next";
    }
  }
}

function initCarousel() {
  setInitialClasses();
  setEventListeners();

  moving = false;
}
initCarousel();

}(document));




</script>



