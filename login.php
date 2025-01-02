<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
       .ani1 {
            animation-name: MyAnimation1;
            animation-duration: 2s;
            animation-delay: 800ms;
            animation-timing-function: cubic-bezier(0.6, 0.04, 0.98, 0.335);
            animation-fill-mode: forwards;
        }

        .ani2 {
            animation-name: MyAnimation2;
            animation-duration: 2s;
            animation-delay: 800ms;
            animation-fill-mode: forwards;
        }

        @keyframes MyAnimation1 {
            0% {
                opacity: 0%;
                visibility: visible;
            }

            25% {
                opacity: 25%;
            }

            50% {
                opacity: 50%;
            }

            75% {
                opacity: 75%;
            }

            100% {
                opacity: 100%;
                visibility: visible;
            }
        }

        @keyframes MyAnimation2 {
            0% {
                opacity: 35%;
            }

            33% {
                opacity: 45%;
            }

            50% {
                opacity: 55%;
            }

            66% {
                opacity: 75%;
            }

            100% {
                width: 40vw;
                transform: translate(-20vw, -3vh);
                opacity: 100%;
            }
        }
    </style>
</head>

<body class="ani bg-gradient-to-b from-[#5FC4DB] to-[#96C697] flex justify-center items-center h-screen">
    <p class="invisible ani1 absolute top-[10vh] text-3xl" style="font-family: cursive;">Login And Work as a team</p>
    <div class="w-[40vw] h-[80vh] absolute left-[55vw] flex items-center justify-center">
        <form action="../backendLogics/login_backend.php" method="post" class="invisible ani1 text-2xl pl-[2vw]">
            <p class="invisible ani1 absolute left-[18vw] top-[17vh] text-3xl" style="font-family: cursive;">Log In</p>
            <label for="email"></label> 
            <input type="email" id="email" placeholder="Email" name="email" autocomplete="off" class="block py-[1.25rem] px-[7vw] my-[4vh] rounded-[40px] bg-[#D9D9D9]">
            <label for="pass"></label>
            <input type="password" id="pass" placeholder="password" name="pass" autocomplete="off" class="block py-[1.25rem] px-[7vw] my-[4vh] rounded-[40px] bg-[#D9D9D9]">
            <button type="submit" class="absolute left-[1vw] bg-gradient-to-b from-[#E58B57] to-[#F7F7F7] px-[2vw] py-[0.80rem] rounded-[35px]">Log In</button>
        </form>
    </div>
    <div class="w-[50vw] absolute top-[30vh] left-[25vw] ani2 opacity-25">
        <img src="../images/Logo.png" alt="">
    </div>
    <p class="invisible ani1 absolute bottom-[10vh] text-xl" style="font-family: cursive;">Don't have a account? <a href="./signin.php" class="text-red-800">Sign In</a></p>
</body>

</html>