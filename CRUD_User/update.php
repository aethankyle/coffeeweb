<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$userID = $Fname = $Lname= $username = $password = $email= $phonenum = "";
$userID_err = $Fname_err = $Lname_err = $username_err = $password_err = $email_err = $phonenum_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

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
        // Prepare an update statement
        $sql = "UPDATE tbluser SET `USER_ID`=?, `FNAME`=?, `LNAME`=?, `USERNAME`=?, `PASSWORD`=?, `EMAIL`=?, `PHONE_NUM`=? WHERE ORDER_ID = $user_id";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "isssss", $param_Fname, $param_Lname, $param_username, $param_password, $param_email, $param_phonenum);
            
            $param_Fname = $Fname;
            $param_Lname = $Lname;
            $param_username = $username;
            $param_password = $password;
            $param_email= $email;
            $param_phonenum = $phonenum;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: index.php");
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
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM tbluser WHERE `USER_ID` = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $userID = $row['USER_ID'];
                    $Fname = $row['FNAME'];
                    $Lname = $row['LNAME'];
                    $username = $row['USERNAME'];
                    $password = $row['PASSWORD'];
                    $email = $row['EMAIL'];
                    $phonenum = $row['PHONE_NUM'];

                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the order record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
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
                            <button type="submit" value="Submit" class="btn btn-warning btn-lg ms-2">Submit form</button>
                            <a href="home.php" class="btn btn-secondary ml-2">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>