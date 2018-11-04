<?php
/**
 * Created by PhpStorm.
 * User: steve
 * Date: 11/3/2018
 * Time: 8:07 PM
 */

session_start();
if(isset($_SESSION['name'])){
    $text = $_POST['text'];

    $fp = fopen("log.html", 'a');
    fwrite($fp, "<div class='msgln'>(".date("g:i A").") <b>".$_SESSION['name']."</b>: ".stripslashes(htmlspecialchars($text))."<br></div>");
    fclose($fp);
}
?>