<?php
    session_start();

    // Redirect to login page if admin is not logged in
    if(!isset($_SESSION['admin']['status']))
    {
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bookstore Management System - Admin Panel</title>

    <!-- Core CSS - Include with every page -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Tables -->
    <link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <style type="text/css">
        .error {
            color: red;
        }
    </style>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation bar -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <!-- Navbar header -->
            <div class="navbar-header">
                <!-- Toggle button for collapsed navigation menu -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Brand/logo -->
                <a class="navbar-brand" href="index.php">Bookstore Management System</a>
            </div>
            <!-- /.navbar-header -->

            <!-- Top navigation menu -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- User dropdown menu -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <!-- Dropdown menu items -->
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a href="#">
                                <i class="fa fa-user fa-fw"></i>
                                <?php
                                    // Display the admin username
                                    echo $_SESSION['admin']['unm'];
                                ?>
                            </a>
                        </li>
                        <!-- <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a></li> -->
                        <li class="divider"></li>
                        <!-- Logout option -->
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <!-- Sidebar navigation menu -->
            <div class="navbar-default navbar-static-side" role="navigation">
                <!-- Sidebar collapse button -->
                <div class="sidebar-collapse">
                    <!-- Sidebar menu items -->
                    <ul class="nav" id="side-menu">

                        <!-- Category menu section -->
                        <li>
                            <a href="#">
                                <i class="fa fa-caret-down" aria-hidden="true"></i> Category<span class="fa arrow"></span>
                            </a>
                            <!-- Submenu items for Category -->
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="category_add.php">Add Category</a>
                                </li>
                                <li>
                                    <a href="category_view.php">View Category</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <!-- Book menu section -->
                        <li>
                            <a href="#">
                                <i class="fa fa-caret-down" aria-hidden="true"></i> Book<span class="fa arrow"></span>
                            </a>
                            <!-- Submenu items for Book -->
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="book_add.php">Add Book</a>
                                </li>
                                <li>
                                    <a href="book_view.php">View Book</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <!-- Orders menu section -->
                        <li>
                            <a href="#">
                                <i class="fa fa-caret-down" aria-hidden="true"></i> Orders<span class="fa arrow"></span>
                            </a>
                            <!-- Submenu items for Orders -->
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="order_view.php">View Orders</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <!-- Contact menu section -->
                        <li>
                            <a href="#">
                                <i class="fa fa-caret-down" aria-hidden="true"></i> Contact<span class="fa arrow"></span>
                            </a>
                            <!-- Submenu items for Contact -->
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="contact_view.php">View Contact</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <!-- Users menu section -->
                        <li>
                            <a href="#">
                                <i class="fa fa-caret-down" aria-hidden="true"></i> Users<span class="fa arrow"></span>
                            </a>
                            <!-- Submenu items for Users -->
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="Users_view.php">View Users</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                    </ul>
                    <!-- /#side-menu -->
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <!-- /.navbar -->
