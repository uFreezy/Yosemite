
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
                        <h1>dasdasdas</h1> // topic name here
                        </header>
                        <footer class="generated-thread-footer">
                        <a class="user-img-link" href="#" title="user">
                        <img class="user-img" src="../assets/UI/icons/default-user-profile.png" width="90" height="90" alt="profile-image"/>
                        </a>
                        <a href="#" title="posted by" class="topic-created-by">testuser</a>
                        <p class="topic-date">2015/04/26</p>
                        <a href="#" title="tags" class="topic-tag">FAQ</a>
                        </footer>
                        <div class="topic-generated-content">
                        <div class="topic-author-notes">
                        <p>dasdasdasdasd</p>
                        <div class="post-controllers">
                        <a href="#" title="response button">Response</a>
                        <a href="#" title="abuse button">Report abuse</a>
                        </div>
                        </div>
                        <div class="topic-comments">
                        </div>
                        </article>
                        </section>
                        <?php
                        include "footer.php";
                        ?>