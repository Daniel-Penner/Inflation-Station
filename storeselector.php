<?php
session_start();
date_default_timezone_set('Canada/Pacific');
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">

<head>
    <title>Stores - Inflation Station</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/indvproduct.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <!--Bootsrap 5-->
</head>

<body>
    <header>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="navborder">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light navround">
                            <div class="container-fluid">
                                <div class="navbar-nav">
                                    <?php
                                    if (isset($_SESSION['id'])) {
                                        echo '<a class="navbar-brand" href="profile.php">
                    <img src="data:image/jpeg;base64,' . base64_encode($_SESSION['pfp']) . '" alt="" width="30" height="30" style="border: 1px black solid; border-radius: 50%;">
                </a>';
                                    }
                                    ?>
                                    <a class="nav-link" href="index.php">Home</a>
                                    <a class="nav-link" href="about.php">About</a>
                                    <a class="nav-link" href="contact.php">Contact</a>
                                    <a class="nav-link" href="products.php">Products</a>
                                    <a class="nav-link" href="search.php">Explore</a>
                                    <?php
                                    if (isset($_SESSION['type'])) {
                                        echo '<a class="nav-link" style="color: rgb(232, 39, 39);" href="admindashboard.php">Admin</a>';
                                    }
                                    ?>
                                </div>
                                <form class="d-flex" action="products.php" method="get">
                                    <input class="form-control me-2" type="search" name="search" placeholder="Search"
                                        aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </form>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class=homehb>
            <h5 style="text-align:center; color:white; font-size:50px;">
                Select a Store
            </h5>
        </div>
    </header>
    <div class="container mt-5">
        <br><br><br><br><br><br>
    <a href="products.php"><button style="font-size:400%;" type="button" class="btn btn-success mx-2">Costco</button></a>
    <a href="products.php"><button style="font-size:400%;" type="button" class="btn btn-success mx-2">Walmart</button></a>
    <a href="products.php"><button style="font-size:400%;" type="button" class="btn btn-success mx-2">Safeway</button></a>
    <a href="products.php"><button style="font-size:400%;" type="button" class="btn btn-success mx-2">Superstore</button></a>
</div>
</body>

</html>