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