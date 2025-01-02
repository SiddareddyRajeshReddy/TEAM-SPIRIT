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
    <title>Send Your Message</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .no-scrollbar::-webkit-scrollbar{
            display: none;
        }
    </style>
</head>
<body class="bg-[#D0F4F8] flex flex-col items-center min-h-screen overflow-x-hidden overflow-y-scroll no-scrollbar">
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $arr = explode(" ", $_POST['reciever_id']);
            $t_id = $arr[1];
            $r_id = $arr[0];
        }
        echo '<nav class="h-[12vh] w-[100vw] bg-gradient-to-r from-[#A1ED86] to-[#4CC0DB] flex items-center justify-between shadow-md">
        <div class="flex justify-around w-[35vw]">
            <a href="./dynProfile.php"><img src="../images/PP.png" alt=""  class="w-[5vw]"></a>
            <p class="flex items-center text-4xl text-white underline"><b>Send Message</b></p>
        </div>
            <div class="flex items-center justify-center w-[25vw] justify-around">
                <form action="./teamPage.php" method="post">
                    <button name="team_id" id="team_id" type = "submit" value="'.$t_id.'" class="text-2xl bg-[#D9D9D9] bg-gradient-to-b from-[#D9D9D9] to-[#FFFFFF] p-[0.75rem] rounded-[2vw]">↩️</button>
                </form>
            </div>
        </nav>';
        $sql = "SELECT * FROM `users` WHERE `user_id` = '$r_id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo ' <form action="../backendLogics/msg_backend.php" method="post"" class="bg-[#F1FBC1] py-[2vh] my-[15vh] rounded-[60px]">
        <label for="msg" class="block flex justify-center text-2xl py-[2vh] text-green-600">Enter Your Message for&nbsp<b>'.$row['username'].'</b></label>
        <textarea name="msg" id="msg" rows="10" cols="180" class="block bg-[#C0E2C5] text-lg"></textarea>
        <div class="w-[90vw] flex justify-end items-center p-[1vh]">
            <button type="submit" name="r_id" id="r_id" value="'.implode(" ", array($r_id, $t_id)).'" class="bg-[#8AF87D] py-[1rem] px-[2vw] rounded-[40px]">Send</button>
        </div>
    </form>';
    ?>
   
</body>

</html>