<?php 
include 'authenticate.php';
 ?>

 <!DOCTYPE html>
 <html>
 <head>
     <title>Coffee Web </title>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet"/>
        <script src="https://kit.fontawesome.com/15960c0aaf.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel=”stylesheet” href=”https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css”rel=”nofollow” integrity=”sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm” crossorigin=”anonymous”>
        

 </head>
 <body>

 <section>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light" style="background-color: #DEDEDE;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a href="index.php"><img src="Pictures/logo1.png" width="120px" height="120px"></a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="location.php">Location</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="menu.php">Menu</a>
              </li>
              <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout <?php echo $_SESSION['username']; ?></a>
              </li>
              
          </ul>
        </div>
    </nav>
    </section>

    <section>
        <div class="header">
            <div class="bg">
                <div class="content1">
                </div>
            </div>
        </div>  
    </section>
    <section>
        <div class="bg2">
            <div class="content2">
                <h1>
                    THE FRESH COFFEE IN TOWN IS NOW SERVING
                </h1>
            
                <div class="videobg">
                    <video width="720" height="540" autoplay="autoplay" loop>
                        <source src="Pictures/barista.mp4" type="video/mp4">
                        <source src="Pictures/barista.oog" type="video/oog">
                        Your browser does not support the video tag.
                    </video>

                    <audio autoplay>
                        <source src="sound.mp3" type="audio/mp3">
                        <source src="sound.mpeg" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="offer container-fluid my-5 py-5 text-center position-relative overlay-top overlay-bottom">
            <div class="container py-5">
                <h1 class="text-white mb-3">Discover the true hand brewed coffee</h1>
                <h4 class="text-white font-weight-normal mb-4 pb-3">Come and Visit Us</h4>
                <a href="location.php" class="btn btn-primary font-weight-bold py-2 px-4 mt-2">Learn More</a>
            </div>
        </div>
    </section>
    <section>
        <div class="bg3">
            <div class="container-fluid py-5">
                <div class="container">
                    <div class="section-title">
                        <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">About Us</h4>
                        <h1 class="display-4">Serving Since 2024</h1>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 py-0 py-lg-5">
                            <h1 class="mb-3">Our Story</h1>
                            <h5 class="mb-3">Coffee Web was built in 2001 where every classic coffee happens here. We started on a small business place in the culinary capital of the Philippines, Angeles City. We strive hard to dedicate our passion to making coffee and serving people wholeheartedly. Since then, the Cafe is now operating for almost 20 years and has many branches around the Philippines. We made this far because of the love and support of our beloved customers.</p>
                            <a href="about.php" class="btn btn-secondary font-weight-bold py-2 px-4 mt-2">Learn More</a>
                        </div>
                        <div class="col-lg-4 py-5 py-lg-0" style="min-height: 500px;">
                            <div class="position-relative h-100">
                                <img class="position-absolute w-100 h-100" src="Pictures/coffee1.png" style="object-fit: cover;">
                            </div>
                        </div>
                        <div class="col-lg-4 py-0 py-lg-5">
                            <h1 class="mb-3">Our Vision</h1>
                            <p>Our vision is to be a world-class and even better Café, serving more customers around the world delicious coffee, pastry, and pasta.</p>
                            <h5 class="mb-3"><i class="fa fa-check text-primary mr-3"></i>Lorem ipsum dolor sit amet</h5>
                            <h5 class="mb-3"><i class="fa fa-check text-primary mr-3"></i>Lorem ipsum dolor sit amet</h5>
                            <h5 class="mb-3"><i class="fa fa-check text-primary mr-3"></i>Lorem ipsum dolor sit amet</h5>
                            <a href="about.php" class="btn btn-primary font-weight-bold py-2 px-4 mt-2">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <hr>
        <div class="row2">
            <div class="col">
            <img src="Pictures/logo1.png" class="logo">
            
            <p> <i class="fa-solid fa-location-pin"></i>#1 HOLY ANGEL ST.
                ANGELES PAMPANGA, 2009
            </p>
            <div class="underline"><span></span></div></h3>
            <p><i class="fa-solid fa-calendar"></i>MON - FRI : 6:00AM - 9:00PM<br/>
                SAT - SUN : 6:00AM - 12:00AM
            </p>
            </div>
            <div class="col">
            </div>
            <div></div>
            <div class="col"><br><br><br><br/><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <p><i class="fa-solid fa-mobile"></i>09179875651
                </p>
                <div class="underline"><span></span></div>
                <p><i class="fa-solid fa-phone"></i>094-589-566
                </p>
                <i class="fab fa-facebook"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-instagram"></i>
                </div>
            </div>
        </div>
        <hr/>
        <div>
            <p class="copyright">	
            &#9749;COFFEE WEB 2024&#169; All rights reserved</p>
    </footer>
</body>
</section>
<style>
    body{
        background-color: #ffff;
    }
    .navbar .navbar-nav .nav-link {
        color: #000000;
        font-size: 15px;
        margin-top: 17px;
        margin-left: 70px;
        margin-right: 70px;
    }

    .navbar-logo-centered .navbar-nav .nav-link{
        padding: .3em .6em .8em;
    }
    a{
        font-family: 'Enriqueta', arial, serif;
        text-transform: uppercase;
        text-decoration: none;
        color: rgb(255, 255, 255);
        transition: 0.5s all ease;
        position: relative;
      }
      ul li a::after{
        content: '';
        position: absolute;
        width: 100%;
        height: 0.175rem;
        bottom: 0;
        left: 0;
        background: goldenrod;
      }

      ul li a::after{
        transform: scale(0,1);
        transition: transform 0.3s ease;
      }

      ul li a:hover::after{
        transform: scale(1,1);
      }

      ul li{
        float: left;
        padding: 0px 40px;
        list-style: none;
        justify-content: space-around;
        margin: auto;
      }
        
      ul li a:hover{
        color: goldenrod;
        transition: 0.5s;
      }

    .header{
        background-image:url(Pictures/wallpaper1.png);
        background-position: center;
        background-size:cover ;
        background-repeat: no-repeat;
        height: 110vh;
    }

    .content2{
        background-color: #ffff;
        height: 100vh;

    }
    .content2 h1{
        padding-top: 10%;
        text-align: center;
    }

    .videobg video{
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
    .bg3{
        background-color: #fff;
        height: 100vh;
    }
    .my-3 {
        margin-bottom: 1rem !important;
    }
    h4, .font-weight-medium {
        font-weight: 500 !important;
        text-align: center;
    }
    .container h1{
        text-align: center;
    }
    .offer {
        background: linear-gradient(rgba(51, 33, 29, 0.9), rgba(51, 33, 29, 0.9)), url(Pictures/bg.jpg);
        background-position: top;
        background-repeat: no-repeat;
        background-size: cover;
    }
    .overlay-top::before,
    .overlay-bottom::after {
        position: absolute;
        content: "";
        width: 100%;
        height: 15px;
        left: 0;
        z-index: 1;
    }
    .overlay-top::before {
        top: -1px;
        background: url(Pictures/overlay-top.png);
    }

    .overlay-bottom::after {
        bottom: -1px;
        background: url(Pictures/overlay-bottom.png);
    }
    .container{
        margin-top: 50px;
    }
    footer {
        width: 100%;
        height: 60%;
        bottom: 0;
        background-color: #DEDEDE;
        color: brown;
        padding: 30px;
        font-size: 15px;
        line-height: 20px;
        }
    .row2 {
        width:50% ;
        margin: auto;
        display: flex;
        flex-wrap: wrap;
        align-items:flex-start ;
        justify-content: space-between;
    }
    .col {
        flex-basis: 25%;
        padding: 2px;
    
    }
    .col:nth-child(2), col:nth-child(3) {
        flex-basis: 15%;
    }
    .logo {
        width: 100%;
        height: 100%;
  

    }
    .col h3{
        width:  fit-content;
        margin-bottom: 40px;
        position: relative;
    }
    .fab{
        width: 30px;
        height: 40px;
        border-radius:50% ;
        text-align: center;
        line-height: 40px;
        font-size: 20px;
        color: #000;
        margin-right: 15px;
        cursor: pointer;
    }
    .row2 i {
        margin-right: 10px;
    }

    hr{
        width: 90%;
        border: 0;
        border-bottom:1px solid #ccc ;
        margin: 20px auto;
    }

    .copyright{
    text-align: center;
    }

    </style>

 </body>
 </html>