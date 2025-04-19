<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
                transform: translate(30vw, -3vh);
                opacity: 100%;
            }
        }
        #customAlert{
                color: red;
            }
    </style>
</head>
<body class="ani bg-green-200 flex justify-center items-center h-screen bg-[url(../images/BackCreate.jpeg)] bg-auto">
    <p class="invisible ani1 absolute top-[10vh] text-xl md:text-sm xl:text-3xl lg:text-md" style="font-family: cursive;">Sign up to start and become a member of team spirit</p>
    <div class="absolute left-[10vw] top-[20vh]">
        <form action="../backendLogics/signin_backend.php" method="post" class="invisible ani1 text-2xl bg-[#797979] bg-opacity-[50%] px-[2vw] py-[6vh] form rounded-[40px]">
            <label for="username">User Name</label>
            <input type="text" id="username" placeholder="Name" name="username" autocomplete="off" class="block bg-white w-[25vw] border-black border-[2px] py-[3px] pl-[0.5rem]">
            <div class="err text-[10px] text-red-600 flex justify-end w-[100%] p-[0px] m-[0px]"><P></P></div>
            <label for="email">Email</label>
            <input type="email" id="email" placeholder="Email" name="email" autocomplete="off" class="block bg-white w-[25vw] border-black border-[2px] py-[3px] pl-[0.5rem]">
            <div class="err1 text-[10px] text-red-600 flex justify-end w-[100%] p-[0px] m-[0px]"></div>
            <label for="contact">Contact</label>
            <input type="text" id="contact" placeholder="Contact" name="contact" autocomplete="off" class="block bg-white w-[25vw] border-black border-[2px] py-[3px] pl-[0.5rem]">
            <div class="err2 text-[10px] text-red-600 flex justify-end w-[100%] p-[0px] m-[0px]"></div>
            <label for="pass">Set Password</label>
            <input type="password" id="pass" placeholder="password" name="pass" autocomplete="off" class="block bg-white w-[25vw] border-black border-[2px] py-[3px] pl-[0.5rem]">
            <div class="err3 text-[10px] text-red-600 flex justify-end w-[100%] p-[0px] m-[0px]"></div>
            <button type="submit" class="bg-orange-300 my-[1vh] py-[0.5rem] px-[1rem] hover:bg-blue-400">Sign Up</button>
        </form>
        <p class="ml-[2vw] text-xl" style="font-family: cursive;">Head Back to<a href="./home.php" class="text-red-800">&nbspHome</a></p>
        <p class="ml-[2vw] text-xl" style="font-family: cursive;">Already have a account? <a href="./login.php" class="text-red-800">Login In</a></p>
        <script src="../jsfiles/signin.js"></script>
    </div>
    <div class="w-[50vw] absolute top-[30vh] left-[25vw] ani2 opacity-25">
        <img src="../images/LogoG.png" alt="">
    </div>
</body>
</html>