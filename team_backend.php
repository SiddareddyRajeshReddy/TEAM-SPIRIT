<?php
include '/xampp/htdocs/TeamSpirit/backendLogics/db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (array_key_exists(0, $_POST)) {
        $arr = explode(" ", $_POST[0]);
        $sql = "DELETE FROM `relation` where `team_id` = '$arr[1]' AND `user_id` = '$arr[0]'";
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
                        <form action="../UserInterface/teamPage.php" method="post">
                            <button type="submit" id="team_id" name="team_id" value="' . $arr[1] . '" class="bg-red-600 text-white py-[2vh] px-[1vw] rounded-[40px]">Successfully unassigned, Click to return</button>
                        </form>
                    </div>
                </body>';
    
    }
    else
    {
        $r_id = $_POST['reciever_id'];
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
                <form action="../UserInterface/sendMessage.php" method="post">
                    <button type="submit" id="reciever_id" name="reciever_id" value="' . $r_id . '" class="bg-red-600 text-white py-[2vh] px-[1vw] rounded-[40px]">Click to message</button>
                </form>
            </div>
        </body>';
    }
}

?>

