<?php

set_time_limit(0);
error_reporting(E_ALL);
setlocale(LC_ALL, 'ru_RU.UTF8');
ignore_user_abort(true);

//Database
define('MYSQL_SERVER', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', '****');
define('MYSQL_DB', '');

//Yandex
define('YA_USER', '');
define('YA_KEY', '');
define('YA_FILTER', 'moderate'); // Фильтр: strict - семеный, moderate - умеренная фильтрация, none - отключен.



define('PAUSE_TIME', 600); //Время в секундах на которое можно установить паузу.
define('TIMEOUT_WORK', 16); //Время в секундах. Как давно был вызван $stat update, чтобы считалось что скрипт не работает



define('VIEWER_DIR', 'data/');
define('COOKIE_DIR', 'cookie/');

define('DEBUG', true);

