<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$prodid = $prodname = $proddesc  = $prodcost = "";
$prodid_err = $prodname_err = $proddesc_err =  $prodcost_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
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
    if(empty($prodid_err) && empty($proddesc_err) && empty($prodname_err) && empty($prodcost_err)) {
        // Prepare an update statement
        $sql = "UPDATE tblproduct SET PRODUCT_ID=?, PRODUCT_NAME=?, PRODUCT_DESC=?, PRODUCT_COST=? WHERE PRODUCT_ID=$prodid";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_prodid, $param_prodname , $param_proddesc, $param_prodcost);
            
            $param_prodid = $prodid;
            $param_prodname = $prodname;
            $param_proddesc = $proddesc;
            $param_prodcost = $prodcost;
            
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
        $sql = "SELECT * FROM tblproduct WHERE PRODUCT_ID = ?";
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
                    $prodid = $row['PRODUCT_ID'];
                    $prodname = $row['PRODUCT_NAME'];
                    $proddesc = $row['PRODUCT_DESC'];
                    $prodcost = $row['PRODUCT_COST'];

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
                    <p>Please edit the input values and submit to update the product record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <input type="hidden" name="prodid" value="<?php echo $prodid; ?>">
                            <label>Product Id</label>
                            <label type="text" name="prodid" class="form-control <?php echo (!empty($prodid_err)) ? 'is-invalid' : ''; ?>"> <?php echo $prodid; ?></label>
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