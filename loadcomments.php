<?php
session_start();
include 'dbconnection.php';
try {

    //Fetch Comment Information
    $sql = "SELECT reviewId, reviewRating, reviewDate, r.customerId, reviewComment, fname, lname, profilePicture 
                        FROM review r JOIN customer c ON r.customerId=c.customerId 
                        WHERE productId = ?";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $_GET['prod']);
    $statement->execute();
    //store comment objects (multi d array)
    $comments = array();
    // check for comments on product
    if ($statement->rowCount() > 0) {
        // Loop through all comments
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            // temp array to be placed in multi d comment array
            $temp = array(
                'reviewId' => $row['reviewId'],
                'reviewRating' => $row['reviewRating'],
                'reviewDate' => $row['reviewDate'],
                'customerId' => $row['customerId'],
                'reviewComment' => $row['reviewComment'],
                'fname' => $row['fname'],
                'lname' => $row['lname'],
                'profilePicture' => $row['profilePicture']
            );
            $comments[] = $temp;
        }
        // add to comments array
        foreach ($comments as $comment) {
            echo '<div class="row justify-content-center"
                                    style="max-width:50rem; background-color:rgb(182,212,189); margin: 0 auto; border-radius: 1rem; padding: 1rem; overflow-y: auto;">';
            echo '<div class="row " style="background-color:white; max-width: 40rem; border-radius: 1rem; padding: 1rem;">';
            echo '<div class="col-auto">';
            echo '<img src="data:image/jpeg;base64,' . base64_encode($comment['profilePicture']) .
                '" alt="profile picture" width="40" height="40" style="border: 1px black solid; border-radius: 50%;">';
            // commenter name
            echo '<span>' . $comment['fname'] . ' ' . $comment['lname'] . '</span></div>';
            // rating and comment
            echo '<span style="position: relative; text-align: right;">Rating: <span style="color:red"><strong>' . $comment['reviewRating'] . '</strong></span></span>
                                          <p style="position: relative; text-align:left;">' . $comment['reviewComment'] . '</p>';
            //red x to delete comment by admin
            if (isset($_SESSION['type'])) {
                echo '<span class="deleteComment" data-commentId="' . $comment['reviewId'] . '" style="font-size: 10px; color: red; cursor: pointer;">&#10060;</span>';
                echo 'User ID: ' . $_SESSION['id'];
                echo "<script> $( 'span' ).last().data('commentId'," . $comment['reviewId'] . "); </script>";
            }
            echo '</div>';
            echo '<br>';
        }
    } else {
        echo "No comments found for this product.";
    }
    $pdo = null; //close db connection
} catch (PDOException $e) {
    die($e->getMessage());
}
