<?php
    // Include the header file
    include("includes/header.php");
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Book</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add New Book
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">

                            <!-- Form for adding a new book, with error handling -->
                            <form role="form" action="process_book_add.php" method="post" enctype="multipart/form-data">

                                <!-- Input field for Book Name -->
                                <div class="form-group">
                                    <label>Book Name</label>
                                    <?php
                                        // Display error message if book name validation fails
                                        if(isset($_SESSION['error']['bnm']))
                                        {
                                            echo '<p class="error">'.$_SESSION['error']['bnm'].'</p>';
                                        } 
                                    ?>
                                    <input type="text" name="bnm" class="form-control">
                                </div>

                                <!-- Dropdown for selecting Book Category -->
                                <div class="form-group">
                                    <label>Book Category</label>
                                    <select name="cat" class="form-control">
                                        <?php
                                            // Include database connection
                                            include("../includes/connection.php");

                                            // Fetch and display book categories from the database
                                            $cq = "SELECT * FROM category";
                                            $result = $link->query($cq);
                                            while($row = $result->fetch_assoc())
                                            {
                                                echo '<option value="'.$row['cat_id'].'">'.$row['cat_nm'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>

                                <!-- Textarea for Book Description -->
                                <div class="form-group">
                                    <label>Description</label>
                                    <?php
                                        // Display error message if description validation fails
                                        if(isset($_SESSION['error']['desc']))
                                        {
                                            echo '<p class="error">'.$_SESSION['error']['desc'].'</p>';
                                        }
                                    ?>
                                    <textarea name="desc" rows="3" class="form-control"></textarea>
                                </div>

                                <!-- Input field for Book Price -->
                                <div class="form-group">
                                    <label>Price</label>
                                    <?php
                                        // Display error message if price validation fails
                                        if(isset($_SESSION['error']['price']))
                                        {
                                            echo '<p class="error">'.$_SESSION['error']['price'].'</p>';
                                        } 
                                    ?>
                                    <input type="text" name="price" class="form-control">
                                </div>

                                <!-- Input field for uploading Book Image -->
                                <div class="form-group">
                                    <label>Book Image</label>
                                    <?php
                                        // Display error message if image validation fails
                                        if(isset($_SESSION['error']['b_img']))
                                        {
                                            echo '<p class="error">'.$_SESSION['error']['b_img'].'</p>';
                                        } 
                                    ?>
                                    <input type="file" name="b_img" class="form-control">
                                </div>

                                <!-- Buttons to submit the form and reset input fields -->
                                <button type="submit" class="btn btn-default">Add Book</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                            </form>

                            <?php
                                // Unset error session variable after displaying error messages
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
    // Include the footer file
    include("includes/footer.php");
?>
