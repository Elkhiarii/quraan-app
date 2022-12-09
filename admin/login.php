<?php
  require("../config.php");
  if(isset($_POST['email']) and isset($_POST['password']))
  {
      $sql = "SELECT count(*) , user from admin where email = ? and PASSWORD = md5(?)";
      $sqle = "SELECT user from admin where email = ? and PASSWORD = md5(?)";
      $rst = $con -> prepare($sql);
      $rste = $con -> prepare($sqle);
      $rst->execute([$_POST['email'],$_POST['password']]);
      $rste->execute([$_POST['email'],$_POST['password']]);
      $coun = $rst->fetchcolumn();
      $user = $rste->fetchcolumn();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Admin</title>
    <style>
        *{
            font-family: poppins;
        }
    </style>
</head>
<body class="bg-gray-300">
  
  <p class="block z-50   antialiased font-sans text-sm leading-normal font-normal bottom-10 left-20 absolute  text-white">© 2022, made with <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="-mt-0.5 inline-block h-3.5 w-3.5"><path d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z"></path></svg> by <a href="https://elkhiarii.me" target="_blank" class="transition-colors hover:text-blue-500">elkhiari</a> for ISLAMIC PEOPLE.</p>
  <img src="https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1950&amp;q=80" class="absolute inset-0 z-0 h-full w-full object-cover">
  <div class="absolute inset-0 z-0 h-full w-full bg-black/50">
  </div>



    <div class="container lg:w-2/5 h-screen lg:p-20 p-20  mx-auto w-screen ">
        <div class="relative z-0 flex flex-col min-w-0 break-words bg-white border-0 mt-20 shadow-xl rounded-2xl bg-clip-border">
        <div class="p-6 font-bold mb-0 text-center  bg-white border-b-0 rounded-t-2xl">
          <h5>Login</h5>
        </div>
        <div class="relative w-full max-w-full px-3 mt-2 text-center shrink-0">
          <div class="flex-auto p-6">
            <form role="form text-left" method="POST">
              <div class="mb-4">
                <input type="email" name="email" class="text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-[#5e72e4] focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Email" aria-label="Email" aria-describedby="email-addon" />
              </div>
              <div class="mb-4">
                <input type="password" name="password" class="text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-[#5e72e4] focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Password" aria-label="Password" aria-describedby="password-addon" />
              </div>
              <?php
                if(isset($coun))
                {
                  if($coun == 1)
                  {
                    session_start();
                    $_SESSION['users'] = $user;
                    header("location:index.php");
                  }
                  else
                  {
                    echo "Your email or password incorrect";
                  }
                }
              
              ?>
              <div class="text-center ">
                <button type="submit" class="inline-block w-full px-6 py-3 mt-6 mb-2 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:-translate-y-px hover:shadow-md leading-normal text-xs ease-in tracking-tight-rem shadow-md bg-150 bg-x-25 bg-gradient-to-tl from-zinc-800 to-zinc-700 hover:border-slate-700 hover:bg-blue-500/0 hover:text-white">Sign in</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

</body>
</html>