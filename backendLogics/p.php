<?php
    include 'db.php';
    $id = 20;
    $sql = "SELECT * FROM `teams` WHERE `team_id`='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $id = $row['team_admin_id'];
    $sql = "SELECT * FROM `users` WHERE `user_id`='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    var_dump($row);
?>
