<?php

$databases = array (
  'default' => 
  array (
    'default' => 
    array (
      'database' => 'luketully',
      'username' => 'drupal-admin',
      'password' => 'TNfn*9534',
      'host' => 'localhost',
      'port' => '',
      'driver' => 'mysql',
      'prefix' => '',
    ),
  ),
);


$update_free_access = FALSE;

$drupal_hash_salt = 'sNBf2wsfz8-l0lGzVaFLc7qwdNxHaluQyuRWagsI6Rs';


ini_set('session.gc_probability', 1);
ini_set('session.gc_divisor', 100);

ini_set('session.gc_maxlifetime', 200000);
ini_set('memory_limit', '128M');
ini_set('session.cookie_lifetime', 2000000);

$conf['404_fast_paths_exclude'] = '/\/(?:styles)\//';
$conf['404_fast_paths'] = '/\.(?:txt|png|gif|jpe?g|css|js|ico|swf|flv|cgi|bat|pl|dll|exe|asp)$/i';
$conf['404_fast_html'] = '<html xmlns="http://www.w3.org/1999/xhtml"><head><title>404 Not Found</title></head><body><h1>Not Found</h1><p>The requested URL "@path" was not found on this server.</p></body></html>';

