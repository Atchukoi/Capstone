<?php 
include 'themes/navbar.php'; 
include 'config.php';

if(isset($_POST['submit'])) {
    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $Subject = $_POST['subject'];
    $Message = $_POST['message'];

    $sql= "INSERT INTO `contact`(`Name`, `Email`, `Subject`, `Message`) VALUES ('$Name','$Email',' $Subject','$Message')";
    $result = mysqli_query($conn,$sql);
    if ($result) {
    echo '<script>alert("Thank you for reaching us with your concern, you will hear from us soon. Have a great day!:");</script>';
    }
}


?>
<?php if (isset($_SESSION['fname']) && !empty($_SESSION['fname'])) {
?>
    <a href="logout.php">Logout</a>
<?php } else { ?>
    <a href="login.php">Login</a>
    <a href="signup.php">Register</a>
<?php } ?>
<style>
    html {
        scroll-behavior: smooth;
    }
</style>
<main>



    <div class="center-logo">
        <div class="hero">
            <div class="container">
                <div class="main-heading">
                    <h1 class="title">Book Your Stay</h1>
                    <h2 class="subtitle">Relax and have Fun</h2>
                </div>
                <a href="#intro" class="btn btn-gradient">Explore Now
                    <span class="dots"><i class="fas fa-ellipsis-h"></i></span>
                </a>
            </div>
        </div>
    </div>
    <!-- <section class="booking">
        <div class="container">
            <form action="#" class="book-form">

                <div class="input-group">
                    <label for="check-in" class="input-label">check-in</label>
                    <input type="date" class="input" id="check-in">
                </div>
                <div class="input-group">
                    <label for="check-out" class="input-label">check-out</label>
                    <input type="date" class="input" id="check-out">
                </div>
                <div class="input-group">
                    <label for="adults" class="input-label">Person</label>
                    <select class="options" id="adults">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="children" class="input-label">Room Type</label>
                    <select class="options" id="children">
                        <option value="presidential">Presidential Villa</option>
                        <option value="suite">Suite Villa</option>
                        <option value="mini">Mini Dorm</option>
                        <option value="standard">Standard</option>

                    </select>
                </div>
                <button type="submit" class="btn form-btn btn-purple">Search
                    <span class="dots"><i class="fas fa-ellipsis-h"></i></span>
                    </span>
                </button>
            </form>
        </div>
    </section> -->




    <div class="intro" id="intro">

        <!-- <div class="welcome1">
            <div class="welcome">Welcome</div>

        </div> -->
        <h1 class="villa">Villa La Perfecta</h1>

        <p class="intro-paragraph">Mabuhay! The “true heart of the Philippines,” where Filipino hospitality means a haven of safety and well-being, is happy to welcome you.</p>
        <p class="intro-paragraph">The world has changed and we’ve all had to adapt. For us, here is what it means to live through these challenging times and into the New Normal.</p>
        <p class="intro-paragraph">Safety and comfort are key factors in leisure stays these days. We assure you of medical-grade stringent sanitation procedures in preparing our rooms for guests so you can stay with us with peace of mind.</p>
    </div>





    





    <section class="rooms">
        <div class="container">
            <h5 class="section-head">
                <span class="heading">Luxurious</span>
                <span class="sub-heading">Affordable Rooms</span>
            </h5>
            
                
                <div id="displayrooms"></div>
                
                
            
        </div>
    </section>


    <section>
        <div>
            <h5 class="section-head">
                <span class="heading">We Accomodate</span>
                <span class="sub-heading">Occation & Events</span>
            </h5>
        </div>

        <div class="owl-carousel owl-theme">
            <div>
                <h5 class="hotel-name">Wedding</h5>
                <img class="owl-img" src="https://media.istockphoto.com/photos/wedding-asymmetrical-purple-bouquet-in-the-hands-of-the-bride-picture-id1317608157?b=1&k=20&m=1317608157&s=170667a&w=0&h=lE-mfvNQtp0oCGhLNKVtXdGlHhMejkSntcF1l1d8MR0=" alt="" />
            </div>
            <div>
                <h5 class="hotel-name">Birthday</h5>
                <img class="owl-img" src="https://images.unsplash.com/photo-1530103862676-de8c9debad1d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8YmlydGhkYXl8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60" alt="" />
            </div>
            <div>
                <h5 class="hotel-name">Holliday</h5>
                <img class="owl-img" src="https://media.istockphoto.com/photos/friends-during-a-summer-day-picture-id815065584?k=20&m=815065584&s=612x612&w=0&h=cn1VHT83W774Y3btLtO1kC6b1jwclBxNKDBLAUKzCo4=" alt="" />
            </div>
            <div>
                <h5 class="hotel-name">Conference</h5>
                <img class="owl-img" src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Nnx8Y29uZmVyZW5jZSUyMGhhbGx8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60" alt="" />
            </div>
            <div>
                <h5 class="hotel-name">Concert</h5>
                <img class="owl-img" src="https://images.unsplash.com/photo-1549451371-64aa98a6f660?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8ZXZlbnRzfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60" alt="" />
            </div>
            <div>

                <h5 class="hotel-name">Worship Event</h5>
                <img class="owl-img" src="https://media.istockphoto.com/photos/large-group-of-people-at-a-concert-party-picture-id1329410603?b=1&k=20&m=1329410603&s=170667a&w=0&h=Z0WeBwkcIZsGPqZgF8PiP2We2iwqKyjGg-9Jio2WPe8=" alt="" />
            </div>
            <div>
                <h5 class="hotel-name">Team Building</h5>
                <img class="owl-img" src="https://media.istockphoto.com/photos/friendly-young-african-colleagues-joining-hands-in-air-picture-id1333810631?b=1&k=20&m=1333810631&s=170667a&w=0&h=iHSpA9fMIvGqprDd1Wu5HKAMuCJP3l5yZOFqfQSBbPk=" alt="" />
            </div>
        </div>
    </section>

    <section class="rooms">
            <div class="container">
                <h5 class="section-head">
                    <span class="heading">We offer</span>
                    <span class="sub-heading">Affordable Halls</span>
                </h5>
                <div class="grid hall-grid">
                    <div class="grid-item featured-rooms">
                        <div class="image-wrap">
                            <img class="room-image" src="./images/convention_center.jpg" alt="">
                            <h5 class="hall-name">Function Hall</h5>
                        </div>
                        <div class="room-info-wrap">
                            <span class="hall-price">Fully Air-Conditioned <div></div> <span class="per-hour">₱ 8,000 (4) Four Hours Only</span></span>
                            <p class="paragraph">Additional ₱ 800 per exceeding hours.</p>
                            <a href="halls.php" class="btn rooms-btn">Book now &rrarr;</a>
                        </div>
                    </div>
                    
        
                    <div class="grid-item featured-rooms">
                        <div class="image-wrap">
                            <img class="room-image" src="./images/convention_center.jpg" alt="">
                            <h5 class="hall-name">Ballroom Hall</h5>
                        </div>
                        <div class="room-info-wrap">
                            <span class="hall-price">Fully Air-Conditioned <div></div> <span class="per-hour">₱ 8,000 (4) Four Hours Only</span></span>
                            <p class="paragraph">Additional ₱ 1,000 per exceeding hours.</p>
                            <a href="halls.php" class="btn rooms-btn">Book now &rrarr;</a>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="food">
          <div class="container">
              <h5 class="section-head">
                  <span class="heading">Food Packages</span>
                  <span class="sub-heading">Delicious Foods</span>
              </h5>
              <div class="grid hall-grid">
                <div class="grid-item featured-food">
                    <div class="image-wrap">
                        <img class="room-image" src="./images/package2.jpg" alt="">
                        <h5 class="room-name">Bundle A</h5>
                    </div>
                    <div class="room-info-wrap">
                        <span class="room-price">3 Main Courses </span>
                        <p class="paragraph">
                        Pork or Beef, Chicken, Vegetables, Rice, Dessert (Buko Pandan salad) & Iced Tea
                        </p> 
                        
                    </div>
                </div>

                <div class="grid-item featured-food">
                  <div class="image-wrap">
                      <img class="room-image" src="./images/package3.jpg" alt="">
                      <h5 class="room-name">Bundle B</h5>
                  </div>
                  <div class="room-info-wrap">
                      <span class="room-price">4 Main Courses</span>
                      <p class="paragraph">
                      Pork, Beef, Chicken, Vegetables, Rice, Dessert (Buko Pandan salad) & Iced Tea
                       </p>
                      
                  </div>
              </div>

              <div class="grid-item featured-food">
                <div class="image-wrap">
                    <img class="room-image" src="./images//package4.jpg" alt="">
                    <h5 class="room-name">Bundle C</h5>
                </div>
                <div class="room-info-wrap">
                    <span class="room-price">5 Main Courses</span>
                    
                      
                    <p class="paragraph">
                    Seafood, Pork, Beef, Chicken, Vegetables, Rice, Dessert (Buko Pandan salad) & Iced Tea
                     </p>
                    
                </div>
            </div>
            </div>
        </section>

    
        <section class="contact bg-gray">
            <div class="container">
                <h5 class="section-head">
                    <span class="heading">Contact</span>
                    <span class="sub-heading">Get in touch with us</span>
                </h5>
                <div class="contact-content">
                    <div class="traveler-wrap">
                        <img src="./images/traveler.png" alt="">
                    </div>
                    <form method="POST" class="form contact-form">
                        <div class="input-group-wrap">
                            <div class="input-group">
                                <input type="text" class="input" name="name" placeholder="Name" required>
                                <span class="bar"></span>
                            </div>

                            <div class="input-group">
                                <input type="email" class="input" name="email" placeholder="E-mail" required>
                                <span class="bar"></span>
                            </div>
                        </div>
                        <div class="input-group">
                            <input type="text" class="input" name="subject" placeholder="Subject" required>
                            <span class="bar"></span>
                        </div>

                        <div class="input-group">
                            <textarea class="input" name="message" cols="30" rows="8" placeholder="Message"></textarea>
                            <span class="bar"></span>
                        </div>
                        <button type="submit" name="submit" class="btn form-btn btn-purple">Send Message
                            <span class="dots"><i class="fas fa-ellipsis-h"></i></span>
                        </button>
                    </form>
                </div>
            </div>
        </section>
    



</main>



<?php include 'themes/footer.php'; ?>