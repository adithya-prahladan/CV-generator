
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Sentra HTML CSS Template</title>
        
<!-- 

Sentra Template

http://www.templatemo.com/tm-518-sentra

-->
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/fontAwesome.css">
        <link rel="stylesheet" href="css/light-box.css">
        <link rel="stylesheet" href="css/owl-carousel.css">
        <link rel="stylesheet" href="css/templatemo-style.css">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

<body>
        <div class="page-content">
            <section id="featured" class="content-section">
                <div class="section-heading">
                    <h1>CV <br><em>Templates</em></h1>
                    <p>Select the template for
                    <br>showcasing you to the world</p>
                </div>
                <div class="section-content">
                    <div class="owl-carousel owl-theme">
                        <div class="item">
                            <div class="image">
                                <img src="img/img1.png" alt="">
                                <div class="featured-button button">
                                    <a href="../createcv.php?temp=1">Create now</a>
                                </div>
                            </div>
                            <div class="text-content">
                                <h4>Template 1</h4>
                            </div>
                        </div>
                        <div class="item">
                            <div class="image">
                                <img src="img/img2.png" alt="">
                                <div class="featured-button button">
                                    <a href="../createcv1.php?temp=2">Create now</a>
                                </div>
                            </div>
                            <div class="text-content">
                                <h4>Template 2</h4>
                            </div>
                        </div>
                        <div class="item">
                            <div class="image">
                                <img src="img/img3.png" alt="">
                                <div class="featured-button button">
                                    <a href="../createcv2.php?temp=3">Create now</a>
                                </div>
                            </div>
                            <div class="text-content">
                                <h4>Template 3</h4>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>
        </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="js/vendor/bootstrap.min.js"></script>
    
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

    <script>
        // Hide Header on on scroll down
        var didScroll;
        var lastScrollTop = 0;
        var delta = 5;
        var navbarHeight = $('header').outerHeight();

        $(window).scroll(function(event){
            didScroll = true;
        });

        setInterval(function() {
            if (didScroll) {
                hasScrolled();
                didScroll = false;
            }
        }, 250);

        function hasScrolled() {
            var st = $(this).scrollTop();
            
            // Make sure they scroll more than delta
            if(Math.abs(lastScrollTop - st) <= delta)
                return;
            
            // If they scrolled down and are past the navbar, add class .nav-up.
            // This is necessary so you never see what is "behind" the navbar.
            if (st > lastScrollTop && st > navbarHeight){
                // Scroll Down
                $('header').removeClass('nav-down').addClass('nav-up');
            } else {
                // Scroll Up
                if(st + $(window).height() < $(document).height()) {
                    $('header').removeClass('nav-up').addClass('nav-down');
                }
            }
            
            lastScrollTop = st;
        }
    </script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>

</body>
</html>