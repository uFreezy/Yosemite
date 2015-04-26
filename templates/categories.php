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
                    last_topic_by,
                    last_topic_date,
                    last_topic_name
                FROM
                    catinfo
                WHERE
                    1";

    $result = mysql_query($sql) or die(mysql_error());

    if(!$result)
    {
        echo 'The categories could not be displayed, please try again later.';
    }
    while($row = mysql_fetch_assoc($result))
    {
        echo'<article class="important-category category sticky">';
        echo'<div class="topic-info">';
            echo'<header>';
                echo'<h1>';
                    echo'<a href="templates/faq.php" title="Category name">'. $row['cat_name'].'</a>';
                echo'</h1>';
            echo'</header>';
            echo'<footer>';
                echo'<a href="#" class="topic-creator topic-meta" title="Last posted by">'. $row['last_topic_by'].'</a>';
                echo'<p class="topic-meta topic-date-creation">'. $row['last_topic_date'] .'</p>';
                echo'<p class="topic-meta topic-tag">' . $row['last_topic_name'] . '</p>';
            echo'</footer>';
        echo'</div>';
    echo'</article>';
    }
    ?>
</section>