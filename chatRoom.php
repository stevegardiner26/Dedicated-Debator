<?php
/**
 * Created by PhpStorm.
 * User: steve
 * Date: 11/3/2018
 * Time: 6:02 PM
 */
?>

<section class="debateFinder text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                Welcome <?php echo $_POST["alias"]; ?><br>
                You wanted to discuss: <?php echo $_POST["issueSelector"]; ?><br>
                Your Issue is <?php echo $_POST["issueRecent"]; ?><br>
                Your Issue is <?php if($_POST["issueSelector"] === checked){echo $_POST["issueMain"];} ?><br>
                Your Position is <?php echo $_POST["side"]; ?><br>
            </div>
        </div>
    </div>
</section>
