<?php
require_once 'config.php';

$dbConn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

if (!$dbConn) {
    die('MySQL connect failed: ' . mysqli_connect_error());
}

function dbQuery($sql)
{
    global $dbConn;
    $result = mysqli_query($dbConn, $sql);
    if (!$result) {
        die('Query failed: ' . mysqli_error($dbConn));
    }
    return $result;
}

function dbFetchArray($result, $resultType = MYSQLI_NUM)
{
    return mysqli_fetch_array($result, $resultType);
}

function dbFetchAssoc($result)
{
    return mysqli_fetch_assoc($result);
}

function dbFetchRow($result)
{
    return mysqli_fetch_row($result);
}

function dbFreeResult($result)
{
    return mysqli_free_result($result);
}

function dbNumRows($result)
{
    return mysqli_num_rows($result);
}

function dbInsertId()
{
    global $dbConn;
    return mysqli_insert_id($dbConn);
}
?>
