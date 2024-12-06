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
        <a href="index.php"><img src="Pictures/logo1.png" width="120px" height="120px" style="margin-left: 30px;"></a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item active">
              <a class="nav-link" href="../CRUD_Product/index.php">DBPRODUCT <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../CRUD_Employee/index.php">DBEMPLOYEE</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../CRUD_Customer/index.php">DBCUSTOMER</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../CRUD_ORDER/index.php">ORDERS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../CRUD_User/index.php">DBUSER</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../CRUD_Payment/index.php">DBPAYMENT</a>
              </li>
              <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout <?php echo $_SESSION['username']; ?></a>
              </li>
              
          </ul>
        </div>
    </nav>
    </section>

  
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
        margin-left: 10px;
        margin-right: 10px;
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

    </style>

 </body>
 </html>