<?php
    session_start();
    if(isset($_SESSION["email"]) && isset($_SESSION["password"])){
        header("location: ../home/");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Authentication - Guide Me Web</title>
  
  <!-- google icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <style>
    body {
      margin: 0;
      padding: 0;
      background-color: #121212;
      color: #FFF;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .poppins-regular {
      font-family: "Poppins", sans-serif;
      font-weight: 400;
      font-style: normal;
    }

    .heading {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      margin-top: 120px;
      font-size: 18px;
    }

    .login-form, .regi-form, .forgot-form-1, .forgot-form-2, .forgot-form-3 {
      padding-top: 30px;
      margin: 20px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      max-width: 100%;
      box-sizing: border-box;
    }

    .input-feild {
      width: 100%;
      padding: 15px 20px;
      margin-bottom: 10px;
      box-sizing: border-box;
      justify-content: center;
      background-color: #EAECEE;
      color: #000;
      border: 0.1px solid #EAECEE;
      border-radius: 5px;
      font-size: 14px;
      outline: none;
    }

    .toast {
        position: absolute;
        bottom: 0;
        background-color: red;
        color: #fff;
        padding: 15px 20px;
        border-radius: 5px;
        margin: 20px;
        font-size: 13px;
        display: none;
        width: calc(100% - 80px);
    }

    .login-btn, .regi-btn, .next-btn-3 {
      padding: 15px;
      border: 0px solid #FFF;
      font-size: 14px;
      width: 100%;
      background-color: #000;
      color: white;
      box-sizing: border-box;
      margin-top: 10px;
      border-radius: 5px;
      text-align: center;
      cursor: pointer;
    }

    .sing-up-open, .sing-in-open, .next-btn-1, .back-btn-1, .next-btn-2, .back-btn-2 {
      margin-top: 10px;
      padding: 15px;
      width: 100%;
      box-sizing: border-box;
      border-radius: 5px;
      text-align: center;
      cursor: pointer;
    }

    .sing-up-open, .sing-in-open, .next-btn-1, .next-btn-2 {
      background-color: #FFF;
      color: #000;
      font-size: 15px;
      border: 0.1px solid #000;
    }

    .back-btn-1, .back-btn-2 {
      border: 0.1px solid #fff;
      color: #FFF;
    }

    .forogot-password {
      margin-top: 20px;
      margin-bottom: 20px;
      font-size: 14px;
      color: #696969;
    }
    
    .next-btn-1:hover{
        background-color: #000;
        color: #FFF;
    }
    
    .login-btn:hover{
        background-color: #FFF;
        color: #000;
        border: 0.1px solid #000;
    }
    
    @media screen and (min-width: 1300px){
            .main-screen{
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }
            
            .screen{
                width: 40%;
            }
            
            .toast{
                width: calc(40% - 80px);
            }
    
        }
        
        @media screen and (min-width: 1100px) and (max-width: 1299px){
            .main-screen{
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }
            
            .screen{
                width: 60%;
            }
            
            .toast{
                width: calc(60% - 80px);
            }
        }
        
        @media screen and (min-width: 900px) and (max-width: 1099px){
            .main-screen{
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }
            
            .screen{
                width: 70%;
            }
            
            .toast{
                width: calc(70% - 80px);
            }
        }
  </style>
</head>
<body class="poppins-regular">
    
    <div class="main-screen">
    <div class="screen">

  <?php include("../resources/header.php"); ?>
  
  <div class="heading">Sign In</div>
  
  <!-- login -->
  <div class="login-form">
    <input type="email" placeholder="Email.." autocomplete="off" class="input-feild poppins-regular login-email">
    <input type="password" placeholder="Password.." class="input-feild poppins-regular login-password" autocomplete="off">
    <div class="login-btn">Login</div>
    <div class="forogot-password">Forgot password? Don't worry <span style="color: #000;" class="reset">reset now</span>.</div>
    <div class="sing-up-open">Create a new account</div>
  </div>
  
  <!-- create account -->
  <div class="regi-form">
    <input type="email" placeholder="Email.." class="input-feild poppins-regular regi-email" autocomplete="off">
    <input type="password" placeholder="Password.." class="input-feild poppins-regular regi-password" autocomplete="off">
    <div class="regi-btn">Create</div>
    <div class="sing-in-open">Sign In</div>
  </div>
  
  <!-- forgot password -->
  <div class="forgot-form-1">
    <input type="email" placeholder="Email.." class="input-feild poppins-regular" autocomplete="off">
    <div class="next-btn-1">Reset</div>
    <div class="back-btn-1">Back</div>
  </div>
  
  <div class="forgot-form-2">
    <input type="text" placeholder="Enter Verification code.." class="input-feild poppins-regular code" autocomplete="off">
    <div class="next-btn-2">Verify code</div>
    <div class="back-btn-2">Back</div>
  </div>
  
  <div class="forgot-form-3">
    <input type="text" placeholder="Create new password..." class="input-feild poppins-regular newPass" autocomplete="off">
    <input type="text" placeholder="Confirm new password..." class="input-feild poppins-regular confirmPass" autocomplete="off">
    <div class="next-btn-3">Save</div>
  </div>
  
  <div class="toast">Please enter a valid email!</div>
  
  <script>
    $(".header-add-icon").hide();
    $(".regi-form").hide();
    $(".forgot-form-1").hide();
    $(".forgot-form-2").hide();
    $(".forgot-form-3").hide();

    function showToast(message) {
      $(".toast").text(message).fadeIn(400).delay(3000).fadeOut(400).css({
          "background-color":"red"
      });
    }

    function isValidEmail(email) {
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailRegex.test(email);
    }
    
    let email = "";
    let password = "";
    let code = "";
    let newPassword = "";
    let newPasswordConfirm = "";
    
    $(".login-btn").on("click",function(){
        email = $(".login-email").val();
        password = $(".login-password").val();
        
        if(!isValidEmail(email)){
            showToast("Please enter a valid email!");
        }else if(password===""){
            showToast("Please enter a password!");
        }else{
            $.ajax({
                url:'login-account.php',
                type:'POST',
                data:{
                    email:email,
                    password:password
                },
                success: function(response){
                    console.log(response);
                    if(response==="User not found"){
                        showToast("Enterd email or password wrong!");
                    }else if(response==="fail"){
                        showToast("Enterd email or password wrong!");
                    }else if(response==="pass"){
                        window.location.href = "../home";
                    }else{
                        showToast("Process failed. Please try again!");
                    }
                }
            })
        }
    });
    
    $(".regi-btn").on("click",function(){
        email = $(".regi-email").val();
        password = $(".regi-password").val();
        
        if(!isValidEmail(email)){
            showToast("Please enter a valid email!");
        }else if(password===""){
            showToast("Please enter a password!");
        }else if(password.length<8){
            showToast("Password must contain 6 letters or number or special charachters.");
        }else{
            $.ajax({
                url:'create-account.php',
                type:'POST',
                data:{
                    email:email,
                    password:password
                },
                success: function(response){
                    if(response==="User found"){
                        showToast("Email already existed!");
                    }else if(response==="pass"){
                        window.location.href = "../home";
                    }else{
                        showToast("Process failed. Please try again!");
                    }
                }
            })
        }
        
        // registration code
    });

    // to open create new account
    $(".sing-up-open").on("click", function() {
      $(".login-form").hide();
      $(".regi-form").show();
      $(".forgot-form-1").hide();
      $(".forgot-form-2").hide();
      $(".forgot-form-3").hide();
      $(".heading").text("Sign Up");
    });

    // to open login
    $(".sing-in-open").on("click", function() {
      $(".login-form").show();
      $(".regi-form").hide();
      $(".forgot-form-1").hide();
      $(".forgot-form-2").hide();
      $(".forgot-form-3").hide();
      $(".heading").text("Sign In");
    });

    // to open reset password
    $(".reset").on("click", function() {
      $(".heading").text("Reset Password");
      $(".login-form").hide();
      $(".regi-form").hide();
      $(".forgot-form-1").show();
      $(".forgot-form-2").hide();
      $(".forgot-form-3").hide();
    });

    // to open login but from back button of reset password
    $(".back-btn-1").on("click", function() {
      $(".heading").text("Sign In");
      $(".login-form").show();
      $(".regi-form").hide();
      $(".forgot-form-1").hide();
      $(".forgot-form-2").hide();
      $(".forgot-form-3").hide();
    });

    // open password reset email enter screen
    $(".back-btn-2").on("click", function() {
      $(".heading").text("Reset Password");
      $(".login-form").hide();
      $(".regi-form").hide();
      $(".forgot-form-1").show();
      $(".forgot-form-2").hide();
      $(".forgot-form-3").hide();
    });

    $(".next-btn-1").on("click", function() {
      email = $(".forgot-form-1 input[type='email']").val();
      if (!isValidEmail(email)) {
        showToast("Please enter a valid email!");
      } else {
          
          $(".toast").text("Give me a minute.").fadeIn(400).delay(3000).fadeOut(400).css({
                                        "background-color":"#2596be"
                                    });
          console.log(10);
          $.ajax({
                url:'check-mail.php',
                type:'POST',
                data:{
                    email:email
                },
                success: function(response){
                    console.log(response);
                    if(response==="User not found"){
                        showToast("Enterd email or password wrong!");
                    }else if(response==="fail"){
                        showToast("Enterd email or password wrong!");
                    }else if(response==="pass"){
                        
                        $.ajax({
                            url:'send-mail.php',
                            type:'POST',
                            data:{
                                email:email
                            },
                            success: function(response){
                                console.log(response);
                                if(response.charAt(response.length-1)==="f"){
                                    showToast("Facing problem to send an email code.");
                                }else if(response.charAt(response.length-1)==="p"){
                                    $(".toast").text("Verification code has sended on email!").fadeIn(400).delay(3000).fadeOut(400).css({
                                        "background-color":"#2596be"
                                    });
                                    $(".heading").text("Verify Yourself");
                                    $(".login-form").hide();
                                    $(".regi-form").hide();
                                    $(".forgot-form-1").hide();
                                    $(".forgot-form-2").show();
                                    $(".forgot-form-3").hide();
                                }
                            }
                        })
                        
                    }else{
                        showToast("Process failed. Please try again!");
                    }
                }
            })
      }
    });

    $(".next-btn-2").on("click", function() {
        code = $(".code").val();
        
        if(code===""){
            showToast("Please enter a valid code!");
        }else{
            
            $.ajax({
                url:'verify.php',
                type:'POST',
                data:{
                    email:email,
                    code:code
                },
                success: function(response){
                    console.log(response);
                    if(response==="fail"){
                        showToast("Invalid code!");
                    }else if(response==="pass"){
                        $(".heading").text("Set new Password");
                        $(".login-form").hide();
                        $(".regi-form").hide();
                        $(".forgot-form-1").hide();
                        $(".forgot-form-2").hide();
                        $(".forgot-form-3").show();
                    }
                }
            });
            
        }
        
      
    });

    $(".next-btn-3").on("click", function() {
      newPassword = $(".newPass").val();
      newPasswordConfirm = $(".confirmPass").val();
      
      if(newPassword.length<8){
          showToast("Password must contain 6 letters or number or special charachters.");
      }else if(newPasswordConfirm!=newPassword){
          showToast("Please agian confirm the password!");
      }else{
          $.ajax({
                url:'update.php',
                type:'POST',
                data:{
                    email:email,
                    newPass:newPassword
                },
                success: function(response){
                    console.log(response);
                    if(response==="fail"){
                        showToast("Facing Problem! connect after sometime.");
                    }else if(response==="pass"){
                        $(".toast").text("Password reset successfully! Now again try to login.").fadeIn(400).delay(3000).fadeOut(400).css({
                                "background-color":"green"
                            });
                            $(".heading").text("Sign In");
                          $(".login-form").show();
                          $(".regi-form").hide();
                          $(".forgot-form-1").hide();
                          $(".forgot-form-2").hide();
                          $(".forgot-form-3").hide();
                    }
                }
            })
      }
      
    });
  </script>
  
  </div>
</div>
</body>
</html>