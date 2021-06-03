<?php
    require('config.php');

    session_start();
    $acnt=$_SESSION['acc_no'];
    
    $res = mysqli_query($con,"SELECT * FROM user WHERE acc_no='$acnt'");
    $row = mysqli_fetch_assoc($res);
    // echo $row['acc_no'],", ",$row['name'],", ",$row['balance'];
    // echo ".";

    $fullname=$row['name'];
    
    if(strpos($fullname," ")){
        $name=substr($fullname, 0, strpos($fullname," "));
    }
    else{
        $name=$fullname;
    }
    
    $acc_no=$row['acc_no'];
    $balance=$row['balance'];
    // $name="abababaxxx shcdxcda";

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="icon.png">
    <title><?php echo $fullname ?></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lexend+Deca&display=swap">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400&family=Special+Elite&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            margin: 0%;
            background-color: #e7ecff;
        }

        a{
            position: fixed;
            bottom:0px;
            text-shadow: 2px 2px 4px #2e2c2c97;
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
        border-radius: 100%;
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
            left:20px;
        }
        .ig{
            left:70px;
        }
        .gt{
            left:120px;
        }
        .tw{
            left:170px;
        }

        :root {
            --receipt_back: white;
        }

        .receipt {
            margin: 10px auto;
            background: linear-gradient(135deg, white 2.8px, transparent 2.81px) bottom left, linear-gradient(45deg, transparent 5.68px, white 5.69px) bottom left;
            /* linear-gradient(135deg, transparent 5.68px, white 5.69px) top left,linear-gradient(45deg, white 2.8px, transparent 2.81px) top left, */
            background-repeat: repeat-x;
            background-size: 8px 4px;
            padding: 4px 0;
        }

        .receipt-list {
            /* border-radius: 10px 10px 0 0; */
            overflow: auto;
            background-color: white;
            height: 350px;
            margin-top: 50px;
        }

        .receipt {
            filter: drop-shadow(0 2px 1px rgba(0, 0, 0, 0.2));
            width: 550px;
        }
        
        html {
            box-sizing: border-box;
            font-family: 'Varela Round', sans-serif;
            padding: 0 10px;
        }
        
        *,
        *:before,
        *:after {
            box-sizing: inherit;
            padding: 0;
            margin: 0;
        }

        .menu__container {
            max-width: 500px;
            height: 60px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            transform: perspective(1000px) rotateX(0deg) rotateY(0deg) rotateZ(0deg);
            transform-origin: center center 0px;
            transition: all 0.5s ease-out;
            cursor:pointer;
        }

        .menu__container:hover {
            transform: perspective(1000px) rotateX(25deg) rotateY(0deg) rotateZ(0deg);
            box-shadow: 0 10px 40px rgba(0,0,0,0);
        }

        .menu__container .menu {
            display: flex;
            justify-content: space-around;
            align-items: center;
            max-width: 100%;
            height: 100%;
        }

        .menu__container .menu div {
            text-decoration: none;
            color: #ffffff;
            font-size: 17px;
            transition: all 0.1s linear;
        }

        .menu__container .menu div:hover {
            transform: scale(1.1, 1.1);
        }

        .menu__container--5 {
            background-image: linear-gradient(to right,#371640, #381765,#081369 );
        }
 
        .profile
        {
            padding-top:20px;
            padding-right:30px;
            font-size:20px;
            width: 610px;
            margin: 20px auto;
        }

        .extra{
            margin:auto;
            width:540px;
        }

        .hi {
            margin: 0 10%;
            font-size: 80px;
            /* color: white; */
        }
        

        .bal {
            margin: 5px 10%;
            padding-right:30px;
            font-size: 72px;
            
        }

        .bala {
            background-color: #fcc275;
            font-family:'Special Elite', cursive;
            padding-top:10px;
            padding-left:10px;
            /* background-color: transparent; */
        }

        .acc_no {
            margin: 0 10%;
            padding-top:5px;
            font-family: 'Special Elite', cursive;
            font-size: 70px;
            /* background-color: red; */
            /* background-color: cadetblue; */
        }

        .accn {
            /* cursor: pointer; */
            padding-left:10px;
            padding-top:10px;
            background-color: #c28ff2;
            /* background-color: transparent; */
            letter-spacing: 27px;
        }


        /* .partition::after{
            
        } */

        .field {
            height: 15px;
            color: rgba(66, 66, 66, 0.9);
            padding: 11px 0 0 0;
            font-size: 15px;
            margin-bottom:15px;
            /* border-radius: 6px 0 0 6px; */
        }

        .answer {
            height: 35px;
            font-size: 14px;
            /* border-radius: 6px 0 0 6px; */
        }

        input {
            height: 29px;
            padding: 0 15px;
            border: 2px solid #d4d4d4ea;
            font-size: 13px;
            outline: none;
            font-family: 'Inter', sans-serif;
        }

        .fields {
            margin: 30px 30px 30px 50px;
        }

        .receiver {
            margin: 0 0 20px 0;
        }

        .pay {
            margin: 25px 0 0 55px;
            border-radius: 3px;
            height: 33px;
            border: none;
            background: #2e3c49;
            width: 87px;
            font-size: 20px;
            color: rgb(255, 255, 255);
            padding: 2px 12px;
            cursor: pointer;
        }

        #rec {
            width: 220px;
        }

        #ana {
            width: 150px;
        }

        .flx {
            display: flex;
        }


        /* extraaaaaaaaaaaaaaaaaaaa */

        .flbal {
            margin-top: 5px;
        }

        .greenary {
            z-index: -1;
            opacity: 0.8;
            position: fixed;
            top: 0;
            left: 5px;
            width: 320px;
        }

        .greenary2 {
            z-index: -1;
            opacity: 0.92;
            position: fixed;
            top: 50%;
            left: 69.5%;
            width: 350px;
        }

        .flbal1 span {
            font-size: 60px;
        }

        .trhistory {
            margin: 10px auto;
        }


        /* tran history */

        .positive {
            color: green;
            background: rgb(228, 255, 228);
        }

        .negative {
            color: red;
            background: rgb(255, 228, 228);
        }

        .negative,
        .positive {
            margin: 0 4%;
        }

        .col {
            margin: 0 0;
            padding: 7px 3px;
            text-align: center;
        }

        .col-2 {
            margin-right: 7%;
        }

        .col-3 {
            margin-right: 5%;
            border-radius: 5px;
        }

        .containerx {
            margin-top: 10px;
            font-family: "Lato";
            width: 650px;
            margin-left: -50px;
            margin-right: auto;
            padding-left: 10px;
            padding-right: 5px;
            height: 400px;
            overflow-y: scroll;
        }

        .containerx1 {
            margin-top: 30px;
            width: 653px;
            margin-left: -60px;
            margin-right: auto;
            padding-left: 10px;
            padding-right: 10px;
            height: 40px; 
            color:#238c7b;
        }

        .ulx1 {
            margin-left: 10px;
            margin-right: -5px;
        }


        /* .containerx::-webkit-scrollbar {
            width: 10px;
        } */

        .containerx::-webkit-scrollbar {
            width: 7px;
        }


        /* Track */


        /* .containerx::-webkit-scrollbar-track {
            background: #f1f1f1;
        } */


        /* Handle */

        .containerx::-webkit-scrollbar-thumb {
            background: rgb(136, 136, 136);
        }


        /* Handle on hover */

        .containerx::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        .responsive-table li {
            padding: 5px 10px;
            display: flex;
            margin-bottom: 5px;
        }

        .responsive-table .table-header {
            background-color: #fcfbfb;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.03em;
        }

        .responsive-table .table-row {
            background-color: #ffffff;
            box-shadow: 0px 0px 9px 0px rgba(0, 0, 0, 0.18);
        }

        .responsive-table .col-1 {
            flex-basis: 32%;
            text-align: start;
        }

        .responsive-table .col-2 {
            flex-basis: 26%;
            text-align: start;
        }

        .responsive-table .col-3 {
            flex-basis: 8%;
        }

        .responsive-table .col-4 {
            flex-basis: 19%;
        }

        ul {
            padding-inline-start: 0;
            margin-block-start: 0;
        }

        .responsive-table .cola-1 {
            flex-basis: 12%;
        }

        .responsive-table .cola-2 {
            flex-basis: 25%;
        }

        .responsive-table .cola-3 {
            flex-basis: 40%;
        }

        .responsive-table .cola-4 {
            flex-basis: 23%;
        }

        .cola {
            margin: 0 0;
            padding: 7px 3px;
            text-align: center;
        }

        .cola-2 {
            text-align: start;
            margin-right: 7%;
        }

        .cola-3 {
            text-align: start;
            margin-right: 5%;
            border-radius: 5px;
        }

        .responsive-table .c1h {
            padding-left: 30px;
        }

    </style>
</head>

<body>
    <div class="menu__container menu__container--5">
        <div class="menu">
            <div onclick="pro()" class="Profile1 sel1">
            <?php echo $name; ?>'s profile</div>
            <div onclick="mon()" class="Money">Send Money</div>
            <div onclick="tran()" class="Transaction">Transaction</div>
            <div onclick="usl()" class="Userlist">User's List</div>
        </div>
    </div> 
    <div class="extra">
    <div class="profile">
        <div class="hi">Hi,<?php echo " ",$name; ?></div>
                <div class="acc_no">
                    <mark class="accn"><?php echo $acc_no; ?></mark>
                </div>
            <br>
            <div class="bal">Balance <mark class="bala"><?php echo mysqli_fetch_assoc(mysqli_query($con,"SELECT balance FROM user WHERE acc_no='$acnt'"))['balance']; ?>&nbsp Rs.</mark></div>
        </div>
    </div>

    <img src="plants1.png" class="greenary">
    <img src="plants2.png" class="greenary2">
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

    <script>
        var profile = document.getElementsByClassName("profile")[0];
        var money = document.getElementsByClassName("money")[0];
        var transaction = document.getElementsByClassName("transaction")[0];
        var userlist = document.getElementsByClassName("userlist")[0];
        var extra = document.getElementsByClassName("extra")[0];
        console.log(extra);
        function pro() {
            money.classList.remove("select");
            transaction.classList.remove("select");
            userlist.classList.remove("select");
            profile.classList.add("select");

            extra.innerHTML="<div class='profile'><div class='hi'>Hi,<?php echo ' ',$name; ?></div><div class='acc_no'><mark class='accn'><?php echo $acc_no; ?></mark></div><br><div class='bal'>Balance <mark class='bala'>₹<?php echo mysqli_fetch_assoc(mysqli_query($con,"SELECT balance FROM user WHERE acc_no='$acc_no'"))['balance'];?></mark</div></div>";
            document.body.style.backgroundColor="#e7ecff";
        }

        function mon() {
            money.classList.add("select");
            transaction.classList.remove("select");
            userlist.classList.remove("select");
            profile.classList.remove("select");
            
            extra.innerHTML="<div class='receipt'><div class='receipt-list'><div class='fields'><div class='flbal'>Your Balance <div class='flbal1'>₹<span><?php $balance=mysqli_fetch_assoc(mysqli_query($con,"SELECT balance FROM user WHERE acc_no='$acc_no'"))['balance']; echo $balance; ?></span></div></div><form action='trandata.php' method='POST'><div class='receiver fl'><div class='field'>Email/Account no.</div><div class='answer'><input id='rec' minlength='3' maxlength='30' name='receiver' required placeholder='Ex@xyz.com or 10080085'></div></div><div class='flx'><div class='amount fl'><div class='field'>Amount</div><div class='answer'><input id='ana' maxlength='10' static='' name='amount' required placeholder='Enter Amount'></div></div><div class='go fl'><button onclick='' name='submit' type='submit' class='pay'>Pay <svg width='16px' height='15px' aria-hidden='true' focusable='false' data-prefix='fas' data-icon='chevron-right' class='svg-inline--fa fa-chevron-right fa-w-10' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 320 512'><path fill='currentColor' d='M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z'></path></svg></button></div></div></form></div></div></div>";
            document.body.style.backgroundColor="#e7ecff";

        }

        function tran() {
            money.classList.remove("select");
            transaction.classList.add("select");
            userlist.classList.remove("select");
            profile.classList.remove("select");

            extra.innerHTML="<?php $result = mysqli_query($con," SELECT * FROM transaction WHERE acc_no= '$acc_no' ORDER BY datetime DESC "); ?><div class='containerx1'><ul class='responsive-table ulx1'><li class='table-header'><div class='col c1h col-1'>Date</div><div class='col col-2'>To/From</div><div class='col col-3'>Amount</div><div class='col col-4'>Balance</div></li></ul></div><div class='containerx'><ul class='responsive-table'><?php while($rows=$result->fetch_assoc()) { ?><li class='table-row'><div class='col col-1'><?php echo date_format(date_create($rows['datetime']),'d/m/y  h:i A');?></div><div class='col col-2'><?php echo $rows['s_name'];?></div><?php $am = intval($rows['amount']); if($am>0){echo "<div class='col col-3 positive'>"; echo $am; echo "</div>";}else { echo "<div class='col col-3 negative'>"; echo $am; echo "</div>"; }  ?><div class='col col-4'><?php echo $rows['current_bal'];?></div></li><?php } ?></ul></div>";
        }

        function usl() {
            money.classList.remove("select");
            transaction.classList.remove("select");
            userlist.classList.add("select");
            profile.classList.remove("select");

            extra.innerHTML="<?php $result = mysqli_query($con," SELECT id,name,email,acc_no FROM user"); ?><div class='containerx1'><ul class='responsive-table ulx1'><li class='table-header'><div class='cola cola-1'>No</div><div class='cola cola-2'>Name</div><div class='cola cola-3'>Email</div><div class='cola cola-4'>Account No</div> </li></ul></div><div class='containerx'><ul class='responsive-table'><?php while($rows=$result->fetch_assoc()) { ?><li class='table-row'><div class='cola cola-1'><?php echo $rows['id'];?></div><div class='cola cola-2'><?php echo $rows['name'];?></div><div class='cola cola-3'><?php echo $rows['email']; ?></div><div class='cola cola-4'><?php echo $rows['acc_no'];?></div></li><?php } ?></ul></div>";

        }
    </script>
</body>

</html>