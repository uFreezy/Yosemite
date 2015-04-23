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
    <!--ARTICLE1-->
    <article class="important-category category sticky">
        <div class="topic-info">
            <header>
                <h1>
                    <a href="templates/faq.php" title="FAQ">FAQ</a>
                </h1>
            </header>
            <footer>
                <a href="#" class="topic-creator topic-meta" title="Created by">Admin</a>
                <p class="topic-meta topic-date-creation">01/01/2015</p>
                <p class="topic-meta topic-tag">Important</p>
            </footer>
        </div>
    </article>
    <!--ARTICLE2-->
    <article class="category sticky">
        <div class="topic-info">
            <header>
                <h1>
                    <a href="#" title="Events">Events</a>
                </h1>
            </header>
            <footer>
                <a href="#" class="topic-creator topic-meta" title="Created by">Moderator</a>
                <p class="topic-meta topic-date-creation">02/03/2015</p>
                <p class="topic-meta topic-tag">Events</p>
            </footer>
        </div>
    </article>
    <!--ARTICLE3-->
    <article class="category">
        <div class="topic-info">
            <header>
                <h1>
                    <a href="#" title="General discussion">General discussion</a>
                </h1>
            </header>
            <footer>
                <a href="#" class="topic-creator topic-meta" title="Created by">Admin</a>
                <p class="topic-meta topic-date-creation">01/01/2015</p>
                <p class="topic-meta topic-tag">General discussions</p>
            </footer>
        </div>
    </article>
    <!--ARTICLE4-->
    <article class="category">
        <div class="topic-info">
            <header>
                <h1>
                    <a href="#" title="News">News</a>
                </h1>
            </header>
            <footer>
                <a href="#" class="topic-creator topic-meta" title="Created by">Moderator</a>
                <p class="topic-meta topic-date-creation">05/04/2015</p>
                <p class="topic-meta topic-tag">News</p>
            </footer>
        </div>
    </article>
    <!--ARTICLE5-->
    <article class="category">
        <div class="topic-info">
            <header>
                <h1>
                    <a href="#" title="Feedback - Suggestions/Bugs">Feedback - Suggestions/Bugs</a>
                </h1>
            </header>
            <footer>
                <a href="#" class="topic-creator topic-meta" title="Created by">Moderator</a>
                <p class="topic-meta topic-date-creation">12/04/2015</p>
                <p class="topic-meta topic-tag">Support</p>
            </footer>
        </div>
    </article>
    <!--ARTICLE6-->
    <article class="category">
        <div class="topic-info">
            <header>
                <h1>
                    <a href="#" title="Spam">Spam - Talk about everything</a>
                </h1>
            </header>
            <footer>
                <a href="#" class="topic-creator topic-meta" title="Created by">Moderator</a>
                <p class="topic-meta topic-date-creation">18/04/2015</p>
                <p class="topic-meta topic-tag">Spam</p>
            </footer>
        </div>
    </article>
    <!--ARTICLE7-->
    <article class="category trash">
        <div class="topic-info">
            <header>
                <h1>
                    <a href="#" title="Trash">Trash</a>
                </h1>
            </header>
            <footer>
                <a href="#" class="topic-creator topic-meta" title="Created by">Moderator</a>
                <p class="topic-meta topic-date-creation">21/04/2015</p>
                <p class="topic-meta topic-tag">Deleted</p>
            </footer>
        </div>
    </article>
</section>