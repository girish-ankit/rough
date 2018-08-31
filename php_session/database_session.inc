<?php

define('MEMCACHED_HOST', '127.0.0.1');
define('MEMCACHED_PORT', '11211');

$memcache = new Memcache;
$cacheAvailable = @$memcache->connect(MEMCACHED_HOST, MEMCACHED_PORT);

/**
 * 
 */
class customMemcache {

    function custom_mem($key, $op, $value = NULL) {

        global $memcache, $cacheAvailable;

        if ($op == 'set') {

            $memcache->set($key, $value);
        }
        if ($op == 'delete') {

            $memcache->delete($key);
        }

        if ($op == 'update') {

            $memcache->replace($key, $value);
        }



        if ($op == 'get') {

            if ($cacheAvailable == true) {
                $data = $memcache->get($key);
                return $data;
            } else {
                return FALSE;
            }
        }
    }

}

$cutommem = new customMemcache();

function open($path, $name) {

    shell_exec('echo open >> logs.txt');

    return true;
}

function read($sess_id) {
    shell_exec('echo read >> logs.txt');
    GLOBAL $db, $cutommem, $cacheAvailable;

    // $db = mysqli_connect("localhost", "root", "htp@123", "test_session");
    // memcache work
    if ($cacheAvailable) {
        $mem_result = $cutommem->custom_mem($sess_id, 'get');

        if (!$mem_result) {
            // memcache update
            $cutommem->custom_mem($sess_id, 'set', '');
            $CurrentTime = time();
            $result = mysqli_query($db, "SELECT Data FROM sessions WHERE SessionID = '$sess_id';");
            if (!mysqli_num_rows($result)) {

                mysqli_query($db, "INSERT INTO sessions (SessionID, DateTouched) VALUES ('$sess_id', $CurrentTime);");
                return '';
            } else {
                extract(mysqli_fetch_array($result), EXTR_PREFIX_ALL, 'sess');
                mysqli_query($db, "UPDATE sessions SET DateTouched = $CurrentTime WHERE SessionID = '$sess_id';");
                shell_exec('echo database >> logs.txt');
                return $sess_Data;
            }
        } else {
            shell_exec('echo memcache >> logs.txt');
            return $mem_result;
        }
    } else {
        $CurrentTime = time();
        $result = mysqli_query($db, "SELECT Data FROM sessions WHERE SessionID = '$sess_id';");
        if (!mysqli_num_rows($result)) {

            mysqli_query($db, "INSERT INTO sessions (SessionID, DateTouched) VALUES ('$sess_id', $CurrentTime);");
            return '';
        } else {
            extract(mysqli_fetch_array($result), EXTR_PREFIX_ALL, 'sess');
            mysqli_query($db, "UPDATE sessions SET DateTouched = $CurrentTime WHERE SessionID = '$sess_id';");
            shell_exec('echo database >> logs.txt');
            return $sess_Data;
        }
    }

    //
}

//echo $_SESSION['data'] ;
function write($sess_id, $data) {
    global $cutommem;
    $memcache = new Memcache;
    shell_exec('echo write >> logs.txt');

    // memcache update
    $newvalue = $data;
    $memcache = new Memcache;
    $cacheAvailable = @$memcache->connect(MEMCACHED_HOST, MEMCACHED_PORT);
    if ($cacheAvailable) {
        $memcache->replace($sess_id, $newvalue);
    }
    // $cutommem->custom_mem($sess_id, 'set', $newvalue);
    //GLOBAL $db;
    $db = mysqli_connect("localhost", "root", "htp@123", "test_session");

    $CurrentTime = time();


    mysqli_query($db, "UPDATE sessions SET Data = '$data', DateTouched = $CurrentTime WHERE SessionID = '$sess_id';");



    return true;
}

function close() {
    shell_exec('echo close >> logs.txt');
    return true;
}

function destroy($sess_id) {
    global $cutommem, $cacheAvailable;
    shell_exec('echo destroy >> logs.txt');
    // GLOBAL $db;
    $db = mysqli_connect("localhost", "root", "htp@123", "test_session");
    //print $sess_id; die();
    mysqli_query($db, "DELETE FROM sessions WHERE SessionID = '$sess_id';");

    // memcache delete
    if ($cacheAvailable) {
        $cutommem->custom_mem($sess_id, 'delete');
    }
    return true;

    // setcookie(session_name(), "", time() - 3600);
}

function garbage($sess_maxlifetime) {

    shell_exec('echo garbage >> logs.txt');
    // GLOBAL $db;
    $db = mysqli_connect("localhost", "root", "htp@123", "test_session");
    $CurrentTime = time();
    mysqli_query($db, "DELETE FROM sessions WHERE DateTouched + $sess_maxlifetime < $CurrentTime;");


    return true;
}

session_set_save_handler("open", "close", "read", "write", "destroy", "garbage");
?>