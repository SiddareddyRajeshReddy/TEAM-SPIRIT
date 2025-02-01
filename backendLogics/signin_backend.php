<?php
    include 'db.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $name = $_POST['username'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $password = $_POST['pass'];
        if($name == null || $email == null ||  $contact == null || $password == null)
        {
            echo "<script>alert('You have not entered the credentials properly!!!Redirecting...'); window.location.href = '/TeamSpirit/UserInterface/signin.php';</script>";
        }
        else if(strlen($contact) != 10)
        {
            echo "<script>alert('You have not entered the contact details properly!!!Redirecting...'); window.location.href = '/TeamSpirit/UserInterface/signin.php';</script>";
        }
        else
        {
            $sql = "SELECT * FROM `users` WHERE `email` = '$email' ";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0)
            {
                echo "<script>alert('You have already registered!!!Redirecting...'); window.location.href = '/TeamSpirit/UserInterface/login.php';</script>";
            }
            else
            {
                $sql = "INSERT INTO `users`(`username`, `email`, `contact`, `password`) VALUES('$name', '$email', '$contact', '$password')";
                $result = mysqli_query($conn, $sql);
                if($result)
                    echo "<script>alert('You have successfully registered!!!Redirecting...'); window.location.href = '/TeamSpirit/UserInterface/login.php';</script>";
            }
        }
    }

?>