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
                                    <a class="nav-link" href="index.php">Home</a>
                                    <a class="nav-link" href="about.php">About</a>
                                    <a class="nav-link" href="contact.php">Contact</a>
                                    <a class="nav-link" href="products.php">Products</a>
                                    <a class="nav-link" href="search.php">Explore</a>
                                </div>
                                <form class="d-flex" action="products.php" method ="get">
                                <input class="form-control me-2" type="search" name ="search" placeholder="Search" <?php echo "value = " . $_GET['search'] . " "?>
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
        <div class="container-fluid">
        <div class="mx-auto hotcol">
            <br>
            <!--ROW 1-->
            <?php
            // Database connection
            try{
            $connectionString = "mysql:host=localhost;dbname=db_54925359"; 
            $username = "54925359";
            $password = "54925359"; 
    
            // Create connection
            $pdo = new PDO($connectionString, $username, $password);
            }
            catch(PDOException $e){
              die($e->getMessage());
            }
    
            // SQL query to fetch posts data with author information
            
            $searchFor = '%' . $_GET['search'] . '%';
            $sql = "SELECT * FROM product WHERE productName LIKE ?";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(1, $searchFor);
            $statement->execute();
            echo "<div class='row justify-content-center mx-auto'>";
            $count = 0;
              while($row = $stmt->fetch())
              {
                if(fmod($count, 5) == 0){
                echo "<div class='row justify-content-center mx-auto'>";
                }
                echo "<div class='col-2'>";
                  echo "<div class='card' style='width: 18rem;'>";
                      echo "<img src=" . $row[productImageURL] . " class='card-img-top'>";
                        echo "<div class='card-body'>";
                          echo "<h5 class='card-title'>" . $row[productName] . "</h5>";
                          echo "<p class='card-text'>$" . $row[productPrice] ."/lb</p>";
                          echo "<a href='indvproduct.php?prod='" . $row[productId] ." class='button'>More Info</a>";
                        echo "</div>";
                      echo "</div>";
                echo "</div>";
                $count++;
              }
              echo "hi";
              $conn->close();
            ?>
    </div>
    <br>
        </div>
    </div>
</body>
</html>