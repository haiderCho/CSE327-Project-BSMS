<?php
    // Include the header file to maintain a consistent layout
    include("includes/header.php");

    // Include the database connection file
    include("../includes/connection.php");
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <!-- Page title -->
            <h1 class="page-header">View Contact</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Contact List
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Mobile No</th>
                            <th>E-Mail Address</th>
                            <th>Message</th>
                            <th>Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                            // SQL query to fetch contact records from the database
                            $contact_query = "SELECT * FROM contact";

                            // Execute the query
                            $contact_result = $link->query($contact_query);

                            // Initialize a counter for listing the records
                            $count = 1;

                            // Loop through the results and display them in the table
                            while ($contact_row = $contact_result->fetch_assoc()) {
                                echo '<tr class="odd gradeX">
                                    <td>' . $count . '</td>
                                    <td>' . $contact_row['c_fnm'] . '</td>
                                    <td>' . $contact_row['c_mno'] . '</td>
                                    <td>' . $contact_row['c_email'] . '</td>
                                    <td>' . $contact_row['c_msg'] . '</td>
                                    <td>' . @date("d-M-y", $contact_row['c_time']) . '</td>
                                    <td align="center"><a style="color: red;" href="process_contact_del.php?id=' . $contact_row['c_id'] . '">x</a></td>
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
<!-- /#page-wrapper -->

<?php
    // Include the footer file to close the HTML structure
    include("includes/footer.php");
?>
