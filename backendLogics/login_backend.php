<?php 
    include 'db.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $email = $_POST['email'];
        $password = $_POST['pass'];
        $sql1 = "SELECT * FROM `users` WHERE `email` = '$email'";
        $result1 = mysqli_query($conn, $sql1);
        if(empty($email)||empty($password))
            echo "<script>alert('Please enter your credentials properly.Redirecting to login Page...'); window.location.href = '/TeamSpirit/UserInterface/login.php';</script>";    
        else if(mysqli_num_rows($result1) > 0)
        {
            $row = mysqli_fetch_assoc($result1);
            $hash = $row['password'];
            if(password_verify($password, $hash))
            {
                $_SESSION['username'] = $row['username'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['contact'] = $row['contact'];
                $_SESSION['uid'] = $row['user_id'];
                echo "<script>alert('Successfully Logged In.Redirecting to dashboard...'); window.location.href = '/TeamSpirit/UserInterface/dashboard.php';</script>";
            }
            else
            {
                echo "<script>alert('Incorrect password .Redirecting to dashboard...'); window.location.href = '/TeamSpirit/UserInterface/login.php';</script>";
            }
        }
        else
        {
            echo "<script>alert('Looks like your are not in the records, Get signed in as our member.Redirecting to sign in page...'); window.location.href = '/TeamSpirit/UserInterface/signin.php';</script>";   
        }
    }
?>