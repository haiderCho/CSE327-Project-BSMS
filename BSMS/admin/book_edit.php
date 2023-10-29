<?php
    // Include the header file to ensure consistency in the website layout
    include("includes/header.php");

    // Include the database connection file
    include("../includes/connection.php");

    // Fetch the book details based on the provided ID from the URL
    $cq = "SELECT * FROM book WHERE b_id=" . $_GET['id'];
    $res = mysql_query($cq, $link);
    $crow = mysql_fetch_assoc($res);
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Update Book</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit Book
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">

                            <!-- Form for updating book details with error handling -->
                            <form role="form" action="process_book_edit.php" method="post" enctype="multipart/form-data">

                                <!-- Hidden input field to store the book ID -->
                                <input type="hidden" name="id" value="<?php echo $crow['b_id']; ?>" />

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
                                    <input type="text" name="bnm" value="<?php echo $crow['b_nm'] ?>" class="form-control">
                                </div>

                                <!-- Dropdown for selecting Book Category -->
                                <div class="form-group">
                                    <label>Book Category</label>
                                    <select name="cat" class="form-control">
                                        <?php
                                            // Fetch and display book categories from the database
                                            $cq = "SELECT * FROM category";
                                            $cres = mysql_query($cq, $link);
                                            while($crow = mysql_fetch_assoc($cres))
                                            {
                                                echo '<option value="'.$crow['cat_id'].'">'.$crow['cat_nm'].'</option>';
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
                                    <textarea name="desc" rows="3" class="form-control">
                                        <?php echo $crow['b_desc'] ?>
                                    </textarea>
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
                                    <input type="text" name="price" value="<?php echo $crow['b_price'] ?>" class="form-control">
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

                                <!-- Button to submit the form and a link to exit without updating -->
                                <button type="submit" class="btn btn-default">Update Book</button>
                                <a href="book_view.php" class="btn btn-default">Exit</a>

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
    // Include the footer file to close the HTML structure
    include("includes/footer.php");
?>
