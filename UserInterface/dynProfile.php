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
    <title>Profile</title>
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
        from{
            opacity: 0;
        }
        to{
            opacity: 100;
            visibility: visible;
        }
    }
    </style>
    
</head>

<body class="overflow-y-scroll no-scrollbar flex justify-center bg-[#FFFADA] max-[450px]:text-[7px] max-[600px]:text-[8px] max-[900px]:text-[11px]">
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $uid = $_POST['user_id'];
        $sql = "SELECT * FROM `users` WHERE `user_id` = '$uid'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $sql = "SELECT * FROM `relations` WHERE `user_id` = '$uid'";
        $result = mysqli_query($conn, $sql);
        $no = mysqli_num_rows($result);
        $count = 1;
        $name = $row['username'];
        $contact = $row['contact'];
        $email= $row['email'];
        echo '<div class="grid grid-cols-2 shadow-lg my-[6vh] rounded-[40px] w-[80vw] h-[90vh]">
       <div class="flex flex-col justify-around items-center bg-blue-300 shadow-lg rounded-[40px]">
            <img src="../images/PP.png" alt="" class="w-[35%]">
            <div class="flex flex-col w-[100%] items-center">
            <p class="text-xl min-[743px]:text-2xl hover:text-blue-500 border-b-[3px] border-black w-[75%] flex justify-center">DETAILS</p>
            <p class="text-md min-[743px]:text-lg hover:text-blue-500 border-b-[3px] border-black w-[75%]">Name: <b class="text-md min-[743px]:text-xl">'.$name.'</b></p>
            <p class="text-md min-[743px]:text-lg hover:text-blue-500 border-b-[3px] border-black w-[75%]">Email: <b class="text-md min-[743px]:text-xl">'.$email.'</b></p>
            <p class="text-md min-[743px]:text-lg hover:text-blue-500 border-b-[3px] border-black w-[75%]">Contact: <b class="text-md min-[743px]:text-xl">'.$contact.'</b></p>
            </div>';
            if($_SESSION['uid'] == $_POST['user_id'])
                echo '<a href="../backendLogics/logout_backend.php" class="px-[1vw] py-[1vh] bg-red-400 hover:bg-red-500 text-white text-md min-[743px]:text-lg rounded-[40px]">Log Out</a>';
       echo '</div>
       <div class="flex flex-col-reverse justify-around items-center col-span-1 shadow-lg rounded-[40px] bg-[#F8EEEC]">
       <p class="min-[650px]:text-2xl min-[950px]:text-3xl text-xl text-blue-700">Total Teams you are part of: '.$no.'</p>
            <div class="flex flex-col justify-center items-center w-[100%]">
                <p class="min-[600px]:text-2xl min-[900px]:text-3xl text-lg border-black border-b-[3px] my-[1vh]">Teams you are part of</p>
                <div class="grid grid-flow-row w-[30vw] max-h-[calc(3*4rem)] bg-blue-200 border-white border-[5px] overflow-y-auto auto-rows-[4rem] no-scrollbar">
                    <div class = "flex justify-between items-center w-[100%] px-[2vw]"><p><b>S.no</b></p>
                    <p><b>Team Name</b></p>
                    <p><b>Admin</b></p></div>';
                    if($_POST['user_id'] != $_SESSION['uid'])
                    {
                        echo '<script>
                        document.title = "'.$name.'-profile"</script>';
                    }
                    else
                    {
                        echo '<script>
                        document.title = "Your-profile"</script>';
                    }
        if($no >0 )
        {
            for($i = 0; $i < $no; $i++)
            {
                $row1 = mysqli_fetch_assoc($result);
                $team_id = $row1['team_id'];
                $sql = "SELECT * FROM `teams` WHERE `team_id` = '$team_id'";
                $result2 = mysqli_query($conn, $sql);
                $row2 = mysqli_fetch_assoc($result2);
                $tname = $row2['teamname'];
                $uid = $row2['team_admin_id'];
                $sql = "SELECT * FROM `users` WHERE `user_id` = '$uid'";
                $result1 = mysqli_query($conn, $sql);
                $row2 = mysqli_fetch_assoc($result1);
                $tadname = $row2['username'];
                echo '<div class = "flex justify-between bg-green-300 items-center w-[100%] px-[2vw]">
                    <p>'.($count++).'</p>
                    <p>'.$tname.'</p>';
                if($uid != $_SESSION['uid'])
                {
                    echo ' <p><b>'.$tadname.'</b></p></div>';
                }
                else
                {
                    echo ' <p><b>You</b></p></div>';
                }
            }
            echo '</div>';
        }
        else{
            echo '</div><img src="../images/err.png" alt="" class = "relative top-[2vh]">';
        }
        echo '
    </div>';
    }
?>
</body>
</html>
