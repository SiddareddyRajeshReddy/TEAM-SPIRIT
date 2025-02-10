<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
           0%{
                opacity: 0%;
                visibility: visible;
           }
           25%{
                opacity: 25%;
           }
           50%{
                opacity: 50%;
           }
           75%{
                opacity: 75%;
           }
           100%{
                opacity: 100%;
                visibility: visible;
           }
        }

        @keyframes MyAnimation2 {
            from {}

            to {
                opacity: 100%;
            }
        }
    </style>
</head>

<body class="ani bg-green-300 flex flex-col justify-center items-center text-xs md:text-sm xl:text-2xl lg:text-md">
    <div class="w-[42vw] relative top-[10vh]">
        <img src="../images/TEAM SPIRIT.png" alt="" class="invisible ani1">
    </div>
    <div class="w-[50vw] absolute top-[27vh]">
        <img src="../images/Logo2.png" alt="" class="opacity-[0.25] ani2">
    </div>
    <div class="absolute w-[75vw] flex justify-center items-center left-[12.5vw] top-[86vh] invisible ani1">
        <ul class="flex items-center justify-center">
            <li><a href="./login.php" class="m-[10vw] bg-green-400 hover:bg-green-500 px-[2vw] py-[0.75rem] rounded-[40px]">Log In</a></li>
            <li class="text-5xl">
                <p>|</p>
            </li>
            <li><a href="./signin.php" class="m-[10vw] bg-green-400 hover:bg-green-500 px-[2vw] py-[0.75rem] rounded-[40px]">Sign In</a></li>
        </ul>
    </div>
</body>

</html>