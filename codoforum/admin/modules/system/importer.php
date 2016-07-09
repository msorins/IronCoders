<?php

/*
 * @CODOLICENSE
 */

$smarty = \CODOF\Smarty\Single::get_instance();

$db = \DB::getPDO();

if (isset($_GET['import']) && CODOF\Access\CSRF::valid($_GET['CSRF_token'])) {

    $_DB = array(
        'driver' => 'mysql',
        'host' => $_GET['db_host'],
        'database' => $_GET['db_name'],
        'username' => $_GET['db_user'],
        'password' => $_GET['db_pass'],
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => $_GET['tbl_prefix'],
    );


    $work = new \CODOF\Importer\ImportWorker($_DB, $_GET['import_from']);

    $work->max_rows = (int) $_GET['max_rows'];
    $work->import_admin_mail = $_GET['admin_mail'];
    $work->connect_db();

    $is_admin = $work->isset_admin_account();

    if ($work->connected && $is_admin) {

        $total = 0;
        
        $time = microtime(true);
        $work->empty_tables('categories');
        $work->import_cats();
        echo "Categories imported in : ";
        $diff = microtime(true) - $time;
        echo $diff;
        $total += $diff;

        $time = microtime(true);
        $work->empty_tables('users');        
        $work->import_users();
        echo "<br/>users imported in : ";
        $diff = microtime(true) - $time;
        echo $diff;
        $total += $diff;

        $time = microtime(true);
        $work->empty_tables('topics');        
        $work->import_topics();
        echo "<br/>topics imported in : ";
        $diff = microtime(true) - $time;
        echo $diff;
        $total += $diff;

        $time = microtime(true);
        $work->empty_tables('posts');        
        $work->import_posts();
        echo "<br/>posts imported in : ";
        $diff = microtime(true) - $time;
        echo $diff;
        $total += $diff;

        $time = microtime(true);
        new CODOF\Importer\Concise($db);
        echo "<br/>category, topic & user post counts updated in : ";
        $diff = microtime(true) - $time;
        echo $diff . " s";
        $total += $diff;

        echo "<br/>import successfull in total time " . $total . " s";
                
    } else if (!$is_admin) {

        echo "admin e-mail address given does not exists!";
    } else {

        echo "Unable to connect to database";
    }

    exit;
}

$files = array();
if ($handle = opendir(ABSPATH . 'sys/CODOF/Importer/Drivers/')) {

    $invalid_entries = array(".", "..", "index.html", "Driver.php", "IDriver.php");
    
    while (false !== ($entry = readdir($handle))) {

        if (!in_array($entry, $invalid_entries)) {

            $entry = str_replace(".php", "", $entry);
            $files[] = $entry;
        }
    }

    closedir($handle);
}


CODOF\Util::get_config($db);

$smarty->assign('files', $files);
$content = $smarty->fetch('system/importer.tpl');
