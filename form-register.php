<?php 
include 'db.php';

if (array_key_exists('register', $_POST)) {
    $error = [];
    if (empty($_POST['full-name'])) {
        $error[] = "Please enter your full name";
    }
    if (empty($_POST['username'])) {
        $error[] = "Please enter your username";
    }
    if (empty($_POST['email'])) {
        $error[] = "Please enter your email";
    }
    if (empty($_POST['number'])) {
        $error[] = "Please enter your Phone number";
    }
    if (empty($_POST['password'])) {
        $error[] = "Please enter your full your password";
    }
    if (empty($_POST['confirm-password'])) {
        $error[] = "Please confirm your password";
    }
    if ($_POST['password'] != $_POST['confirm-password']) {
        $error[] = "Password Mismatch";
    }

    if (empty($error)) {
        $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $registerUser = $conn->prepare("INSERT INTO users VALUES(NULL,:fn,:usr,:em,:no,:ps, NOW(),NOW())");
        $registerUser->bindParam(':fn', $_POST['full-name']);
        $registerUser->bindParam(':usr', $_POST['username']);
        $registerUser->bindParam(':em', $_POST['email']);
        $registerUser->bindParam(':no', $_POST['number']);
        $registerUser->bindParam('ps', $hash);
        $registerUser->execute();
    }
}

 ?>


<!DOCTYPE html>
<html lang="en" class="bg-gray-100">

<!-- Mirrored from demo.foxthemes.net/socialitev2.2/form-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Feb 2022 01:54:06 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link href="assets/images/favicon.png" rel="icon" type="image/png">

    <!-- Basic Page Needs
        ================================================== -->
    <title>Concurrent Datatbase</title>
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


 
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">

    <style>
        input , .bootstrap-select.btn-group button{
            background-color: #f3f4f6  !important;
            height: 44px  !important;
            box-shadow: none  !important; 
        }
    </style>

</head>
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
                        <h1 class="lg:text-2xl text-xl font-semibold mb-6"> Register </h1>

                            <div>
                                <label class="mb-0"> Full Name </label>
                                <input type="text" name="full-name" placeholder="Your Name" class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full">
                            </div>
                        <div>
                            <label class="mb-0"> Username </label>
                            <input type="text" name="username" placeholder="Username" class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full">
                        </div>
                        <div>
                            <label class="mb-0"> Email Address </label>
                            <input type="email" name="email" placeholder="Info@example.com" class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full">
                        </div>
                            <div>
                                <label class="mb-0"> Phone: optional  </label>
                                <input type="text" name="number" placeholder="+234 810 5678 912" class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full">
                            </div>
                        <div>
                            <label class="mb-0"> Password </label>
                            <input type="password" name="password" placeholder="******" class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full">
                        </div>
                        <div>
                            <label class="mb-0">Confirm Password </label>
                            <input type="password" name="confirm-password" placeholder="******" class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full">
                        </div>

                        <div class="checkbox">
                            <input type="checkbox" id="chekcbox1" checked="">
                            <label for="chekcbox1"><span class="checkbox-icon"></span> I agree to the <a href="pages-terms.html" target="_blank" class="uk-text-bold uk-text-small uk-link-reset"> Terms and Conditions </a>
                            </label>
                        </div>

                        <div>
                            <button type="submit" name="register" class="bg-blue-600 font-semibold p-2 mt-5 rounded-md text-center text-white w-full">
                                Get Started</button>
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

<!-- Mirrored from demo.foxthemes.net/socialitev2.2/form-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Feb 2022 01:54:06 GMT -->
</html>