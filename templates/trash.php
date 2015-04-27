<?php
$path = '../';
$stylesPath = '../assets/styles/main.css';

session_start(); // This is required in every file so $_SESSION stays active.

include "../login.php";

// Connection to the database
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

include 'header.php';

?>

<section id="main-section">
    <header id="path">
        <h1>
            <?php
            $DocumentSelf = dirname(__DIR__).'/'.basename($_SERVER['PHP_SELF'], '.php');
            $DocumentSelf = str_replace('\\', '/', $DocumentSelf);
            echo $DocumentSelf;
            ?>
        </h1>
    </header>
<?php include "createTopicWizard.php"; ?>

    <?php
        $sql = "SELECT
                    topicID,
                    topic_category,
                    topic_name,
                    topic_content,
                    posted_by,
                    posted_date,
                    posted_tags
                FROM
                    websitetopics
                WHERE
                    topic_category = 'Trash'";

        $result = mysql_query($sql) or die(mysql_error());

        if(!$result)
        {
            echo 'The topics could not be displayed, please try again later.';
        }
        while($row = mysql_fetch_assoc($result))
        {
            $tags = explode("," , $row['posted_tags']);
            for($i = 0; $i < sizeof($tags); $i++){
                $tags[$i] = "<a href='#' style='color: #000000;'>" . $tags[$i] . "</a>";
            }
            $resultTags = implode(',' , $tags);

            echo'<article class="important-category category sticky">';
            echo'<div class="topic-info">';
            echo'<header>';
            echo'<h1>';
            echo'<a href="topics/' . $row["topicID"] . '.php' .'" title="">'. $row["topic_name"] . '</a>';
            echo'</h1>';
            echo'</header>';
            echo'<footer>';
            echo'<a href="#" class="topic-creator topic-meta" title="Created by">'. $row["posted_by"].'</a>';
            echo' <p class="topic-meta topic-date-creation">'. $row["posted_date"].'</p>';
            echo'<p class="topic-meta topic-tag">'  .$resultTags . '</p>';
            echo'</footer>';
            echo'</div>';
            echo'</article>';
        }
    ?>
</section>

<?php include 'footer.php'; ?>