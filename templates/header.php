<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="Description" content="Forum about programming"/>
    <meta name="author" content="Yosemite Team"/>
    <meta name="keywords" content="Yosemite, Programming, Developing, HTML, JavaScripts, CSharp, Java, PHP"/>
    <title>Alpha-Programming</title>
    <?php
    echo '<link rel="stylesheet" href="'.$stylesPath.'"/>';
    ?>
    <!--LIBS-->
    <script src="scripts/libs/jquery-2.1.3.min.js"></script>
</head>
<body>
<div id="header-bar-wrapper">
    <!--HEADER-->
    <header id="header-bar">
        <!--MAIN HEADING/LOGO-->
        <h1 id="main-heading">
            <a href="#" title="Alpha-Programming">
                <?php
                echo '<img id="company-logo" src="'.$path.'/assets/UI/alpha-programming-logo.png'.'" alt="alpha-programming logo" width="240" height="40"/>';
                ?>
            </a>
        </h1>
        <!--MAIN NAVIGATION-->
        <nav id="header-main-navigation">
            <ul>
                <?php
                echo '<li><a href="'.$path.'" title="Home">Home</a></li>';
                echo '<li><a href="#" title="Users">Users</a></li>';
                echo '<li><a href="#" title="Contact Admin">Contacts</a></li>';
                ?>
            </ul>
        </nav>
        <!--LOGIN-->
        <form id="login-form" action="#"> <!--method="post" DEBUG-->
            <input type="text" name="userName" maxlength="40" placeholder="User Name..."/>
            <input type="password" name="userPassword" maxlength="40" placeholder="Password..."/>
            <a href="#" id="password-recovery" title="recover your password">forgotten?</a>
            <input id="form-status" type="hidden" name="status" value="submitted"/>
            <a href="#" title="Login" id="login-btn">Login</a>
            <?php
            echo "<a href=\"$path/templates/register.php\" title=\"Register\" id=\"register-btn\">Register</a>";
            ?>
        </form>
    </header>
</div>
<div id="wrapper">
    <div id="fake-header">
        <!--HEADER EXTENDER-->
        <div id="header-bar-extended">
            <!--THEME CHOOSER-->
            <label for="theme-choose">Theme</label>
            <select id="theme-choose" name="theme">
                <option value="" selected="selected" disabled="disabled">Select</option>
                <option value="default">Default</option>
                <option value="white">White</option>
                <option value="dark">Dark</option>
            </select>

        </div>
        <p>Welcome to Alpha-Programming</p>
    </div>