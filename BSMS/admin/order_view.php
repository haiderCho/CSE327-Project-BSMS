<?php
    // Include the header file to maintain a consistent layout
    include("includes/header.php");

    // Include the database connection file
    include("../includes/connection.php");
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">View Orders</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Order List
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <!-- Table to display order data -->
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Zip Code</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Mobile No</th>
                                    <th>Order Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    // Fetch order data from the database and display it in the table
                                    $sql = "SELECT * FROM `order`";
                                    $order_res = $link->query($sql);
                                    $count = 1;

                                    while ($order_row = $order_res->fetch_assoc()) {
                                        echo '<tr class="odd gradeX">
                                                <td>' . $count . '</td>
                                                <td>' . $order_row['o_name'] . '</td>
                                                <td>' . $order_row['o_address'] . '</td>
                                                <td>' . $order_row['o_pincode'] . '</td>
                                                <td>' . $order_row['o_city'] . '</td>
                                                <td>' . $order_row['o_state'] . '</td>
                                                <td>' . $order_row['o_mobile'] . '</td>
                                                <td>' . @date("d-M-y", $order_row['c_time']) . '</td>
                                              </tr>';
                                        $count++;
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /#page-wrapper -->

    <?php
        // Include the footer file to close the HTML structure
        include("includes/footer.php");
    ?>
