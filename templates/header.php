<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="Description" content="Forum about programming"/>
    <meta name="author" content="Yosemite Team"/>
    <meta name="keywords" content="Yosemite, Programming, Developing, HTML, JavaScripts, CSharp, Java, PHP"/>
    <title>Alpha-Programming</title>
    <?php
    echo "<link rel=\"stylesheet\" href=\"$path/assets/styles/main.css\"/>".
         "<link rel=\"stylesheet\" href=\"$path/assets/styles/topicCreationWizard.css\"/>".
         "<link rel=\"stylesheet\" href=\"http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css\" />".
         "<script src=\"$path/scripts/libs/jquery-2.1.3.min.js\"></script>".
         "<script src=\"$path/scripts/listeners.js\"></script>".
         "<script type=\"text/javascript\" src=\"$path/scripts/libs/jquery.leanModal.min.js\"></script>";

    ?>
</head>
<body>
<div id="header-bar-wrapper">
    <!--HEADER-->
    <header id="header-bar">
        <!--MAIN HEADING/LOGO-->
        <h1 id="main-heading">
            <a href="#" title="Alpha-Programming">
                <?php
                echo "<a href='../index.php'><img id=\"company-logo\" src=\"$path/assets/UI/alpha-programming-logo.png\" alt=\"alpha-programming logo\" width=\"240\" height=\"40\"/></a>";
                ?>
            </a>
        </h1>
        <!--MAIN NAVIGATION-->
        <nav id="header-main-navigation">
            <ul>
                <?php
                echo "<li><a href=\"$path\" title=\"Home\">Home</a></li>";
                echo "<li><a href=\"#\" title=\"Users\">Users</a></li>";
                echo "<li><a href=\"#\" title=\"Contact Admin\">Contacts</a></li>";
                ?>
            </ul>
        </nav>
        <!--LOGIN-->
        <?php
        if($IsNotLogged) {
        echo "<form id=\"login-form\" method=\"post\" action=\"\">
                <input type=\"text\" name=\"username-login\" maxlength=\"40\" placeholder=\"User Name...\"/>
                <input type=\"password\" name=\"password-login\" maxlength=\"40\" placeholder=\"Password...\"/>
                <a href=\"$path/templates/forgotPassword.php\" id=\"password-recovery\" title=\"recover your password\">forgotten?</a>
                <a href=\"#\" title=\"Login\" id=\"login-btn\">Login</a>
                <a href=\"$path/templates/register.php\" title=\"Register\" id=\"register-btn\">Register</a>
             </form>";
        } else {
            echo "<div id=\"welcome-board\">
                    <p id=\"welcome-msg\">$welcomeMessage</p>
                    <a id='logout-btn' href=\"logout.php\">logout</a>
                </div>";
        }
        ?>
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