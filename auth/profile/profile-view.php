<?php

require __DIR__.'/../../assets/layout/header.php';

use \Auth\Profile as Profile;
use \Auth\Auth as Auth;

if (isset($_GET['u']) && $_GET['u'])
    $profile = new Profile($_GET['u']);
else
    // get the authenticated user's profile
    $profile = new Profile(Auth::loggedIn());

if (empty($profile->name))
{ ?>
    <div class="textDialog">
        <p>No profile found for user "<?= $profile->username ?>". Try again!</p>
        <hr>

        <form action="" method="GET">
            <p>
                Search for profile: <input type="text" placeholder="Username" name="u">
                <button type="submit">Go</button>
            </p>
        </form>
    </div>
<?php }
else
{ ?>
    <div id="leftWrapper">
        <div class="imageContainer" id="profileImageContainer">
            <!--Javascript to set the image to what was saved-->
            <img src="../../assets/img/profile.png" alt="ProfilePic">
            <div class="editButton" id="profileImageContainerEdit">
                <img src="../../assets/img/edit-button-512.png" alt="Edit Image">
                <!--Javascript to Change the image-->
            </div>
        </div>

        <div class="textDiv" id="profileDescription">
                <?= $profile->bio ?>
            <div class="editButton" id="profileDescriptionEdit">
                <img src="../../assets/img/edit-button-512.png" alt="Edit Description">
                <!--Javascript to Edit the description-->
            </div>
        </div>
    </div>

    <div id="rightWrapper">
        <div class="textDiv" id="profileHeader">
            <?= $profile->username ?> | <?= $profile->name ?> | Total Kills: <?= $profile->getNumKills() ?>
            <!--Javascript here to fetch data-->
        </div>

        <?php if ($profile->kills)
        { ?>
            <div class="logContainer" id="profileLogContainer">
                <!--Insert Javascript to create .log classes for kills played from the user's data-->
                <?php foreach ($profile->kills as $kill) { ?>
                    <div class="log">
                        At: <?= $kill->getTime()->format('H:i d/m/Y') ?> |
                        Victim: <?= $kill->getVictim() ?> |
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
<?php }

require __DIR__.'/../../assets/layout/footer.php'; ?>
