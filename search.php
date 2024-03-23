<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<html lang="en">
<meta charset="UTF-8">

<head>
  <title>Search - Inflation Station</title>
  <link rel="stylesheet" href="css/search.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/global.css">
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
                <form class="d-flex" action="products.php" method="get">
                  <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <div class=homehb>
      <h5 style="text-align:center; color:white; font-size:50px;">Explore</h5>
    </div>
  </header>
  <div class="sidenav">
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a>
</div>
<div class="container" style="margin-top: 50px;">
  <div class="card-deck">
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

    
            // SQL query to fetch posts data with author information
            
            $searchFor = '%' . $_GET['search'] . '%';
            $sql = "SELECT * FROM product WHERE productName LIKE ?";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(1, $searchFor);
            $statement->execute();
            $count = 0;
              while($row = $statement->fetch())
              {
                  echo "<div class='card mb-4' style='width: 18rem;'>";
                      echo "<img src=" . $row['productImageURL'] . " class='card-img-top'>";
                        echo "<div class='card-body'>";
                          echo "<h5 class='card-title'>" . $row['productName'] . "</h5>";
                          echo "<p class='card-text'>$" . $row['productPrice'] ."/lb</p>";
                          echo "<a href='indvproduct.php?prod=" . $row['productId'] ."' class='button'>More Info</a>";
                        echo "</div>";
                      echo "</div>";
                $count++;
              }
            }
            catch(PDOException $e){
              die($e->getMessage());
            }
            ?>
        </div>
        <br>
    </div>
</body>

</html>