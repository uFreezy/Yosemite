<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Recover Password</title>
    <link rel="stylesheet" href="../assets/styles/forgotPassword.css"/>
</head>
<body>
<div id="header-bar-wrapper">
    <!--HEADER-->
    <header id="header-bar">
        <!--MAIN HEADING/LOGO-->
        <a href="#" title="Alpha-Programming" class="logo"><img src="../assets/UI/alpha-programming-logo.png" alt=""/></a>
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
    <h1>Recover Password</h1>
    <form action="" method="post">
        <?php if(isset($_POST['submit']) && !$_POST['email']== ""){?>
            <select name="securityQuestion" class="answer">
                <option value="">-Security Question-</option>
                <option value="1">What is your favourite programming language?</option>
                <option value="2">How many programming languages do you know?</option>
                <option value="3">Which IDE do you prefer?</option>
                <option value="4">What is the first name of the person you first kissed?</option>
            </select>
            <input type="text" name="answer" placeholder="Security answer..." class="answer"/>
        <?php } else{ ?>
            <input type="email" name="email" placeholder="Email..." class="email"/>
        <?php } ?>
        <input type="submit" value="Submit" name="submit" class="submit"/>

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
</body>
</html>