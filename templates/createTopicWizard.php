<div class="container">
    <a id="modal_trigger" href="#modal" class="btn">Create topic</a>

    <div id="modal" class="popupContainer">
        <header class="popupHeader">
            <span class="header_title">Create Topic</span>
            <span class="modal_close"><i class="fa fa-times"></i></span>
        </header>

        <section class="popupBody">
            <form id="topic-wizard" action="#" method="post">
                <!--TOPIC NAME-->
                <label class="topic-label" for="topic-name">Name:</label>
                <input type="text" id="topic-name" class="topic-input" name="topicName" placeholder="Topic name" required="required"/>
                <!--TOPIC CONTENT-->
                <label class="topic-label" for="topic-content">Your message...</label>
                <textarea name="topicContent" id="topic-content" cols="30" rows="10" placeholder="Type..." required="required"></textarea>
                <!--TOPIC CATEGORY-->
                <label class="topic-label" for="category-select">Category</label>
                <select id="category-select" name="topicCategory" id="topic-category">
                    <option value="FAQ" disabled>FAQ (only admins)</option>
                    <option value="Events" disabled>Events (only admins)</option>
                    <option value="General discussion">General Discussion</option>
                    <option value="News">News</option>
                    <option value="Feedback - Suggestions/Bugs">Feedback</option>
                    <option value="Spam - Talk about everything">Spam</option>
                    <option value="Trash" disabled>Trash</option>
                </select>
                <!--TOPIC TAG-->
                <label class="topic-label" for="topic-tag">Tag</label>
                <input type="text" id="topic-tag" class="topic-input" name="topicTag" placeholder="Tag..." required="required"/>
                <!--SUBMIT-->
                <input type="submit" id="create-topic-btn" name="status" class="modal_close topic-input" value="Create topic"/>
            </form>
        </section>
    </div>
</div>
<?php

    $con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
    $db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

if(isset($_POST['status']) && isset($_SESSION['username'])) {
    $topicTitle = $_POST['topicName'];
    $topicContent = $_POST['topicContent'];
    $topicCategory = $_POST['topicCategory'];
    $date = date("Y/m/d");
    $tags = $_POST['topicTag'];
    $line = mysql_query("SELECT * FROM websitetopics WHERE topic_name = '$topicTitle'") or die(mysql_error());
//    $getRow = mysql_fetch_assoc($line);
//    $postedBy = $getRow['posted_by'];

    if($row = mysql_fetch_array($line)) {
        echo "Topic with that title already exits. We don't want to cause the
        developers headache so please choose different name.";
        exit();
    }
    $sql = "INSERT INTO
    websitetopics(
                  topic_icon,
                  topic_category,
                  topic_name,
                  topic_content,
                  posted_by,
                  posted_date,
                  posted_tags)
    VALUES('1','$topicCategory','$topicTitle','$topicContent','$_SESSION[username]','$date','$tags')";

    $updateCatInfo = "UPDATE catinfo
                      SET last_topic_by = '$_SESSION[username]',
                          last_topic_date = '$date',
                          last_topic_name = '$topicTitle'
                      WHERE cat_name = '$topicCategory'";

    $result = mysql_query($sql) or die(mysql_error());

    $updateResult = mysql_query($updateCatInfo) or die(mysql_error());

    if($result) {

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
        include "../replyPostWizard.php";
        ?>
        <section id="main-section">
            <article class="generated-thread">
                <header class="generated-thread-heading">
                    <h1>'. $topicTitle .'</h1>
                </header>
                <footer class="generated-thread-footer">
                    <a class="user-img-link" href="#" title="user">
                        <img class="user-img" src="../../assets/UI/icons/default-user-profile.jpg" width="90" height="90" alt="profile-image"/>
                    </a>
                    <a href="#" title="posted by" class="topic-created-by">'. $_SESSION['username'] .'</a>
                    <p class="topic-date">'. $date .'</p>
                    <a href="#" title="tags" class="topic-tag">FAQ</a>
                </footer>
                <div class="topic-generated-content">
                    <div class="topic-author-notes">
                        <p>'. $topicContent .'</p>
                        <div class="post-controllers">
                            <a id="modal_trigger" href="#modal" title="reply button" class="btn">Response</a>
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
?>