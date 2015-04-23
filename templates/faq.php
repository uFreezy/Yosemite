<?php
$path = '../';
$stylesPath = '../assets/styles/main.css';

include 'header.php';
?>

<section id="main-section">
    <header id="path">
        <h1>
            <?php
            //TODO...TEMPLATE FOR THREADS/TOPICS
            $DocumentSelf = dirname(__DIR__).'/'.basename($_SERVER['PHP_SELF'], '.php');
            $DocumentSelf = str_replace('\\', '/', $DocumentSelf);
            echo $DocumentSelf;
            ?>
        </h1>
    </header>
</section>

<?php include 'footer.php'; ?>