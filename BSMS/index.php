<?php
    // Include the header file (contains the HTML structure up to content area)
    include("includes/header.php");
?>

<div id="content">
    <div class="post">
        <h2 class="title"><a href="#">Latest Books</a></h2>
        <p class="meta"></p>
        <div class="entry">
            <?php
                // Include the database connection
                include("includes/connection.php");

                // SQL query to retrieve the latest 9 books from the database
                $sql = "SELECT * FROM book ORDER BY b_id DESC LIMIT 0,9";
                $result = $link->query($sql);

                // Loop through the fetched book records and display them
                while($row = $result->fetch_assoc()) {
                    echo '<div class="book_box">
                            <a href="book_detail.php?id='.$row['b_id'].'">
                                <img src="'.$row['b_img'].'">
                                <h2>'.$row['b_nm'].'</h2>
                                <p>BDT. '.$row['b_price'].'</p>
                            </a>
                        </div>';
                }
            ?>
            <div style="clear:both;"></div>
        </div>
    </div>
</div><!-- end #content -->

<?php
    // Include the footer file (closing HTML tags and JavaScript references)
    include("includes/footer.php");
?>
