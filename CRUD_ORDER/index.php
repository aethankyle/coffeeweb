<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">ORDERS</h2>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM tblorder";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>ORDER_ID</th>";
                                        echo "<th>Date</th>";
                                        echo "<th>Time</th>";
                                        echo "<th>PRODUCT_ID</th>";
                                        echo "<th>PRODUCT_Price</th>";
                                        echo "<th>QUANTITY</th>";
                                        echo "<th>CUSTOMER_ID</th>";
                                        echo "<th>EMPLOYEE_ID</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['ORDER_ID'] . "</td>";
                                        echo "<td>" . $row['DATE'] . "</td>";
                                        echo "<td>" . $row['TIME'] . "</td>";
                                        echo "<td>" . $row['PRODUCT_ID'] . "</td>";
                                        echo "<td>" . $row['PRODUCT_COST'] . "</td>";
                                        echo "<td>" . $row['QUANTITY'] . "</td>";
                                        echo "<td>" . $row['CUSTOMER_ID'] . "</td>";
                                        echo "<td>" . $row['EMP_ID'] . "</td>";
                                        echo "<td>";
                                            echo '<a href="read.php?id='. $row['ORDER_ID'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                    <a href="../Admin_Index/index.php" class="btn btn-success pull-right"><i class="fa"></i> Go back</a>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>