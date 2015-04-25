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

    $_SESSION['username'] = 'testuser';
    if(isset($_POST['status']) && isset($_SESSION['username'])) {
        echo "yolo";
        $topicTitle = $_POST['topicName'];
        $topicContent = $_POST['topicContent'];
        $topicCategory = $_POST['topicCategory'];
        $date = date("Y/m/d");
        $tags = $_POST['topicTag'];

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
        }

    }
    else {
        var_dump($_SESSION['username']);
        echo "Nope";
    }
?>