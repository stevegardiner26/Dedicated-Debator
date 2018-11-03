<?php
/**
 * Created by PhpStorm.
 * User: steve
 * Date: 11/3/2018
 * Time: 4:32 PM
 */
?>

<?php include('html/nav.html')?>
<section class="debateFinder text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1>Start your Discussion! Change Minds!</h1>
                <form action="GET">
                    <div class="form-group">
                        <label for="alias">Alias:</label>
                        <input type="text" class="form-control" id="alias" placeholder="Master Debator 10000">
                        <small class="form-text text-muted">What shall we call you? The other user will see this as your name</small>
                    </div>
                    <div class="form-group">
                        <h6>Recent Issues or General Topics</h6>
                        <label class="switch">
                            <input type="checkbox" onchange="formSwitcher()">
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <div class="form-group" style="display: none;" id="recentGroup">
                        <label for="issue">Recent Issues:</label>
                        <select name="issue" id="issue" class="form-control">
                            <option value="default">Recent</option>
                            <option value="caravan">Migrant Caravan</option>
                            <option value="donaldTrump">Donald Trump</option>
                            <option value="kanye">Kanye West</option>
                            <option value="birthright">Birthright Citizenship for Illegals</option>
                            <option value="dueProcess">Innocent Until Proven Guilty</option>
                        </select>
                    </div>
                    <div class="form-group" id="mainGroup">
                        <label for="issue">Controversial Issues:</label>
                        <select name="issue" id="issue" class="form-control">
                            <option value="default">Controversy</option>
                            <option value="immigration">Illegal Immigration</option>
                            <option value="taxes">Taxes</option>
                            <option value="hateSpeech">Hate Speech</option>
                            <option value="gunRights">Gun Rights</option>
                        </select>
                    </div>
                    <div class="form-group" id="forAgainst">
                        <h5>Do you for this issue or are you against this?</h5>
                        <h6>For</h6>
                        <label class="switch">
                            <input type="checkbox" onchange="forOrAgainst()" checked>
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php include('html/footer.html')?>


<style>
    .debateFinder {
        height: 100vh;
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
        background-color: #2196F3;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
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
    var recentShown = false;
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