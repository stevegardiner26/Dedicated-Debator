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
                <p>Welcome <?php echo $_POST["alias"]; ?></p><br>
                <p>You wanted to discuss: <?php if($_POST["issueSelector"] === "on"){echo "Controversial Issues";} else {echo "Recent Issues";} ?></p><br>
                <p>Your Issue is <?php if($_POST["issueSelector"] === "on"){echo $_POST["issueMain"];} else {echo $_POST["issueRecent"];} ?></p><br>
                <p>Your Position is <?php echo $_POST["side"]; ?></p><br>
            </div>
        </div>
    </div>
</section>
