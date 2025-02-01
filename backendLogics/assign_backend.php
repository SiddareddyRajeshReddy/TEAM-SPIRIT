<?php
include '/xampp/htdocs/TeamSpirit/backendLogics/db.php';
if($_SERVER['REQUEST_METHOD'] == 'GET')
{
    $team_id = $_GET['team_id'];
    foreach ($_GET as $key => $value) {
        if($key != 'team_id')
        {
            $sql = "INSERT INTO `relations`(`team_id`,`user_id`) VALUES('$team_id', '$value')";
            mysqli_query($conn, $sql);
        }
    }
}
?>