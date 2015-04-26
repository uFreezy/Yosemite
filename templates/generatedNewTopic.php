<?php
$path = '../';
session_start();
$IsNotLogged = !isset($_SESSION['username']);
if (isset($_SESSION['username'])) {
    $welcomeMessage = "Welcome, " . $_SESSION['username'];
}
include 'header.php'
?>
<section id="main-section">
    <article class="generated-thread">
        <header class="generated-thread-heading">
            <h1>Topic name</h1>
        </header>
        <footer class="generated-thread-footer">
            <a class="user-img-link" href="#" title="user">
                <img class="user-img" src="../assets/UI/icons/default-user-profile.png" width="90" height="90" alt="profile-image"/>
            </a>
            <a href="#" title="posted by" class="topic-created-by">Pesho</a>
            <p class="topic-date">11/11/1111</p>
            <a href="#" title="tags" class="topic-tag">FAQ</a>
        </footer>
        <div class="topic-generated-content">
            <div class="topic-author-notes">
                <p>
                    Lorem ipsum dolor sit amet, duis voluptaria his at. Duo ut esse eligendi, et sea postea noluisse volutpat, simul mucius officiis ut eos. Illum aeque graeci quo no, ut homero debitis prodesset est. Ex ornatus dignissim eos, vix unum ferri eloquentiam ei, veri oratio inimicus est ei. Cu stet duis mea. Nam id alia ludus fuisset, ea mel ceteros perpetua.

                    Putent essent ius ut. Nam sonet utamur ea. Eu sed sanctus evertitur, nec eu zril utamur. Ea veri putent eirmod vel. Ei novum definitiones vituperatoribus sea, consul oportere sententiae est et, ea cum quando laoreet tractatos. In novum viris atomorum pri.

                    Detraxit pertinacia ius ea, an gloriatur disputando per. Te ubique malorum volumus ius. Et enim vituperatoribus usu. Qui id euismod denique recteque, ne est omnis evertitur reprimique, natum latine inimicus ea eos. Has sint alterum suavitate ad, pro alii inani mucius ei, per summo appellantur no.

                    Paulo oblique ut vis, te quo audire principes moderatius. Cu eum singulis splendide vituperata, vel corpora platonem splendide et. Doming alterum graecis est ex, ut sed facer nonumes albucius. Id odio aeque tincidunt qui. Ius oblique conclusionemque ex, eos ex convenire constituam repudiandae.

                    Eum cu tempor constituto, veri tibique eum ad. Ad enim vidit ius, dicit qualisque accommodare te usu. Vis eu habeo harum accusamus, te justo alienum recteque nam. Vel ei labores accusam.

                    Sea ne lorem platonem iracundia. His affert doctus referrentur te, ei his maiorum facilisi, nec eu quidam aliquando conclusionemque. Eam te legendos inimicus signiferumque. Pro et tota erat iisque, ei inani mentitum evertitur pro. Ea ullum primis pri.

                    Sed at clita eleifend efficiendi, vim et ipsum graeco deleniti. Illum oblique referrentur ne ius, vix te dicant aliquando adolescens. Partem facilisi liberavisse in mel. At vim corpora lobortis. Assum invenire definitiones at sea, sea eu pertinax vulputate. Ad eos postea virtute prodesset.

                    Usu mazim graece luptatum cu. Populo equidem omittam ne ius. Suas voluptatibus conclusionemque ad mea, ei sit argumentum scribentur. Appetere explicari quaerendum ad eum. Eam ut inani facete facilis, prima malis libris ad mel, melius admodum eleifend sit et. Ea nemore aliquam mei.

                    Ubique theophrastus vel et, vulputate disputando ius te, cu idque adipiscing quo.

                    Ut vim latine facilis voluptatum, nam dicit pertinax ei, his cu dicant tantas. Novum civibus adipisci id nec. Sea suscipiantur comprehensam ex, vim agam tollit doctus an, te inani mundi mei. Vide equidem cotidieque ius te, wisi volumus imperdiet eu sea. Ne dolor clita congue vel.

                    Ea vim utinam dignissim, latine facilisis ea cum.

                    Id pro exerci vidisse. Ea meis postea eos, meis appareat cu eos. Prima omnium sententiae no duo, no ponderum adolescens mei. His et adhuc saepe, in usu dolorem nominavi scribentur, alii minim civibus ea nam.

                    Et usu natum decore qualisque, ridens postulant interesset cu mel, sed cu epicurei accommodare delicatissimi. Duo at nibh consul, detracto quaestio mediocrem his ex. At mea veniam fastidii conceptam.
                </p>
                <div class="post-controllers">
                    <a href="#" title="response button">Response</a>
                    <a href="#" title="abuse button">Report abuse</a>
                </div>
            </div>
            <div class="topic-comments">
               <div>
                   <a href="#" title="user">
                       <img class="user-reply-image" src="../assets/UI/icons/default-user-profile.png" alt="profile-image" width="90" height="90"/>
                   </a>
               </div>
                <div class="reply-content">
                    <h3>
                        <a href="#" title="user">Pesho</a>
                    </h3>
                    <time datetime="11.11.1111" class="post-reply-date">11/11/1111</time>
                    <p>
                        Ea vim utinam dignissim, latine facilisis ea cum.
                        Id pro exerci vidisse. Ea meis postea eos, meis appareat cu eos.
                        Prima omnium sententiae no duo, no ponderum adolescens mei.
                    </p>
                </div>
            </div>
        </div>
    </article>
</section>
<?php
include 'footer.php';
?>
