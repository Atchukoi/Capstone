<?php
include 'themes/navbar.php';
include 'config.php';
session_start();

if (isset($_POST['functionhall'])) {


  if (isset($_SESSION['Guest']) && !empty($_SESSION['Guest'])) {
    header("Location: bookhall.php?Id=1");
  } else {
    echo "<script>alert('Please Login before you can book a reservation.')</script>";
  } 
}

if (isset($_POST['ballroom'])) {


  if (isset($_SESSION['Guest']) && !empty($_SESSION['Guest'])) {
    header("Location: bookhall.php?Id=3");
  } else {
    echo "<script>alert('Please Login before you can book a reservation.')</script>";
  } 
}



?>


<main>



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
            <form method="POST">
              <button type="submit" name="functionhall" class="btn rooms-btn">Book now &rrarr;</button>
            </form>
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
            <form method="POST">
            <button type="submit" name="ballroom" href="bookhall.php?Id=3" class="btn rooms-btn">Book now &rrarr;</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
    </div>
  </section>

  <section class="booking">
    <div class="container">
      <form action="#" class="book-form">
        <div class="input-group">
          <label for="destination" class="input-label">Type of Hall </label>
          <select class="options" id="hall">
            <option value="1">Function Hall</option>
            <option value="2">Ballroom Hall</option>
          </select>
        </div>
        <div class="input-group">
          <label for="check-in" class="input-label">check-in</label>
          <input type="date" class="input" id="check-in">
        </div>

        <button type="submit" class="btn form-btn btn-purple">Search
          <span class="dots"><i class="fas fa-ellipsis-h"></i></span>
          </span>
        </button>
      </form>
    </div>
  </section>

  <!-- table for price
        <table>
          <tr>
            <th>Rental Description</th>
            <th>Price</th>
          </tr>
          <tr>
            <td>High Quality Sound System</td>
            <td>₱ 1,500</td>
          </tr>
          <tr>
            <td>Evening Even or Full Lights</td>
            <td>₱ 1,000</td>
          </tr>
          <tr>
            <td>Moving Lights / Pc</td>
            <td>₱ 1,500</td>
          </tr>
          <tr>
            <td>Projector</td>
            <td>₱ 2,000</td>
          </tr>
          <tr>
            <td>Stage Basic Decorations</td>
            <td>₱ 10,000</td>
          </tr>
          <tr>
            <td>Stage Decorations with Theme / Motif</td>
            <td>₱ 12,000</td>
          </tr>
          <tr>
            <td>Venue Basic Decorations</td>
            <td>₱ 15,000</td>
          </tr>
          <tr>
            <td>Venue Decorations</td>
            <td>₱ 20,000</td>
          </tr>
          <tr>
            <td>Venue Full Decorations</td>
            <td>₱ 30,000</td>
          </tr>
          <tr>
            <th colspan="2">Others</th> 
          </tr>
          <tr>
            <td>Fully Furnished Round Table</td>
            <td>₱ 50 / pc</td>
          </tr>
          <tr>
            <td>Round Table with Cloth</td>
            <td>₱ 40 / pc</td>
          </tr>
          <tr>
            <td>Rectangular Table with Cloth</td>
            <td>₱ 40 / pc</td>
          </tr>
          <tr>
            <td>Tiffany Chair (Gold / Silver) with Foam</td>
            <td>₱ 50 / pc</td>
          </tr>
        </table>
        -->

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
            <img class="room-image" src="./images/package4.jpg" alt="">
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

  <!-- <section class="offer">
    <div class="container">
      <div class="offer-content">
        <div class="discount">
          40% off
        </div>
        <h5 class="hotel-name">The Paradise</h5>
        <div class="hotel-rating">
          <i class="fas fa-star rating"></i>
          <i class="fas fa-star rating"></i>
          <i class="fas fa-star rating"></i>
          <i class="fas fa-star-half rating"></i>
        </div>
        <p class="paragraph">
          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem, obcaecati ab ducimus laboriosam et eos, minima, ipsa.
        </p>
        <a href="#" class="btn btn-gradient">Redeem offer
          <span class="dots"><i class="fas fa-ellipsis-h"></i></span>
        </a>
      </div>
    </div>
    </div>
  </section> -->

</main>

<?php include 'themes/footer.php'; ?>