<?php

require __DIR__.'/../../assets/layout/header.php';

use \Auth\User as User;
use \Auth\Auth as Auth;
use \Auth\NewUserStatus as Status;

if (Auth::loggedIn())
    redirect('/auth/profile/profile-view.php');

// deal with form data if sent
if (isset($_POST['u']))
{
    // check that both fields filled out
    if (empty($_POST['u']))
        $error = 'no_username';
    else if (empty($_POST['p']))
        $error = 'no_password';

    // try to create (fetch) the user and then log in
    try
    {
        if (Auth::logIn($_POST['u'], $_POST['p']))
            // if logged in, redirect to profile
            redirect('/auth/profile/profile-view.php');
        else
            $error = 'login_failed';
    }
    catch (Exception $e)
    {   // user does not exist in database
        $error = 'no_user';
    }
}

?>

    <div class="textDialog">
        <h1>Log In</h1>
        <div>
            <?php if (isset($error))
            {
                if ($error === 'no_user' || $error === 'login_failed')
                { ?>
                    <p>Username or password incorrect!</p>
                <?php }
                else if ($error === 'no_username')
                { ?>
                    <p>Please enter a username!</p>
                <?php }
                else if ($error === 'no_password')
                { ?>
                    <p>Please enter a password!</p>
                <?php }
            } ?>
            <form action="" method="POST" style="text-align: centre;">
                <div class="formWrapper">
                    <div class="formWrapperLeft">
                        <p>Username: </p>
                        <p>Password: </p>
                    </div>
                    <div class="formWrapperRight">
                        <p><input class="formField" type="text" name="u" value="<?php if (isset($_POST['u'])) echo $_POST['u']; ?>" required></p>
                        <p><input class="formField" type="password" name="p" required></p>
                    </div>
                </div>

                <button type="submit" name="submit">Log In &raquo;</button>
            </form>
        </div>
    </div>

<?php require __DIR__.'/../../assets/layout/footer.php'; ?>
