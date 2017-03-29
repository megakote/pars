<?php

set_time_limit(0);
error_reporting(E_ALL);
setlocale(LC_ALL, 'ru_RU.UTF8');
ignore_user_abort(true);

//Database
define('MYSQL_SERVER', '127.0.0.1');
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', '****');
define('MYSQL_DB', 'dbname');

//Yandex
define('YA_USER', '');
define('YA_KEY', '');
define('YA_FILTER', 'moderate'); // Фильтр: strict - семеный, moderate - умеренная фильтрация, none - отключен.

define('VIEWER_DIR', 'data/viewer_stat/');
define('COOKIE_DIR', 'cookie/');

define('DEBUG', true);

