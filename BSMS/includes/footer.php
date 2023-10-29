<div id="sidebar">
    <?php
    // Check if a client is logged in
    if(isset($_SESSION['client']['status'])) {
        echo '<ul>
                <li>
                    <h2>Hi : '.$_SESSION['client']['unm'].'</h2>
                    <ul>
                        <li><a href="logout.php">Log Out</a></li>
                    </ul>
                </li>
            </ul>';
    }
    ?>

    <ul>
        <li>
            <h2>Category</h2>
            <ul>
                <?php
                // Include database connection
                include("includes/connection.php");

                // Query to fetch categories from the database
                $sql = "SELECT * FROM category ORDER BY cat_nm ASC";
                $cat_res = $link->query($sql);

                // Loop through categories and display them as links
                while($row = $cat_res->fetch_assoc()) {
                    echo '<li><a href="book_list.php?id='.$row['cat_id'].'&cat='.$row['cat_nm'].'">'.$row['cat_nm'].'</a></li>';
                }
                ?>
            </ul>
        </li>
    </ul>
</div>
<!-- end #sidebar -->
<div style="clear: both;">&nbsp;</div>
</div>
<!-- end #page -->
<div id="footer">
    <p>&copy; <?php echo date("Y"); ?>. All rights reserved.</p>
</div>
<!-- end #footer -->
</body>
</html>
