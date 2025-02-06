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
    <title>Create Team</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .ani1 {
            animation-name: MyAnimation1;
            animation-duration: 2s;
            animation-delay: 200ms;
            animation-timing-function: cubic-bezier(0.6, 0.04, 0.98, 0.335);
            animation-fill-mode: forwards;
        }

        .ani2 {
            animation-name: MyAnimation1;
            animation-duration: 2s;
            animation-delay: 200ms;
            animation-timing-function: cubic-bezier(0.6, 0.04, 0.98, 0.335);
            animation-fill-mode: forwards;
        }

        @keyframes MyAnimation1 {
            0% {
                opacity: 0%;
                visibility: visible;
            }

            50% {
                opacity: 50%;
            }

            100% {
                opacity: 100%;
                visibility: visible;
            }
        }
    </style>
</head>
<body class="flex flex-col items-center justify-center min-h-screen bg-[#FFFADA]">
<nav class="flex justify-end w-screen relative bottom-[13vh] right-[3vw]">
    <a href="./dashboard.php" class="text-2xl bg-[#D9D9D9] bg-gradient-to-b from-[#D9D9D9] to-[#FFFFFF] p-[0.75rem] rounded-[2vw] ani2 invisible fixed top-[2vh]">↩️</a>
</nav>
<p class="col-span-1 px-[2vw] py-[1vh] border-[1px] border-black hover:bg-blue-400 bg-white flex justify-center text-red-500 rounded-[40px]">A user could only be able to work in only 5 teams at time</p>
<div class="bg-[#F8EEEC] flex justify-center flex-col items-center border-[2px] border-gray-400 py-[5vh] w-[80vw] rounded-[40px]">
    <p class="mb-[7vh] text-5xl font-medium text-[#FFFFFF] ani1 invisible text-blue-400" style="font-family: cursive;">CREATE YOUR TEAM</p>
    <form action="../backendLogics/createTeam_backend.php" method="post">
        <div class="grid grid-cols-12 w-[75vw] border-[2px] border-black ani2 invisible bg-blue-400">
            <div class="col-span-12 flex justify-between bg-white py-[1vh] px-[2vw]">
                <label for="teamname"><b>Team Name</b></label>
                <input type="text" name="teamname" id="teamname" placeholder="Name" class="bg-white text-black">
            </div>
            <p class="col-span-1 px-[2vw] py-[2vh] border-[1px] border-black overflow-auto">S.No</p>
            <p class="col-span-3 px-[2vw] py-[2vh] border-[1px] border-black overflow-auto">Name</p>
            <p class="col-span-2 px-[2vw] py-[2vh] border-[1px] border-black overflow-auto">Contact</p>
            <p class="col-span-5 px-[2vw] py-[2vh] border-[1px] border-black overflow-auto">Email</p>
            <p class="col-span-1 px-[2vw] py-[2vh] border-[1px] border-black overflow-auto">In/Out</p>
            <?php
            $sql = "SELECT * FROM `users`";
            $result = mysqli_query($conn, $sql);
            $count = 1;
            for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                $row = mysqli_fetch_assoc($result);
                $uid = $row['user_id'];
                if ($row['user_id'] != $_SESSION['uid']) {
                    echo '<p class="col-span-1 px-[2vw] py-[1vh] border-[1px] border-black bg-white">' . ($count++) . '</p>
                        <p class="col-span-3 px-[2vw] py-[1vh] border-[1px] border-black hover:bg-blue-400 bg-white">' . $row['username'] . '</p>
                        <p class="col-span-2 px-[2vw] py-[1vh] border-[1px] border-black hover:bg-blue-400 bg-white">' . $row['contact'] . '</p>
                        <p class="col-span-5 px-[2vw] py-[1vh] border-[1px] border-black hover:bg-blue-400 bg-white">' . $row['email'] . '</p>';
                     $sql = "SELECT * FROM `relations` where `user_id` = '$uid'";
                     $result1 = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result1) < 5)
                    {
                        echo '<p class="col-span-1 px-[2vw] py-[1vh] border-[1px] border-black hover:bg-blue-400 bg-white flex justify-center">
                            <label for="' . $row['user_id'] . '"></label>
                            <input type="checkbox" name="' . $row['user_id'] . '" id="user_id" value=' . $row['user_id'] . '>
                        </p>';
                    }
                    else
                    {
                        echo '<p class="col-span-1 px-[2vw] py-[1vh] border-[1px] border-black hover:bg-blue-400 bg-white flex justify-center text-red-500 ">
                                '.mysqli_num_rows($result1).' 
                    </p>';
                    }
                }
            }
            $date = date("Y-m-d");
            echo '<div class="col-span-12 flex bg-white py-[1vh] px-[2vw]">
                <label for="deadline" class="mr-[7vw]"><b>Deadline</b></label>
                <input type="date" name="deadline" id="deadline" placeholder="Deadline" min="' . $date . '" class="bg-white text-blue-600">
                </div>';
            ?>
            <div class="col-span-12 flex justify-center bg-green-400 hover:bg-blue-400">
                <button class="w-[100%] h-[100%] py-[1vh]">Create</button>
            </div>
        </div>
    </form>
    </div>
</body>

</html>