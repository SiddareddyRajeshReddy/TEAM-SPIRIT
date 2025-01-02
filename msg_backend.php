<?php
include '/xampp/htdocs/TeamSpirit/backendLogics/db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $arr = explode(" ", $_POST['r_id']);
    $date = date("Y-m-d H:i:s");
    $s_id = $_SESSION['uid'];
    $r_id = $arr[0];
    $t_id = $arr[1];
    $msg = $_POST['msg'];
    $sql = "INSERT INTO `messages`(`sender_id`, `reciever_id`, `msg`, `team_id`, `recieved_date`) VALUES('$s_id','$r_id','$msg','$t_id','$date')";
    if(empty($msg))
    {
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
                    <button type="submit" id="reciever_id" name="reciever_id" value="' . implode(" ",$arr). '" class="bg-red-600 text-white py-[2vh] px-[1vw] rounded-[40px]">No Message entered, Click To return</button>
                </form>
            </div>
        </body>';
    }
    else
    {
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
                    <button type="submit" id="team_id" name="team_id" value="' .$arr[1]. '" class="bg-red-600 text-white py-[2vh] px-[1vw] rounded-[40px]">Message Sent, Return to team page</button>
                </form>
            </div>
        </body>';
    }
}
?>