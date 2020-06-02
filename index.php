<?php

echo "Hello World!".PHP_EOL.PHP_EOL;

echo 'HTTPS: '.$_SERVER['HTTPS'].PHP_EOL;
echo 'Addr: '.$_SERVER['REMOTE_ADDR'].PHP_EOL;
echo 'User: '.$_SERVER['REMOTE_USER'].PHP_EOL;
echo 'Method: '.$_SERVER['REQUEST_METHOD'].PHP_EOL;
echo 'PHP-User: '.$_SERVER['PHP_AUTH_USER'].PHP_EOL;
echo 'Auth: '.$_SERVER['AUTH_TYPE'].PHP_EOL;
echo 'PostUser:'.$_POST['username'].PHP_EOL;
echo 'RequestUser:'.$_REQUEST['username'].PHP_EOL;
echo get_current_user().PHP_EOL;
echo 'Host: '.gethostbyaddr($_SERVER['REMOTE_ADDR']);
