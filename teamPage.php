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
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-[#A1ED86] to-[#4CC0DB] flex flex-col items-center min-h-screen">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $team_id = $_POST['team_id'];
        }
        $sql = "SELECT * FROM `teams` WHERE `team_id` = '$team_id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $uaid = $row['team_admin_id'];
        echo ' <p class="mt-[10vh] mb-[5vh] text-5xl font-medium text-[#FFFFFF]">'.$row['teamname'].'</p>';
        $sql = "SELECT * FROM `users` WHERE `user_id` = '$uaid'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo ' <form action="../backendLogics/team_backend.php" method="post">
        <div class="grid grid-cols-12 w-[75vw] bg-gray-400 rounded-md border-[5px] border-gray-500 my-[5vh]">';
        echo ' <p class="col-span-2 px-[2vw] py-[1vh] bg-gray-100"><b>TEAM ADMIN</b></p>
                <p class="col-span-2 px-[2vw] py-[1vh] bg-gray-100 flex justify-center">' . $row['username'] . '</p>
                <p class="col-span-2 px-[2vw] py-[1vh] bg-gray-100 flex justify-center">' . $row['contact'] . '</p>';
        if($_SESSION['uid'] != $uaid)
        {
            echo '<p class="col-span-4 px-[2vw] py-[1vh] bg-gray-100 flex justify-center">' . $row['email'] . '</p>
            <button type="submit" id="reciever_id" name="reciever_id" value="'.implode(" ",array($row['user_id'], $team_id)).'" class="col-span-2 bg-green-500 border-2 border-black rounded-bl-[40px] hover:rounded-bl-[0px]">Message</button>';
        }
        else
        {
            echo '<p class="col-span-6 px-[2vw] py-[1vh] bg-gray-100 flex justify-center">' . $row['email'] . '</p>';
        }
        echo '</div></form>';

        echo '<div class="grid grid-cols-12 w-[75vw] bg-gray-400 rounded-md border-[5px] border-gray-500">
                <div class="col-span-12 flex justify-center bg-white py-[1vh] px-[2vw]">
                        <p><b>Team Members</b></p>
                </div>
                <p class="col-span-1 px-[2vw] py-[2vh] border-2 border-black">S.No</p>
                <p class="col-span-2 px-[2vw] py-[2vh] border-2 border-black">Name</p>
                <p class="col-span-2 px-[2vw] py-[2vh] border-2 border-black">Contact</p>
                <p class="col-span-5 px-[2vw] py-[2vh] border-2 border-black">Email</p>
                <p class="col-span-2 px-[2vw] py-[2vh] border-2 border-black">Action</p>';
        $sql = "SELECT * FROM `relation` WHERE `team_id` = '$team_id'";
        $result = mysqli_query($conn, $sql);
        $count = 1;
        for ($i = 0; $i < mysqli_num_rows($result); $i++) {
            $row = mysqli_fetch_assoc($result);
            $uid = $row['user_id'];
            $sql = "SELECT * FROM `users` WHERE `user_id` = '$uid'";
            $result1 = mysqli_query($conn, $sql);
            $row1 = mysqli_fetch_assoc($result1);
            if ($row1['user_id'] != $uaid) {
                echo '<p class="col-span-1 px-[2vw] py-[1vh] border-2 border-black bg-gray-100">' . ($count++) . '</p>
                        <p class="col-span-2 px-[2vw] py-[1vh] border-2 border-black bg-gray-100">' . $row1['username'] . '</p>
                        <p class="col-span-2 px-[2vw] py-[1vh] border-2 border-black bg-gray-100">' . $row1['contact'] . '</p>';
                        if($_SESSION['uid'] == $uaid)
                        {
                            echo '<p class="col-span-5 px-[2vw] py-[1vh] border-2 border-black bg-gray-100">' . $row1['email'] . '</p>
                            <form action="../backendLogics/team_backend.php" method="post" class="col-span-1 bg-green-500 border-2 border-black rounded-bl-[40px] hover:rounded-bl-[0px] flex justify-center">
                                <button type="submit" id="reciever_id" name="reciever_id" value="'.implode(" ",array($row1['user_id'], $team_id)).'">Message</button>
                            </form>
                            <form action="./AuthenticationPage.php" method="post" class="col-span-1 bg-red-600 border-2 border-black rounded-bl-[40px] hover:rounded-bl-[0px] flex justify-center">
                                <button type="submit" id="0" name="0" value="'.implode(" ",array($row1['user_id'], $team_id)).'">Remove</button> 
                            </form>';
                        }
                        else if($_SESSION['uid'] != $row1['user_id'])
                        {
                             echo '<p class="col-span-5 px-[2vw] py-[1vh] border-2 border-black bg-gray-100">' . $row1['email'] . '</p>
                             <form action="../backendLogics/team_backend.php" method="post" class="col-span-1 bg-green-500 border-2 border-black rounded-bl-[40px] hover:rounded-bl-[0px] flex justify-center">
                                <button type="submit" id="reciever_id" name="reciever_id" value="'.implode(" ",array($row1['user_id'], $team_id)).'">Message</button>
                            </form>';
                        }
                        else
                        {
                            echo '<p class="col-span-7 px-[2vw] py-[1vh] border-2 border-black bg-gray-100">' . $row1['email'] . '</p>';   
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
        <div class="grid grid-cols-3 w-[75vw] bg-white rounded-md border-[5px] border-gray-500 my-[5vh]">
        <p class="py-[1vh] flex justify-center text-red-500">DeadLine</p>
        <p class="py-[1vh] flex justify-center">YYYY-MM-DD : '.$row['deadline'].'</p>
        <p class="py-[1vh] flex justify-center">No of days remaining : '.($daysRemain+1).'</p>
         <a href="./dashboard.php" class="py-[1vh] flex justify-center text-white bg-red-500 col-span-3">RETURN TO DASHBOARD</a>
    </div>';
        ?>
</body>

</html>