<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$empid = $empfname  = $emplname = $empphone = $empstreet = $empcity = $empzip = "";
$empid_err = $empfname_err  = $emplname_err = $empphone_err = $empstreet_err = $empcity_err = $empzip_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

    $input_empid = trim($_POST["empid"]);
    if(empty($input_empid)){
        $empid_err = "Please enter employee id.";     
    } else{
        $empid = $input_empid;
    }
    
    // Validate Employee First Name
    $input_empfname = trim($_POST["empfname"]);
    if(empty($input_empfname)){
        $empfname_err = "Please enter employee first name.";
    } else{
        $empfname = $input_empfname;
    }
    
    // Validate Employee Last Name
    $input_emplname = trim($_POST["emplname"]);
    if(empty($input_emplname)){
        $emplname_err = "Please enter employee last name.";     
    } else{
        $emplname = $input_emplname;
    }
    // Validate Employee Phone Number
    $input_empphone = trim($_POST["empphone"]);
    if(empty($input_empphone)){
        $empphone_err = "Please enter employee phone number.";     
    } else{
        $empphone = $input_empphone;
    }
    
     // Validate Employee Street
     $input_empstreet = trim($_POST["empstreet"]);
     if(empty($input_empstreet)){
         $empstreet_err = "Please enter employee street.";     
     } else{
         $empstreet = $input_empstreet;
     }
    // Validate Employee City
    $input_empcity = trim($_POST["empcity"]);
    if(empty($input_empcity)){
        $empcity_err = "Please enter employee city.";     
    } else{
        $empcity = $input_empcity;
    }
    // Validate Employee Zip
    $input_empzip = trim($_POST["empzip"]);
    if(empty($input_empzip)){
        $empzip_err = "Please enter employee Zip.";     
    } else{
        $empzip = $input_empzip;
    }
    
    
  
    
    // Check input errors before inserting in database
    if(empty($empid_err) && empty($empfname_err) && empty($emplname_err) && empty($empphone_err) && empty($empstreet_err) 
    && empty($empcity_err) && empty($empzip_err)){
        // Prepare an update statement
        $sql = "UPDATE tblemployee SET EMP_ID=?, EMPF_NAME=?, EMPL_NAME=?, EMPPHONE_NUM=?, EMP_STREET=?, EMP_CITY=?, EMP_ZIP=? WHERE EMP_ID= $empid";
       // $sql = "UPDATE tblproduct SET PRODUCT_ID=?, PRODUCT_NAME=?, PRODUCT_DESC=?, PRODUCT_COST=? WHERE PRODUCT_ID=$prodid";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssss", $param_empid , $param_empfname, $param_emplname, $param_empphone, 
            $param_empstreet, $param_empcity, $param_empzip);
            
            $param_empid = $empid;
            $param_empfname = $empfname;
            $param_emplname = $emplname;
            $param_empphone = $empphone;
            $param_empstreet = $empstreet;
            $param_empcity = $empcity;
            $param_empzip = $empzip;
            
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
        $sql = "SELECT * FROM tblemployee WHERE EMP_ID = ?";
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
                    $empid = $row['EMP_ID'];   
                    $empfname = $row['EMPF_NAME'];
                    $emplname = $row['EMPL_NAME'];
                    $empphone = $row['EMPPHONE_NUM'];
                    $empstreet = $row['EMP_STREET'];
                    $empcity = $row['EMP_CITY'];
                    $empzip = $row['EMP_ZIP'];
                    

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
                            <input type="hidden" name="empid" value="<?php echo $empid; ?>">
                            <label>Employee Id</label>
                            <label type="hidden" class="form-control <?php echo (!empty($empid_err)) ? 'is-invalid' : ''; ?>" > <?php echo $empid; ?></label>
                            <span class="invalid-feedback"><?php echo $empid_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Employee First Name</label>
                            <input type="text" name="empfname" class="form-control <?php echo (!empty($empfname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $empfname; ?>">
                            <span class="invalid-feedback"><?php echo $empfname_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Employee Last Name</label>
                            <input type="text" name="emplname" class="form-control <?php echo (!empty($emplname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $emplname; ?>">
                            <span class="invalid-feedback"><?php echo $emplname_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Employee Phone Number</label>
                            <input type="text" name="empphone" class="form-control <?php echo (!empty($empphone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $empphone; ?>">
                            <span class="invalid-feedback"><?php echo $empphone_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Street</label>
                            <input type="text" name="empstreet" class="form-control <?php echo (!empty($empstreet_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $empstreet; ?>">
                            <span class="invalid-feedback"><?php echo $empstreet_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" name="empcity" class="form-control <?php echo (!empty($empcity_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $empcity; ?>">
                            <span class="invalid-feedback"><?php echo $empcity_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Zip</label>
                            <input type="text" name="empzip" class="form-control <?php echo (!empty($empzip_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $empzip; ?>">
                            <span class="invalid-feedback"><?php echo $empzip_err;?></span>
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