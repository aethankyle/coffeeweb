<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$order_id = $payid = $paytype = $total = "";
$orderid_err = $payid_err = $paytype_err = $total_err = "";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate payment id
    $input_payid = trim($_POST["payid"]);
    if(empty($input_payid)){
        $payid_err = "Please enter payment id.";     
    } elseif(!preg_match("/^(P)([0-9]{3})$/", $input_payid)){
        $payid_err = "PAYMENT ID is invalid (PAY###)";
    }else{
        $payid = $input_payid;
    } 

    // Validate oder id
    $input_orderid = trim($_POST["orderid"]);
     if(empty($input_orderid)){
        $orderid_err = "Please enter order id.";     
    } elseif(!preg_match("/^(O)([0-9]{3})$/", $input_orderid)){
        $orderid_err = "ORDER ID is invalid (ORD###)";
    }else{
        $query_ord = "SELECT * FROM tblorder WHERE ORDER_ID = '{$input_orderid}'";
        $res_ord = mysqli_query($link, $query_ord);
        if(mysqli_num_rows($res_ord) > 0) {
            $order_id = $input_orderid;
        }else 
        {
            $orderid_err = "Order doesnt exist. <p>shop first! <a href=\"..\..CRUD_CUSTOMER.php\">Answer the form</a> </p>";
        }
    }
    
    // Validate pay type
    $input_paytype = trim($_POST["paytype"]);
    if(empty($input_paytype)){
        $paytype_err = "Please enter payment type.";
    } else{
        $paytype = $input_paytype;
    }

    // Validate total
    $input_total = trim($_POST["total"]);
    if(empty($input_total)){
        $total = "Please enter product cost.";     
    } else{
        $req_sql = "SELECT * FROM  tblorder WHERE order_id = '{$input_orderid}'" ;
        $query = mysqli_query($link, $req_sql);
        if(mysqli_num_rows($query) > 0){
            $que = mysqli_query($link, "SELECT PRODUCT_COST * QUANTITY AS total FROM tblorder WHERE ORDER_ID = '{$order_id}'"); 
            $row = mysqli_fetch_assoc($que);
            $sum = $row['total'];
            if($input_total!= $sum){
                $total_err = "The Total Amount is " . $sum . ".";
            }
            else {
                $total = $input_total;
            }
        }
        else {
            $total_err = "The amount is incorrect.";
        }
    }

    
    // Check input errors before inserting in database
    if(empty($orderid_err) && empty($payid_err) && empty($paytype_err) && empty($total_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO tblpayment (PAYMENT_ID, ORDER_ID, PAYMENT_TYPE, TOTAL) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssd", $param_payid, $param_orderid , $param_paytype, $param_total);
            
            // Set parameters
            $param_payid = $payid;
            $param_orderid = $order_id;
            $param_paytype = $paytype;
            $param_total = $total;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: ../USER_INDEX/index.php");
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
                            <label>Payment ID</label>
                            <input type="text" placeholder="P###" name="payid" class="form-control <?php echo (!empty($payid_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $payid; ?>">
                            <span class="invalid-feedback"><?php echo $payid_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>Order ID</label>
                            <input type="text" placeholder="O###" name="orderid" class="form-control <?php echo (!empty($orderid_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $order_id; ?>">
                            <span class="invalid-feedback"><?php echo $orderid_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Mode of Payment</label>
                            <select name="paytype" class="form-control <?php echo (!empty($paytype_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $paytype_err; ?>">
                                <option value="Credit Card">Credit Card</option>
                                <option value="Debit Card">Debit Card</option>
                            </select>
                            <span class="invalid-feedback"><?php echo $paytype_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>Total</label>
                            <input type="text" name="total" class="form-control <?php echo (!empty($total_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $total; ?>">
                            <span class="invalid-feedback"><?php echo $total_err;?></span>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../User_Index/menu.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>