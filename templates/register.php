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
        <a href="../index.php" title="Alpha-Programming" class="logo"><img src="../assets/UI/alpha-programming-logo.png"
                                                                           alt=""/></a>
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
        <input type="text" name="fullName" placeholder="Full Name..." class="fullName"/>
        <input type="email" name="email" placeholder="Email..." class="email"/>
        <input type="text" name="username" placeholder="Username..." class="userName"/>
        <input type="password" name="password" placeholder="Password..." class="password"/>
        <select name="securityQuestion" class="answer">
            <option value="">-Security Question-</option>
            <option value="1">What is your favourite programming language?</option>
            <option value="2">How many programming languages do you know?</option>
            <option value="3">Which IDE do you prefer?</option>
            <option value="4">What is the first name of the person you first kissed?</option>
        </select>
        <input type="text" name="answer" placeholder="Security answer..." class="answer"/>
        <input type="submit" name="submitRegistration" value="Register" class="submit"/>
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
define('DB_NAME', 'freezycl_1');
define('DB_USER','freezycl_1');
define('DB_PASSWORD','tapaka2000');
$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db = mysql_select_db(DB_NAME, $con) or die("Failed to connect to MySQL: " . mysql_error());

if (isset($_POST['submitRegistration'])) {
    $fullname = $_POST["fullName"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = md5($_POST["password"]);
    $secretQuestion = $_POST['securityQuestion'];
    $secretAnswer = $_POST['answer'];

    if (preg_match('/(\W)|(\d)/', $fullname) || $fullname == "") {
        if (preg_match('/(\W)|(\d)/', $fullname)) {
            echo "Name cant contain special charecters or digits";
            exit(); // This is to stop the code from executing any further.
        } else {
            echo "Name cant be empty";
            exit(); // This is to stop the code from executing any further.
        }
    }
    if (preg_match('/\W/', $username) && strlen($username) < 3) {
        echo "Username can't contain special charecters and cant be under 3 symbols";
        exit(); // This is to stop the code from executing any further.
    }
    if (!preg_match('/\W/', $username)) {
        $line = mysql_query("SELECT * FROM WebsiteUsers WHERE userName = '$_POST[username]'") or die(mysql_error());

        if ($row = mysql_fetch_array($line)) {
            echo "User already exists!";
            exit(); // This is to stop the code from executing any further.
        }
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) === true) {
        echo "Invalid email adress.";
        exit();
    } else {
        $line = mysql_query("SELECT * FROM WebsiteUsers WHERE email = '$_POST[email]'") or die(mysql_error());

        if ($row = mysql_fetch_array($line)) {
            echo "User with that email  already exists!";
            exit(); // This is to stop the code from executing any further.
        }
    }
    if ($secretQuestion == 0 || $secretAnswer == '') {
        echo "Invalid security data.";
        exit();
    }

    $query = "INSERT INTO WebsiteUsers (fullname,userName,email,pass,secret_question,secret_answer,is_admin)
                  VALUES ('$fullname','$username','$email','$password','$secretQuestion','$secretAnswer','false')";
    $data = mysql_query($query) or die(mysql_error());
    if ($data) {
        echo "YOUR REGISTRATION IS COMPLETED...";
    }

}
?>
</body>
</html>