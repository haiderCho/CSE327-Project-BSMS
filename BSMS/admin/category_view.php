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
            <h1 class="page-header">View Category</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Category List
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                            // SQL query to fetch category records from the database
                            $cat_query = "SELECT * FROM category";

                            // Execute the query
                            $cat_result = $link->query($cat_query);

                            // Initialize a counter for listing the records
                            $count = 1;

                            // Loop through the results and display them in the table
                            while ($cat_row = $cat_result->fetch_assoc()) {
                                echo '<tr class="odd gradeX">
                                          <td>' . $count . '</td>
                                          <td>' . $cat_row['cat_nm'] . '</td>
                                          <td align="center">
                                              <a style="color: green;" href="category_edit.php?id=' . $cat_row['cat_id'] . '">Edit</a> &nbsp;&nbsp;
                                              <a style="color: red;"  href="process_category_del.php?id=' . $cat_row['cat_id'] . '">Delete</a>
                                          </td>
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
