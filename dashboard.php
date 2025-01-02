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
        .ani1 {
            animation-name: MyAnimation1;
            animation-duration: 2s;
            animation-delay: 800ms;
            animation-timing-function: cubic-bezier(0.6, 0.04, 0.98, 0.335);
            animation-fill-mode: forwards;
        }

        @keyframes MyAnimation1 {
            0% {
                opacity: 0%;
            }

            50% {
                opacity: 50%;
            }

            100% {
                opacity: 100%;
                visibility: visible;
            }
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>

<body class="bg-gradient-to-r from-[#A1ED86] to-[#4CC0DB] flex flex-col items-center min-h-screen overflow-x-hidden overflow-y-scroll no-scrollbar">
    <nav class="h-[12vh] w-[100vw] bg-gradient-to-r from-[#A1ED86] to-[#4CC0DB] flex items-center justify-between invisible ani1 shadow-md">
        <div class="flex justify-around w-[30vw]">
            <a href="./dynProfile.php"><img src="../images/PP.png" alt="" class="w-[5vw]"></a>
            <?php
            $name = $_SESSION['username'];
            echo "<p class='flex items-center text-4xl text-white underline'><b>" . strtoupper($name) . "</b></p>";
            ?>
        </div>
        <div class="text-7xl flex justify-center font-medium text-[#D9D9D9]">
            <p>TEAM SPIRIT</p>
        </div>
        <div class="flex items-center justify-center w-[30vw] justify-around">
            <a href="./messageBox.php"><img src="../images/msg.png" alt="" class="w-[4vw]"></a>
            <a href="./createTeam.php">
                <div class="bg-[#D7E097] w-[3vw] h-[3vw] flex items-center justify-center rounded-[2vw]">
                    <p class="flex items-center">+</p>
                </div>
            </a>
            <a href="./AboutUs.php" class="text-2xl underline"><b>About Us</b></a>
            <a href="../backendLogics/logout_backend.php" class="text-2xl bg-[#D9D9D9] bg-gradient-to-b from-[#D9D9D9] to-[#FFFFFF] p-[0.75rem] rounded-[2vw]">Log Out</a>

        </div>
    </nav>
    <div class="ani1 opacity-[50%] bg-[url('../images/Logo.png')] w-[100vw] h-screen bg-auto bg-no-repeat bg-center my-[5vh] invisible">
        <div class="grid grid-cols-3 w-[90vw] relative left-[5vw] rounded-[50px] gap-y-[2vh] invisible ani1 bg-white bg-opacity-[50%]">

            <?php
            //random colour generator
            echo '<p class="text-lg col-span-3 rounded-lg flex justify-center"><b>Your ADMIN in these Teams</b></p>';
            $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F');
            $tadid = $_SESSION['uid'];
            $sql = "SELECT * FROM `teams` WHERE `team_admin_id` = '$tadid'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                    $color = '#';
                    for ($j = 0; $j < 6; $j++) {
                        $color = $color . $rand[rand(0, 15)];
                    }
                    $row = mysqli_fetch_assoc($result);
                    $deadline = $row['deadline'];
                    $date = date("Y-m-d");
                    $date1 = strtotime($date);
                    $date2 = strtotime($row['deadline']);
                    if ($date2 >= $date1) {
                        echo '<div class="flex justify-center items-center bg-[' . $color . '] rounded-tl-[40px] rounded-bl-[40px] bg-opacity-[50%] mb-[2vh]">
                                <img src="../images/gpp.png" alt=""  class="h-[20vh] py-[2vh]">
                            </div>
                            <div class="flex justify-center items-center bg-[' . $color . '] bg-opacity-[50%] text-5xl font-medium mb-[2vh]">
                                <p class="text-white">' . $row['teamname'] . '</p>
                            </div>
                            <div class="flex justify-center items-center rounded-tr-[40px] rounded-br-[40px] bg-[' . $color . '] bg-opacity-[50%] mb-[2vh]">
                            <form action="./teamPage.php" method="post">
                                <button type="submit" value="' . $row['team_id'] . '" name="team_id" id="team_id" class="bg-red-600 text-white py-[2vh] px-[1vw] rounded-br-[40px] rounded-tl-[40px]">Get Details</button>
                            </form>
                            <form action="./AuthenticationPage.php" method="post">
                               <button type="submit" id="team_id" name="team_id" value="' . $row['team_id'] . '" class="bg-red-600 text-white py-[2vh] px-[1vw] rounded-br-[40px] rounded-tl-[40px] mx-[2vw]">ABORT TEAM</button>
                           </form>';
                        echo '</div>';
                    } else {
                        $sql1 = "DELETE FROM `teams` WHERE `deadline` = '$deadline'";
                        mysqli_query($conn, $sql1);
                    }
                }
            } else {
                echo '<p class="text-lg col-span-3 rounded-lg flex justify-center py-[4vh] bg-red-600 rounded-bl-[40px] rounded-br-[40px]"><b>No Such Teams</b></p>';
            }
            ?>
        </div>
        <div class="grid grid-cols-3 w-[90vw] relative left-[5vw] top-[15vh] rounded-[50px] gap-y-[2vh] invisible ani1 bg-white bg-opacity-[50%]">

            <?php
            //random colour generator
            echo '<p class="text-lg col-span-3 rounded-lg flex justify-center"><b>Your a TEAM MEMBER in these Teams</b></p>';
            $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F');
            $usid = $_SESSION['uid'];
            $sql = "SELECT * FROM `relation` WHERE `user_id` = '$usid'";
            $result = mysqli_query($conn, $sql);
            $count = 0;
            if (mysqli_num_rows($result) > 0) {
                for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                    $color = '#';
                    for ($j = 0; $j < 6; $j++) {
                        $color = $color . $rand[rand(0, 15)];
                    }
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
                                echo '<div class="flex justify-center items-center bg-[' . $color . '] rounded-tl-[40px] rounded-bl-[40px] bg-opacity-[50%] mb-[2vh]">
                                    <img src="../images/gpp.png" alt=""  class="h-[20vh] py-[2vh]">
                                </div>
                                <div class="flex justify-center items-center bg-[' . $color . '] bg-opacity-[50%] text-5xl font-medium mb-[2vh]">
                                    <p class="text-white">' . $row1['teamname'] . '</p>
                                </div>
                                <div class="flex justify-center items-center rounded-tr-[40px] rounded-br-[40px] bg-[' . $color . '] bg-opacity-[50%] mb-[2vh]">
                                <form action="./teamPage.php" method="post">
                                    <button type="submit" id="team_id" name="team_id" value="' . $row1['team_id'] . '" class="bg-red-600 text-white py-[2vh] px-[1vw] rounded-br-[40px] rounded-tl-[40px]">Get Details</button>
                                </form>';
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
                echo '<p class="text-lg col-span-3 rounded-lg flex justify-center py-[4vh] bg-red-600 rounded-bl-[40px] rounded-br-[40px]"><b>No Such Teams</b></p>';
            ?>
        </div>
    </div>
</body>

</html>