<?php
@session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);
#define('URL', 'http://127.0.0.1/');
define('URL', 'http://jycom.asuscomm.com:6680/');
define('DB_TYPE' , 'mysql');
define('DB_HOST' , 'localhost');
define('DB_NAME' , 'sns');
define('DB_USER' , 'sns_con');
define('DB_PASS' , 'sns_con!');


/** 테이블 상수 정의 */
define('TABLE_BOARD' , 'board');
define('TABLE_ATTACH' , 'attach');
define('TABLE_B_CATEGORY' , 'b_category');
define('TABLE_COLLEGE_LIST' , 'college_list');
define('TABLE_COMMENT' , 'comment');
define('TABLE_FILE_TYPE' , 'file_type');
define('TABLE_FOLLOW' , 'follow');
define('TABLE_INTEREST' , 'interest');
define('TABLE_INTEREST_U' , 'interest_u');
define('TABLE_LIKE_BOARD' , 'like_board');
define('TABLE_LIKE_COMMENT' , 'like_comment');
define('TABLE_NOTIFICATION' , 'notification');
define('TABLE_NOTIFICATION_TYPE' , 'notification_type');
define('TABLE_PE_CATEGORY' , 'pe_category');
define('TABLE_UNCOMFORTABLE' , 'uncomfortable');
define('TABLE_USER' , 'user');
?>

