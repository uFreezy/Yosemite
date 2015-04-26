<?php
//YOUR LOGIC HERE
$path = './';
$mainStyle = 'assets/styles/main.css';

//LOGIN NOTICE login.php is here and your variables/logic is here
// then you use your variables/logic from here into PHP TEMPLATES
//AD THERE STAY MOSTLY AN HTML SYNTAX

session_start();

include "login.php";
$IsNotLogged = !isset($_SESSION['username']);
if(isset($_SESSION['username'])) {
    $welcomeMessage = "Welcome, " . $_SESSION['username'];
}
//HEADER
include 'templates/header.php';

//AFTER ARTICLES LOGIC INCLUDE ARTICLE
include 'templates/categories.php';
//TODO...CREATE ALL CATEGORIES - SUB CATEGORIES/POSTS/REPLY

//AFTER FOOTER LOGIC INCLUDE FOOTER
include 'templates/footer.php';
//TODO...NOTHING AT THIS TIME (SOMETHING IN A FUTURE)