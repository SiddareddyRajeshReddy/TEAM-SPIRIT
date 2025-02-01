<?php
include '/xampp/htdocs/TeamSpirit/backendLogics/db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (array_key_exists(0, $_POST)) {
        $arr = explode(" ", $_POST[0]);
        $sql = "SELECT * FROM `users` WHERE `user_id` = '$arr[0]'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $sql = "SELECT * FROM `teams` WHERE `team_id` = '$arr[1]'";
        $result = mysqli_query($conn, $sql);
        $row1 = mysqli_fetch_assoc($result);
            echo '<!DOCTYPE html>
                <html lang="en">

                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Success</title>
                    <script src="https://cdn.tailwindcss.com"></script>
                </head>

                <body class="flex flex-col justify-center items-center w-screen h-screen">
                    <p class="text-xl my-[2vw]">Do you want to remove <b>'.$row['username'].'</b> from the team <b>'.$row1['teamname'].'</b>?</p>
                    <div class="flex flex-row w-[20vw] justify-around">
                        <form action="../backendLogics/team_backend.php" method="post">
                            <button type="submit" id="0" name="0" value="' . implode(" ", $arr) . '" class="bg-green-600 text-white py-[2vh] px-[3vw] rounded-[40px]">Yes</button>
                        </form>
                        <form action="../UserInterface/teamPage.php" method="post">
                            <button type="submit" id="team_id" name="team_id" value="' . $arr[1] . '" class="bg-red-600 text-white py-[2vh] px-[3vw] rounded-[40px]">No</button>
                        </form>
                    </div>
            </body>'; 
    }
    else if(array_key_exists("team_id", $_POST))
    {
        $t_id = $_POST["team_id"];
        $sql = "SELECT * FROM `teams` WHERE `team_id` = '$t_id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo '<!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Success</title>
            <script src="https://cdn.tailwindcss.com"></script>
        </head>

        <body class="flex flex-col justify-center items-center w-screen h-screen">
            <p class="text-xl my-[2vw]">Do you want to abort the team <b>'.$row['teamname'].'</b>?</p>
            <div class="flex flex-row w-[20vw] justify-around">
                <form action="../backendLogics/deleteTeam.php" method="post">
                    <button type="submit" id="team_id" name="team_id" value="' .$t_id. '" class="bg-green-600 text-white py-[2vh] px-[3vw] rounded-[40px]">Yes</button>
                </form>
            <a href="./dashboard.php" class="py-[2vh] flex justify-center items-center px-[3vw] text-white bg-red-600 col-span-3 rounded-[40px]">No</a>
        </div>
        </body>'; 
    }
}
?>  