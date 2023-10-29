<?php
    // Include the header file to maintain a consistent layout
    include("includes/header.php");

    // Include the database connection file
    include("../includes/connection.php");

    // Get the category ID from the URL
    $id = $_GET['id'];

    // SQL query to fetch category details based on the provided ID
    $q = "SELECT * FROM category WHERE cat_id='$id'";
        
    // Execute the query
    $res = $link->query($q);

    // Fetch the category details
    $row = $res->fetch_assoc();
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <!-- Page title -->
            <h1 class="page-header">Update Category</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit Category
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">

                            <?php
                                // Check if there is a success message or error message to display
                                if(isset($_SESSION['done']))
                                {
                                    echo '<div class="msg msg-ok">
                                            <p><strong>'.$_SESSION['done'].'</strong></p>
                                            </div>';
                                    
                                    // Unset the session variable after displaying the message
                                    unset($_SESSION['done']);
                                }
                                else if(!empty($_SESSION['error']))
                                {
                                    // Loop through each error message and display it
                                    foreach($_SESSION['error'] as $er)
                                    {
                                        echo '<div class="msg msg-error error">
                                                <p><strong>'.$er.'</strong></p>
                                                </div>';
                                    }
                                    
                                    // Unset the session variable after displaying the messages
                                    unset($_SESSION['error']);
                                }
                            ?>

                            <form role="form" action="process_category_edit.php" method="post">

                                <div class="form-group">
                                    <label>New Name for Category</label>
                                    <input type="text" name="cat" value="<?php echo $row['cat_nm']; ?>"
                                        class="form-control">
                                </div>

                                <?php
                                    // Check if there is an error related to category name and display it
                                    if(isset($_SESSION['error']['cat']))
                                    {
                                        echo '<p class="error">'.$_SESSION['error']['cat'].'</p>';
                                    } 
                                ?>

                                <!-- Hidden input field to store the category ID -->
                                <input type="hidden" name="id" value="<?php echo $row['cat_id']; ?>" />

                                <!-- Submit and reset buttons -->
                                <button type="submit" class="btn btn-default">Update Category</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                            </form>

                            <?php
                                // Unset the session variable after displaying the error message
                                unset($_SESSION['error']);
                            ?>

                        </div>
                        <!-- /.col-lg-6 (nested) -->

                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

<?php
    // Include the footer file to close the HTML structure
    include("includes/footer.php");
?>
