<?php
$path = '../';
$stylesPath = '../assets/styles/main.css';

include 'header.php';

define('DB_HOST', 'localhost');
define('DB_NAME', 'sitetest');
define('DB_USER','root');
define('DB_PASSWORD','root');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
?>

<section id="main-section">
    <?php
        $sql = "SELECT
                    topic_category,
                    topic_name,
                    topic_content,
                    posted_by,
                    posted_date
                FROM
                    websitetopics
                WHERE
                    topic_category = 'FAQ'";

        $result = mysql_query($sql) or die(mysql_error());

        if(!$result)
        {
            echo 'The topics could not be displayed, please try again later.';
        }

        while($row = mysql_fetch_assoc($result))
        {
            echo'<article class="important-category category sticky">';
            echo'<div class="topic-info">';
            echo'<header>';
            echo'<h1>';
            echo'<a href="templates/faq.php" title="">'. $row["topic_name"] . '</a>';
            echo'</h1>';
            echo'</header>';
            echo'<footer>';
            echo'<a href="#" class="topic-creator topic-meta" title="Created by">'. $row["posted_by"].'</a>';
            echo' <p class="topic-meta topic-date-creation">'. $row["posted_date"].'</p>';
            echo'<p class="topic-meta topic-tag">Important</p>';
            echo'</footer>';
            echo'</div>';
            echo'</article>';
        }
    ?>
</section>

<?php include 'footer.php'; ?>