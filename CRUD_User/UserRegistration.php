<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$userID = $Fname = $Lname= $username = $password = $email= $phonenum = "";
$userID_err = $Fname_err = $Lname_err = $username_err = $password_err = $email_err = $phonenum_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $input_Fname = trim($_POST["Fname"]);
    if(empty($input_Fname)){
       $Fname_err = "Please enter your First name.";
    } else{
        $Fname = $input_Fname;
    }
    // Validate First name
    $input_Fname = trim($_POST["Fname"]);
    if(empty($input_Fname)){
        $Fname_err = "Please enter your First name.";
    } else{
        $Fname = $input_Fname;
    }
      // Validate Last name
    $input_Lname = trim($_POST["Lname"]);
    if(empty($input_Lname)){
        $Lname_err = "Please enter your Last name.";
    } else{
        $Lname = $input_Lname;
    }
   
    // Validate username
    $input_username= trim($_POST["username"]);
    if(empty($input_username)){
        $username_err = "Please enter username.";     
    } else{
        $username = $input_username;
    }
    // Validate password
    $input_password= trim($_POST["password"]);
    if(empty($input_password)){
        $password_err = "Please enter your password.";     
    } else{
        $password = md5($input_password);
    }
     // Validate email
    $input_email= trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter e-mail.";     
    } else{
        $email = $input_email;
    }
     // Validate phone number
    $input_phonenum= trim($_POST["phonenum"]);
    if(empty($input_phonenum)){
        $phonenum_err = "Please enter Phone Number.";     
    } else{
        $phonenum = $input_phonenum;
    }
    
    // Check input errors before inserting in database
    if(empty($Fname_err)  && empty($Lname_err)  && empty($username_err)  && empty($password_err)  && empty($email_err)&& empty($phonenum_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO tbluser( FNAME, LNAME, USERNAME, PASSWORD, EMAIL, PHONE_NUM) VALUES (?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_Fname, $param_Lname, $param_username, $param_password, $param_email, $param_phonenum);
            
            // Set parameters
            $param_Fname = $Fname;
            $param_Lname = $Lname;
            $param_username = $username;
            $param_password = $password;
            $param_email= $email;
            $param_phonenum = $phonenum;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                echo "<script>alert('You have successfully registered');</script>";
                header("location: login.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link href="css/mdb.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
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

                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                        <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign up Form</h3>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                <input name="Fname" type="text" id="form3Example1m" class="form-control form-control-lg  <?php echo (!empty($Fname_err)) ? 'is-invalid' : ''; ?>"><?php echo $Fname; ?>
                                <span class="invalid-feedback"><?php echo $Fname_err;?></span>
                                <label class="form-label" for="form3Example1m">First name</label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                <input name="Lname" type="text" id="form3Example1n" class="form-control form-control-lg <?php echo (!empty($Lname_err)) ? 'is-invalid' : ''; ?>"><?php echo $Lname; ?>
                                <span class="invalid-feedback"><?php echo $Lname_err;?></span>
                                <label class="form-label" for="form3Example1n">Last name</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-outline mb-4">
                            <input name="username" type="text" id="form3Example8" class="form-control form-control-lg <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>"><?php echo $username; ?>
                            <span class="invalid-feedback"><?php echo $username_err;?></span>
                            <label class="form-label" for="form3Example8">Username</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input name="password" type="password" id="form3Example8" class="form-control form-control-lg <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>"><?php echo $password; ?>
                            <span class="invalid-feedback"><?php echo $password_err;?></span>
                            <label class="form-label" for="form3Example8">Password</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input name="email" type="text" id="form3Example8" class="form-control form-control-lg <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>"><?php echo $email; ?>
                            <span class="invalid-feedback"><?php echo $email_err;?></span>
                            <label class="form-label" for="form3Example8">Email</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input name="phonenum" type="text" id="form3Example8" class="form-control form-control-lg <?php echo (!empty($phonenum_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phonenum; ?>">
                            <label class="form-label" for="form3Example8">Phone Number</label>
                        </div>
                        <div class="d-flex justify-content-end pt-3">
                            <button type="reset" class="btn btn-light btn-lg">Reset all</button>
                            <a href="home.php" class="btn btn-secondary ml-2">Cancel</a>
                            <button type="submit" value="Submit" class="btn btn-warning btn-lg ms-2">Submit form</button>
                        </div>


                        </form>

                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    
</body>
</html>