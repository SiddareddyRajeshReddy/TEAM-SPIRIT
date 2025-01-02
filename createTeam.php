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
            animation-delay: 1s;
            animation-timing-function: cubic-bezier(0.6, 0.04, 0.98, 0.335);
            animation-fill-mode: forwards;
        }

        .ani2 {
            animation-name: MyAnimation1;
            animation-duration: 2s;
            animation-delay: 3s;
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

<body class="bg-gradient-to-r from-[#A1ED86] to-[#4CC0DB] flex flex-col items-center justify-center min-h-screen">
    <div class="flex items-center justify-end w-[100vw]">
        <a href="./dashboard.php" class="text-2xl bg-[#D9D9D9] bg-gradient-to-b from-[#D9D9D9] to-[#FFFFFF] p-[0.75rem] rounded-[2vw] mx-[14vw] ani2 invisible">↩️</a>
    </div>
    <p class="mb-[7vh] text-5xl font-medium text-[#FFFFFF] ani2 invisible ">CREATE YOUR TEAM</p>
    <form action="../backendLogics/createTeam_backend.php" method="post">
        <div class="grid grid-cols-12 w-[75vw] bg-gray-400 rounded-md border-[5px] border-gray-500 ani1 invisible">
            <div class="col-span-12 flex justify-between bg-white py-[1vh] px-[2vw]">
                <label for="teamname"><b>Team Name</b></label>
                <input type="text" name="teamname" id="teamname" placeholder="Name" class="bg-white text-black">
            </div>
            <p class="col-span-1 px-[2vw] py-[2vh] border-2 border-black">S.No</p>
            <p class="col-span-3 px-[2vw] py-[2vh] border-2 border-black">Name</p>
            <p class="col-span-2 px-[2vw] py-[2vh] border-2 border-black">Contact</p>
            <p class="col-span-5 px-[2vw] py-[2vh] border-2 border-black">Email</p>
            <p class="col-span-1 px-[2vw] py-[2vh] border-2 border-black">In/Out</p>
            <?php
            $sql = "SELECT * FROM `users`";
            $result = mysqli_query($conn, $sql);
            $count = 1;
            for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                $row = mysqli_fetch_assoc($result);
                if ($row['user_id'] != $_SESSION['uid']) {
                    echo '<p class="col-span-1 px-[2vw] py-[1vh] border-2 border-black bg-gray-100">' . ($count++) . '</p>
                        <p class="col-span-3 px-[2vw] py-[1vh] border-2 border-black bg-gray-100">' . $row['username'] . '</p>
                        <p class="col-span-2 px-[2vw] py-[1vh] border-2 border-black bg-gray-100">' . $row['contact'] . '</p>
                        <p class="col-span-5 px-[2vw] py-[1vh] border-2 border-black bg-gray-100">' . $row['email'] . '</p>
                        <p class="col-span-1 px-[2vw] py-[1vh] border-2 border-black bg-gray-100 flex justify-center">
                            <label for="' . $row['user_id'] . '"></label>
                            <input type="checkbox" name="' . $row['user_id'] . '" id="user_id" value=' . $row['user_id'] . '>
                        </p>';
                }
            }
            $date = date("Y-m-d");
            echo '<div class="col-span-6 flex justify-between bg-white py-[1vh] px-[2vw]">
                <label for="deadline"><b>Deadline</b></label>
                <input type="date" name="deadline" id="deadline" placeholder="Deadline" min="' . $date . '" class="bg-white text-red-600">
                </div>';
            ?>
            <p class="col-span-5 bg-white"></p>
            <button class="bg-red-500">Submit</button>
        </div>
    </form>
</body>

</html>