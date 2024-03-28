<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard - Inflation Station</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--Bootstrap 5-->
</head>

<body>
    <?php
    try {
        include 'dbconnection.php';
        /*if (isset($_SESSION['type'])) { //check if admin
    
        } else { // if user is not admin
            header("Location: index.php");
            exit();
        }*/
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!empty($_POST['uuid'])) {

                $sql = "SELECT * FROM customer WHERE customerId=?";
                $statement = $pdo->prepare($sql);
                $statement->bindValue(1, $_POST['uuid']);
                $statement->execute();
                $row = $statement->fetch();

                if (count($row) > 0) {
                    $customerId = $row['customerId'];
                    $fname = $row['fname'];
                    $lname = $row['lname'];
                    $email = $row['email'];
                    $pass = $row['password'];
                    $customerType = $row['customerType'];
                    $profilePicture = $row['profilePicture'];
                    $isBanned = $row['isBanned'];
                } else {
                    echo '<br><div class="container">No users exist with that username.</div>';
                }

            } else {
                echo '<br><div class="container">Error: Empty user search entry.</div>';
            }
        }
    } catch (PDOException $e) {
        die($e->getMessage());
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
            <h5 style="text-align:center; color:white; font-size:50px;">Admin Dashboard</h5>
        </div>
    </header>
    <div class="container" style="text-align:left;">
        <form id="userSearch" action="admindashboard.php" method="POST">
            <label for="uuid" class="form-label mt-5">User Id</label>
            <input class="form-control" type="text" name="uuid" id="uuid" placeholder="UUID">
            <button class="btn btn-outline-success mt-3" type="submit">Search</button>
        </form>
    </div>



    <div class="container" style="text-align:left;">
        <div class="row">
            <div class="col-8">
                <?php
                echo '<img src="data:image/jpeg;base64,' . base64_encode($profilePicture) . '" width="200rem" height="200rem" style="border: 1px black solid; border-radius: 50%; position: relative; top: 5rem;"/>';
                ?>
                <!--Use user name from the database -->
                <h1 style="position: relative; left:15rem; bottom: 5rem;">Editing User:
                    <?php echo $fname;
                    echo " ";
                    echo $lname;
                    echo " ";
                    if ($isBanned == "true") {
                        echo '<span style="color:red;">[Banned]</span>';
                    }

                    ?>
                </h1>
            </div>
        </div>
        <br><br>
        <form action="account_change.php" id="accountChange" method="POST" enctype="multipart/form-data">
            <label for="profilePicture" class="form-label">Profile Picture</label><br>
            <input id="profilePicture" class="form-control" type="file" name="profilePicture" accept="image/jpeg" /><br>

            <input type='hidden' name='uuid' value="<?php echo $customerId; ?>">
            <!--customerId to be passed hidden to account_change to determine if its an admin or user request-->

            <label for="fname" class="form-label">First name</label>
            <input type="text" class="form-control" id="fname" name="fname" placeholder="First name"><br>

            <label for="lname" class="form-label">Last name</label>
            <input type="text" class="form-control" id="lname" name="lname" placeholder="Last name"><br>

            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="example@mail.com"><br>

            <label for="pass" class="form-label">Password</label>
            <input type="password" class="form-control" id="pass" name="pass" autocomplete="password"
                placeholder="Please enter your new password.">

            <div id="passHelp" class="form-text">
                Password must be 5-30 characters long and contain only letters, digits 1-9, !, and ?</div>
            <br>
            <br><br>
            <input style="text-align:right;" type="hidden" name="isBanned" id="isBanned" value="false">
            <!-- Hidden input field -->
            <?php
            if (!empty($_POST['uuid'])) {
                if ($isBanned == "true") {
                    echo '<button class="btn btn-lg btn-outline-danger" type="button" onclick="unbanUser()">Unban User</button>';
                } else {
                    echo '<button class="btn btn-lg btn-outline-danger" type="button" onclick="banUser()">Ban User</button>';
                }

            } else {
                echo '<p style="font-size:30px;">You must enter a User ID to make changes</p>';
            }
            ?>

            <?php
            if (!empty($_POST['uuid'])) {
                echo "<button id='adminChangeSubmit' type='submit' class='btn btn-success btn-lg'>Submit</button>";
            }
            ?>

        </form>
        <br>

    </div>

</body>

</html>

<script>
    //function to confirm ban user and submit
    function banUser() {
        // Show confirmation dialog
        var confirmed = window.confirm("Are you sure you want to ban this user?");
        // If user confirms, update the hidden input value and submit the form
        if (confirmed) {
            document.getElementById("isBanned").value = "true";
            document.getElementById("accountChange").submit();
        }
    }
    function unbanUser() {
        // Show confirmation dialog
        var confirmed = window.confirm("Are you sure you want to unban this user?");
        // If user confirms, update the hidden input value and submit the form
        if (confirmed) {
            document.getElementById("isBanned").value = "false";
            document.getElementById("accountChange").submit();
        }
    }
</script>