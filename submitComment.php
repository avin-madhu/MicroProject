<?php

@include 'config.php';

session_start(); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_name']; // Get the user's ID from the session
    $comment_text = $_POST['comment_text'];

    // Insert the new comment into the database
    $insertQuery = "INSERT INTO comments (commentId, timestamp, commentDesc, userphoto) VALUES ('$user_id',NOW(),'$comment_text','https://t4.ftcdn.net/jpg/03/46/93/61/360_F_346936114_RaxE6OQogebgAWTalE1myseY1Hbb5qPM.jpg')";
    $insertResult = mysqli_query($conn, $insertQuery);

    if ($insertResult) {
        // Comment added successfully
    } else {
        // Handle the error
        echo "Error: " . mysqli_error($conn);
    }
}
?>
