<?php
/**
 * Created by PhpStorm.
 * User: steve
 * Date: 11/3/2018
 * Time: 8:16 PM
 */

include 'html/nav.html';
?>
<section style="height: 100vh;">
    <div class="container text-center">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1 style="color: white;">Thank you For Debating! Did you learn something new?</h1>
                <button class="btn btn-outline btn-xl js-scroll-trigger">Debate Again</button>
            </div>
        </div>
    </div>
</section>
<?php
include 'html/footer.html';
?>

<style>
    section {
        background-image: url('img/city-3660779_1920.jpg');
        -webkit-background-size: 100%;
        background-size: 100%;
        background-repeat: no-repeat;
        background-position: center center;
        background-attachment: fixed;
        filter: blur(5px);
    }

    .col-md-8 {
        filter: blur(0px);
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translateY(-50%) translateX(-50%);
    }
</style>
