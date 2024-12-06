<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$prodid = $prodname = $proddesc  = $prodcost = "";
$prodid_err = $prodname_err = $proddesc_err =  $prodcost_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate product id
    $input_prodid = trim($_POST["prodid"]);
    if(empty($input_prodid)){
        $prodid_err = "Please enter product id.";     
    } else{
        $prodid = $input_prodid;
    }

    // Validate product name
    $input_prodname = trim($_POST["prodname"]);
     if(empty($input_prodname)){
        $prodname_err = "Please enter product name.";     
    } else{
        $prodname = $input_prodname;
    }
    
    // Validate product desc
    $input_proddesc = trim($_POST["proddesc"]);
    if(empty($input_proddesc)){
        $proddesc_err = "Please enter product name.";
    } else{
        $proddesc = $input_proddesc;
    }
    
    // Validate product cost
    $input_prodcost = trim($_POST["prodcost"]);
    if(empty($input_prodcost)){
        $prodcost_err = "Please enter product cost.";     
    } else{
        $prodcost = $input_prodcost;
    }
    
    // Check input errors before inserting in database
    if(empty($prodid_err) && empty($proddesc_err) && empty($prodname_err) && empty($prodcost_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO tblproduct (PRODUCT_ID, PRODUCT_NAME, PRODUCT_DESC, PRODUCT_COST) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_prodid, $param_prodname , $param_proddesc, $param_prodcost);
            
            // Set parameters
            $param_prodid = $prodid;
            $param_prodname = $prodname;
            $param_proddesc = $proddesc;
            $param_prodcost = $prodcost;
            
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
                    <p>Please fill this form and submit to add product to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Product Id</label>
                            <input type="text" name="prodid" class="form-control <?php echo (!empty($prodid_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $prodid; ?>">
                            <span class="invalid-feedback"><?php echo $prodid_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Prod Name</label>
                            <textarea name="prodname" class="form-control <?php echo (!empty($prodname_err)) ? 'is-invalid' : ''; ?>"><?php echo $prodname; ?></textarea>
                            <span class="invalid-feedback"><?php echo $prodname_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Product Description</label>
                            <input type="text" name="proddesc" class="form-control <?php echo (!empty($proddesc_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $proddesc; ?>">
                            <span class="invalid-feedback"><?php echo $proddesc;?></span>
                        </div>
                        <div class="form-group">
                            <label>Cost</label>
                            <input type="text" name="prodcost" class="form-control <?php echo (!empty($prodcost_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $prodcost; ?>">
                            <span class="invalid-feedback"><?php echo $prodcost_err;?></span>
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