<?php

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);


define('MEMCACHED_HOST', '127.0.0.1');
define('MEMCACHED_PORT', '11211');

$memcache = new Memcache;
$cacheAvailable = $memcache->connect(MEMCACHED_HOST, MEMCACHED_PORT);

/**
 * 
 * @global Memcache $memcache
 * @global type $cacheAvailable
 * @param type $key
 * @return boolean
 */
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

?>