<?php
$path = '../';
$IsNotLogged = !isset($_SESSION['username']);
if (isset($_SESSION['username'])) {
    $welcomeMessage = "Welcome, " . $_SESSION['username'];
}
include 'header.php'
?>
<article class="important-category category sticky" style="padding: 20px;background-color: #BBB; border-bottom: dotted 5px #333">
    <header>
        <h1 style="font-size: 22px; text-align: center; background-color: #FFF">Topic name</h1>
    </header>
    <div id="topic-generated-content" style="">
       <div id="topic-author-notes">
           <p style="color: #FFF; line-height: 20px; font-size: 16px">
               <br>
               //GENERATED FROM SERVER/SQL
               <br><br><br>
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
               <br><br><br>
           </p>
           <div id="post-controllers">
               <a style="color: #FFF" href="#" title="response button">Response</a>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               <a style="color: #FFF" href="#" title="abuse button">Report abuse</a>
           </div>
       </div>
        <div id="topic-comments">
            <br>
            <p>asdasd</p>
            <br>
        </div>
    </div>
    <footer>
        <h1>Meta info</h1>
        <p>Posted by: Pesho Time: 11/11/11 Tag: X</p>
    </footer>
</article>
<?php
include 'footer.php';
?>
