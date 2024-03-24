<?php
include ("dbconnection.php");
if(isset($_POST['commentId'])) {
    try {
        //recieve comment id (red x)
        $commentId = $_POST['commentId'];
        // remove review where id is = to red x comment clicked on by admin
        $sql = "DELETE FROM review WHERE reviewId = ?";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $commentId);
        $statement->execute();
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
} 

