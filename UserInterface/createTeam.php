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
<body class="flex flex-col items-center justify-center min-h-screen bg-[#FFFADA] bg-[url(../images/BackCreate.jpeg)] bg-auto bg-center">
<nav class="flex justify-end w-screen relative bottom-[13vh] right-[3vw]">
    <a href="./dashboard.php" class="text-2xl bg-[#D9D9D9] bg-gradient-to-b from-[#D9D9D9] to-[#FFFFFF] p-[0.75rem] rounded-[2vw] ani2 invisible fixed top-[2vh]">↩️</a>
</nav>
<div class="flex justify-center flex-col items-center border-[2px] border-gray-400 py-[5vh] w-[80vw] rounded-[40px]">
    <p class="mb-[7vh] text-5xl font-medium text-[#FFFFFF] ani1 invisible text-blue-400" style="font-family: cursive;">CREATE YOUR TEAM</p>
    <form action="../backendLogics/createTeam_backend.php" method="post">
        <div class="grid grid-cols-12 w-[75vw] border-[2px] border-black ani2 invisible">
            <div class="col-span-12 flex justify-between py-[1vh] px-[2vw]">
                <label for="teamname"><b>Team Name</b></label>
                <input type="text" name="teamname" id="teamname" placeholder="Name" class="bg-white text-black">
            </div>
            <p class="col-span-1 px-[2vw] py-[2vh] border-[1px] border-black overflow-auto">S.No</p>
            <p class="col-span-3 px-[2vw] py-[2vh] border-[1px] border-black overflow-auto">Name</p>
            <p class="col-span-2 px-[2vw] py-[2vh] border-[1px] border-black overflow-auto">Contact</p>
            <p class="col-span-5 px-[2vw] py-[2vh] border-[1px] border-black overflow-auto">Email</p>
            <p class="col-span-1 px-[2vw] py-[2vh] border-[1px] border-black overflow-hidden">In/Out</p>
            <?php
            $sql = "SELECT * FROM `users`";
            $result = mysqli_query($conn, $sql);
            $count = 1;
            for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                $row = mysqli_fetch_assoc($result);
                $uid = $row['user_id'];
                if ($row['user_id'] != $_SESSION['uid']) {
                    echo '<p class="col-span-1 px-[2vw] py-[1vh] border-[1px] border-black">' . ($count++) . '</p>
                        <p class="col-span-3 px-[2vw] py-[1vh] border-[1px] border-black hover:bg-blue-400">' . $row['username'] . '</p>
                        <p class="col-span-2 px-[2vw] py-[1vh] border-[1px] border-black hover:bg-blue-400">' . $row['contact'] . '</p>
                        <p class="col-span-5 px-[2vw] py-[1vh] border-[1px] border-black hover:bg-blue-400">' . $row['email'] . '</p>';
                      echo '<p class="col-span-1 px-[2vw] py-[1vh] border-[1px] border-black hover:bg-blue-400 flex justify-center">
                            <label for="' . $row['user_id'] . '"></label>
                            <input type="checkbox" name="' . $row['user_id'] . '" id="user_id" value=' . $row['user_id'] . '>
                        </p>';
                    
                }
            }
            $date = date("Y-m-d");
            echo '<div class="col-span-12 flex py-[1vh] px-[2vw]">
                <label for="deadline" class="w-[10vw]"><b>Deadline</b></label>
                <input type="date" name="deadline" id="deadline" placeholder="Deadline" min="' . $date . '" class=" text-blue-600">
                </div>';
            ?>
            <div class="col-span-12 px-[2vw] flex py-[1vh] px-[2vw]">
                <label for="description" class="w-[10vw]"><b>Describe motive:</b></label>
                    <textarea class="p-[3px]" name="description" id="description" rows="5" cols="125"></textarea>
            </div>
            <div class="col-span-12 px-[2vw] flex py-[1vh] px-[2vw]">
                <label for="vis" class="w-[10vw]"><b>Set Visibility: </b></label>
                <select name="vis" id="vis">
                    <option value="0">Not Visible(visible only to Team Members)</option>
                    <option value="1">Visible(visible to Everyone)</option>
                </select>
             </div>
            <div class="col-span-12 px-[2vw] flex py-[1vh] px-[2vw]">
                <label for="limit" class="w-[10vw]"><b>Set Team Limit: </b></label>
                <input type="number" name="limit" id="limit" min=2>
            </div>
            <div class="col-span-12 flex justify-center hover:bg-blue-400">
                    <button class="w-[100%] h-[100%] py-[1vh]">Create</button>
            </div>
        </div>
    </form>
    </div>
</body>

</html>