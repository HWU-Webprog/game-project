<?php

require __DIR__.'/../../assets/layout/header.php';

use \Auth\Profile as Profile;

if (isset($_GET['u']) && $_GET['u'])
    $profile = new Profile($_GET['u']);
else
    $profile = new Profile($_GET['u']);

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
            <img src="../../assets/img/Woolooloo.jpg" alt="ProfilePic">
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
            <?= $profile->username ?> | Wins: <?= $profile->wins ?> | Average Position: <?= $profile->average_pos ?>
            <!--Javascript here to fetch data-->
        </div>

        <div class="logContainer" id="profileLogContainer">
            <!--Insert Javascript to create .log classes for games played from the user's data-->
            <?php foreach ($profile->games as $game) { ?>
                <div class="log">
                    Position: <?= $game->getFinishPos() ?> |
                    Kills: <?= $game->getKills() ?> |
                    Killed By: <?= $game->getKilledBy() ?>
                </div>
            <?php } ?>
        </div>
    </div>
<?php }

require __DIR__.'/../../assets/layout/footer.php'; ?>
