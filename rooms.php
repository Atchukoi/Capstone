<?php 
include 'themes/navbar.php'; 
include 'config.php';

?>

<main>

<section class="booking" style="margin-top: 100px">
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
            <!-- <div class="input-group">
                <label for="adults" class="input-label">Person</label>
                <select   class="options" id="adults">
                    
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    
                </select>
            </div> -->
            <div class="input-group">
                <label for="children" class="input-label">Room Type</label>
                <select   class="options" id="children">
                    <option value="0">Presidential Villa</option>
                    <option value="1">Suite Villa</option>
                    <option value="0">Mini Dorm</option>
                    <option value="1">Standard</option>
                    
                </select>
            </div>
            <button type="submit" class="btn form-btn btn-purple">Check Availability
            <span class="dots"><i class="fas fa-ellipsis-h"></i></span>
            </span>
        </button> 
        </form>
    </div>
</section>




<section class="rooms">
            <div class="container">
                <h5 class="section-head">
                    <span class="heading">Luxurious</span>
                    <span class="sub-heading">Affordable Rooms</span>
                </h5>
                <div class="grid room-grid">
                    <div class="grid-item featured-room">
                        <div class="image-wrap">
                            <img class="room-image" src="./images/press2.png" alt="">
                            <h5 class="room-name">Presidential Villa </h5>
                        </div>
                        <div class="room-info-wrap">
                            <span class="room-price">
                            P 3,500 <span class="pernight">Per Night</span>
                            <i class="fa-sharp fa-solid fa-person" style="color:red;"></i>
                            <i class="fa-sharp fa-solid fa-person" style="color:red;"></i></span>
                            <p class="paragraph">Fully Airconditioned room with a Queen Size Bed</p>
                            <p class="paragraph">Breakfast Meal Included</p>
                            <a href="bookroom.php?Id=1&rId=1" class="btn rooms-btn">Book now &rrarr;</a>
                        </div>
                    </div>

                    <div class="grid-item featured-room">
                        <div class="image-wrap">
                            <img class="room-image" src="./images/suite.jpg" alt="">
                            <h5 class="room-name">Suite Villa</h5>
                        </div>
                        <div class="room-info-wrap">
                            <span class="room-price">P 3,200 <span class="pernight">Per Night</span>
                            <i class="fa-sharp fa-solid fa-person" style="color:red;"></i>
                            <i class="fa-sharp fa-solid fa-person" style="color:red;"></i></span>
                            <p class="paragraph">Fully Airconditioned room with a King Size Bed</p>
                            <p class="paragraph">Breakfast Meal Included</p>
                            <a href="bookroom.php?Id=2&rId=4" class="btn rooms-btn">Book now &rrarr;</a>
                        </div>
                    </div>

                    <div class="grid-item featured-room">
                        <div class="image-wrap">
                            <img class="room-image" src="./images/mini dorm.jpg" alt="">
                            <h5 class="room-name">Mini Dorm</h5>
                        </div>
                        <div class="room-info-wrap">
                            <span class="room-price">P 3,000 <span class="pernight">Per Night</span>
                            <i class="fa-sharp fa-solid fa-person" style="color:red;"></i>
                            <i class="fa-sharp fa-solid fa-person" style="color:red;"></i>
                            <i class="fa-sharp fa-solid fa-person" style="color:red;"></i>
                            <i class="fa-sharp fa-solid fa-person" style="color:red;"></i></span>
                            <p class="paragraph">Fully Airconditioned room with 2 Bunk Beds</p>
                            <p class="paragraph">Breakfast Meal Included</p>
                            <a href="bookroom.php?Id=3&rId=7" class="btn rooms-btn">Book now &rrarr;</a>
                        </div>
                    </div>

                    <div class="grid-item featured-room">
                        <div class="image-wrap">
                            <img class="room-image" src="./images/room_8.jpg" alt="">
                            <h5 class="room-name">Standard</h5>
                        </div>
                        <div class="room-info-wrap">
                            <span class="room-price">P 2,500 <span class="pernight">Per Night</span>
                            <i class="fa-sharp fa-solid fa-person" style="color:red;"></i>
                            <i class="fa-sharp fa-solid fa-person" style="color:red;"></i></span>
                            <p class="paragraph">Fully Airconditioned room with 2 Single Beds</p>
                            <p class="paragraph">Breakfast Meal Included</p>
                            <a href="bookroom.php?Id=4&rId=10" class="btn rooms-btn">Book now &rrarr;</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>





</main>

<?php include 'themes/footer.php'; ?>