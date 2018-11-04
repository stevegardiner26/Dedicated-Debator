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
                <h1>Thank you For Debating! Did you learn something new?</h1>
                <button class="btn btn-outline btn-xl js-scroll-trigger">Debate Again</button>
            </div>
        </div>
    </div>
</section>
<?php
include 'html/footer.html';
?>

<style>
    .col-md-8 {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translateY(-50%) translateX(-50%);
    }
</style>
