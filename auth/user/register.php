<?php

error_reporting(E_ALL);

require __DIR__.'/../../assets/layout/header.php';

use \Auth\User as User;
use \Auth\Auth as Auth;
use \Auth\NewUserStatus as Status;

// deal with form data if submitted
if (isset($_POST['u']))
{
    // check if user exists
    try
    {
        $user = new User(Status::FETCH, $_POST['u']);
        // user exists
        $error = 'username_taken';
    }
    catch (Exception $e)
    {
        // user does not exist: check form data
        if ($_POST['p'] === $_POST['p_conf'])
        {
            // passwords match, continue
            $user = new User(Status::CREATE, $_POST['u'], $_POST['n'], $_POST['p']);
            if (Auth::logIn($_POST['u'], $_POST['p']))
            {   // user can be logged in: registration successful - redirect
                redirect('/auth/profile/profile-view.php');
            }
            else
            {
                $error = 'other';
            }
        }
        else
        {
            // passwords do not match
            $error = 'password_mismatch';
        }
    }
}

?>

    <div class="textDialog">
        <h1>Register</h1>
        <div style="margin-left: auto; margin-right: auto;">
            <?php if (isset($error))
            {
                if ($error === 'password_mismatch')
                { ?>
                    <p>Passwords did not match!</p>
                <?php }
                else if ($error === 'username_taken')
                { ?>
                    <p>A user already exsist with that username!</p>
                <?php }
                else if ($error === 'other')
                { ?>
                    <p>An error occured. Please try again.</p>
                <?php }
            } ?>

            <form action="" method="POST" style="text-align: centre;">
                <div class="formWrapper">
                    <div class="formWrapperLeft">
                        <p>Username: </p>
                        <p>Name: </p>
                        <p>Password: </p>
                        <p>Confirm Password: </p>
                    </div>
                    <div class="formWrapperRight">
                        <p><input type="text" name="u" required></p>
                        <p><input type="text" name="n" required></p>
                        <p><input type="password" name="p" required></p>
                        <p><input type="password" name="p_conf" required></p>
                    </div>
                </div>
                <button type="submit" name="submit">Register &raquo;</button>
            </form>
        </div>
    </div>

<?php require __DIR__.'/../../assets/layout/footer.php'; ?>
