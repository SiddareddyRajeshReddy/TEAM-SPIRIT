<?php
include '/xampp/htdocs/TeamSpirit/backendLogics/db.php';
if($_SERVER['REQUEST_METHOD'] == 'GET')
{
   $team_id = $_GET['team_id'];
   $msg = $_GET['msg'];
   $s_id = $_SESSION['uid'];
   $sql = "INSERT INTO `messages`(`s_id`, `t_id`, `msg`) VALUES('$s_id', '$team_id', '$msg')";
   mysqli_query($conn, $sql);
}

?>