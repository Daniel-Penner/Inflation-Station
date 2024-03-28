<?php
session_start();

// Function to validate password using regex
function validatePassword($password) {     // Password pattern
    $pattern = '/^[a-zA-Z1-9!?]{5,30}$/';
    return preg_match($pattern, $password);
}
function validateFirstName($fname) {
    // first name pattern
    $pattern = '/^[A-Z][a-z]{0,39}$/';
    return preg_match($pattern, $fname);
}

function validateLastName($lname) {
    // last name pattern
    $pattern = '/^[A-Z][a-z]{0,39}$/';
    return preg_match($pattern, $lname);
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Home - Inflation Station</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--Bootstrap 5-->
</head>

<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (!empty($_POST['fname'])) {
            //validate attempted registeration
            if (!validatePassword($_POST['password'])) {
                echo "<script>alert('Password must be 5-30 characters long and contain only letters, digits 1-9, !, and ?')</script>";
                exit();
            } else if (!validateFirstName($_POST['fname'])) {
                echo "<script>alert('Email is invalid.')</script>";
                exit();
            } else if (!validateLastName($_POST['lname'])) {
                echo "<script>alert('Email is invalid.')</script>";
                exit();
            }

            try {
                $connectionString = "mysql:host=localhost;dbname=db_54925359";
                $username = "54925359";
                $password = "54925359";

                // Create connection
                $pdo = new PDO($connectionString, $username, $password);
                $existingEmail = false;
                $fileContent = file_get_contents($_FILES['pfp']['tmp_name']);
                $sql = "SELECT email FROM customer";
                $statement = $pdo->prepare($sql);
                $statement->execute();
                while ($row = $statement->fetch()) {
                    if ($_POST['email'] == $row['email']) {
                        $existingEmail = true;
                    }
                }
                if (!$existingEmail) {
                    echo "<script>alert('Your account has been successfully created!')</script>";
                    $sql = "INSERT INTO customer (fname, lname, email, password, profilePicture) VALUES (?,?,?,?,?)";
                    $statement = $pdo->prepare($sql);
                    $statement->bindValue(1, $_POST['fname']);
                    $statement->bindValue(2, $_POST['lname']);
                    $statement->bindValue(3, $_POST['email']);
                    $statement->bindValue(4, md5($_POST['password']));
                    $statement->bindParam(5, $fileContent, PDO::PARAM_LOB);
                    $statement->execute();
                }

            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
    }
    ?>
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
            <h5 style="text-align:center; color:white; font-size:50px;">Inflation Station</h5>
        </div>
    </header>
    <br>
    <?php
    if (!isset($_SESSION['id'])) {
        echo '<a href="login.php"><button type="button" style="font-size:150%;" class="btn btn-outline-secondary">Log in</button></a>';

    } else {
        echo '<a href="logout.php"><button type="button" style="font-size:150%;" class="btn btn-outline-secondary">Log out</button></a>';
    }
    ?>
    <br><br>
    <div class="container justify-content-center">
        <div class="row">
            <div class="col-3">
                <div class="sidecol">
                    <p style="font-size:25px; color:white;"><strong>Top Reviews</strong></p>
                    <hr style="color:white; height:8px;" />
                    <p>To be implemented in the final milestone.</p>
                </div>
            </div>
            <div class="col-6">
                <img src="images/grocery.jpeg" class="img2">
            </div>
            <div class="col-3">
                <div class="sidecol">
                    <p style="font-size:25px; color:white;"><strong>News</strong></p>
                    <hr style="color:white; height:8px;" />
                    <p>To be implemented in the final milestone.</p>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container-fluid">
        <div class="mx-auto hotcol">
            <div class="row justify-content-center mx-auto">
                <p style="font-size:25px; color:white;"><strong>Trending Products</strong></p>
                <hr style="color:white; height:8px;" />
                <?php
                // get products for home page
                try {
                    include 'dbonnection.php';
                    $sql = "SELECT * FROM product LIMIT 4;";
                    $statement = $pdo->prepare($sql);
                    $statement->execute();
                    while ($row = $statement->fetch()) {
                        echo $row['productId'];
                        echo '<img src="' . $row["productImageURL"] . '"/>';
                    }
                } catch (PDOException $e) {
                    die($e->getMessage());
                }


                ?>
                <p>Hi</p>
                <!--
                <div class="col-3">
                    <div class="itembox"></div>
                    <br>
                </div>
                <div class="col-3">
                    <div class="itembox"></div>
                    <br>
                </div>
                <div class="col-3">
                    <div class="itembox"></div>
                    <br>
                </div>
                <div class="col-3">
                    <div class="itembox"></div>
                    <br>
                </div>-->
            </div>
        </div>
    </div>
</body>

</html>