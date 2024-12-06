<?php 
include 'authenticate.php';
 ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Web | About Us </title>
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
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
          <a href="index.php"><img src="Pictures/logo1.png" width="120px" height="120px"></a>
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="location.php">Location</a>
          </li>
          <li class="nav-item active">
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
      <div class="main">
        <div class="header">
          <div class="bg">
            <div class="content">
              <h1>
                About Us 
              </h1>
              <p>Coffee Web was built in 2024 where every classic coffee happens here. We started on a small business place in the culinary capital of the Philippines, Angeles City. We strive hard to dedicate our passion to making coffee and serving people wholeheartedly.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="mission" id="mission">
      <div class="infoBx">
        <h2>Mission</h2>
        <p>
          Our Mission is to provide the world's best freshly roasted coffee, pastry, 
          and pasta to our customers while providing excellent service at a price that 
          is fair to both the producers and our customers.</p>
      </div>
      <div class="infoBx">
        <h2>Vision</h2>
        <p>Our vision is to be a world-class and even better Café, serving more customers 
          around the world delicious coffee, pastry, and pasta.</p>
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
          <p><i class="fa-solid fa-mobile"></i>09994135210
          </p>
          <div class="underline"><span></span></div>
            <p><i class="fa-solid fa-phone"></i>09994135210
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
      </div>
    </footer>

    <style>
      body{
        font-family:Georgia, 'Times New Roman', Times, serif;
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
      }

      .navbar.custom-nav {
        letter-spacing: 6px;
      }
      nav{
        width: 100%;
        height: 80px;
        line-height:60px ;
        display:flex;
        justify-content: space-between;
      }
      
      a{
        font-family: 'Enriqueta', arial, serif;
        font-size: 15px;
        font-weight: 550;
        text-transform: uppercase;
        text-decoration: none;
        color: rgb(255, 255, 255);
        transition: 0.5s all ease;
        position: relative;
      }
      .sign {
        padding: 10px;
        padding-left: 50px;
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
        
      .navbar.custom-nav {
        position: fixed;
        z-index: 9999;
        top: 0;
        transition: all 0.4s ease-in-out;
        background-color: #5e3219;
        letter-spacing: 6px;
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

      .content{
        background-size: cover;
        border: 4px solid #d7b17e;
        padding: 10px 25 px;
        border-radius: 6px;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
      }

      address {
        clear: both;
        width: 100%;
        height: 8vh;
      }
        
      .menu_items{
        min-height: 100vh;
        width: 100%;
      }
      .menu_items .itemBx{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
      }
      .menu_items .itemBx .box{
        margin-left: 50px;
        margin-top: 50px; 
        border-radius: 10px;
        height: 250px;
        width: 500px;
        display: flex;
      }
          
      .menu_items .itemBx .box img{
        height: 100px;
        width: 100px;
        object-fit: cover;
        border-radius: 10px;
        margin: 10px;
      }

      .header{
        background-image:url(Pictures/wallpaper1.jpg);
        background-position: center;
        background-size:cover ;
        background-repeat: no-repeat;
        height: 95vh;
      }

      .content{
        position: absolute;
        color:white;
        text-align: center;
      }
      .content h1{
          font-size: 50px;
          bottom: 0;
      }

      h1{
          text-align: center;
      }
      .content p{
          bottom: 0;
          padding: 0px 100px;
          font-size: 20px;
          
      }

      .box p{
          text-align: center;
      }
          
      .bg{
          background: rgba(0,0,0,0.5);
          height: 95vh;
      
      }

      .mission{
          width: 100%;
          min-height: 100vh;
          display: flex;
          justify-content: space-around;
          align-items: center;
      }
      .mission .infoBx{
        max-width: 400px;
      }
      .mission .infoBx h2{
        font-size: 2.5em;
      }
      .mission .infoBx p{
        font-size: 1.5em;
      }

      .mission img{
        width: 500px;
        object-fit: cover;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
      }

      .menu_items h2{
        color: white;
      }
      .menu_items{
        background-image:url(Pictures/wp.jpg);
        background-position: center;
        background-size:cover ;
        background-repeat: no-repeat;
        height: 95vh;
      }

      .menu_items .itemBx .box{
        background: #fff;
        justify-content: center;
        align-items: center;
              
      }

      .menu_items .itemBx .box .infobx h4{
        font-size: 1.5em;
      }
      .menu_items .itemBx .box .infobx p{
        font-size: 0.8em;
      }
      .menu_items .itemBx .box .infobx h5{
        font-size: 1.3em;
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