<?php
include 'db.php'; 

if (array_key_exists('login', $_POST)) {
    $error = [];

    if (empty($_POST['username'])) {
        $error[] = "Please Enter your username or email";
    }

    if (empty($_POST['password'])) {
        $error[] = "Please Enter your password";
    }

    if (empty($error)) {

        $checkUser = $conn->prepare("SELECT * FROM users WHERE email=:em");
        $checkUser->bindParam(':em', $_POST['username']);
        $checkUser->execute();
        $row = $checkUser->fetch(PDO::FETCH_BOTH);
        if ($checkUser->rowCount() > 0 && password_verify($_POST['password'], $row['password'])) {
            
           $_SESSION['email'] = $row['emai'];
           header("Location:home.php");
        }

    }
}

 ?>

<!DOCTYPE html>
<html lang="en" class="bg-gray-100">

<!-- Mirrored from demo.foxthemes.net/socialitev2.2/form-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Feb 2022 01:54:05 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link href="assets/images/favicon.png" rel="icon" type="image/png">

    <!-- Basic Page Needs
        ================================================== -->
    <title>Socialite Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Socialite is - Professional A unique and beautiful collection of UI elements">

    <!-- icons
    ================================================== -->
    <link rel="stylesheet" href="assets/css/icons.css">

    <!-- CSS 
    ================================================== --> 
    <link rel="stylesheet" href="assets/css/uikit.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="assets/tailwind/dist/tailwind.min.css" rel="stylesheet">
 
      <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap');
        body{
            background-color: #f8f9fa; font-family: Inter;
        }
 .uk-container, header .header_inner {
    max-width: 1200px !important;
}
header {
    box-shadow: none;
  background-color: #fff;
  border-bottom: 1px solid #E5E9EF;
  position: fixed;
  left: 0;
  right: 0;
  top: 0;
  z-index: 99;
  height: 76px;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
}

header .header_inner {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  max-width: 1400px;
  margin: auto;
  width: 100%;
  padding: 0 35px;
}

header .header_inner .left-side {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
}

header .header_inner .left-side #logo {
  display: inline-block;
  margin-right: 20px;
  font-size: 21px;
  letter-spacing: .9px;
}

header .header_inner .left-side #logo img {
  max-width: none;
  height: 28px;
}

header .header_inner .left-side #logo img.logo_inverse, header .header_inner .left-side #logo img.logo_mobile {
  display: none;
}

header .header_inner .left-side .triger {
  position: absolute;
  left: 25px;
  top: 20px;
  color: #464646;
  display: none;
  font-size: 19px;
}

header .header_inner .right-side {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  -webkit-box-pack: end;
      -ms-flex-pack: end;
          justify-content: flex-end;
  margin-left: auto;
}

header .header_inner .right-side .header-links-item {
  padding: 10px;
}

header .header_inner .right-side .header-links-item svg {
  width: 25px;
  height: 25px;
  color: #676666;
}

header .header_inner .right-side .header-avatar {
  width: 32px;
  height: 32px;
  border-radius: 100%;
  margin-left: 15px;
}

.is_fixed {
  -webkit-transition: all 0.8s;
  transition: all 0.8s;
  -webkit-box-shadow: 0 10px 10px 0 rgba(0, 0, 0, 0.04);
          box-shadow: 0 10px 10px 0 rgba(0, 0, 0, 0.04);
  background-color: white;
  border: 0;
}

.header_dropdown {
  width: 330px;
  margin-top: 50px;
  border-radius: 5px;
}

.header_dropdown ul {
  padding: 0;
  margin: 0 -20px;
}

.header_dropdown ul li a {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  text-decoration: none;
  color: #808080;
  position: relative;
  padding: 8px 20px;
  font-weight: 500;
}

.header_dropdown ul li a:hover {
  background: #f7f7f7;
}


.header_menu {
  padding: 0;
  margin: 0;
}

.header_menu li {
  list-style: none;
  display: inline;
  padding: 0;
  margin-left: 7px;
}

.header_menu li a {
  color: #b3b3b3;
  font-size: 0.92rem;
  text-transform: capitalize;
  font-weight: 500;
  padding: 0.8rem 0.6rem;
  border-radius: 0.375rem;
}

.header_menu li a:hover,
.header_menu li a.active {
  color: black;
}

.header_menu li ul li a {
  color: #797979;
}

.header_menu li ul li a:hover {
  color: #000;
}

        @media (min-width: 1240px) {

            .uk-container,
            header .header_inner {
                max-width: 1200px !important;
            }
        }

        .header_inner {
            padding: 0 20px !important;
        }

        .header_menu li a {
            font-size: 16px;
            padding: 0.8rem 0.9rem;
        }

        .header_menu li.uk-active a {
            color: #1e2be8 !important
        }

        .banner1 {
            position: absolute;
            width: 54%;
            height: 100%;
            top: 0px;
            right: 0px;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
        }

        .banner1 .objectWrapper {
            margin-left: auto;
            position: relative;
            display:flex;
            align-items: center;
            justify-content: center;
        }

        .banner1 .objectWrapper .Image__ImageWrapper {
            display: block;
            max-width: 100%;
            height: auto;
            box-sizing: border-box;
            margin: 0px;
        }

        .objectWrapper .dashboardWrapper {
            position: absolute;
            right: 0px;
        }

        .objectWrapper .dashboardWrapper img {
            display: block;
            max-width: 100%;
            height: auto;
            box-sizing: border-box;
            margin: 0px;
        }


        .demo-card {
            text-align: center;
            color: #4a4a4a;
            position: relative;
            text-transform: capitalize;
        }

        .demo-card img {
            border-radius: 8px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            margin-right: 1px;
        }

        .demo-card:hover.demo-card img,
        .demo-card:hover span.new {
            transition: 0.4s ease all;
            transform: translateY(-10px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .demo-card span.new {
            color: white;
            padding: 2px 9px;
            border-radius: 6px;
            position: absolute;
            z-index: 1;
            right: -12px;
            top: -13px;
            box-shadow: 2px 2px 3px 0px #cecece;
        }

        .demo-card p {
            margin-top: 15px;
        }

        @media (max-width: 992px) {
            .banner1 {
            width: 80%;
    position: relative;
    margin: auto;}
        }
    </style>
</head> 
<body>

    <body class="bg-gray-100">


        <div id="wrapper" class="flex flex-col justify-between h-screen">
    
            <!-- header-->
            <div class="bg-white py-4 shadow dark:bg-gray-800">
                <div class="max-w-6xl mx-auto">
    
    
                    <div class="flex items-center lg:justify-between justify-around">
    
                        <a href="trending.html">
                            <img src="assets/images/logo.png" alt="" class="w-32">
                        </a>
    
                        <div class="capitalize flex font-semibold hidden lg:block my-2 space-x-3 text-center text-sm">
                            <a href="form-login.php" class="py-3 px-4">Login</a>
                            <a href="form-register.php" class="bg-purple-500 purple-500 px-6 py-3 rounded-md shadow text-white">Register</a>
                        </div>
    
                    </div>
                </div>
            </div>
    
            <!-- Content-->
            <div>
                <div class="lg:p-12 max-w-xl lg:my-0 my-12 mx-auto p-6 space-y-">
                    
                    <form method="POST" class="lg:p-10 p-6 space-y-3 relative bg-white shadow-xl rounded-md">
                        <h1 class="lg:text-2xl text-xl font-semibold mb-6"> Login </h1>

                        <div>
                            <label class="mb-0"> Username or Email </label>
                            <input type="text" placeholder="Username" name="username" class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full">
                        </div>
                        <div>
                            <label class="mb-0"> Password </label>
                            <input type="password" name="password" placeholder="******" class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full">
                        </div>

                        <div>
                            <button type="submit" name="login" class="bg-blue-600 font-semibold p-2 mt-5 rounded-md text-center text-white w-full">
                                LOGIN</button>
                        </div>
                    </form>
 
                </div>
            </div>
            
            <!-- Footer -->
    
            <div class="lg:mb-5 py-3 uk-link-reset">
                <div class="flex flex-col items-center justify-between lg:flex-row max-w-6xl mx-auto lg:space-y-0 space-y-3">
                    <div class="flex space-x-2 text-gray-700 uppercase">
                        <a href="#"> About</a>
                        <a href="#"> Help</a>
                        <a href="#"> Terms</a>
                        <a href="#"> Privacy</a>
                    </div>
                    <p class="capitalize"> © copyright 2020 by Socialite</p>
                </div>
            </div>
    
        </div>

        
   
    <!-- For Night mode -->
    <script>
        (function (window, document, undefined) {
            'use strict';
            if (!('localStorage' in window)) return;
            var nightMode = localStorage.getItem('gmtNightMode');
            if (nightMode) {
                document.documentElement.className += ' night-mode';
            }
        })(window, document);
    
        (function (window, document, undefined) {
    
            'use strict';
    
            // Feature test
            if (!('localStorage' in window)) return;
    
            // Get our newly insert toggle
            var nightMode = document.querySelector('#night-mode');
            if (!nightMode) return;
    
            // When clicked, toggle night mode on or off
            nightMode.addEventListener('click', function (event) {
                event.preventDefault();
                document.documentElement.classList.toggle('dark');
                if (document.documentElement.classList.contains('dark')) {
                    localStorage.setItem('gmtNightMode', true);
                    return;
                }
                localStorage.removeItem('gmtNightMode');
            }, false);
    
        })(window, document);
    </script>
  
    <!-- Javascript
    ================================================== -->
     <script src="../../code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="assets/js/tippy.all.min.js"></script>
    <script src="assets/js/uikit.js"></script>
    <script src="assets/js/simplebar.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="../../unpkg.com/ionicons%405.2.3/dist/ionicons.js"></script>

</body>

<!-- Mirrored from demo.foxthemes.net/socialitev2.2/form-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Feb 2022 01:54:05 GMT -->
</html>