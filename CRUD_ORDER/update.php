<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$order_id = $product_id = $prod_cost = $quantity = $custid = $empid = $quantity = $empid = "";
$orderid_err = $productid_err = $prodcost_err= $quantity_err = $custid_err = $empid_err = $date_err = $time_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

    $input_orderid = trim($_POST["order_id"]);
    if(empty($input_orderid)){
        $orderid_err = "Please enter order id.";     
    } else{
        $order_id = $input_orderid;
    }

    // Validate Employee type
    $input_date = trim($_POST["order_date"]);
     if(empty($input_date)){
        $date_err = "Please enter date.";     
    } else{
        $order_date = $input_date;
    }
    
    // Validate Employee First Name
    $input_time = trim($_POST["order_time"]);
    if(empty($input_time)){
        $time_err = "Please enter time.";
    } else{
        $order_time = $input_time;
    }
     //Validate Order
     $input_orderid = trim($_POST["order_id"]);
     if(empty($input_orderid)){
         $orderid_err = "Please enter the order id.";
     } elseif(!preg_match("/^(ORD)([0-9]{3})$/", $input_orderid)){
         $orderid_err = "ORDER ID is invalid (ORD###)";
     }else{
         $order_id = $input_orderid;
     } 
     
     //Validate Product ID
     $input_productid = trim($_POST["product_id"]);
     if(empty($input_productid)){
         $productid_err = "Please enter the product id.";
     } else{
         $query_prod = "SELECT * FROM tblproduct WHERE PRODUCT_ID = '{$input_productid}'";
         $res_prod = mysqli_query($link, $query_prod);
         if(mysqli_num_rows($res_prod) > 0) {
             $product_id = $input_productid;
         }else 
         {
             $productid_err = "Product id doesnt exist. <p>Answer the form first <a href=\"..\..CRUD_CUSTOMER.php\">Answer the form</a> </p>";
         }
     }
 
     //Validate Price
     $input_prodcost = trim($_POST["prod_cost"]);
     if(empty($input_prodcost)){
         $prodcost_err = "Please enter price.";     
     } else{
         $query_cost = "SELECT PRODUCT_COST FROM tblproduct WHERE PRODUCT_ID = '{$input_productid}' AND PRODUCT_COST = '{$input_prodcost}'";
         $res_cost = mysqli_query($link, $query_cost);
         if(mysqli_num_rows($res_cost) > 0) {
             $prod_cost = $input_prodcost;
         }
         else {
             $prodcost_err = "The price for the product is invalid.";
         }
     }
 
     // Validate Quantity
     $input_quantity = trim($_POST["quantity"]);
     if(empty($input_quantity)){
         $quantity_err = "Please enter the quantity.";
     } else{
         $quantity = $input_quantity;
     }
 
     // Validate Customer
     $input_custid = trim($_POST["custid"]);
     if(empty($input_custid)){
         $custid_err = "Please enter the customer id.";
     } else{
         $query_cust = "SELECT * FROM tblcustomer WHERE CUSTOMER_ID = '{$input_custid}'";
         $res_cust = mysqli_query($link, $query_cust);
         if(mysqli_num_rows($res_cust) > 0) {
             $custid = $input_custid;
         }else 
         {
             $custid_err = "Customer id doesnt exist. <p>Answer the form first <a href=\"..\..CRUD_CUSTOMER.php\">Answer the form</a> </p>";
         }
     }
 
     // Validate Employee
     $input_empid = trim($_POST["empid"]);
     if(empty($input_empid)){
         $empid_err = "Please enter the employee id.";
     } else{
         $query_emp = "SELECT * FROM tblemployee WHERE EMP_ID = '{$input_empid}'";
         $res_emp = mysqli_query($link, $query_emp);
         if(mysqli_num_rows($res_emp) > 0) {
         $empid = $input_empid;
         }
         else 
         {
             $empid_err = "Employee id doesnt exist.";
         }
     }
    
    // Check input errors before inserting in database
    if(empty($orderid_err) && empty($date_err) && empty($time_err) && empty ($orderid_err) && empty($prodcost_err) && empty($productid_err) && empty($quantity_err) && empty($custid_err) && empty($empid_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO tblorder (ORDER_ID, PRODUCT_ID, CUSTOMER_ID, EMP_ID, PRODUCT_COST, QUANTITY, DATE, TIME) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssdiss", $param_orderid, $param_date, $param_time, $param_orderid, $param_prodcost, $param_productid, $param_quantity, $param_custid, $param_empid);
            
            // Set parameters
            $param_orderid = $order_id;
            $param_date = $order_date;
            $param_time = $order_time;
            $param_productid = $product_id;
            $param_prodcost = $prod_cost;
            $param_quantity = $quantity;
            $param_custid = $custid;
            $param_empid = $empid;
            
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
        $sql = "SELECT * FROM tblorder WHERE ORDER_ID = ?";
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
                    $order_id = $row['ORDER_ID'];
                    $order_date = $row['ORDER_DATE'];
                    $order_time = $row['ORDER_TIME'];
                    $product_id = $row['PRODUCT_ID'];
                    $quantity = $row['QUANTITY'];
                    $custid = $row['CUSTOMER_ID'];
                    $empid = $row['EMP_ID'];

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
                        <div class="form-group">
                            <label>Order Id</label>
                            <label class="form-control <?php echo (!empty($orderid_err)) ? 'is-invalid' : ''; ?>"><?php echo $order_id; ?></label>
                            <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
                            <span class="invalid-feedback"><?php echo $orderid_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" name="date" class="form-control <?php echo (!empty($date_err)) ? 'is-invalid' : ''; ?>"><?php echo $date; ?>
                            <span class="invalid-feedback"><?php echo $date_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Time</label>
                            <input type="time" name="time" class="form-control <?php echo (!empty($time_err)) ? 'is-invalid' : ''; ?>"><?php echo $time; ?>
                            <span class="invalid-feedback"><?php echo $time_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Product Id</label>
                            <input type="text" name="product_id" class="form-control <?php echo (!empty($productid_err)) ? 'is-invalid' : ''; ?>"><?php echo $product_id; ?>
                            <span class="invalid-feedback"><?php echo $productid_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Product Cost</label>
                            <input type="text" name="prod_cost" class="form-control <?php echo (!empty($prodcost_err)) ? 'is-invalid' : ''; ?>"><?php echo $prod_cost; ?>
                            <span class="invalid-feedback"><?php echo $prodcost_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Quantity</label>
                            <input type="text" name="quantity" class="form-control <?php echo (!empty($quantity_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $quantity; ?>">
                            <span class="invalid-feedback"><?php echo $quantity_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Customer Id</label>
                            <input type="text" name="custid" class="form-control <?php echo (!empty($custid_err)) ? 'is-invalid' : ''; ?>"><?php echo $custid; ?>
                            <span class="invalid-feedback"><?php echo $custid_err;?></span>
                        </div>          
                        <div class="form-group">
                            <label>Employee Id</label>
                            <input type="text" name="empid" class="form-control <?php echo (!empty($empid_err)) ? 'is-invalid' : ''; ?>"><?php echo $empid; ?>
                            <span class="invalid-feedback"><?php echo $empid_err;?></span>
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