<?php 
include '/xampp/htdocs/TeamSpirit/backendLogics/db.php';
if(!isset($_SESSION['username']))
{
    header("Location: /TeamSpirit/UserInterface/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Message Box</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .no-scrollbar::-webkit-scrollbar{
            display: none;
        }
    </style>
</head>
<body class="bg-[#D0F4F8] flex flex-col items-center min-h-screen overflow-x-hidden overflow-y-scroll no-scrollbar">
    <nav class="h-[12vh] w-[100vw] bg-gradient-to-r from-[#A1ED86] to-[#4CC0DB] flex items-center justify-between shadow-md">
        <div class="flex justify-around w-[35vw]">
            <a href="./dynProfile.php"><img src="../images/PP.png" alt=""  class="w-[5vw]"></a>
            <p class="flex items-center text-4xl text-white underline"><b>Your Message</b></p>
        </div>
            <div class="flex items-center justify-center w-[25vw] justify-around">
                    <a href="./dashboard.php" class="text-2xl bg-[#D9D9D9] bg-gradient-to-b from-[#D9D9D9] to-[#FFFFFF] p-[0.75rem] rounded-[2vw]">↩️</a>
            </div>
    </nav>
    <div class="grid grid-col-1 w-[90vw] bg-[#F1FBC1] my-[10vh] rounded-[60px]">
    <?php
        $r_id = $_SESSION['uid'];
        $sql = "SELECT * FROM `messages` WHERE `reciever_id` = '$r_id'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0)
        {
            $arr_row = mysqli_fetch_all($result);
            $arr_row = array_reverse($arr_row);
            foreach ($arr_row as $key) {
                $s_id = $key[0];
                $msg = $key[2];
                $t_id = $key[3];
                $date = $key[4];
                $darr = explode(" ",$date);
                $date = implode(" at ",$darr);
                $sql = "SELECT * FROM `users` WHERE `user_id` = '$s_id'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $name = $row['username'];
                $arr = array($s_id, $t_id);
                $sql1 = "SELECT * FROM `teams` WHERE `team_id` = '$t_id'";
                $result1 = mysqli_query($conn, $sql1);
                $row1 = mysqli_fetch_assoc($result1);
                $t_name = $row1['teamname'];
                echo '<p  class="px-[2vw] text-2xl py-[2vh] text-cyan-500 font flex justify-center">You Got message from&nbsp<b class="text-red-700">'.$name.'</b>&nbspthrough the team&nbsp<b class="text-black">'.$t_name.'</b> </p>
                    <p class="bg-[#C0E2C5] text-xl px-[2vw] py-[2vh] rounded-t-[60px]">'.$msg.'</p>
                    <form action="../backendLogics/team_backend.php" method="post" class="flex justify-end items-center px-[1vw] py-[2vh] bg-[#C0E2C5] rounded-b-[60px] mb-[3vh]">
                        <p class="bg-red-400 rounded-xl px-[1vw] py-[2vh]">Recieved on <b>'.$date.'</b></p>
                        <button class="bg-[#8AF87D] my-[1vh] mx-[2vw] py-[2vh] px-[2vw] rounded-[40px]" name="reciever_id" id="reciever_id" type="submit" value="'.implode(" ", $arr).'">Reply</button>
                    </form>';
            }   
        }
    ?> 
    <a href="./dashboard.php" class="py-[1vh] flex justify-center text-white bg-red-500 rounded-[40px]">RETURN TO DASHBOARD</a>
    </div>
</body>

</html>