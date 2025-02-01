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
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .coverup{
            animation: vs 1s 800ms forwards;
            animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1);
        }
        @keyframes vs{
        0%{
            opacity: 0;
            visibility: visible;
        }
        25%{
            opacity: 0.25;
        }
        50%{
            opacity: 0.5;
        }
        100%{
            opacity: 1;
            visibility: visible;
        }
    }
    </style>
    
</head>

<body class="overflow-y-scroll no-scrollbar flex justify-center flex-col items-center bg-[#FFFADA]">
<div class="flex">
    <div class="coverup bg-blue-400 min-h-screen w-[20vw] flex flex-col items-center menu invisible translate-x-[-20vw] moveOM" style="font-family: 'Courier New', Courier, monospace;">
           <P class="text-3xl my-[2vh]">MENU</P> 
           <div class="flex border-black md:border-[2px] px-[2vw]">
           <?php
                echo '<P class="text-xs md:text-sm xl:text-2xl lg:text-md py-[1vh] max-[430px]:text-[8px]">Hello,&nbsp</P>
                 <p class = "text-xs xl:text-2xl md:text-sm lg:text-md py-[1vh] max-[430px]:text-[11px]"><b>'.$_SESSION['username'].'</b></p>';
           ?>
           </div>
           <div class="flex flex-col items-center justify-center h-[60vh] text-xs md:text-sm xl:text-2xl lg:text-md ">
           <div class="w-[18vw] flex justify-end relative left-[11vw] sm:left-[10vw] md:left-[8vw] lg:left-[7vw] z-[1000]"><button class="bg-blue-400 rounded-[40px] py-[1vh] btn flex justify-between border-black border-[2px] hover:text-white"><p class="px-[1vw]">close&nbsp;&nbsp;&nbsp;open</p></button></div>
           <?php
                echo '<form action="./dynProfile.php" method="post" class="border-b-[2px] w-[18vw] border-black py-[2vh] hover:text-blue-600" >
                    <button name="user_id" id="user_id" value="'.$_SESSION['uid'].'" type="submit">My Profile</button>
                </form>';
            ?>
                <a href="./createTeam.php" class="border-b-[2px] w-[18vw] border-black py-[2vh] hover:text-blue-600">Create a new team</a>
                <a href="./AboutUs.php" class="border-b-[2px] border-black py-[2vh] w-[18vw] hover:text-blue-600">About Us</a>
                <a href="../backendLogics/logout_backend.php" class="border-b-[2px] border-black py-[2vh] hover:text-red-600 w-[18vw]">Log out</a>
            </div>
   </div>
   <script src='../jsfiles/dashboard.js'></script>
    <div class="w-[80vw] h-[120vh] flex justify-center items-center bg-[#F8EEEC] flex-col translate-x-[-10vw] moveOG grid shadow-lg my-[6vh] rounded-[40px]">
    <p class="text-lg col-span-3 rounded-lg flex mt-[1vh] w-[100%] pr-[3vw] pl-[1vw] border-black border-[2px] bg-gray-200 opacity-[70%]">As Admin ⬇️</p>
        <div class="grid grid-flow-col max-[503px]:auto-cols-[60vw] auto-cols-[40vw] sm:auto-cols-[35vw] md:auto-cols-[30vw] lg:auto-cols-[25vw] xl:auto-cols-[20vw] mb-[2vh] overflow-x-auto w-[70vw] gap-x-[5vw] no-scrollbar py-[2vh]">
            <?php
            //random colour generator
            $tadid = $_SESSION['uid'];
            $sql = "SELECT * FROM `teams` WHERE `team_admin_id` = '$tadid'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                    $row = mysqli_fetch_assoc($result);
                    $deadline = $row['deadline'];
                    $date = date("Y-m-d");
                    $date1 = strtotime($date);
                    $date2 = strtotime($row['deadline']);
                    if ($date2 >= $date1) {
                        echo '
                            <div class="max-[503px]:w-[60vw] w-[40vw] sm:w-[35vw] xl:w-[20vw] lg:w-[25vw] md:w-[30vw] flex flex-col justify-center items-center bg-green-300 rounded-[40px] shadow-lg hover:translate-y-[3px]">
                            <div>
                                <img src="../images/gpp2.png" alt="" class="py-[2vh] px-[1vw]">
                            </div>
                            <div class="bg-white w-[100%] rounded-b-[40px] py-[2vh]">
                                <p class="px-[2vw] py-[2vh] text-blue-400"><b>'.$row['teamname'].'</b></p>
                                <div class="flex justify-around max-[350px]:flex-col max-[350px]:items-center">
                                    <form action="./AuthenticationPage.php" method="post">
                                <button type="submit" id="team_id" name="team_id" value="' . $row['team_id'] . '" class="bg-blue-300 text-white py-[1vh] px-[1vw] rounded-[40px] hover:bg-red-400 hover:translate-y-[3px]">ABORT TEAM</button>
                                    </form>
                                    <form action="./teamPage.php" method="post">
                                    <button type="submit" value="' . $row['team_id'] . '" name="team_id" id="team_id" class="bg-green-300 text-white py-[1vh] px-[1vw] rounded-[40px] hover:bg-orange-400 hover:translate-y-[3px]">Get Details</button>
                                    </form>
                           </div>
                            </div>';
                        echo '</div>';
                    } else {
                        $sql1 = "DELETE FROM `teams` WHERE `deadline` = '$deadline'";
                        mysqli_query($conn, $sql1);
                    }
                }
            } else {
                echo '<p></p><div><img src="../images/err.png" alt="" class="flex justify-center"></div><p></p>';
            }
            ?>
        </div>
        <p class="text-lg col-span-3 rounded-lg flex mt-[1vh] w-[100%] pr-[3vw] pl-[1vw] border-black border-[2px] bg-gray-200 opacity-[70%]">As Member ⬇️</p>
        <div class="grid grid-flow-col max-[503px]:auto-cols-[60vw] auto-cols-[40vw] sm:auto-cols-[35vw] md:auto-cols-[30vw] lg:auto-cols-[25vw] xl:auto-cols-[20vw] mb-[2vh] overflow-x-auto w-[70vw] gap-x-[5vw] no-scrollbar py-[2vh]">
            <?php
            $usid = $_SESSION['uid'];
            $sql = "SELECT * FROM `relations` WHERE `user_id` = '$usid'";
            $result = mysqli_query($conn, $sql);
            $count = 0;
            if (mysqli_num_rows($result) > 0) {
                for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                    $row = mysqli_fetch_assoc($result);
                    $tid = $row['team_id'];
                    $sql1 = "SELECT * FROM `teams` WHERE `team_id` = '$tid'";
                    $result1 = mysqli_query($conn, $sql1);
                    $row1 = mysqli_fetch_assoc($result1);
                    if (mysqli_num_rows($result1) > 0) {
                        $deadline = $row1['deadline'];
                        $date = date("Y-m-d");
                        $date1 = strtotime($date);
                        $date2 = strtotime($row1['deadline']);
                        if ($date2 >= $date1) {
                            if ($row1['team_admin_id'] != $usid) {
                                echo '
                                <div class="max-[503px]:w-[60vw] w-[40vw] sm:w-[35vw] xl:w-[20vw] lg:w-[25vw] md:w-[30vw] flex flex-col justify-center items-center bg-green-300 rounded-[40px] shadow-lg hover:translate-y-[3px]">
                                <div>
                                    <img src="../images/gpp2.png" alt="" class="py-[2vh] px-[1vw]">
                                </div>
                                <div class="bg-white w-[100%] rounded-b-[40px] py-[2vh]">
                                    <p class="px-[2vw] py-[2vh] text-blue-400"><b>'.$row1['teamname'].'</b></p>
                                    <div class="flex justify-center">
                                        <form action="./teamPage.php" method="post">
                                        <button type="submit" value="' . $row1['team_id'] . '" name="team_id" id="team_id" class="bg-green-300 text-white py-[1vh] px-[1vw] rounded-[40px] hover:bg-orange-400 hover:translate-y-[3px]">Get Details</button>
                                        </form>
                                    </div>
                                </div>';
                            echo '</div>';
                                $count++;
                            }
                        } else {
                            $sql2 = "DELETE FROM `teams` WHERE `deadline` = '$deadline'";
                            mysqli_query($conn, $sql2);
                        }
                    }
                }
            }
            if ($count == 0)
            echo '<p></p><img src="../images/err.png" alt="" class="flex justify-center"><p></p>'; 
            ?>
        </div>
    </div>
</div>
</body>

</html>