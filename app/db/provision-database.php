<?php

namespace App;

require __DIR__.'/../../vendor/autoload.php';

use App\SQLiteProvision as SQLiteProvision;

/**
 * Database provisioning script
 * @author Calum Shepherd
 *
 * GET request this page as follows to run the script:
 *      .../provision-database.php?type=
 *          up      to create tables
 *          down    to delete tables
 */

if (isset($_GET['type']))
{
    $db = new SQLiteProvision();

    switch ($_GET['type'])
    {
        case "up":
            try {
                $db->up();
            }
            catch (Exception $e)
            {
                echo $e->getMessage();
            }
            break;

        case "down":
            $db->down();
            break;

        default:
            echo 'That is not a valid provision type. Try "up" or "down".';
    }
}
else echo 'No provision type set. Append "?type=" and then either "up" or "down" to the page URL';
