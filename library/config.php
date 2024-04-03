
<?php
ini_set('display_errors', 'on');

session_start();

// Database connection config
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'db_event_management';



// Database connection
$dbConn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
// Project data
$site_title = ' www.swiftpaddle.org';
$email_id = 'ihebhassine7997@gmail.com';

$thisFile = str_replace('\\', '/', __FILE__);
$docRoot = $_SERVER['DOCUMENT_ROOT'];

$webRoot = str_replace(array($docRoot, 'library/config.php'), '', $thisFile);
$srvRoot = str_replace('library/config.php', '', $thisFile);

define('WEB_ROOT', $webRoot);
define('SRV_ROOT', $srvRoot);

/* Sanitize input data if magic quotes are not enabled
if (!function_exists('get_magic_quotes_gpc') || !get_magic_quotes_gpc()) {
    if (isset($_POST)) {
        foreach ($_POST as $key => $value) {
            $_POST[$key] =  trim(addslashes($value));
        }
    }
    
    if (isset($_GET)) {
        foreach ($_GET as $key => $value) {
            $_GET[$key] = trim(addslashes($value));
        }
    }
}


if ($dbConn->connect_error) {
    die('Connection failed: ' . $dbConn->connect_error);
}
*/
require_once 'database.php';
require_once 'common.php';
?>

