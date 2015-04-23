<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" href="../assets/styles/registration.css"/>
</head>
<body>
<div id="header-bar-wrapper">
    <!--HEADER-->
    <header id="header-bar">
        <!--MAIN HEADING/LOGO-->
        <a href="#" title="Alpha-Programming" class="logo"><img src="img/coollogo_com-15949304.png" alt=""/></a>
        <!--MAIN NAVIGATION-->
        <nav id="header-main-navigation">
            <ul>
                <li><a href="#" title="Home">Home</a></li>
                <li><a href="#" title="Users">Users</a></li>
                <li><a href="#" title="FAQ">FAQ</a></li>
                <li><a href="#" title="Contact Admin">Contacts</a></li>
            </ul>
        </nav>
    </header>
</div>
    <div id="form">
        <h1>Registration</h1>
        <form action="" method="post">
            <input type="text" name="fullname" placeholder="Full name"/>
<!--            <input type="text" name="lastName" placeholder="Last Name..."/>-->
            <input type="email" name="email" placeholder="Email..."/>
            <input type="text" name="username" placeholder="Username..."/>
            <input type="password" name="password" placeholder="Password..."/>
            <input type="submit" name="submitRegistration" value="Register"/>
        </form>
    </div>
    <footer id="main-footer">
        <div>
        <p class="footer-title">Powered by Team Yosemite</p>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">About US</a></li>
            </ul>
        </nav>
        </div>
    </footer>
<?php
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'sitetest');
    define('DB_USER','root');
    define('DB_PASSWORD','root');

    $con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
    $db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

    if(isset($_POST['submitRegistration'])) {
        $fullname = $_POST["fullname"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = md5($_POST["password"]);

        if(preg_match('/(\W)|(\d)/',$fullname) || $fullname == "") {
            if(preg_match('/(\W)|(\d)/',$fullname)) {
                echo "Name cant contain special charecters or digits";
                exit(); // This is to stop the code from executing any further.
            }
            else {
                echo"Name cant be empty";
                exit(); // This is to stop the code from executing any further.
            }
        }
        if(preg_match('/\W/',$username)) {
            echo"Username can't contain special charecters";
            exit(); // This is to stop the code from executing any further.
        }
        if(!preg_match('/\W/',$username)) {
            $line = mysql_query("SELECT * FROM websiteusers WHERE userName = '$_POST[username]'") or die(mysql_error());

            if($row = mysql_fetch_array($line))
            {
                echo"User already exists!";
                exit(); // This is to stop the code from executing any further.
            }
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL) === true) {
            exit("Invalid email adress.");
            exit();
        }

        $query = "INSERT INTO websiteusers (fullname,userName,email,pass) VALUES ('$fullname','$username','$email','$password')";
        $data = mysql_query ($query)or die(mysql_error());
        if($data)
        {

            echo "YOUR REGISTRATION IS COMPLETED...";
        }

    }
?>
</body>
</html>