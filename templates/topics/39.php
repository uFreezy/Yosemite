<?php
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
                    <h1>oh noes</h1>
                </header>
                <footer class="generated-thread-footer">
                    <a class="user-img-link" href="#" title="user">
                        <img class="user-img" src="../../assets/UI/icons/default-user-profile.jpg" width="90" height="90" alt="profile-image"/>
                    </a>
                    <a href="#" title="posted by" class="topic-created-by">ADMparola123</a>
                    <p class="topic-date">2015/04/27</p>
                    <a href="#" title="tags" class="topic-tag">FAQ</a>
                </footer>
                <div class="topic-generated-content">
                    <div class="topic-author-notes">
                        <p>aaaaaaaa</p>
                        <div class="post-controllers">
                            <a href="#" title="response button">Response</a>
                            <a href="#" title="abuse button">Report abuse</a>
                        </div>
                    </div>
            </article>
        </section>
        <?php
        include "../footer.php";
        ?>