<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Create new topic</title>
    <link rel="stylesheet" href="../assets/styles/topicCreationWizard.css"/>
</head>
<body>
<header>
    <h1>Topic creation wizard</h1>
</header>
<form id="topic-wizard" action="#" method="post">
    <!--TOPIC NAME-->
    <label for="topic-name">Name:</label>
    <input type="text" id="topic-name" name="topicName" placeholder="Topic name" required="required"/>
    <!--TOPIC CONTENT-->
    <label for="topic-content">Your message...</label>
    <textarea name="topicContent" id="topic-content" cols="30" rows="10" placeholder="Type..." required="required"></textarea>
    <!--TOPIC CATEGORY-->
    <label for="topic-category">Category</label>
<!--    <input type="text" id="topic-category" name="topicCategory" placeholder="Category..." required="required"/>-->
    <select id="topic-category" name="topicCategory" required="required">
        <option value="FAQ">FAQ</option>
        <option value="Nope">TEST1</option>
    </select>
    <!--TOPIC TAG-->
    <label for="topic-tag">Tag</label>
    <input type="text" id="topic-tag" name="topicTag" placeholder="Tag..." required="required"/>
    <!--SUBMIT-->
    <input type="submit" name="status" value="submit"/>
</form>
</body>
</html>
<?php
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'sitetest');
    define('DB_USER','root');
    define('DB_PASSWORD','root');

    $con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
    $db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

    $_SESSION['username'] = 'testuser'; // temporary here for testing.
    var_dump($_SESSION);
    if(isset($_POST['status']) && isset($_SESSION['username'])) {
        $topicTitle = $_POST['topicName'];
        $topicContent = $_POST['topicContent'];
        $topicCategory = $_POST['topicCategory'];
        $date = date("Y/m/d");
        $tags = $_POST['topicTag'];
        $line = mysql_query("SELECT * FROM websitetopics WHERE topic_name = '$topicTitle'") or die(mysql_error());
        $row = mysql_fetch_array($line);
        $postedBy = $row['posted_by'];

        if($row = mysql_fetch_array($line)) {
            echo "Topic with that title already exits. We don't want to cause the
                  developers headache so please choose different name.";
            exit();
        }
        $sql = "INSERT INTO
                        websitetopics(topic_icon,
                               topic_category,
                               topic_name,
                               topic_content,
                               posted_by,
                               posted_date,
                               posted_tags)
                   VALUES('1','$topicCategory','$topicTitle','$topicContent','$_SESSION[username]','$date','$tags')";

        $result = mysql_query($sql) or die(mysql_error());

        if($result)
        {
            echo "Successfully added new topic!";

            $sql = "SELECT
                    topicID
                FROM
                    websitetopics
                WHERE
                    topic_name = '$topicTitle'";
            $result = mysql_query($sql);
            $row = mysql_fetch_assoc($result);
            $filename =  "topics/" . $row['topicID'] . ".php";
            //echo $filename;
            $template = '<?php
                        $path = "../../";
                        session_start();
                        $IsNotLogged = !isset($_SESSION["username"]);
                        if (isset($_SESSION["username"])) {
                        $welcomeMessage = "Welcome, " . $_SESSION["username"];
                        }
                        include "../header.php";
                        ?>
                        <section id="main-section">
                        <article class="generated-thread">
                        <header class="generated-thread-heading">
                        <h1>'. $topicTitle .'</h1>
                        </header>
                        <footer class="generated-thread-footer">
                        <a class="user-img-link" href="#" title="user">
                        <img class="user-img" src="../assets/UI/icons/default-user-profile.png" width="90" height="90" alt="profile-image"/>
                        </a>
                        <a href="#" title="posted by" class="topic-created-by">'. $postedBy .'</a>
                        <p class="topic-date">'. $date .'</p>
                        <a href="#" title="tags" class="topic-tag">FAQ</a>
                        </footer>
                        <div class="topic-generated-content">
                        <div class="topic-author-notes">
                        <p>'. $topicContent .'</p>
                        <div class="post-controllers">
                        <a href="#" title="response button">Response</a>
                        <a href="#" title="abuse button">Report abuse</a>
                        </div>
                        </div>
                        </article>
                        </section>
                        <?php
                        include "../footer.php";
                        ?>';
            $myfile = fopen($filename, "w") or die("Unable to open file!");
            fwrite($myfile, $template);
            fclose($myfile);

        }

    }
    else {
        var_dump($_SESSION['username']);
        echo "Nope";
    }
?>