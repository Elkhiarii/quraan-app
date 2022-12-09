<?php 
session_start();
if(!isset($_SESSION['users'])){
    header("location:login.php");
}
else{
    include("../config.php");
    $admin = $con->query("Select type from admin WHERE user = '".$_SESSION['users']."';")->fetchcolumn();
    $sqlf = "SELECT * FROM admin;";
    $radiof = $con->query($sqlf)->fetchall();
    if(isset($_POST["submit"]) and ($admin == 1) and isset($_POST["namei"]) and isset($_POST["typei"]) and isset($_POST["useri"]) and isset($_POST["emaili"]) and isset($_POST["passi"]))
    {
        $sql = "insert into admin(`fullname`,`email`,`user`,`PASSWORD`,`type`) value(?,?,?,md5(?),?);";
        $rst = $con->prepare($sql);
        $rst->execute([$_POST["namei"],$_POST["emaili"],$_POST["useri"],$_POST["passi"],$_POST["typei"]]);
    }
    else if(isset($_POST["change"])  and isset($_POST["id"]) and isset($_POST["type"]) and isset($_POST["pass"]) and ($admin == 1))
    {
        $sqlk = "update admin set  PASSWORD = md5(?) , type = ? WHERE id = ? ;";   
        $rstk = $con->prepare($sqlk);
        $rstk->execute([$_POST["pass"],$_POST["type"],$_POST["id"]]);
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        *{
            font-family: poppins;
        }
    </style>
    <title>Document</title>
</head>
<body  class="flex items-center justify-center w-screen h-screen space-x-6 bg-gray-300 p-5">

        <!-- Component Start -->
        <div class="flex flex-col items-center  w-16 h-full overflow-hidden text-gray-400 bg-gray-900 rounded  md:hidden">
            <a class="flex items-center justify-center mt-3" href="#">
                <svg class="w-8 h-8 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z" />
                </svg>
            </a>
            <div class="flex flex-col items-center mt-3 border-t border-gray-700">
                <a class="flex items-center justify-center w-12 h-12 mt-2 rounded hover:bg-gray-700 hover:text-gray-300" href="#">
                    <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                </a>
                <a class="flex items-center justify-center w-12 h-12 mt-2 text-gray-200 bg-gray-700 rounded" href="#">
                    <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </a>
                <a class="flex items-center justify-center w-12 h-12 mt-2 rounded hover:bg-gray-700 hover:text-gray-300" href="#">
                    <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </a>
                <a class="flex items-center justify-center w-12 h-12 mt-2 rounded hover:bg-gray-700 hover:text-gray-300" href="#">
                    <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
                    </svg>
                </a>
            </div>
            <div class="flex flex-col items-center mt-2 border-t border-gray-700">
                <a class="flex items-center justify-center w-12 h-12 mt-2 rounded hover:bg-gray-700 hover:text-gray-300" href="#">
                    <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </a>
                <a class="flex items-center justify-center w-12 h-12 mt-2 rounded hover:bg-gray-700 hover:text-gray-300" href="#">
                    <svg class="w-6 h-6 stroke-current"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                    </svg>
                </a>
                <a class="relative flex items-center justify-center w-12 h-12 mt-2 rounded hover:bg-gray-700 hover:text-gray-300" href="#">
                    <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                    </svg>
                    <span class="absolute top-0 left-0 w-2 h-2 mt-2 ml-2 bg-indigo-500 rounded-full"></span>
                </a>
            </div>
            <a class="flex items-center justify-center w-16 h-16 mt-auto bg-gray-800 hover:bg-gray-700 hover:text-gray-300" href="./logout.php">
                <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </a>
        </div>
        <!-- Component End  -->
        
        <!-- Component Start -->
        <div class="flex flex-col items-center w-40 h-full overflow-hidden text-gray-400 bg-gray-900 rounded hidden md:block">
            <a class="flex items-center w-full px-3 mt-3" href="#">
                <svg class="w-8 h-8 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z" />
                </svg>
                <span class="ml-2 text-sm font-bold">The App</span>
            </a>
            <div class="w-full px-2">
                <div class="flex flex-col items-center w-full mt-3 border-t border-gray-700">
                    <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-700 hover:text-gray-300" href="./index.php">
                        <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span class="ml-2 text-sm font-medium">Home</span>
                    </a>
                    <a class="flex items-center w-full h-12 px-3 mt-2 text-gray-200 bg-gray-700 rounded" href="#">
                        <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span class="ml-2 text-sm font-medium">user</span>
                    </a>
                    <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-700 hover:text-gray-300" href="./radio.php">
                        <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <span class="ml-2 text-sm font-medium">Radio</span>
                    </a>
                    <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-700 hover:text-gray-300" href="#">
                        <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
                        </svg>
                        <span class="ml-2 text-sm font-medium">Docs</span>
                    </a>
                </div>
                <div class="flex flex-col items-center w-full mt-2 border-t border-gray-700">
                    <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-700 hover:text-gray-300" href="#">
                        <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span class="ml-2 text-sm font-medium">Products</span>
                    </a>
                    <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-700 hover:text-gray-300" href="#">
                        <svg class="w-6 h-6 stroke-current"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                        </svg>
                        <span class="ml-2 text-sm font-medium">Settings</span>
                    </a>
                    <a class="relative flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-700 hover:text-gray-300" href="#">
                        <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>
                        <span class="ml-2 text-sm font-medium">Messages</span>
                        <span class="absolute top-0 left-0 w-2 h-2 mt-2 ml-2 bg-indigo-500 rounded-full"></span>
                    </a>
                </div>
            </div>
            <a class="flex items-center justify-center w-full h-16 mt-auto bg-gray-800 hover:bg-gray-700 hover:text-gray-300" href="./logout.php">
                <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="ml-2 text-sm font-medium">Account</span>
            </a>
        </div>

        <div class="container w-full h-full bg-gray-900 rounded flex items-center justify-center">
        <div id="Win1" class="overflow-x-auto m-5 relative shadow-md sm:rounded-lg mb-10 h-4/5 flex place-items-center place-content-center">
                <table class="w-full text-sm text-left text-gray-400">
                    <thead class="text-xs  uppercase bg-gray-700 text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                Id
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Full name
                            </th>
                            <th scope="col" class="py-3 px-6">
                                type
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><th class="p-3" colspan="4">
                            <button href="#" id="change" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add Admin</button>
                        </th></tr>
                        <tr><th class="p-3" colspan="4">
                            <button href="#" id="edit" class="w-full text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-blue-800">Edit admin</button>
                        </th></tr>
                        <?php
                            foreach($radiof as $ra){
                            echo "<tr class=' border-b bg-gray-900 border-gray-700'><th scope='row' class='py-4 px-6 font-medium  whitespace-nowrap text-white'>".$ra[0]."</th><td class='py-4 px-6'>".$ra[1]."</td><td class='py-4 px-6'>$ra[5]</td><td class='py-4 px-6'><a href='deleteUser.php?id=".$ra[0]."' class='text-white bg-red-700 hover:bg-red-800/60 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800'>Delete</button></td></tr>" ;
                            };
                        ?>

                    </tbody>
                </table>
            </div>
            <form id="Win2" class="editcontainer  w-full h-3/5 md:w-3/5 lg:w-2/5   hidden" method="POST">
                <div class="p-3">
                    <input type="text" name="namei" class="text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-medium text-white transition-all focus:border-[#5e72e4] focus:bg-gray-300/50  bg-gray-300/20 focus:text-gray-900 focus:outline-none focus:transition-shadow " placeholder="full name" aria-label="text" aria-describedby="admin-Name" />
                </div>
                <div class="p-3">
                    <input type="email" name="emaili" class="text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-medium text-white transition-all focus:border-[#5e72e4] focus:bg-gray-300/50  bg-gray-300/20 focus:text-gray-900 focus:outline-none focus:transition-shadow " placeholder="Email" aria-label="text" aria-describedby="email" />
                </div>
                <div class="p-3">
                    <input type="username" name="useri" class="text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-medium text-white transition-all focus:border-[#5e72e4] focus:bg-gray-300/50  bg-gray-300/20 focus:text-gray-900 focus:outline-none focus:transition-shadow " placeholder="Username" aria-label="text" aria-describedby="email" />
                </div>
                <div class="p-3">
                    <input type="password" name="passi" class="text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-medium text-white transition-all focus:border-[#5e72e4] focus:bg-gray-300/50  bg-gray-300/20 focus:text-gray-900 focus:outline-none focus:transition-shadow " placeholder="Password" aria-label="text" aria-describedby="email" />
                </div>
                <div class="p-3">
                    <select name="typei" id="type" class="ext-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-medium text-white transition-all focus:border-[#5e72e4] focus:bg-gray-300/50  bg-gray-300/20 focus:text-gray-900 focus:outline-none focus:transition-shadow ">
                        <option selected disable>Choose a type</option>
                        <option value="1">Full admin</option>
                        <option value="0">Normal admin</option>
                    </select>
                </div>
                <div class="text-center p-3">
                    <button type="submit" name="submit"  class="inline-block w-full px-6 py-3 mt-0 mb-2 font-bold text-center text-white uppercase align-middle transition-all  rounded-lg cursor-pointer active:opacity-85 hover:-translate-y-px hover:shadow-md leading-normal text-xs ease-in tracking-tight-rem shadow-md  hover:border-slate-700  bg-gray-300/20 hover:bg-blue-500/30 hover:text-white">Add Admin</button>
                  </div>
                  <div class="text-center p-3">
                    <button id="change1" type="button" name="add"  class="inline-block w-full px-6 py-3 mt-6 mb-2 font-bold text-center text-white uppercase align-middle transition-all  rounded-lg cursor-pointer active:opacity-85 hover:-translate-y-px hover:shadow-md leading-normal text-xs ease-in tracking-tight-rem shadow-md  hover:border-slate-700  bg-red-300/20 hover:bg-red-500 hover:text-white">close Add</button>
                  </div>
            </form>

            <form id="Win3" class="editcontainer  w-full h-3/5 md:w-3/5 lg:w-2/5   hidden" method="POST">
            <div class="p-3">
                    <select name="id" id="id" class="ext-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-medium text-white transition-all focus:border-[#5e72e4] focus:bg-gray-300/50  bg-gray-300/20 focus:text-gray-900 focus:outline-none focus:transition-shadow ">
                        <option selected disable>Choose admin</option>
                        <?php
                            foreach($radiof as $ra){
                            echo "  <option value='$ra[0]' >$ra[1]</option>" ;
                            };
                        ?>
                    </select>
                </div>
                <div class="p-3">
                    <input type="password" name="pass" class="text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-medium text-white transition-all focus:border-[#5e72e4] focus:bg-gray-300/50  bg-gray-300/20 focus:text-gray-900 focus:outline-none focus:transition-shadow " placeholder="Password" aria-label="text" aria-describedby="email" />
                </div>
                <div class="p-3">
                    <select name="type" id="type" class="ext-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-medium text-white transition-all focus:border-[#5e72e4] focus:bg-gray-300/50  bg-gray-300/20 focus:text-gray-900 focus:outline-none focus:transition-shadow ">
                        <option selected disable>Choose a type</option>
                        <option value="1">Full admin</option>
                        <option value="0">Normal admin</option>
                    </select>
                </div>
                <div class="text-center p-3">
                    <button type="submit" name="change" class="inline-block w-full px-6 py-3 mt-0 mb-2 font-bold text-center text-white uppercase align-middle transition-all  rounded-lg cursor-pointer active:opacity-85 hover:-translate-y-px hover:shadow-md leading-normal text-xs ease-in tracking-tight-rem shadow-md  hover:border-slate-700  bg-gray-300/20 hover:bg-blue-500/30 hover:text-white">Edit</button>
                </div>
                <div class="text-center p-3">
                    <button id="cha" type="button"  class="inline-block w-full px-6 py-3 mt-6 mb-2 font-bold text-center text-white uppercase align-middle transition-all  rounded-lg cursor-pointer active:opacity-85 hover:-translate-y-px hover:shadow-md leading-normal text-xs ease-in tracking-tight-rem shadow-md  hover:border-slate-700  bg-red-300/20 hover:bg-red-500 hover:text-white">close edit</button>
                  </div>
            </form>
        </div>
    
</body>
<script>
    document.getElementById("change").addEventListener("click",()=>{
    document.getElementById("Win1").classList.add("hidden");
    document.getElementById("Win2").classList.remove("hidden");
})

document.getElementById("change1").addEventListener("click",()=>{
    document.getElementById("Win2").classList.add("hidden");
    document.getElementById("Win1").classList.remove("hidden");
})

document.getElementById("edit").addEventListener("click",()=>{
    document.getElementById("Win1").classList.add("hidden");
    document.getElementById("Win3").classList.remove("hidden");
})

document.getElementById("cha").addEventListener("click",()=>{
    document.getElementById("Win3").classList.add("hidden");
    document.getElementById("Win1").classList.remove("hidden");
})



</script>
</html>