<?php
include '/xampp/htdocs/TeamSpirit/backendLogics/db.php';
if (!isset($_SESSION['username'])) {
    header("Location: /TeamSpirit/UserInterface/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Page</title>
    <style>
        .vis{
            visibility: hidden;
        }
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
    </style>
    <script src="https://cdn.tailwindcss.com">
    </script>
</head>
<body class="flex flex-col items-center min-h-screen bg-[#FFFADA] justify-center items-enter no-scrollbar max-[500px]:text-[9px]">
    <div class="bg-[#F8EEEC] flex flex-col justify-center items-center mt-[15vh] px-[2vw] py-[2vh] rounded-[40px] shadow-lg gr">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $team_id = $_POST['team_id'];
        }
        $sql = "SELECT * FROM `teams` WHERE `team_id` = '$team_id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $uaid = $row['team_admin_id'];
        echo ' <p class="mb-[5vh] text-5xl font-medium text-green-600">'.$row['teamname'].'</p>';
        $sql = "SELECT * FROM `users` WHERE `user_id` = '$uaid'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo ' <form action="../UserInterface/dynProfile.php" method="post" target="_blank">
        <div class="grid grid-cols-12 w-[75vw] rounded-md my-[5vh] shadow-lg">';
        echo ' <p class="col-span-2 px-[2vw] py-[1vh] overflow-scroll no-scrollbar"><b>TEAM ADMIN</b></p>
                <p class="col-span-2 px-[2vw] py-[1vh] flex justify-center overflow-scroll no-scrollbar">' . $row['username'] . '</p>
                <p class="col-span-2 px-[2vw] py-[1vh] flex justify-center overflow-scroll no-scrollbar">' . $row['contact'] . '</p>';
        if($_SESSION['uid'] != $uaid)
        {
            echo '<p class="col-span-4 px-[2vw] py-[1vh] flex justify-center">' . $row['email'] . '</p>
            <button type="submit" id="user_id" name="user_id" value="'.$uaid.'" class="bg-green-300 flex justify-center rounded-[40px] py-[1vh] col-span-2 items-center max-[450px]:text-[4px] max-[650px]:text-[8px] max-[1050px]:text-[9px] hover:bg-green-400">Get Details</button>';
        }
        else
        {
            echo '<p class="col-span-6 px-[2vw] py-[1vh] flex justify-center">' . $row['email'] . '</p>';
        }
        echo '</div></form>';

        echo '<div class="grid grid-cols-12 w-[75vw] rounded-[40px] bg-blue-300 gap-y-[2vh] py-[2vh] px-[1vw] shadow-lg bg-opacity-[60%] hover:bg-opacity-[100%]">
                <div class="col-span-12 flex justify-center py-[1vh] px-[2vw]">
                        <p><b>Team Members</b></p>
                </div>
                <p class="col-span-1 px-[2vw] py-[2vh] border-x-[2px] bg-green-300 border-black overflow-hidden">S.No</p>
                <p class="col-span-2 px-[2vw] py-[2vh] border-r-[2px] bg-green-300 border-black overflow-hidden">Name</p>
                <p class="col-span-2 px-[2vw] py-[2vh] border-r-[2px] bg-green-300 border-black overflow-hidden">Contact</p>
                <p class="col-span-5 px-[2vw] py-[2vh] border-r-[2px] bg-green-300 border-black overflow-hidden">Email</p>
                <p class="col-span-2 px-[2vw] py-[2vh] border-r-[2px] bg-green-300 border-black overflow-hidden">Action</p>';
        $sql = "SELECT * FROM `relations` WHERE `team_id` = '$team_id'";
        $result = mysqli_query($conn, $sql);
        $count = 1;
        for ($i = 0; $i < mysqli_num_rows($result); $i++) {
            $row = mysqli_fetch_assoc($result);
            $uid = $row['user_id'];
            $sql = "SELECT * FROM `users` WHERE `user_id` = '$uid'";
            $result1 = mysqli_query($conn, $sql);
            $row1 = mysqli_fetch_assoc($result1);
            if ($row1['user_id'] != $uaid) {
                echo '<p class="col-span-1 px-[2vw] py-[1vh]">' . ($count++) . '</p>
                        <p class="col-span-2 px-[2vw] py-[1vh] overflow-scroll no-scrollbar">' . $row1['username'] . '</p>
                        <p class="col-span-2 px-[2vw] py-[1vh] overflow-scroll no-scrollbar">' . $row1['contact'] . '</p>';
                        if($_SESSION['uid'] == $uaid)
                        {
                            echo '<p class="col-span-5 px-[2vw] py-[1vh]">' . $row1['email'] . '</p>
                            <form action="../UserInterface/dynProfile.php" method="post" class= "bg-green-300 flex justify-center rounded-[40px] max-[450px]:text-[4px] max-[650px]:text-[8px] max-[1050px]:text-[9px] hover:bg-green-400" target="_blank">
                                <button type="submit" id="user_id" name="user_id" value="'.$row1['user_id'].'">Get Details</button>
                            </form>
                            <form action="../UserInterface/AuthenticationPage.php" method="post" class= "bg-red-300 flex justify-center rounded-[40px] max-[450px]:text-[4px] max-[650px]:text-[8px] max-[1050px]:text-[9px] hover:bg-red-400">
                                <button type="submit" id="0" name="0" value="'.implode(" ",array($row1['user_id'], $team_id)).'"">Deassign</button>
                            </form>';
                        }
                        else if($_SESSION['uid'] != $row1['user_id'])
                        {
                             echo '<p class="col-span-6 px-[2vw] py-[1vh]">' . $row1['email'] . '</p>
                             <form action="../UserInterface/dynProfile.php" method="post" class= "bg-green-300 flex justify-center rounded-[40px] max-[450px]:text-[4px] max-[650px]:text-[8px] max-[1050px]:text-[9px] hover:bg-green-400" target="_blank">
                                <button type="submit" id="user_id" name="user_id" value="'.$row1['user_id'].'">Get Details</button>
                            </form>';
                        }
                        else
                        { 
                            echo '<p class="col-span-7 px-[2vw] py-[1vh]">' . $row1['email'] . '</p>';   
                        }
                }
        }
        $sql = "SELECT * FROM `teams` WHERE `team_id` = '$team_id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        echo '<script>
                document.title = "' . $row['teamname'] . ' - Team Page";
            </script>';
        $date = date("Y-m-d");
        $date1 = date_create($date);
        $date2 = date_create($row['deadline']);
        $daydiff = date_diff($date1,$date2);
        $daysRemain = (int)$daydiff->format("%a");
        echo '  </div>
        <div class="grid grid-cols-3 w-[75vw] bg-white my-[5vh] shadow-xl rounded-[40px]">
        <p class="py-[1vh] flex justify-center text-red-500">DeadLine</p>
        <p class="py-[1vh] flex justify-center">YYYY-MM-DD : '.$row['deadline'].'</p>
        <p class="py-[1vh] flex justify-center">No of days remaining : '.($daysRemain+1).'</p>
        <a href="./dashboard.php" class="py-[1vh] flex justify-center text-white bg-red-400 col-span-3 rounded-b-[40px] shadow-xl hover:bg-red-500">RETURN TO DASHBOARD</a>
        </div>
    </div>';
    if($uaid == $_SESSION['uid'])
        echo '<div class="bg-green-200 px-[2vw] py-[2vh] my-[2vh] relative top-[3vh] hover:bg-green-300">
            <button class="btn">Assign new members</button>
        </div>';

    echo '<div class="w-[100vw] bg-white relative flex flex-col justify-center items-center rounded-[40px] custom-confirm vis bottom-[7vh]">
        <p class="block">Do you want to assign new members?</p>
        <div class="flex my-[1vh]">
            <form action="../UserInterface/assignNew.php" method="post">
                <button type="submit" name="team_id" id="team_id" value="'.$team_id.'" class="bg-green-300 px-[2vw] py-[1vh]">Yes</button>
            </form>
            <button class="bg-red-300 px-[2vw] py-[1vh] btn2">No</button>
        </div>
    </div>';
    echo '<div class="bg-[#F8EEEC] flex flex-col justify-center items-center px-[2vw] py-[2vh] rounded-[40px] shadow-lg gr mb-[10vh]">
        <div class="grid grid-cols-12 w-[75vw] rounded-[40px] bg-blue-300 gap-y-[2vh] py-[2vh] px-[1vw] shadow-lg bg-opacity-[60%]">
            <p class="flex justify-center col-span-12 text-xl">MESSAGES</p>
        ';
        $sql = "SELECT * FROM `messages` WHERE `t_id` = '$team_id'";
        $result = mysqli_query($conn, $sql);
        for($i = 0 ; $i < mysqli_num_rows($result); $i++)
        {
            $row = mysqli_fetch_assoc($result);
            $user_id = $row['s_id'];
            $sql = "SELECT * FROM `users` WHERE `user_id` = '$user_id'";
            $result2 = mysqli_query($conn, $sql);
            $row1 = mysqli_fetch_assoc($result2);
            $s_name = $row1['username'];
            if($row1['user_id'] == $_SESSION['uid'])
                echo '<p class="flex justify-center col-span-2 bg-green-400 rounded-[40px] text-xl col-span-2 overflow-auto">You</p>';
            else
                echo '<p class="flex justify-center col-span-2 bg-blue-400 rounded-[40px] text-xl col-span-2 overflow-auto">'.$s_name.'</p>';
            echo '<p class="flex justify-start items-center col-span-10 bg-blue-200 rounded-[20px] min-h-[5vh] overflow-auto no-scrollbar px-[1vw]">'.$row['msg'].'</p>';
        }
        echo '</div>
        <form action="../backendLogics/msg_backend.php" class="w-[75vw] my-[2vh]" method="get">
           <input type="text" class="w-[90%] h-[5vh] rounded-[40px] pl-[2vw]" name="msg" id="msg" placeholder="Enter Your message">
           <button type="submit" class="bg-green-300 px-[2vw] py-[1vh] rounded-[35px] hover:bg-green-400" value='.$team_id.' name="team_id" id="team_id">send</button>
        </form>
    <div>
        <script src="../jsfiles/teamPage.js"></script>';
    ?>   
</html>
<div>
