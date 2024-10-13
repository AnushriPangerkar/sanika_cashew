<?php
include('config.php');
include('header.php');


?>
<head>
<link rel="stylesheet" href="style.css">


    <!-- Main Banner Section -->
    <section class="main-banner">


    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="pictures/factory.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item active">
    <img src="pictures/factory.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item active">
    <img src="pictures/factory.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
    </section><br><br>
    </head>
    

  <main class="container"> 
    <div class="row">
      <div class="col-md-6">
        <h1 >About Us</h1>
        <p>Our cashew journey began in 1995, starting as a small, home-based venture. With a passion for quality and a love for 
          delivering the best cashews, we gradually won the hearts of our customers, receiving an overwhelming response. As demand grew, we 
          expanded our operations, and in 2018, we built a full-scale factory to better serve our community. <br><br>The response from people continued 
          to be incredible, and now, we are taking the next step by bringing our cashews online. This move allows us to reach people far and wide,
           making it easier for them to enjoy our premium products, no matter where they are. </p>
      </div>
      <div class="col-md-6">
        <div class="ratio ratio-16x9">
          <iframe src="pictures/sorting-video.mp4" title="YouTube video" allowfullscreen mute ></iframe>
        </div> 
      </div>
    </div>
  </main><br>
 
  <main  
    class="container"> 
    <div class="row">
      <div class="col-md-6">
        
        <p>You can watch the videos of the machine which gives polished cashews basically it peels-off that brown cover  <p>
      </div>
      <div class="col-md-6">
        <div class="ratio ratio-16x9">
          <iframe src="pictures/machine video.mp4" title="YouTube video" allowfullscreen mute ></iframe>
        </div> 
      </div>
    </div>
  </main><br>
<!--section-->
  
    <!-- Product Categories Section -->
    <section class="categories">
        <h1>Our Cashew Products</h1><br>
        <div class="category-grid">
            <div class="category-item">
                <img src="./pictures/masalaKaju.jpg" alt="Raw Cashews">
                <h3>Masala Cashew</h3>
                <a href="products.php" class="view-btn">View Products</a>
            </div>
            <div class="category-item">
                <img src="./pictures/kardaKajuBig.jpg" alt="Roasted Cashews">
                <h3>Roasted Cashews</h3>
                <a href="products.php" class="view-btn">View Products</a>
            </div>
            <div class="category-item">
                <img src="./pictures/SaltedKaju.jpg" alt="Salted Cashews">
                <h3>Salted Cashews</h3>
                <a href="products.php" class="view-btn">View Products</a>
            </div>
            
        </div>
    </section>




<?php 
include('footer.php');

?>