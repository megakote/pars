<?php

set_time_limit(0);
error_reporting(E_ALL);
setlocale(LC_ALL, 'ru_RU.UTF8');
ignore_user_abort(true);

//Database
define('MYSQL_SERVER', '127.0.0.1:3305');
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', '');
define('MYSQL_DB', 'myparser');

//Yandex
define('YA_USER', 'slowdream');
define('YA_KEY', '03.37625579:d507e2531451fe7594804a149af15de0');
define('YA_FILTER', 'moderate'); // Фильтр: strict - семеный, moderate - умеренная фильтрация, none - отключен.

define('VIEWER_DIR', 'data/viewer_stat/');
define('COOKIE_DIR', 'cookie/');

define('DEBUG', true);

