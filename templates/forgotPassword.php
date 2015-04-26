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
        <a href="../index.php" title="Alpha-Programming" class="logo"><img src="../assets/UI/alpha-programming-logo.png" alt=""/></a>
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
        <?php
            define('DB_HOST', 'localhost');
            define('DB_NAME', 'sitetest');
            define('DB_USER','root');
            define('DB_PASSWORD','root');

            $con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
            $db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
            session_start(); // Using session to keep the email & boolean variables between different requests.
        ?>
        <?php if(isset($_POST['submit']) && !$_POST['email']== ""){


            $line = mysql_query("SELECT * FROM websiteusers WHERE email = '$_POST[email]'") or die(mysql_error());

            // Checks if user with the email entered exists.
            if($row = mysql_fetch_array($line))
            {
                $question = mysql_query("SELECT secret_question FROM websiteusers WHERE email = '$_POST[email]'") or die(mysql_error());
                // Gets the row from MYSQL which contains the email address.
                $question =  mysql_fetch_array($question);
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['hidefield'] = true;

                switch($question['secret_question']) {
                    case 1:
                        $question['secret_question'] = 'What is your favourite programming language?';
                        break;
                    case 2:
                        $question['secret_question'] = 'How many programming languages do you know?';
                        break;
                    case 3:
                        $question['secret_question'] = 'Which IDE do you prefer?';
                        break;
                    case 4:
                        $question['secret_question'] = 'What is the first name of the person you first kissed?';
                        break;
                    default:
                }
                ?>
                <p style="font-size: 18px; color: #000000; font-weight: bold;">
                    <?php echo $question['secret_question']?></p>
                <input type="text" name="answer" placeholder="Security answer..." class="answer"/>
                <input type="submit" value="Submit" name="submitanswer" class="submit"/>

        <?php }
            else { ?>
                    <p style="font-size: 18px; color: #000000; font-weight: bold;">User doesnt exist.</p>
        <?php    }

        } if(!isset($_SESSION['hidefield'])) { ?>
            <input type="email" name="email" placeholder="Email..." class="email"/>
            <input type="submit" value="Submit" name="submit" class="submit"/>

        <?php }
        if(isset($_POST['submitanswer']) && isset($_POST['answer'])) {
            // Gets the answer from the database so it can compare it with the user input.
            $answer = mysql_query("SELECT secret_answer FROM websiteusers WHERE email = '$_SESSION[email]'") or die(mysql_error());
            $answer = mysql_fetch_array($answer);

            // Compare the user input with the value in the database
            if($answer['secret_answer'] == $_POST['answer']) {
                ?>
                <p> Enter new password.</p>
                <input type="password" name="newpassword" placeholder="New password"/>
                <input type="submit" value="Submit" name="submitpass" class="submit"/>

            <?php }
            else {
                echo "<p style='font-size: 18px; color: #000000; font-weight: bold;'>Incorrect answer.</p>";
            }

        }
        if(isset($_POST['submitpass']) && isset($_POST['newpassword']) && isset($_SESSION['email'])) {
            // Encrypt the new password.
            $newpassword = md5($_POST['newpassword']);
            //Prepare the password update query.
            $query = "UPDATE websiteusers SET pass = '$newpassword' WHERE email = '$_SESSION[email]'";
            //Update the password in the database.
            $data = mysql_query($query) or die(mysql_error());
            // Destroying the session to avoid bugs.
            session_destroy();
            echo "Password changed!";
        }
        ?>

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