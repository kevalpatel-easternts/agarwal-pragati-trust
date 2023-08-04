<?php
// manage sessions 
ini_set("log_errors", 1);
ini_set("error_log", "error_log");
error_log('inin');

session_start();
error_reporting(~E_NOTICE || ~E_WARNING );
date_default_timezone_set('Asia/Calcutta');

// $gen_root = $_SERVER['DOCUMENT_ROOT'].'/agarwalpragatitrust/code';
// define('WS_ROOT', '/');
// define('HTTP_SERVER','https://localhost/agarwalpragatitrust/code');

$gen_root = $_SERVER['DOCUMENT_ROOT'];
define('HTTP_SERVER','https://aptsurat.com');
define('WS_ROOT', '/');


define('DIR_WS_INCLUDES','includes/');
define('DIR_WS_TEMPLATE','template/');
define('DIR_WS_PAGE_PATH','content/');

define('DIR_FS_SLIDER_PATH',$gen_root.'/upload/slider/');
define('DIR_WS_SLIDER_PATH',HTTP_SERVER.WS_ROOT.'upload/slider/'); 
define('DIR_WS_LOGO_PATH',HTTP_SERVER.WS_ROOT.'upload/image/');
define('DIR_WS_TESTIMONIAL_PATH',HTTP_SERVER.WS_ROOT.'upload/image/testimonial/');
define('DIR_FS_GALLERY_PATH',$gen_root.'/upload/image/gallery/');
define('DIR_WS_GALLERY_PATH',HTTP_SERVER.WS_ROOT.'upload/image/gallery/');
define('DIR_FS_BIODATA_PATH',$gen_root.'/upload/biodata/'); 
define('DIR_WS_BIODATA_PATH',HTTP_SERVER.WS_ROOT.'upload/biodata/'); 
define('DIR_WS_SERVICE_PATH',HTTP_SERVER.WS_ROOT.'upload/image/service/');
define('DIR_WS_CATEGORY_PATH',HTTP_SERVER.WS_ROOT.'upload/image/category/');
define('DIR_FS_HOME_PATH',$gen_root.'/upload/home/');
define('DIR_WS_HOME_PATH',HTTP_SERVER.WS_ROOT.'upload/home/'); 
define('DIR_FS_BIODATA_PATH',$gen_root.'/upload/biodata/');
define('DIR_WS_BIODATA_PATH',HTTP_SERVER.WS_ROOT.'upload/biodata/'); 
define('DIR_FS_PAGE_IMAGE_PATH',$gen_root.'/upload/image/pages/'); 
define('DIR_WS_PAGE_IMAGE_PATH',HTTP_SERVER.WS_ROOT.'upload/image/pages/'); 
define('DIR_FS_ADVANTAGE_PATH',$gen_root.'/upload/advantage/');
define('DIR_WS_ADVANTAGE_PATH',HTTP_SERVER.WS_ROOT.'upload/advantage/'); 
define('DIR_FS_DOWNLOAD_PATH',$gen_root.'/upload/download/');
define('DIR_WS_DOWNLOAD_PATH',HTTP_SERVER.WS_ROOT.'upload/download/'); 
define('DIR_FS_PROJECT_PATH',$gen_root.'/upload/image/project/');
define('DIR_WS_PROJECT_PATH',HTTP_SERVER.WS_ROOT.'upload/image/project/');
define('DIR_FS_APPLICATION_PATH',$gen_root.'/upload/application/');
define('DIR_WS_APPLICATION_PATH',HTTP_SERVER.WS_ROOT.'upload/application/');
define('DIR_FS_UPLOAD_PATH',$gen_root.'/upload/download/'); 
define('DIR_WS_UPLOAD_PATH',HTTP_SERVER.WS_ROOT.'upload/download/');

define('DIR_FS_ENVIRONMENT_PATH',$gen_root.'/upload/environment/');
define('DIR_WS_ENVIRONMENT_PATH',HTTP_SERVER.WS_ROOT.'upload/environment/'); 
define('SITENAME'," - Agrawal Pragati Trust providing better social, financial, educational and medical growth to people of Surat.");;
define('THUMB_WIDTH','190');
define('THUMB_HEIGHT','132');
define('PHOTO_LIST_NO','12');
define('SEP','/');


//Mail Configuration Starts
define('MAIL_HOST','smtp.gmail.com');
define('MAIL_MAILER','SMTP'); 
define('MAIL_SMTPAuth',true);
define('MAIL_SMTPSecure','tls');
define('MAIL_PORT',587);
define('MAIL_USERNAME','noreply.aptsurat@gmail.com');
define('MAIL_PASSWORD','aptsurat@3#');
define('MAIL_PRIORITY',1);
define('MAIL_XMAILER','Agarwal Pragati Trust');
define('MAIL_CHARSET','UTF-8');
define('MAIL_ENCODING','8bit');
define('MAIL_WORDWRAP',900);
define('MAIL_CONTENTTYPE','text/html; charset=utf-8\r\n');
define('MAIL_FROM','noreply.aptsurat@gmail.com');
define('MAIL_FROMNAME','In and Out Laundromat');

define('LOGO_ALT','Agarwal Pragati Trust');
define('MAIL_LOGO',HTTP_SERVER.WS_ROOT.'upload/image/logo.png');
define('MAIL_TO','Agarwal Pragati Trust');

//live
$host = "localhost";
$dbname = "aptsurat_primary";
$user = "aptsurat_main";
$pwd = "iXSGPX{;(+#G";

//local
// $dbname = "agarwalpragatitrust";
// $user = "root";
// $pwd = "";

define('DB_SERVER', 'localhost');
define('DB_SERVER_USERNAME', $user);
define('DB_SERVER_PASSWORD', $pwd);
define('DB_DATABASE', $dbname);
    
global $db_link;
$db_link = ets_db_connect($host,$user,$pwd);
?>