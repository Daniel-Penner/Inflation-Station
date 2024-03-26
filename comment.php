<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //product Id for header
    $productId = $_POST['prodId']; 
    // Database connection
    try {
        $connectionString = "mysql:host=localhost;dbname=db_54925359"; 
        $username = "54925359";
        $password = "54925359"; 

        // Create connection
        $pdo = new PDO($connectionString, $username, $password);
        
        // Check if the message is not empty and does not exceed 500 characters
        if (!empty($_POST['message']) && preg_match('/^.{1,500}$/', $_POST['message'])) {
            $sql = "INSERT INTO review (reviewRating, reviewDate, customerId, productId, reviewComment) VALUES (?, ?, ?, ?, ?)";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(1, $_POST['rating']);
            $statement->bindValue(2, $_POST['date']);
            $statement->bindValue(3, $_POST['userId']);
            $statement->bindValue(4, $_POST['prodId']);
            $statement->bindValue(5, $_POST['message']);
            $statement->execute();
        } else {
            // Handle error when comment is empty or exceeds 500 characters
            echo "Review comment must not be empty and should not exceed 500 characters.";
            header("Location: indvproduct.php?prod=$productId");
            exit(); // Stop further execution
        }
    } catch(PDOException $e) {
        die($e->getMessage());
    }

    // Redirect back to product page
    header("Location: indvproduct.php?prod=$productId");
    exit();
}

