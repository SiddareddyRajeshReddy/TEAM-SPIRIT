<?php
include '/xampp/htdocs/TeamSpirit/backendLogics/db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $tid = $_POST['team_id'];
        $sql = "DELETE FROM `teams` where `team_id` = '$tid'";
        mysqli_query($conn, $sql);
        echo '<!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Success</title>
                <script src="https://cdn.tailwindcss.com"></script>
            </head>

            <body class="flex justify-center items-center w-screen h-screen">
                <div>
                     <a href="../UserInterface/dashboard.php" class="py-[3vh] px-[2vw] flex justify-center bg-red-500 text-white">RETURN TO DASHBOARD</a>
                </div>
            </body>';
}
?>
