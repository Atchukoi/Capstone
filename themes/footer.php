<footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-content-brand">
                    <a href="index.html" class="logo">
                        <img src="./images/top_icon.png" alt="">
                    </a>
                    <div class="paragraph">
                        <p><strong>Location:</strong> Daramuangan Norte, San Mateo, Isabela
                        <p>
                        <p><strong>Phone #</strong> 0917-5500-399
                        <p>
                        <p><strong>Tel #</strong> (078)- #### - ###
                        <p>
                    </div>
                </div>
                <div class="social-media-wrap">
                    <h4 class="footer-heading">Follow Us</h4>
                    <div class="social-media">
                        <a href="#" class="sm-link"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.facebook.com/LaPerfectaCafeRestaurant" class="sm-link" target="_blank"><i class="fab fa-facebook-square"></i></a>
                        <a href="#" class="sm-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="sm-link"><i class="fab fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="container" style="margin:auto;">
        <iframe class="cl " src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3817.664884643442!2d121.59860655054811!3d16.892464088319944!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x338fff9f14748611%3A0xa603ad73275123dd!2sLa%20Perfecta%20Convention%20Center%2C%20Villas%20%26%20Resort!5e0!3m2!1sen!2sph!4v1666061026217!5m2!1sen!2sph" width="900px" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        </div> -->
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="main.js"></script>
    <script type="text/javascript">
        var counter = 1;
        setInterval(function() {
            document.getElementById('radio' + counter).checked = true;
            counter++;
            if (counter > 4) {
                counter = 1;
            }
        }, 3000);
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        var owl = $(".owl-carousel");
        owl.owlCarousel({
            items: 3,
            margin: 10,

            /*
            loop: true,
            nav: true,
            navText: ["Prev", "Next"],
            dotsEach: true,
            autoplay: true,
            autoplayTimeout: 1000,
            autoplayHoverpause: true,
            */

            responsive: {
                0: {
                    items: 2,
                    margin: 5,
                },
                600: {
                    items: 3,
                    margin: 10,
                },
                1000: {
                    items: 5,
                    margin: 20,
                },
            },
        });
    </script>
</body>

</html>