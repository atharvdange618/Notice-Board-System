<?php
include('connection.php');
session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css" />
    <script src="js/jquery_library.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <title>Homepage | Notice Board System</title>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-default navbar-fixed-top" style="background:#000">
        <div class="container">

            <ul class="nav navbar-nav navbar-left">
                <li><a href="index.php"><strong>Notice Board System</strong></a></li>


                <li><a href="index.php?option=about"><span class="glyphicon glyphicon-user"></span> About</a></li>



                <li><a href="index.php?option=contact"><span class="glyphicon glyphicon-phone"></span>Contact</a></li>

            </ul>


            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php?option=New_user"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="index.php?option=login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>



        </div>
    </nav>


    <!-- Carousel -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="notice.jpg" alt="Image 1">
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <!-- container -->
            <div class="col-md-8">
                <?php
                $opt = $_GET['option'] ?? ''; // PHP 7 null coalescing operator

                if (!empty($opt)) {
                    if ($opt == "about") {
                        include('about.php');
                    } else if ($opt == "contact") {
                        include('contact.php');
                    } else if ($opt == "New_user") {
                        include('registration.php');
                    } else if ($opt == "login") {
                        include('login.php');
                    } else {
                        echo "<h2><b>'WELCOME USER TO OUR ONLINE NOTICE BOARD'</b></h2>
                              <em><b>Join us today and get connected. Register now to get each and every update of your college!</b></em>";
                    }
                } else {
                    echo "<h2><b>'WELCOME USER TO OUR ONLINE NOTICE BOARD'</b></h2>
                          <em><b>Join us today and get connected. Register now to get each and every update of your college!</b></em>";
                }
                ?>
            </div>
            <!-- container -->

            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>LATEST NEWS</b></div>
                    <div class="panel-body">
                        <ul id="noticesList"></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>