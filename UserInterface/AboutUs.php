<?php
include '/xampp/htdocs/TeamSpirit/backendLogics/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Page</title>
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
        0%{
            opacity: 0;
            visibility: visible;
        }
        25%{
            opacity: 0.25;
        }
        50%{
            opacity: 0.5;
        }
        100%{
            opacity: 1;
            visibility: visible;
        }
    }
    </style>
    
</head>

<body class="overflow-y-scroll no-scrollbar flex justify-center flex-col items-center bg-[#FFFADA]">
    <div class="w-screen flex flex-col justify-center items-center">
        <img src="../images/TEAM SPIRIT.png" alt="" class="w-[75vw] my-[6vh]">
        <p class=" text-green-400 text-4xl text-center my-[6vh] underline decoration-[2px] font-serif">TEAM SPIRIT - A website created using HTML Tailwind CSS JavaScript and PHP which finds its use in collaborating users in a team</p>
        <p class="text-yellow-600 text-xl text-center my-[5vh] w-[75vw] font-mono">"TEAM SPIRIT" is a dynamic and feature-rich website built using a combination of modern web technologies, including HTML, Tailwind CSS, JavaScript, and PHP. This platform is designed to help individuals collaborate efficiently within teams, enhancing communication, project management, and overall teamwork. Whether you are working on a small group project or a large-scale initiative, "TEAM SPIRIT" provides an intuitive, user-friendly interface to streamline coordination, tasks, and collaboration across teams.</p>
        <ul class="flex items-center max-[700px]:flex-col max-[700px]:h-[30vw] w-screen justify-around mt-[3vh] mb-[2vh] ">
            <li class="flex text-blue-500"><p style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">Linked-In &nbsp</p><a href="https://www.linkedin.com/in/s-rajesh-reddy/" target="_blank"><img src="../images/linkedin.png" alt="" class="w-[25px] hover:translate-y-[1px] cursor-grab"></a></li>
            <li class="flex text-gray-500"><p style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;"><p>&ltSource Code> &nbsp</p><a href="https://github.com/SiddareddyRajeshReddy/TEAM-SPIRIT" target="_blank"><img src="../images/Github.png" alt="" class="w-[25px] hover:translate-y-[1px] cursor-grab"></a></li>
            <li class="flex"><img src="../images/phone.png" alt="" class="w-[25px]"><p class="text-gray-400 hover:text-gray-500 cursor-copy" style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">&nbsp+91 8522840158</p></li>
            <li class="flex"><img src="../images/Gmail.png" alt="" class="w-[25px]"><p class="text-gray-400 hover:text-gray-500 cursor-copy" style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">&nbspb230065@nitsikkim.ac.in</p></li>
        </ul>
    </div>
</body>

</html>