<?php

include("includes/header.php");

include("../includes/connection.php");
?>
    <div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">View Users</h1>
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
                        <table class="table table-striped table-bordered table-hover"
                               id="dataTables-example">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Register ID</th>
                                <th>Full Name</th>
                                <th>User Name</th>
                                <th>Contact No</th>
                                <th>E-Mail</th>
                                <th>Register Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $r_q = "select * from register";
                            $r_res = $link->query($r_q);
                            $count = 1;

                            while ($r_row = $r_res -> fetch_assoc()) {
                                echo '<tr class="odd gradeX">
                                         <td>'.$count.'</td>
                                         <td>'.$r_row['r_id'].'</td>
                                         <td>'.$r_row['r_fnm'].'</td>
                                         <td>'.$r_row['r_unm'].'</td>
                                         <td>'.'+880'.$r_row['r_cno'].'</td>
                                         <td>'.$r_row['r_email'].'</td>
                                         <td>'.@date(
                                        "d-M-y",
                                        $r_row['r_time']
                                    ).'</td>
                                                  <td align="center"><a style="color: red;" href="process_users_del.php?id='
                                    .$r_row['r_id'].'">X</a></td>
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