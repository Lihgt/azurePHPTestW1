<?php

echo "Hello World!".PHP_EOL.PHP_EOL."<br/>";

echo 'HTTPS: '.$_SERVER['HTTPS'].PHP_EOL."<br/>";
echo 'Addr: '.$_SERVER['REMOTE_ADDR'].PHP_EOL."<br/>";
echo 'User: '.$_SERVER['REMOTE_USER'].PHP_EOL."<br/>";
echo 'Method: '.$_SERVER['REQUEST_METHOD'].PHP_EOL."<br/>";
echo 'PHP-User: '.$_SERVER['PHP_AUTH_USER'].PHP_EOL."<br/>";
echo 'Auth: '.$_SERVER['AUTH_TYPE'].PHP_EOL."<br/>";
echo 'PostUser:'.$_POST['username'].PHP_EOL."<br/>";
echo 'RequestUser:'.$_REQUEST['username'].PHP_EOL."<br/>";
echo get_current_user().PHP_EOL."<br/>";
echo 'Host: '.gethostbyaddr($_SERVER['REMOTE_ADDR'])."<br/>";

echo 'REQUEST:'.$_REQUEST['ax_name'];
echo 'POST:'.$_POST['ax_name'];
