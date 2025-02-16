<?php
include '/xampp/htdocs/TeamSpirit/backendLogics/db.php';
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $team_id = $_POST['team_id'];
    foreach ($_POST as $key => $value) {
        if($key != 'team_id')
        {
            $sql = "INSERT INTO `relations`(`team_id`,`user_id`) VALUES('$team_id', '$value')";
            mysqli_query($conn, $sql);
        }
    }
}
?>