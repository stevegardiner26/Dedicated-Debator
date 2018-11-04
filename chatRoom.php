<?php
/**
 * Created by PhpStorm.
 * User: steve
 * Date: 11/3/2018
 * Time: 6:02 PM
 */
?>

<?php include 'html/nav.html' ?>
<section class="debateFinder text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <p>Welcome <?php echo $_POST["alias"]; ?></p><br>
                <p>You wanted to discuss: <?php if($_POST["issueSelector"] === "on"){echo "Controversial Issues";} else {echo "Recent Issues";} ?></p><br>
                <p>Your Issue is <?php if($_POST["issueSelector"] === "on"){echo $_POST["issueMain"];} else {echo $_POST["issueRecent"];} ?></p><br>
                <p>Your Position is <?php if($_POST["side"] === "on"){echo "For";} else {echo "Against";} ?></p><br>
            </div>
        </div>
    </div>
</section>
<section class="chatWindow text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div id="wrapper">
                    <div id="menu">
                        <p class="welcome">Welcome, <b></b></p>
                        <p class="logout"><a id="exit" href="#">Exit Chat</a></p>
                        <div style="clear:both"></div>
                    </div>

                    <div id="chatbox"></div>

                    <form name="message" action="">
                        <input name="usermsg" type="text" id="usermsg" size="63" />
                        <input name="submitmsg" type="submit"  id="submitmsg" value="Send" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'html/footer.html' ?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript">
    // jQuery Document
    $(document).ready(function(){

    });
</script>

<style>
    body {
        background: lightgray;
    }

    form, p, span {
        margin:0;
        padding:0; }

    input { font:12px arial; }

    a {
        color:#0000FF;
        text-decoration:none; }

    a:hover { text-decoration:underline; }

    #wrapper, #loginform {
        margin:0 auto;
        padding-bottom:25px;
        background:#EBF4FB;
        width:504px;
        border:1px solid #ACD8F0; }

    #loginform { padding-top:18px; }

    #loginform p { margin: 5px; }

    #chatbox {
        text-align:left;
        margin:0 auto;
        margin-bottom:25px;
        padding:10px;
        background:#fff;
        height:270px;
        width:430px;
        border:1px solid #ACD8F0;
        overflow:auto; }

    #usermsg {
        width:395px;
        border:1px solid #ACD8F0; }

    #submit { width: 60px; }

    .error { color: #ff0000; }

    #menu { padding:12.5px 25px 12.5px 25px; }

    .welcome { float:left; }

    .logout { float:right; }

    .msgln { margin:0 0 2px 0; }
</style>
<!-- HAVE A QUQUE ANIMATION -->