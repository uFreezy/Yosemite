<!--SECTION-->
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
    <?php
    $sql = "SELECT
                    cat_name,
                    cat_icon,
                    last_topic_by,
                    last_topic_date,
                    last_topic_name
                FROM
                    CatInfo
                WHERE
                    1";

    $result = mysql_query($sql) or die(mysql_error());

    if(!$result)
    {
        echo 'The categories could not be displayed, please try again later.';
    }
    while($row = mysql_fetch_assoc($result))
    {
        switch($row['cat_icon']) {
            case 1:
                echo'<article class="important-category category sticky">';
                break;
            case 2:
                echo'<article class="category sticky">';
                break;
            case 3:
                echo'<article class="category">';
                break;
            case 4:
                echo'<article class="category trash">';
                break;
            default:
        }
        echo'<div class="topic-info">';
        echo'<header>';
        echo'<h1>';
        switch($row['cat_name']) {
            case 'FAQ':
                echo'<a href="templates/faq.php" title="Category name">'. $row['cat_name'].'</a>';
                break;
            case 'Events':
                echo'<a href="templates/events.php" title="Category name">'. $row['cat_name'].'</a>';
                break;
            case 'General discussion':
                echo'<a href="templates/general_discussion.php" title="Category name">'. $row['cat_name'].'</a>';
                break;
            case 'News':
                echo'<a href="templates/news.php" title="Category name">'. $row['cat_name'].'</a>';
                break;
            case 'Feedback - Suggestions/Bugs':
                echo'<a href="templates/feedback.php" title="Category name">'. $row['cat_name'].'</a>';
                break;
            case 'Spam - Talk about everything':
                echo'<a href="templates/spam.php" title="Category name">'. $row['cat_name'].'</a>';
                break;
            case 'Trash':
                echo'<a href="templates/trash.php" title="Category name">'. $row['cat_name'].'</a>';
                break;
            default:
        }
        echo'</h1>';
        echo'</header>';
        echo'<footer>';
        echo'<a href="#" class="topic-creator topic-meta" title="Last posted by">'. $row['last_topic_by'].'</a>';
        echo'<p class="topic-meta topic-date-creation">'. $row['last_topic_date'] .'</p>';
        echo'<p class="topic-meta topic-tag">' . htmlentities($row['last_topic_name']) . '</p>';
        echo'</footer>';
        echo'</div>';
        echo'</article>';
    }
    ?>
</section>