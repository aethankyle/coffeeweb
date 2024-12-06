<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "config.php";
	
    
    // Prepare a select statement
    $sql = "SELECT * FROM tblproduct WHERE PRODUCT_ID = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_id);
		//echo "Hello";
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
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
                // URL doesn't contain valid id parameter. Redirect to error page
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
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
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
                    <h1 class="mt-5 mb-3">Create Record</h1>
                    <div class="form-group">
                        <label>Product Id</label>
                        <p><b><?php echo $row['PRODUCT_ID']; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Product Name</label>
                        <p><b><?php echo $row['PRODUCT_NAME']; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Product Desc</label>
                        <p><b><?php echo $row['PRODUCT_DESC']; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Product Cost</label>
                        <p><b><?php echo $row['PRODUCT_COST']; ?></b></p>
                    </div>
                    <a href="../Admin_Index/index.php" class="btn btn-success pull-right"><i class="fa"></i> Go back</a>
                </div>
            </div>        
        </div>
    </div>
    
</body>
</html>