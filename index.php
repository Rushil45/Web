<?php
require('config.php');

if(isset($_POST['submit'])){
    $username=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $balance=1000;

    //name
    //email
    //password
    //acc_no
    //balance

    $lastrow=mysqli_query($con,"SELECT acc_no FROM user ORDER BY acc_no DESC LIMIT 1"); 
    if(mysqli_num_rows($lastrow)>0){
        $last_acc=mysqli_fetch_object($lastrow)->acc_no;
        $ano=$last_acc+69;
    }
    else{
        $ano=10080085;
    }

    $c = mysqli_query($con,"SELECT email FROM user WHERE email='$email' ");
    // echo mysqli_num_rows($c);
    if ($username){
        if(mysqli_num_rows($c) == 0){
            //sign up
            // echo "sign up";
            $sql="INSERT INTO user (name, email, password,balance,acc_no) VALUES ('$username','$email','$password','$balance','$ano')";
            mysqli_query($con,$sql);
            session_start();
            $res=mysqli_query($con,"SELECT acc_no FROM user WHERE email='$email' AND password='$password' ");
            $row = mysqli_fetch_assoc($res);
            $_SESSION['acc_no'] = $row['acc_no'];
        }
        else{
            echo '<script type="text/javascript">alert("Email already exists");</script>';
        }
    // echo '<script type="text/javascript">alert("'.mysqli_fetch_object($c)->email.'");</script>';
    }
    else{
        //login
        $res = mysqli_query($con,"SELECT acc_no FROM user WHERE email='$email' AND password='$password' ");
        if ($res->num_rows > 0){
            session_start();
            $row = mysqli_fetch_assoc($res);
            $_SESSION['acc_no'] = $row['acc_no'];
            header("location:user.php");
        }
        else{
            echo "<script>alert('Woops! Email or Password is wrong.')</script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="icon" type="image/png" href="icon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
    <title>Document</title>
    <style>
        body {
            margin: 0;
            background-color: #e7ecff;
        }

        .grd {
            display: flex;
        }

        .g1 {
            flex: 0 0;
            height: 50%;
            margin-right:70px;
        }

        .g2 {
            flex: 1 0;
        }

        .prop {
            /* margin: 10% 0 10% 0; */
            height: 460px;
            width: 600px;
            object-fit: cover;
            border-radius: 10%;
        }

        .logo {
            width: 270px;
            padding: 2px;
            position: relative;
            top: -10px;
            left: 28px;
        }

        .prop2 {
            /* width: 160px; */
            position: relative;
            top: 15px;
            left: 270px;
        }

        .txt {
            margin: 20px 0 0 50px;
            padding:5px;
            width: 500px;
            font-family: 'Josefin Sans', sans-serif;
            font-size: 50px;
            color: #2e3c49;
            font-weight: 300;
        }

        .bold {
            color: rgb(63, 110, 240);
            margin:10px;
            padding:5px;
            border-radius: 3px;
            font-weight: 500;
        }

        .login {
            margin: 10px 0 0 50px;
            height: 290px;
            width: 520px;
        }

        .sign {
            background-color: #0e0d0df3;
            color: rgba(255, 255, 255, 0.945);
            display: flex;
            width: 176px;
            height: 40px;
            border-radius: 4px;
        }
        .sup,
        .lin {
            font-family: 'Josefin Sans', sans-serif;
            font-size: 18px;
            padding: 9px 12px;
            margin: 3px;
            font-weight: 400;
            z-index: 4;
            cursor: pointer;
            -webkit-tap-highlight-color: transparent;
        }

        .sel1 {
            color: #000f3a;
            font-weight: 600;
        }

        .sel {
            position: relative;
            top: -37px;
            left: 3px;
            background-color: rgb(255, 255, 255);
            height: 34px;
            width: 90px;
            border-radius: 4px;
            box-shadow: 0 2px 5px rgba(36, 36, 36, 0.925);
            transition: all 0.5s;
        }

        .fl {
            margin: 0 0 30px 0;
        }
        /* .name {
            margin-top: -5px;
        } */

        .field {
            height: 15px;
            color: rgba(34, 33, 33, 0.959);
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif ;
            padding: 11px 0 5px 0;
            font-weight: 500;
            font-size: 13px;
            border-radius: 6px 0 0 6px;
        }

        .answer {
            height: 35px;
            font-size: 14px !important;
            border-radius: 6px 0 0 6px;
        }

        input {
            height: 29px;
            padding-left: 10px;
            border: 2px solid #e2e2e2ea;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif ;
            text-align: left;
            font-size: 13px;
            outline: none;
        }

        .email,
        .go {
            margin-left: 40px;
        }

        .goo {
            margin: 29px 15px 0px 25px;
            width: 100px;
            height: 35px;
            border-radius: 2px;
            border: none;
            background:#8a8cf5;
        }

        .anp {
            width: 250px;
        }

        .fields1 {
            display: flex;
        }
        a{
            position: fixed;
            right:0px;
            text-shadow: 2px 2px 4px #2e2c2c97;
            border:1px solid #e7ecff;
            background-color:#ecd5fb;

        }
        .social-button {
        display: flex;
        justify-content: center;
        align-items: center;
        outline: none;
        width: 70px;
        height: 70px;
        text-decoration: none;
        
        }
        .social-button__inner {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        width: calc(100% - 2px);
        height: calc(100% - 2px);
        text-align: center;
        }
        .social-button i,
        .social-button svg {
        position: relative;
        z-index: 1;
        transition: 0.3s;
        }
        .social-button i {
        font-size: 28px;
        }
        .social-button .gb{
            font-size: 32px;
        }
        .social-button svg {
        height: 40%;
        width: 40%;
        }
        .social-button--linkedin {
        color: #0077b5;
        }
        .social-button--github {
        color: #2b2a2c;
        }
        
        .social-button--twitter {
        color: #64b0eb;
        }
        
        .social-button--instagram {
            color: #d83a66;
        }

        .ln
        {
            top:20px;
            border-bottom:none;
        }
        .ig{
            top:70px;
            border-top:none;
            border-bottom:none;
        }
        .gt{
            top:120px;
            border-top:none;
            border-bottom:none;
        }
        .tw{
            top:170px;
            border-top:none;
        }

    </style>
</head>

<body>
    <div class="header"><img class="logo" src="Logo.png" alt=""></div>
    <div class="grd">
        <div class="g2">
            <p class="txt">Welcome to a <span class="bold">smooth</span> and <span class="bold">secure</span> Banking Paradise</p>
            <div class="login">
                <div class="sign">
                    <div class="sup sel1" onclick="sup()">
                        Sign up
                    </div>
                    <div class="lin " onclick="lin()">
                        Log in
                    </div>
                </div>
                <div class="sel"></div>
                <div class="fields">
                    <form action="" method="post">
                        <div class="fields1">
                            <div class="name fl">
                                <div class="field">Name</div>
                                <div class="answer"><input id="nm" minlength="3" maxlength="20" name="name" placeholder="Enter Name" required></div>
                            </div>
                            <div class="email fl">
                                <div class="field">Email</div>
                                <div class="answer"><input id="ane" maxlength="38" type="email" name="email" required placeholder="Enter Email"></div>
                            </div>
                        </div>
                        <div class="fields1">
                            <div class="pass fl">
                                <div class="field">Password</div>
                                <div class="answer"><input class="anp" minlength="8" maxlength="16" type="password" name="password" required placeholder="Password"></div>
                            </div>
                            <div class="go fl">
                                <button name="submit" type="submit" class="goo"><svg height="20px" width="25px" style="padding:7px;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-right" class="svg-inline--fa fa-arrow-right fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z"></path></svg></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="g1"><img class="prop" src="Card.jpeg"></div>      
    </div>
    <div class="social">
        <a href="https://twitter.com/Rushil10236803" class="social-buttons__button social-button social-button--twitter tw" aria-label="Twitter">
            <span class="social-button__inner">
            <i class="fa fa-twitter"></i>
            </span>
            </a>
            <a href="https://www.linkedin.com/in/rushil-s-398154120/" class="social-buttons__button social-button social-button--linkedin ln" aria-label="LinkedIn">
            <span class="social-button__inner">
            <i class="fa fa-linkedin"></i>
            </span>
            </a>
            <a href="https://www.instagram.com/rushil.shah.758/" class="social-buttons__button social-button social-button--instagram ig" aria-label="Instagram">
            <span class="social-button__inner">
            <i class="fa fa-instagram"></i>
            </span>
            </a>
            <a href="https://github.com/Rushil45" class="social-buttons__button social-button social-button--github gt" aria-label="GitHub">
            <span class="social-button__inner">
            <i class="fa fa-github gb"></i>
            </span>
            </a>
        </div>
    <script>
        var supp = document.getElementsByClassName("sup")[0];
        var linn = document.getElementsByClassName("lin")[0]
        var sel = document.getElementsByClassName("sel")[0];
        var name_fld = document.getElementsByClassName("name")[0];
        var email_fld = document.getElementsByClassName("email")[0];

        function sup() {
            sel.style.left = "3px";
            sel.style.width = "90px";
            supp.classList.add("sel1");
            linn.classList.remove("sel1");
            name_fld.style.display = "block";
            email_fld.style.marginLeft = "40px";
            document.getElementsByClassName("anp")[0].style.width = "260px";
            document.getElementById("ane").style.width = "180px";
            document.getElementById("nm").required = true;
        }

        function lin() {
            supp.classList.remove("sel1");
            linn.classList.add("sel1");
            sel.style.left = "96px";
            sel.style.width = "76px";
            document.getElementById("nm").required = false;
            document.getElementById("nm").value="";
            name_fld.style.display = "none";
            email_fld.style.marginLeft = "0";
            document.getElementsByClassName("anp")[0].style.width = "160px";
            document.getElementById("ane").style.width = "200px";
            
        }
    </script>
</body>

</html>