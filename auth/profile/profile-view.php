<?php

require __DIR__.'/../../assets/layout/header.php';

use \Auth\Profile as Profile;
use \Auth\Auth as Auth;
use \App\SQLiteConnection as SQLiteConnection;

$db = new SQLiteConnection();
$pdo = $db->connect();

// deal with form data if sent
if (isset($_POST['bio']))
{
    $stmt = $pdo->prepare('UPDATE "users" SET bio=:bio WHERE username=:username');
    $stmt->bindValue([
        ':bio' => $_POST['bio'],
        ':username' => Auth::loggedIn()
    ]);
    if ($stmt->exec())
        $edited = true;
}

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
                <!-- TEMP REMOVAL. PROFILE PICTURES STRETCH GOAL TO IMPLEMENT. ADD ICON HERE.
                <!--Javascript to Change the image-->
            </div>
        </div>

        <div class="textDiv" id="profileDescription">
            <h3><i>About me</i></h3>

            <?php if (isset($edited) && $edited === true) { ?>
                <p>Profile edited!</p>
            <?php } ?>
            <p id="bio"><?= $profile->bio ?></p>

            <?php if(Auth::loggedIn() == $profile->username)
            { ?>
            <div class="editButton" id="profileDescriptionEdit">
                <i class="fas fa-fw fa-edit" onclick="totextarea()"></i>
            </div>

            <form action="" method="POST" style="padding-bottom:20px; text-align:center;" id="bioform">
                <button id="biobutton" type="submit" style="display:none; text-align:center;">Done &raquo;</button>
            </form>
            <?php } ?>
        </div>
    </div>

    <div id="rightWrapper">
        <div class="textDiv" >
            <?= $profile->username ?> | <?= $profile->name ?> | Total Kills: <?= $profile->getNumKills() ?>
            <!--Javascript here to fetch data-->
        </div>

        <div class="textDiv" >
            Kill Feed
            <?php if ($profile->kills) { ?><!--Insert Javascript to create .log classes for kills played from the user's data-->
                <?php foreach ($profile->kills as $kill) { ?>
                    <div class="log">
                        At: <?= $kill->getTime()->format('H:i d/m/Y') ?> |
                        Victim: <?= $kill->getVictim() ?>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>

        <div class="textDiv" >
            Death Feed
            <?php if ($profile->deaths) { ?><!--Insert Javascript to create .log classes for deaths played from the user's data-->
                <?php foreach ($profile->deaths as $death) { ?>
                    <div class="log">
                        At: <?= $death->getTime()->format('H:i d/m/Y') ?> |
                        Killer: <?= $death->getKiller() ?>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>

    </div>
<?php }

require __DIR__.'/../../assets/layout/footer.php'; ?>
