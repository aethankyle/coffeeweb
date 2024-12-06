<!DOCTYPE html>
<html>
<head>
    <title>Log-in Page</title>
    <link href="css/mdb.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>

    <?php
        include 'config.php';
        session_start(); 
        if (isset($_POST['username'])) 
        {
            $username = stripslashes($_REQUEST['username']);
            $username = mysqli_real_escape_string($link, $username);
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($link, $password);
            
            $query = "SELECT * FROM admin WHERE username='$username' and password='$password'";
            $result = mysqli_query($link, $query) or die(mysqli_error($link, $query));

            $rows = mysqli_num_rows($result);

            if ($rows == 1) {
                $_SESSION['username'] = $username;
                header("Location: index.php");
            } else {
                echo "<script>alert('Username/password is incorrect');</script>";
                echo "<script>window.location.href = 'login.php'</script>";
            }

        }
        else
        {
     ?>
    <section class="vh-100" style="background-color: #DCD1C3;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                <div class="row g-0">
                    <div class="col-md-6 col-lg-5 d-none d-md-block">
                    <img src="Pictures/roased.jpg"
                        alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                    </div>
                    <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">

                        <form method="post" action="">

                        <div class="d-flex align-items-center mb-3 pb-1">
                            <img src="Pictures/logo1.png" alt="picture" height="20%" width="20%">
                            <span class="h1 fw-bold mb-0">Coffee Web Admin</span>
                        </div>

                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                        <div class="form-outline mb-4">
                            <input name="username" type="text" id="form2Example17" class="form-control form-control-lg"  />
                            <label class="form-label" for="form2Example17">User Name</label>
                        </div>

                        <div class="form-outline mb-4">
                            <input name="password" type="password" id="form2Example27" class="form-control form-control-lg"  />
                            <label class="form-label" for="form2Example27">Password</label>
                        </div>

                        <div class="pt-1 mb-4">
                            <button class="btn btn-dark btn-lg btn-block" type="submit" name="submit" value="Login">Login</button>
                        </div>

                        <a class="small text-muted" href="../FINAL PHP/home.php">Go Back</a>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    <?php 
    }
     ?>
</body>
</html>