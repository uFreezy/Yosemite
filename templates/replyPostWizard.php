<div class="container">
    <div id="modal" class="popupContainer">
        <header class="popupHeader">
            <span class="header_title">Reply Topic</span>
            <span class="modal_close"><i class="fa fa-times"></i></span>
        </header>

        <section class="popupBody">
            <form id="topic-wizard" action="#" method="post">
                <?php
                //<!--REPLY-TOPIC USER NAME-->
                if ($IsNotLogged) {
                    echo
                    '<label class="topic-label" for="topic-name">Name:</label>'.
                    '<input type="text" id="topic-name" class="topic-input" name="topicReplyName" placeholder="Your name..." required="required"/>'.
                    '<label class="topic-label" for="topic-reply-email">Email:</label>'.
                    '<input type="email" id="topic-reply-email" class="topic-input" required="required" placeholder="example@example.com" />';
                }

                ?>
                <!--REPLY-TOPIC CONTENT-->
                <label class="topic-label" for="topic-content">Your message...</label>
                <textarea name="topicReplyContent" id="topic-content" cols="30" rows="10" placeholder="Type..." required="required"></textarea>
                <!--SUBMIT-->
                <input type="submit" id="create-topic-btn" name="status" class="modal_close topic-input" value="Reply"/>
            </form>
        </section>
    </div>
</div>
<?php
    if(isset($_POST['status']) && isset($_POST['topicReplyContent'])) {
        $date = date("Y/m/d");

        // Checks if user is logged  and if there is saves the username in variable.
        if(isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
        }
        // If user is not logged we check for input from the Guest form and if there isn't any we stop the script.
        // If there is any we save it in the variable.
        else {
            if(isset($_POST['topicReplyName'])) {
                $username = $_POST['topicReplyName'];
            }
            else {
                exit();
            }
        }

        // Get the name of the file in which the script is executed.
        $fileID = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);

        // Open the file.
        $handle = fopen($fileID, "r");
        $linecount = 0;

        // Count the lines in the file.
        while(!feof($handle)){
            $line = fgets($handle);
            $linecount++;
        }
        fclose($handle);

        // Comment template to inject.
        $template = '<div class="topic-comments">
               <div>
                   <a href="#" title="user">
                       <img class="user-reply-image" src="../../assets/UI/icons/default-user-profile.png" alt="profile-image" width="90" height="90"/>
                   </a>
               </div>
                <div class="reply-content">
                    <h3>
                        <a href="#" title="user">'. htmlentities($username) .'</a>
                    </h3>
                    <time datetime="11.11.1111" class="post-reply-date">'. $date .'</time>
                    <p>'. htmlentities($_POST['topicReplyContent']) .'</p>
            </div>
            </div>
            </article>
            </section>
            <?php
            include "../footer.php";
            ?>';

        // Get the content from the topic file in array.
        $contents = file($fileID);

        // Remove the last 6 lines from the file.
        for($i = $linecount; $i > $linecount - 6; $i--) {
            $contents[$i] = '';

        }

        // Delete everything from the file so we can inject the new content.
        $myfile = fopen($fileID, "w") or die("Unable to open file!");
        fwrite($myfile, '');
        fclose($myfile);

        // Inject the new content.
        for($i = 0; $i < sizeof($contents); $i++) {
            file_put_contents($fileID, $contents[$i], FILE_APPEND);
        }

        // Inject the new comment.
        file_put_contents($fileID, $template, FILE_APPEND);

    }
?>