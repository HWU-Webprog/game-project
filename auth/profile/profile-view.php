<?php

require __DIR__.'/../../assets/layout/header.php';

use \Auth\Profile as Profile;

if (isset($_GET['u']) && $_GET['u'])
    $profile = new Profile($_GET['u']);
else
    $profile = new Profile($_GET['u']);

?>
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
            <div class="log">
                Position: #34 | Kills: 12 | Killed By: Smart Cookie
            </div>
            <div class="log">
                    Position: #64 | Kills: 1 | Killed By: Smart Cookie
            </div>
            <div class="log">
                    Position: #2 | Kills: 7 | Killed By: Smart Cookie
            </div>
            <div class="log">
                Position: #1 | Kills: 43 | VICTORY
            </div>
        </div>
    </div>

<?php require __DIR__.'/../../assets/layout/footer.php'; ?>
