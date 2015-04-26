<?php
//YOUR LOGIC HERE
$path = './';
$mainStyle = 'assets/styles/main.css';

//LOGIN NOTICE login.php is here and your variables/logic is here
// then you use your variables/logic from here into PHP TEMPLATES
//AD THERE STAY MOSTLY AN HTML SYNTAX

session_start();

include "login.php";

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

$IsNotLogged = !isset($_SESSION['username']);
if(isset($_SESSION['username'])) {
    $line = mysql_query("SELECT * FROM websiteusers WHERE userName = '$_SESSION[username]'") or die(mysql_error());
    $line = mysql_fetch_array($line);

    if($line['is_admin']) {
        $welcomeMessage = "Welcome, " . "<a href='#'><span style='color: red'>" . $_SESSION['username']. "</span></a>";
    }
    else {
        $welcomeMessage = "Welcome, " .  $_SESSION['username'];
    }
}
//HEADER
include 'templates/header.php';

//AFTER ARTICLES LOGIC INCLUDE ARTICLE
include 'templates/categories.php';
//TODO...CREATE ALL CATEGORIES - SUB CATEGORIES/POSTS/REPLY

//AFTER FOOTER LOGIC INCLUDE FOOTER
include 'templates/footer.php';
//TODO...NOTHING AT THIS TIME (SOMETHING IN A FUTURE)