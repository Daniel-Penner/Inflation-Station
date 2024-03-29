<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">

<head>
    <title>Contact - Inflation Station</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/contact.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
                                    if(isset($_SESSION['id'])) {
                                    echo '<a class="navbar-brand" href="profile.php">
                                        <img src="data:image/jpeg;base64,'.base64_encode($_SESSION['pfp']).'" alt="" width="30" height="30" style="border: 1px black solid; border-radius: 50%;">
                                    </a>';
                                    }
                                    ?>
                                    <a class="nav-link" href="index.php">Home</a>
                                    <a class="nav-link" href="about.php">About</a>
                                    <a class="nav-link" href="contact.php">Contact</a>
                                    <a class="nav-link" href="storeselector.php">Products</a>
                                    <a class="nav-link" href="search.php">Explore</a>
                                    <?php
                                    if(isset($_SESSION['type'])) {
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
            <h5 style="text-align:center; color:white; font-size:50px;">Contact Us</h5>
        </div>

    </header>
    <form method="GET" id="contactForm">
        <fieldset>
            <br>
            <div class="container-fluid">
                <div class="mx-auto hotcol">
                    <div class="row justify-content-center mx-auto">
                        <div class="col-4">
                            <label for="email">
                                <p style="font-size:30px;"><i>Email</i></p>
                            </label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email" required>
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-center mx-auto">
                        <div class="col-4">
                            <label for="msg">
                                <p style="font-size:30px;"><i>Message</i></p>
                            </label><br>
                            <textarea class="form-control" id="msg" rows="10" placeholder="How can we help?"
                                required></textarea><br><br>
                        </div>
                    </div>
                    <div class="row justify-content-center mx-auto">
                        <div class="d-grid gap-0 col-3 mx-auto">
                            <button class="btn btn-outline-success btn-block" id="submitButton">Submit</button>
                        </div>
                    </div>
                </div>

            </div>
            </div>
        </fieldset>
    </form>
</body>

</html>