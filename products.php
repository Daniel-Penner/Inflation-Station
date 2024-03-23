<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">

<head>
    <title>Product Gallery - Inflation Station</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/products.css">
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
                                </div>
                                <form class="d-flex" action="products.php" method ="get">
                                <input class="form-control me-2" type="search" name ="search" placeholder="Search" <?php if(!empty($_GET['search'])){echo "value = " . $_GET['search'] . " ";}?>
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
            <h5 style="text-align:center; color:white; font-size:50px;">Products</h5>
        </div>
    </header>
    <div class="container" style="margin-top: 50px;">
    <div class="row justify-content-center row-cols-auto">
            <?php
            // Database connection
            try{
            $connectionString = "mysql:host=localhost;dbname=db_54925359"; 
            $username = "54925359";
            $password = "54925359"; 
    
            // Create connection
            $pdo = new PDO($connectionString, $username, $password);

    
            // SQL query to fetch posts data with author information
            
            $searchFor = '%' . $_GET['search'] . '%';
            $sql = "SELECT * FROM product WHERE productName LIKE ?";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(1, $searchFor);
            $statement->execute();
            while($row = $statement->fetch())
            {
                echo '<div class="col">';
                echo '<div class="card mb-3">
                <img src="https://via.placeholder.com/350x150" class="card-img-top" alt="" />
                <div class="card-body">
                  <h3 class="card-title">
                    card 1
                  </h3>
                  <div class="card-text">
                    Lorem ipsum lala longer text to see the equal height alignment. Hence you should not need h-100 or cols for a card-deck.
                  </div>
                </div>
                <a class="card-footer btn btn-primary bg-primary" href="/shows/card-1"> Explore </a>
              </div>
              </div>';
              }
            }
            catch(PDOException $e){
              die($e->getMessage());
            }
            ?>
    </div>
    </div>
</body>

</html>