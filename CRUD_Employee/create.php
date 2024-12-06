<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$empid = $empfname  = $emplname = $empphone = $empstreet = $empcity = $empzip = "";
$empid_err = $empfname_err  = $emplname_err = $empphone_err = $empstreet_err = $empcity_err = $empzip_err = "";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate Employee id
    $input_empid = trim($_POST["empid"]);
    if(empty($input_empid)){
        $empid_err = "Please enter customer id.";     
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
        // Prepare an insert statement
        $sql = "INSERT INTO tblemployee (EMP_ID, EMPF_NAME, EMPL_NAME, EMPPHONE_NUM, EMP_STREET, EMP_CITY, EMP_ZIP) VALUES ( ?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssss", $param_empid, $param_empfname, $param_emplname, $param_empphone, 
            $param_empstreet, $param_empcity, $param_empzip);
            
            // Set parameters
            $param_empid = $empid;
            $param_empfname = $empfname;
            $param_emplname = $emplname;
            $param_empphone = $empphone;
            $param_empstreet = $empstreet;
            $param_empcity = $empcity;
            $param_empzip = $empzip;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
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
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
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
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form and submit to add employee to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Employee Id</label>
                            <input type="text" name="empid" class="form-control <?php echo (!empty($empid_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $empid; ?>">
                            <span class="invalid-feedback"><?php echo $empid_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Employee First Name</label>
                            <input type="text" name="empfname" class="form-control <?php echo (!empty($empfname)) ? 'is-invalid' : ''; ?>" value="<?php echo $empfname; ?>">
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
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>