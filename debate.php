<?php
/**
 * Created by PhpStorm.
 * User: steve
 * Date: 11/3/2018
 * Time: 4:32 PM
 */
?>

<section class="debateFinder text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto loginform">
                <h1>Start your Discussion! Change Minds!</h1>
                <form action="testChat.php" method="post">
                    <div class="form-group">
                        <label for="alias">Alias:</label>
                        <input name="alias" type="text" class="form-control" id="alias" placeholder="Master Debator 10000">
                        <small class="form-text text-muted">What shall we call you? The other user will see this as your name</small>
                    </div>
                    <div class="form-group">
                        <h6>Recent Issues or General Topics</h6>
                        <label class="switch">
                            <input name="issueSelector" type="checkbox" onchange="formSwitcher()">
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <div class="form-group" id="recentGroup">
                        <label for="issue">Recent Issues:</label>
                        <select name="issueRecent" id="issue" class="form-control">
                            <option value="default">Recent</option>
                            <option value="Caravan">Migrant Caravan</option>
                            <option value="Donald Trump">Donald Trump</option>
                            <option value="Kanye">Kanye West</option>
                            <option value="Birthright">Birthright Citizenship for Illegals</option>
                            <option value="Due Process">Innocent Until Proven Guilty</option>
                        </select>
                    </div>
                    <div class="form-group" id="mainGroup" style="display: none;">
                        <label for="issue">Controversial Issues:</label>
                        <select name="issueMain" id="issue" class="form-control">
                            <option value="default">Controversy</option>
                            <option value="Immigration">Illegal Immigration</option>
                            <option value="Taxes">Taxes</option>
                            <option value="Hate Speech">Hate Speech</option>
                            <option value="Gun Rights">Gun Rights</option>
                        </select>
                    </div>
                    <div class="form-group" id="forAgainst">
                        <h5>Do you for this issue or are you against this?</h5>
                        <h6>For</h6>
                        <label class="switch">
                            <input name="side" type="checkbox" onchange="forOrAgainst()" checked>
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="enter" id="enter" value="Enter">Submit</input>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php include('html/footer.html')?>


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
</script>