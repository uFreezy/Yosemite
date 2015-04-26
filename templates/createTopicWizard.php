<div class="container">
    <a id="modal_trigger" href="#modal" class="btn">Create topic</a>

    <div id="modal" class="popupContainer">
        <header class="popupHeader">
            <span class="header_title">Create Topic</span>
            <span class="modal_close"><i class="fa fa-times"></i></span>
        </header>

        <section class="popupBody">
            <form id="topic-wizard" action="#" method="post">
                <!--TOPIC NAME-->
                <label class="topic-label" for="topic-name">Name:</label>
                <input type="text" id="topic-name" class="topic-input" name="topicName" placeholder="Topic name" required="required"/>
                <!--TOPIC CONTENT-->
                <label class="topic-label" for="topic-content">Your message...</label>
                <textarea name="topicContent" id="topic-content" cols="30" rows="10" placeholder="Type..." required="required"></textarea>
                <!--TOPIC CATEGORY-->
                <label class="topic-label" for="topic-category">Category</label>
                <select id="category-select" name="topicCategory" id="topic-category">
                    <option value="faq">FAQ</option>
                    <option value="events">Events</option>
                    <option value="general">General Discussion</option>
                    <option value="news">News</option>
                    <option value="feedback">Feedback</option>
                    <option value="spam">Spam</option>
                    <option value="trash">Trash</option>
                </select>
                <!--TOPIC TAG-->
                <label class="topic-label" for="topic-tag">Tag</label>
                <input type="text" id="topic-tag" class="topic-input" name="topicTag" placeholder="Tag..." required="required"/>
                <!--SUBMIT-->
                <input type="submit" id="create-topic-btn" name="status" class="modal_close topic-input" value="Create topic"/>
            </form>
        </section>
    </div>
</div>