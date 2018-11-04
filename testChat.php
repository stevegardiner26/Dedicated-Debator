<?php
session_start();

function loginForm(){
    echo'
 <header class="masthead loginMast">
    <section class="debateFinder text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto loginform">
                <h1>Start your Discussion! Change Minds!</h1>
                <form action="testChat.php" method="post">
                    <div class="form-group">
                        <label for="name"><h5>Alias</h5></label>
                        <input name="name" type="text" class="form-control" id="name" placeholder="Master Debator 10000">
                        <small class="form-text text-muted" style="color: white !important;">What shall we call you? The other user will see this as your name</small>
                    </div>
                    <div class="form-group">
                        <h5>Recent Issues or General Topics</h5>
                        <label class="switch">
                            <input name="issueSelector" type="checkbox" onchange="formSwitcher()">
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <div class="form-group" id="recentGroup">
                        <label for="issue"><h6>Recent Issues:</h6></label>
                        <select name="issueRecent" id="issue" class="form-control">
                            <option value="Caravan">Migrant Caravan</option>
                            <option value="Donald Trump">Donald Trump</option>
                            <option value="Kanye">Kanye West</option>
                            <option value="Birthright">Birthright Citizenship for Illegals</option>
                            <option value="Due Process">Innocent Until Proven Guilty</option>
                        </select>
                    </div>
                    <div class="form-group" id="mainGroup" style="display: none;">
                        <label for="issue"><h6>General Controversial Issues:</h6></label>
                        <select name="issueMain" id="issue" class="form-control">
                            <option value="Immigration">Illegal Immigration</option>
                            <option value="Taxes">Taxes</option>
                            <option value="Hate Speech">Hate Speech</option>
                            <option value="Gun Rights">Gun Rights</option>
                        </select>
                    </div>
                    <div class="form-group" id="forAgainst">
                        <h5>Are you <strong>FOR</strong> this or are you <strong>AGAINST</strong> this?</h5>
                        <h6>For</h6>
                        <label class="switch">
                            <input name="side" type="checkbox" onchange="forOrAgainst()" checked>
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <div class="form-group">
                        <input style="margin: 30px 0px; background: #fdcc52;" class="btn" type="submit" name="enter" id="enter" value="Enter">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
</header>
    ';
}

/*$GLOBALS['logger'] = '';*/

if(isset($_POST['enter'])){
    if($_POST['name'] != ""){
        $_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
        $_SESSION["issueMain"] = stripslashes(htmlspecialchars($_POST['issueMain']));
        $_SESSION["issueRecent"] = stripslashes(htmlspecialchars($_POST['issueRecent']));
        if(isset($_POST['issueSelector'])) {
            $_SESSION["issueSelector"] = stripslashes(htmlspecialchars($_POST['issueSelector']));
        }
        $_SESSION["side"] = stripslashes(htmlspecialchars($_POST['side']));

        if($_SESSION["issueSelector"] === "on"){
            $_SESSION['logger'] = $_SESSION["issueMain"];
        } else {
            $_SESSION['logger'] = $_SESSION["issueRecent"];
        }


        $fp = fopen("log" . $_SESSION['logger'] . ".html", 'a');
        fwrite($fp, "<div class='msgln'><i>User " . $_SESSION['name'] . " has joined the chat session.</i><br></div>");
        fclose($fp);
    }
    else{
        echo '<span class="error">Please type in a name</span>';
    }
}
$checker = true;
if(isset($_GET['logout'])) {

    //Simple exit message
    $fp2 = fopen("log" . $_SESSION['logger'] . ".html", 'a');
    fwrite($fp2, "<div class='msgln'><i>User " . $_SESSION['name'] . " has left the chat session You will be disconnected shortly.</i><br></div>");
    fclose($fp2);

    $handle = fopen("test" . $_SESSION['logger'] . ".html", "w");
    fwrite($handle, 'User Left');
    fclose($handle);

    header("Location: thanks.php"); //Redirect the user
    sleep(5);
    session_destroy();
    $handle = fopen("log" . $_SESSION['logger'] . ".html", "r+");
    ftruncate($handle, 0);
    fclose($handle);
    $checker = false;
}

if(isset($_GET['logging'])) {
    if ((filesize("test" . $_SESSION['logger'] . ".html") > 0) && ($checker === true)) {
        header("Location: thanks.php");
        session_destroy();
        $handle = fopen("test" . $_SESSION['logger'] . ".html", "r+");
        ftruncate($handle, 0);
        fclose($handle);
    }
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
    <title>Dedicated Debator</title>
</head>
<body>
<?php include('html/nav.html')?>
<?php
if(!isset($_SESSION['name'])){
    loginForm();
}
else{
    ?>
<header class="masthead chatMast">
    <div class="debateFinder">
        <div class="row no-gutters">
            <div class="col-md">
                <h2 style="margin: 30px;"><?php if($_SESSION["issueSelector"] === "on"){echo "Controversial Issues";} else {echo "Recent Issues";} ?></h2><br>
            </div>
        </div>
        <div id="wrapper">
            <div id="menu">
                <p class="welcome">Welcome, <b><?php echo $_SESSION['name']; ?> you are debating <?php if($_SESSION["side"] === "on"){echo "for";} else {echo "against";} ?> <?php if($_SESSION["issueSelector"] === "on"){echo $_SESSION["issueMain"];} else {echo $_SESSION["issueRecent"];} ?></b></p>
                <p class="logout"><a id="exit" href="#">Leave Chat</a></p>
                <div style="clear:both"></div>
            </div>
            <div id="chatbox">
                <?php
                    if(file_exists("log" . $_SESSION['logger'] . ".html") && filesize("log" . $_SESSION['logger'] . ".html") > 0){
                        $handle = fopen("log" . $_SESSION['logger'] . ".html", "r");
                        $contents = fread($handle, filesize("log" . $_SESSION['logger'] . ".html"));
                        fclose($handle);
                        echo $contents;
                    }
                ?>
            </div>
            <form name="message" action="">
                <input name="usermsg" type="text" id="usermsg" size="63" />
                <input style="background: #fdcc52;" name="submitmsg" class="btn btn-sm" type="submit"  id="submitmsg" value="Send" />
            </form>
        </div>
    </div>
</header>
    !-- Bootstrap core JavaScript -->
    <script src="./v/jquery/jquery.min.js"></script>
    <script src="./v/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="./v/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="./js/new-age.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
    <script type="text/javascript">
        // jQuery Document
        $(document).ready(function(){
            //If user wants to end session
            $("#exit").click(function(){
                var exit = confirm("Are you sure you want to end the session?");
                if(exit==true){window.location = 'testChat.php?logout=true';}
            });

            //If user submits the form
            $("#submitmsg").click(function(){
                var clientmsg = $("#usermsg").val();
                $.post("post.php", {text: clientmsg});
                $("#usermsg")[0].value = '';
                return false;
            });

            //Load the file containing the chat log
            function loadLog(){
                var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height before the request
                $.ajax({
                    url: "<?php echo ("log" . $_SESSION['logger'] . ".html") ?>",
                    cache: false,
                    success: function(html){
                        $("#chatbox").html(html); //Insert chat log into the #chatbox div
                        console.log(html)
                        if(html === ''){
                            window.location = 'testChat.php?logging=true';
                        }

                        //Auto-scroll
                        var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height after the request
                        if(newscrollHeight > oldscrollHeight){
                            $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
                        }
                    },
                });
            }

            setInterval (loadLog, 2500);	//Reload file every 2500 ms or x ms if you wish to change the second parameter
        });
    </script>
    <?php
}
?>
</body>
</html>
<style>
    ::-webkit-scrollbar {
        border-radius: 5px;
    }

    ::-webkit-scrollbar-button {
        display:  none;
    }
    
    ::-webkit-scrollbar-thumb {
        background: darkgray;
        width: 4px;
        border-radius: 10px;
    }
    ::-webkit-scrollbar-track {
        background: white;
    }

    ::-webkit-scrollbar-track-piece {
        background: white;
    }

    header {
        position: absolute !important;
        left: 0;
        top: 0;
    }

    @media only screen and (max-width: 991px) {
        .loginMast {
            padding-top: 0 !important;
            width: 100vw !important;
            height: 150vh !important;
        }

        .chatMast {
            padding-top: 50px !important;
            width: 100vw !important;
            height: 1000px !important;
        }

        #wrapper {
            width: 95vw !important;
            height: 100% !important;
        }

        #chatbox {
            width: 90% !important;
            height: 65% !important;
        }

        #usermsg {
            width: 90% !important;
        }

        #submitmsg {
            margin: 10px auto !important;
        }

        body {
            overflow-y: scroll !important;
        }
    }

    body {
        font:12px arial;
        color: #222;
        text-align:center;
        padding:35px;
        overflow: hidden;
    }

    form, p, span {
        margin:0;
        padding:0; }

    input { font:12px arial; }

    a {
        color:#cd2122;
        text-decoration:none; }

    a:hover { text-decoration:underline; }

    #wrapper, #loginform {
        border-radius: 5px;
        box-shadow: 0px 5px 15px rgba(0,0,0,.1);
        margin:0 auto;
        padding-bottom:25px;
        background:#EBF4FB;
        width:1004px;
        height: 500px;
    }

    #loginform { padding-top:18px; }

    #loginform p { margin: 5px; }

    #chatbox {
        text-align:left;
        margin:0 auto;
        margin-bottom:25px;
        padding:10px;
        font-size: 15px;
        background:#fff;
        height:370px;
        width:830px;
        color: black;
        border:1px solid lightgray;
        overflow:auto; }

    #usermsg {
        font-size: 20px;
        width:730px;
        height: 28px;
        color: black;
        border:1px solid lightgray; }

    #submit { width: 60px;}

    #submitmsg {
        margin: -10px 20px 0px 20px;
    }

    .error { color: #ff0000; }

    #menu { padding:12.5px 25px 12.5px 25px; }

    .welcome { float:left;
        color: black; }

    .logout { float:right; }

    .msgln { margin:0 0 2px 0; }

    .debateFinder {
        height: 100vh;
    }

    body {
        background-image: linear-gradient(to bottom, rgba(0,0,0,.5), white);
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #fdcc52;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #fdcc52;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>

<script>
    var recentShown = true;
    function formSwitcher() {
        if (recentShown === false) {
            document.getElementById('recentGroup').style.display = 'block';
            document.getElementById('mainGroup').style.display = 'none';
            recentShown = true;
        } else {
            document.getElementById('recentGroup').style.display = 'none';
            document.getElementById('mainGroup').style.display = 'block';
            recentShown = false;
        }
    }

    var against = false;
    function forOrAgainst() {
        if (against === false) {
            document.getElementById('forAgainst').getElementsByTagName('h6')[0].innerHTML = 'Against';
            against = true;
        } else {
            document.getElementById('forAgainst').getElementsByTagName('h6')[0].innerHTML = 'For';
            against = false;
        }
    }

    /*window.onbeforeunload = function() {
        if(confirm("Are you sure you want to end the session?")){
            return true;
        }
        else return false;
    }*/
</script>

