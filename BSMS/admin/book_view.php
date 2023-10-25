<?php
    include("includes/header.php");

    include("../includes/connection.php");
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">View Book</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Book List
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Book Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Inventory</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                            $book_q = "SELECT * FROM book, category WHERE b_cat=cat_id";

                                            $book_res = $link->query($book_q);

                                            $count=1;

                                            while($row = $book_res -> fetch_assoc())
                                            {
                                                echo '<tr class="odd gradeX">
                                                          <td>'.$count.'</td>
                                                          <td>'.$row['b_nm'].'</td>
                                                          <td>'.$row['cat_nm'].'</td>
                                                          <td>'.$row['b_price'].'</td>';

                                                    echo "<td width='120'><center><img src='../$row[b_img]' width='100' height='100'></center>";
                                                      
                                                    echo '<td>'.$row['b_avl'].'</td>
                                                          <td align="center">
                                                            <a style="color: red;" href="process_book_del.php?id='.$row['b_id'].'">Remove</a></br>
                                                            <a style="color: green;" href="process_book_update.php?id='.$row['b_id'].'">Update</a>
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
        <!-- /.col-lg-12 -->

    </div>
    <!-- /#page-wrapper -->
    <?php
    include("includes/footer.php");
?>