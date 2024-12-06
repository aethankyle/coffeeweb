<?php 
include 'authenticate.php';
 ?>
<html lang="en">
<head>
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

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>J.D.Q. Restaurant | Location </title>
    
</head>
<link rel="stylesheet" href="Location_styletext.css">
<link rel="stylesheet" href="Location_layout.css">
<body>
<section>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light" style="background-color: #DEDEDE;">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
          <a href="index.php "><img src="Pictures/logo1.png" width="120px" height="120px"></a>
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="location.php">Location</a>
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
        <div class="main">
            <div class="header">
              <div class="row-shop">
                <div class="column-shop">
                  <img src="Pictures/shop1.jpg" alt="shop1" style="width:100%">
                </div>
                <div class="column-shop">
                  <img src="Pictures/shop2.jpg" alt="shop2" style="width: 100%">
                </div>
              </div>
            </div>
          </div>
    </section>

    <section>
          <div class="location">	
            <br>
            <br>
            <br>
            <hr style="width:60%;text-align:center;" color="#2e1308">
            <br>
            <br>
            <br>
            <h2>
              FIND US
            </h2>
            <br/>
    
    
            <br/>
            <br/>
            <br>
            <div class="map">
              <center>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3851.459702161025!2d120.58781695026546!3d15.133077989413355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3396f24ec2f5a1f9%3A0x5e0af8a6aaab2282!2sHoly%20Angel%20University!5e0!3m2!1sen!2sph!4v1634319011085!5m2!1sen!2sph" width="1200" height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" loading="lazy">
              </iframe>
              </center>
            </div>
    
            <br>
            <br>
            <br>
            <hr style="width:60%;text-align:center;" color="#2e1308">
            
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
    </div>
  </footer>

    
</body>

<style>
    body{
    font-family:Georgia, 'Times New Roman', Times, serif;
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
}
nav{
    width: 100%;
    height: 80px;
    line-height:60px ;
    display:flex;
    justify-content: space-between;
    }

    .navbar.custom-nav {
    letter-spacing: 6px;
    position: fixed;
    z-index: 9999;
    top: 0;
    transition: all 0.4s ease-in-out;
    background-color: #5e3219;
    letter-spacing: 6px;
    }

.row-shop {
  display: flex;
}

.column-shop {
  flex: 33.33%;
  padding: 0px;
}

map {
  width: 100%;
  height: 10000px;
  flex: 50%;
  
}
.loc{
  background: url(white.jpg);
  background-size: cover;
}

map iframe{
  width: 100%;
  height: 100px;
}


table{
  text-align: center;
  size: 100px;
}

label td{
  background-color: rgb(245, 208, 116);
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


h2{
  text-align: center;
  font-size: 30px;
  color: #5e3219;
  justify-content: space-around;
  margin: auto;
}

h3{
  color:#5e3219;
  text-align: center;
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
</html>