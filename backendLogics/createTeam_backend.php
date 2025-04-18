<?php
    include '/xampp/htdocs/TeamSpirit/backendLogics/db.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $tname = $_POST['teamname'];
        $tid = $_SESSION['uid'];
        $dl = $_POST['deadline'];
        $ds = $_POST['description'];
        $vs = $_POST['vis'];
        $l = $_POST['limit'];
        $c = count($_POST);
        $vc = $l - ($c - 5);
        var_dump($_POST);
        echo "$c";
        $sql = "SELECT * FROM `teams` WHERE `teamname` = '$tname'";
        $result = mysqli_query($conn,$sql);
        if($vc >= 0)
        {
            if(mysqli_num_rows($result) == 0)
            {
                $sql = "INSERT INTO `teams`(`teamname`, `team_admin_id`, `deadline`, `description`, `visibility`, `vacancy`) VALUES('$tname', '$tid', '$dl', '$ds', '$vs', '$vc')";
                $result = mysqli_query($conn,$sql);
                $sql ="SELECT * FROM `teams` WHERE `teamname` = '$tname'";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
                $team_id = $row['team_id'];
                $sql = "INSERT INTO `relations`(`user_id`, `team_id`) VALUES('$tid', '$team_id')";
                mysqli_query($conn,$sql);
                foreach ($_POST as $key => $value) {
                    if($key != "teamname" && $key != "deadline" && $key != "description" && $key != "vis" && $key!="limit")
                    {
                        $sql = "INSERT INTO `relations`(`user_id`, `team_id`) VALUES('$value', '$team_id')";
                        mysqli_query($conn,$sql);
                    }
                }
                echo "<script>alert('Team Created.Redirecting to your dashboard...'); window.location.href = '/TeamSpirit/UserInterface/dashboard.php';</script>"; 
            }
            else
            {
                echo "<script>alert('Team with same name not allowed, set different name.Redirecting to sign in page...'); window.location.href = '/TeamSpirit/UserInterface/createTeam.php';</script>"; 
            }
        }
        else{
            echo "<script>alert('Error definig Limit'); window.location.href = '/TeamSpirit/UserInterface/createTeam.php';</script>";
        }
    }
?>