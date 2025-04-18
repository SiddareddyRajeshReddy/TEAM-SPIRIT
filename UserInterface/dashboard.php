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

<body class="overflow-y-scroll no-scrollbar flex justify-center flex-col items-center bg-[#1591EA] bg-[url(../images/timg.jpg)] bg-auto bg-center">
<button class="btn border-black border-[2px] text-black bg-white w-[20vw] fixed top-[0vw] left-[0vw] h-[6vh] z-[1000] hover:translate-y-[-2px] bg-[url(../images/MenuBack.png)] bg-contain bg-no-repeat"><p style="font-family: 'Times New Roman', Times, serif;">MENU</p></button>
<button class="border-black border-[2px] text-black w-[60vw] sticky z-[1000] top-[0vh] h-[6vh] z-[1000] bg-white hover:translate-y-[-2px]"><p style="font-family: 'Times New Roman', Times, serif;">NOTIFICATIONS</p></button>
<form action="../backendLogics/logout_backend.php">
    <button class="border-black border-[2px] text-white w-[20vw] bg-red-600 fixed z-[1000] top-[0vh] right-[0vw] h-[6vh] z-[1000] hover:translate-y-[-2px]"><p style="font-family: 'Times New Roman', Times, serif;">LOG OUT</p></button>
</form>
<div class="flex">
    <div class="text-blue-300 border-black border-[2px] coverup bg-blue-400 min-h-screen w-[20vw] flex flex-col items-center menu invisible translate-x-[-20vw] moveOM mt-[6vh] bg-[url(../images/TeamLogo.jpg)] bg-center bg-cover" style="font-family:fantasy;">
           <P class="text-3xl my-[2vh]">MENU</P> 
           <div class="flex text-blue-300 border-black md:border-[2px] px-[2vw]">
           <?php
                echo '<P class="text-xs md:text-sm xl:text-2xl lg:text-md py-[1vh] max-[430px]:text-[8px]">Hello,&nbsp</P>
                 <p class = "text-xs xl:text-2xl md:text-sm lg:text-md py-[1vh] max-[430px]:text-[11px]"><b>'.$_SESSION['username'].'</b></p>';
           ?>
           </div>
           <div class="flex flex-col items-center justify-center h-[60vh] text-xs md:text-sm xl:text-2xl lg:text-md">
           <?php
                echo '<form action="./dynProfile.php" method="post" class="border-[2px] m-[1px] w-[18vw] border-black py-[2vh] hover:text-blue-600 hover:bg-white px-[1vw] hover:translate-y-[2px]" >
                    <button name="user_id" id="user_id" value="'.$_SESSION['uid'].'" type="submit">My Profile</button>
                </form>';
            ?>
                <a href="./createTeam.php" class="border-[2px] w-[18vw] m-[1px] border-black py-[2vh] hover:text-blue-600 px-[1vw] hover:bg-white hover:translate-y-[2px]">Create a new team</a>
                <a href="./AboutUs.php" class="border-[2px] border-black py-[2vh] m-[1px] w-[18vw] hover:text-blue-600 px-[1vw] hover:bg-white hover:translate-y-[2px]">About Us</a>
                <a href="../backendLogics/logout_backend.php" class="border-[2px]  m-[1px] border-black py-[2vh] hover:text-red-600 w-[18vw] px-[1vw] hover:bg-white hover:translate-y-[2px]">Log out</a>
            </div>
   </div>
   <script src='../jsfiles/dashboard_v2.js'></script>
        <div class="w-[80vw] min-h-[160vh] bg-[#4DADAF] flex justify-center items-center bg-white border-black border-[2px] to-yellow-300 flex-col translate-x-[-10vw] moveOG grid shadow-lg my-[6vh] rounded-[40px]">
    <p class="text-lg col-span-3 rounded-lg flex mt-[1vh] w-[100%] pr-[3vw] pl-[1vw] border-black border-[2px] bg-white">As Admin ⬇️</p>
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
                            <div class="max-[503px]:w-[60vw] w-[40vw] sm:w-[35vw] xl:w-[20vw] lg:w-[25vw] md:w-[30vw] flex flex-col justify-center items-center bg-green-300 rounded-[40px] shadow-lg hover:translate-y-[3px] border-white border-[5px]">
                            <div>
                                <img src="../images/Timg.png" alt="" class="rounded-t-[40px]">
                            </div>
                            <div class="bg-white w-[100%] rounded-b-[40px] py-[2vh]">
                                <p class="px-[2vw] py-[2vh] text-blue-400"><b>'.$row['teamname'].'</b></p>
                                <div class="flex justify-around max-[350px]:flex-col max-[350px]:items-center">
                                    <form action="./AuthenticationPage.php" method="post">
                                <button type="submit" id="team_id" name="team_id" value="' . $row['team_id'] . '" class=" bg-[#DCDF9D] text-white py-[1vh] px-[1vw] hover:bg-red-400 hover:translate-y-[3px]">ABORT TEAM</button>
                                    </form>
                                    <form action="./teamPage.php" method="post">
                                        <button type="submit" value="' . $row['team_id'] . '" name="team_id" id="team_id" class="bg-green-300 text-white py-[1vh] px-[1vw] hover:bg-green-400 hover:translate-y-[3px]">Get Details</button>
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
                echo '<div  class="flex justify-center col-span-3 w-[100%] translate-x-[-2vw]"><img src="../images/err.png" alt=""></div>'; 
            }
            ?>
        </div>
        <p class="text-lg col-span-3 rounded-lg flex mt-[1vh] w-[100%] pr-[3vw] pl-[1vw] border-black border-[2px] bg-white">As Member ⬇️</p>
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
                                <div><img src="../images/Timg.png" alt="" class="rounded-t-[40px]">
                                </div>
                                <div class="bg-white w-[100%] rounded-b-[40px] py-[2vh]">
                                    <p class="px-[2vw] py-[2vh] text-blue-400"><b>'.$row1['teamname'].'</b></p>
                                    <div class="flex justify-center">
                                        <form action="./teamPage.php" method="post">
                                        <button type="submit" value="' . $row1['team_id'] . '" name="team_id" id="team_id" class="bg-green-300 text-white py-[1vh] px-[1vw] hover:bg-green-400 hover:translate-y-[3px]">Get Details</button>
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
            echo '<div  class="flex justify-center col-span-3 w-[100%] translate-x-[-2vw]"><img src="../images/err.png" alt=""></div>'; 
            ?>
        </div>
        <p class="text-lg col-span-3 rounded-lg flex mt-[1vh] w-[100%] pr-[3vw] pl-[1vw] border-black border-[2px] bg-white">TEAMS IN ACTION ⬇️</p>
        <div class="grid grid-flow-row overflow-y-auto no-scrollbar h-[40vh]">
                <?php
                    $sql = "SELECT * FROM `teams` WHERE `visibility`=1 AND `vacancy`>0";
                    $result = mysqli_query($conn, $sql);
                    $count = 0;
                    if(mysqli_num_rows($result) > 0)
                    {
                        $uid = $_SESSION['uid'];
                        echo '<div class="w-[90%] h-[30vh] flex justify-between items-center border-white border-[2px] translate-x-[2vw] rounded-[40px]">';
                        for($i=0;$i<mysqli_num_rows($result);$i++)
                        {
                            $row = mysqli_fetch_assoc($result);
                            $tid = $row['team_id'];
                            $sql = "SELECT * FROM `relations` WHERE `user_id` = '$uid' AND `team_id` = '$tid' ";
                            $result1 = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($result1) == 1)
                                continue;
                            echo ' <img src="../images/timg.jpg" alt="" class="h-[30vh] rounded-l-[40px]">
                    <div>
                        <p class="text-black">'.$row['teamname'].'</p>
                        <p>'.$row['description'].'</p>
                    </div>
                    <form action="">
                        <button class="bg-orange-500 text-white py-[2vh] px-[1vw] mx-[2vw] hover:translate-x-[2px]">Request to join</button>
                    </form>';
                    $count++;
                        }
                    }
                    if($count == 0)
                    {
                        echo '<div class="w-[90%] h-[30vh] flex justify-between items-center translate-x-[2vw] rounded-[40px]">';
                        echo '  <div class="flex justify-center w-[100%]"><img src="../images/err.png" alt="" ></div>';   
                    }
                ?>
            </div>
        </div>
    </div>
</div>
</body>

</html>