<?php
/**
 * Created by PhpStorm.
 * User: steve
 * Date: 11/3/2018
 * Time: 8:16 PM
 */

include 'html/nav.html';
?>
<section style="height: 100vh; padding: 0;">
    <div class="background"></div>
    <div class="container text-center">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1 style="color: white;">Thank you For Debating! Did you learn something new?</h1>
                <button onclick="location.href='testChat.php'" class="btn btn-outline btn-xl" style="color: black;">Debate Again</button>
            </div>
        </div>
    </div>
</section>
<?php
include 'html/footer.html';
?>

<style>
    .background {
        position: absolute;
        background-image: url('img/city-3660779_1920.jpg');
        -webkit-background-size: 100%;
        background-size: 120%;
        background-repeat: no-repeat;
        background-position: center center;
        background-attachment: fixed;
        filter: blur(5px);
        z-index: -1;
        height: 100vh;
        width: 100vw;
    }

    .col-md-8 {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translateY(-50%) translateX(-50%);
    }

    h1 {
        z-index: 1000;
        filter: blur(0px);
    }
</style>
