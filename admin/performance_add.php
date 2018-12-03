<?php

include 'includes/session.php';

if (isset($_POST['add'])) {
    $position = $_POST['position'];
    $part = $_POST['title'];
    $rate = $_POST['rate'];

    $sql = "INSERT INTO performance (position_id, Part, Rate) VALUES ('$position','$part', '$rate')";
    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Performance added successfully';
    } else {
        $_SESSION['error'] = $conn->error;
    }
} else {
    $_SESSION['error'] = 'Fill up add form first';
}

header('location:performance.php');
?>