<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$custid = $custname = $custphone  = $custstreet = $custcity = $custzip = "";
$custid_err = $custname_err = $custphone_err  = $custstreet_err = $custcity_err = $custzip_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

    //Validate Customer ID
    $input_custid = trim($_POST["custid"]);
    if(empty($input_custid)){
        $custid_err = "Please enter customer id.";     
    } else{
        $custid = $input_custid;
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
        $custphone_err = "Please enter product name.";
    } else{
        $custphone = $input_custphone;
    }
    
    // Validate Customer Street
    $input_custstreet = trim($_POST["custstreet"]);
    if(empty($input_custstreet)){
        $prodcost_custstreet = "Please enter Customer Street.";     
    } else{
        $custstreet = $input_custstreet;
    }
    // Validate Customer City
    $input_custcity = trim($_POST["custcity"]);
    if(empty($input_custcity)){
        $prodcost_custcity = "Please enter Customer City.";     
    } else{
        $custcity = $input_custcity;
    }
    
    // Validate Customer Zip
    $input_custzip = trim($_POST["custzip"]);
    if(empty($input_custzip)){
        $prodcost_custzip = "Please enter Customer Zip.";     
    } else{
        $custzip = $input_custzip;
    }
    
    
  
    
    // Check input errors before inserting in database
    if(empty($custid_err) && empty($custname_err) && empty($custphone_err) && empty($custstreet_err) && empty($custcity_err) && empty($custzip_err)) {
        // Prepare an update statement
        $sql = "UPDATE tblcustomer SET CUSTOMER_ID=?, CUSTOMER_NAME=?, PHONE_NUM=?, STREET=?, CITY=?, ZIP=? WHERE CUSTOMER_ID=$custid";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_custid, $param_custname , $param_custphone, $param_custstreet, $param_custcity, $param_custzip);
            
            $param_custid = $custid;
            $param_custname = $custname;
            $param_custphone = $custphone;
            $param_custstreet = $custstreet;
            $param_custcity = $custcity;
            $param_custzip = $custzip;
            
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
        $sql = "SELECT * FROM tblcustomer WHERE CUSTOMER_ID = ?";
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
                    $custid = $row['CUSTOMER_ID'];
                    $custname = $row['CUSTOMER_NAME'];
                    $custphone = $row['PHONE_NUM'];
                    $custstreet = $row['STREET'];
                    $custcity = $row['CITY'];
                    $custzip = $row['ZIP'];
                    

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
                    <p>Please edit the input values and submit to update the customer record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <input type="hidden" name="custid" value="<?php echo $custid; ?>">
                            <label>Customer ID</label>
                            <label type="text" name="custid" class="form-control <?php echo (!empty($custid_err)) ? 'is-invalid' : ''; ?>"> <?php echo $custid; ?></label>
                            <span class="invalid-feedback"><?php echo $custid_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Customer Name</label>
                            <textarea name="custname" class="form-control <?php echo (!empty($custname_err)) ? 'is-invalid' : ''; ?>"><?php echo $custname; ?></textarea>
                            <span class="invalid-feedback"><?php echo $custname_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" name="custphone" class="form-control <?php echo (!empty($custphone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $custphone; ?>">
                            <span class="invalid-feedback"><?php echo $custphone_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Street</label>
                            <input type="text" name="custstreet" class="form-control <?php echo (!empty($custstreet_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $custstreet; ?>">
                            <span class="invalid-feedback"><?php echo $custstreet_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" name="custcity" class="form-control <?php echo (!empty($custcity_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $custcity; ?>">
                            <span class="invalid-feedback"><?php echo $custcity_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Zip</label>
                            <input type="text" name="custzip" class="form-control <?php echo (!empty($custzip_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $custzip; ?>">
                            <span class="invalid-feedback"><?php echo $custzip_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>