<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">

<head>
    <title>Profile - Inflation Station</title>
    <link rel="stylesheet" href="css/global.css">
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
                                    <a class="nav-link" href="products.php">Products</a>
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
            <h5 style="text-align:center; color:white; font-size:50px;">Profile</h5>
        </div>
    </header>
    <div class="container justify-content-center">
        <div class="row">
            <div class="col-8">
                <?php 
                    echo '<img src="data:image/jpeg;base64,'.base64_encode($_SESSION['pfp']).'" width="200rem" height="200rem" style="border: 1px black solid; border-radius: 50%; position: relative; top: 5rem;"/>';
                ?>
                    <!--Use user name from the database -->
                <h1 style="position: relative; left:15rem; bottom: 5rem;">Hi, <?php echo $_SESSION['fname']; ?>!</h1>
            </div>
        </div>
        <br><br>
        <form action="/action_page.php" id="form1">
            <label for="fname" class="form-label">First name</label>
            <!--Replace placeholder with user information from the database-->
            <input type="text" class="form-control" id="fname" name="fname" placeholder="Change First Name"><br>
            <label for="lname" class="form-label">Last name</label>
            <input type="text" class="form-control" id="lname" name="lname" placeholder="Change Last Name"><br>
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Change Email"><br>
            <label for="pass" class="form-label">Password</label>
            <input type="password" class="form-control" id="pass" name="pass" placeholder="Change Password">
            <div id="passHelp" class="form-text">
                Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces,
                special characters, or emoji.</div><br><br>
            <input type="submit" value="Save Changes" class="btn btn-success">
        </form>

    </div>
</body>

</html>