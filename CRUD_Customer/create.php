<?php

// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$custid = $custname = $custphone  = $custstreet = $custcity = $custzip = "";
$custid_err = $custname_err = $custphone_err  = $custstreet_err = $custcity_err = $custzip_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate Customer id
    $input_custid = trim($_POST["custid"]);
    if(empty($input_custid)){
        $custid_err = "Please enter customer id.";     
    } elseif(!preg_match("/^(CUS)([0-9]{3})$/", $input_custid)){
        $custid_err = "Customer ID is invalid (CUS###)";
    } else{  
        $query_cust = "SELECT * FROM tblcustomer WHERE CUSTOMER_ID = '{$input_custid}'";
        $res_cust = mysqli_query($link, $query_cust);
        if(mysqli_num_rows($res_cust) > 0) {
           $custid_err = "Customer Id is taken";
        }
        else {
            $custid = $input_custid;
        } 
    }
    // Validate Customer name
    $input_custname = trim($_POST["custname"]);
     if(empty($input_custname)){
        $custname_err = "Please enter customer name.";     
    } else{
        $custname = $input_custname;
    }
    
    // Validate Customer Phone Number
    $input_custphone = trim($_POST["custphone"]);
    if(empty($input_custphone)){
        $custphone_err = "Please enter Cust Phone.";  
    }$custphone = $input_custphone;
    
    // Validate Customer Street
    $input_custstreet = trim($_POST["custstreet"]);
    if(empty($input_custstreet)){
        $custstreet_err = "Please enter Customer Street.";     
    } else{
        $custstreet = $input_custstreet;
    }
    // Validate Customer City
    $input_custcity = trim($_POST["custcity"]);
    if(empty($input_custcity)){
        $custcity_err = "Please enter Customer City.";     
    } else{
        $custcity = $input_custcity;
    }
    
    // Validate Customer Zip
    $input_custzip = trim($_POST["custzip"]);
    if(empty($input_custzip)){
        $custzip_err = "Please enter Customer Zip.";     
    } else{
        $custzip = $input_custzip;
    }
    
    
    // Check input errors before inserting in database
    if(empty($custid_err) && empty($custname_err) && empty($custphone_err) && empty($custstreet_err) && empty($custcity_err) && empty($custzip_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO tblcustomer (CUSTOMER_ID, CUSTOMER_NAME, PHONE_NUM, STREET, CITY, ZIP) VALUES (?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_custid, $param_custname , $param_custphone, $param_custstreet, $param_custcity, $param_custzip);
            
            // Set parameters
            $param_custid = $custid;
            $param_custname = $custname;
            $param_custphone = $custphone;
            $param_custstreet = $custstreet;
            $param_custcity = $custcity;
            $param_custzip = $custzip;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: ../CRUD_ORDER/menu.php");
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
    <script src="js/mdb.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"
    ></script>
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
                    <img src="Pictures/roased.jpg" style="height: 100%"
                        alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                    </div>
                    <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">

                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                        <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Customer Form</h3>
                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Don't forget your CUSTOMER ID</h5>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                <span class="invalid-feedback"><?php echo $custid_err;?></span>
                                <input name="custid" placeholder="CUS###" type="text" id="form3Example1m" class="form-control form-control-lg  <?php echo (!empty($custid_err)) ? 'is-invalid' : ''; ?>"><?php echo $custid; ?>
                                <label class="form-label" for="form3Example1m">Customer ID (CUS###)</label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                <input name="custname" type="text" id="form3Example1n" class="form-control form-control-lg <?php echo (!empty($custname_err)) ? 'is-invalid' : ''; ?>"><?php echo $custname; ?>
                                <span class="invalid-feedback"><?php echo $custname_err;?></span>
                                <label class="form-label" for="form3Example1n">Customer name</label>
                                </div>
                             </div>
                        </div>
                        <div class="form-outline mb-4">
                            <input name="custphone" type="text" id="form3Example8" class="form-control form-control-lg <?php echo (!empty($custphone_err)) ? 'is-invalid' : ''; ?>"><?php echo $custphone; ?>
                            <span class="invalid-feedback"><?php echo $custphone_err;?></span>
                            <label class="form-label" for="form3Example8">Phone Number</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input name="custstreet" type="text" id="form3Example8" class="form-control form-control-lg <?php echo (!empty($custstreet_err)) ? 'is-invalid' : ''; ?>"><?php echo $custstreet; ?>
                            <span class="invalid-feedback"><?php echo $custstreet_err;?></span>
                            <label class="form-label" for="form3Example8">Street</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input name="custcity" type="text" id="form3Example8" class="form-control form-control-lg <?php echo (!empty($custcity_err)) ? 'is-invalid' : ''; ?>"><?php echo $custcity; ?>
                            <span class="invalid-feedback"><?php echo $custcity_err;?></span>
                            <label class="form-label" for="form3Example8">City</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input name="custzip" type="text" id="form3Example8" class="form-control form-control-lg <?php echo (!empty($custzip_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $custzip; ?>">
                            <label class="form-label" for="form3Example8">Zip</label>
                            <span class="invalid-feedback"><?php echo $custzip_err;?></span>
                        </div>
                        <p class="mb-5 pb-lg-2" style="color: #393f81;">all ready have customer number? <a href="../CRUD_ORDER/create.php"
                            style="color: #393f81;">Proceed to order</a></p>
                        <div class="d-flex justify-content-end pt-3">
                            <button type="reset" class="btn btn-light btn-lg">Reset all</button>
                            <a href="../User_Index/menu.php" class="btn btn-secondary ml-2">Cancel</a>
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