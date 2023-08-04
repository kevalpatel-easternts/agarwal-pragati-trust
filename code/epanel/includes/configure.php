<?php
// manage sessions 
session_start();
//error_reporting(~E_NOTICE||~E_WARNING);

//$gen_root = $_SERVER['DOCUMENT_ROOT'];
////define('HTTP_SERVER','http://192.168.2.103:85');
//define('HTTP_SERVER','http://www.nxtbloc.easternts.com');
//define('WS_ROOT', '/');
//define('WS_ADMIN_ROOT', '/epanel/');
$gen_root = $_SERVER['DOCUMENT_ROOT'].'/aptweb';
define('HTTP_SERVER','http://localhost');
//define('HTTP_SERVER','http://www.nxtbloc.in');
define('WS_ROOT', '/aptweb/');
define('WS_ADMIN_ROOT', '/aptweb/epanel/');
define('FS_INDEX_PATH', $gen_root);

define('DIR_WS_INCLUDES','includes/');
define('DIR_WS_CLASSES',DIR_WS_INCLUDES.'classes/');
define('WS_PFBC_ROOT', 'PFBC/');
define('DIR_WS_CONTROLLER_PATH','controller/');
define('DIR_WS_FUNCTIONS',DIR_WS_INCLUDES.'functions/');
define('DIR_WS_PAGE_PATH','/');
define('DIR_WS_IMAGE_PATH',HTTP_SERVER.WS_ROOT.'images/');
define('DIR_WS_TEMPLATE','template/');

define('DIR_FS_INCLUDES',$gen_root.'/console/includes/');
define('DIR_FS_TEMPLATE',$gen_root.'/console/template/');
define('DIR_FS_CONTROLLER',$gen_root.'/console/controller');

define('DIR_FS_UPLOAD_PATH',$gen_root.'/upload/files/download/'); 
define('DIR_WS_UPLOAD_PATH',HTTP_SERVER.WS_ROOT.'upload/files/download/');

define('DIR_FS_SLIDER_PATH',$gen_root.'/upload/slider/');
define('DIR_WS_SLIDER_PATH',HTTP_SERVER.WS_ROOT.'upload/slider/'); 

define('DIR_FS_SLIDERHOME_PATH',$gen_root.'/upload/slider/home/');
define('DIR_WS_SLIDERHOME_PATH',HTTP_SERVER.WS_ROOT.'upload/slider/home/'); 

define('DIR_FS_GALLERY_PATH',$gen_root.'/upload/image/gallery/');
define('DIR_WS_GALLERY_PATH',HTTP_SERVER.WS_ROOT.'upload/image/gallery/');

define('DIR_FS_APPLICATION_PATH',$gen_root.'/upload/application/');
define('DIR_WS_APPLICATION_PATH',HTTP_SERVER.WS_ROOT.'upload/application/');

define('DIR_FS_PROJECT_PATH',$gen_root.'/upload/image/project/');
define('DIR_WS_PROJECT_PATH',HTTP_SERVER.WS_ROOT.'upload/image/project/');

define('DIR_FS_EVENT_PATH',$gen_root.'/upload/event/'); 
define('DIR_WS_EVENT_PATH',HTTP_SERVER.WS_ROOT.'/upload/event/');

define('DIR_FS_BIODATA_PATH',$gen_root.'/upload/biodata/');
define('DIR_WS_BIODATA_PATH',HTTP_SERVER.WS_ROOT.'upload/biodata/'); 


define('DIR_FS_DOWNLOAD_PATH',$gen_root.'/upload/download/');
define('DIR_WS_DOWNLOAD_PATH',HTTP_SERVER.WS_ROOT.'upload/download/'); 

define('DIR_FS_HOME_PATH',$gen_root.'/upload/home/');
define('DIR_WS_HOME_PATH',HTTP_SERVER.WS_ROOT.'upload/home/'); 

define('DIR_FS_ENVIRONMENT_PATH',$gen_root.'/upload/environment/');
define('DIR_WS_ENVIRONMENT_PATH',HTTP_SERVER.WS_ROOT.'upload/environment/'); 

define('DIR_FS_ADVANTAGE_PATH',$gen_root.'/upload/advantage/');
define('DIR_WS_ADVANTAGE_PATH',HTTP_SERVER.WS_ROOT.'upload/advantage/'); 

define('DIR_FS_PAGE_IMAGE_PATH',$gen_root.'/upload/image/pages/'); 
define('DIR_WS_PAGE_IMAGE_PATH',HTTP_SERVER.WS_ROOT.'upload/image/pages/'); 

define('DIR_FS_LOGO_PATH',$gen_root.'/upload/image/');
define('DIR_WS_LOGO_PATH',HTTP_SERVER.WS_ROOT.'upload/image/');

define('DIR_FS_SITE_PATH',$gen_root.'/');
define('DIR_FS_EPANEL_PATH',$gen_root.'/epanel/');

// Mail BOF
define('SWIFT_MAILER',$gen_root.'/swiftmailer/lib/');
// Mail EOF

define('FILEUSER','localhost'); // used for file owner
define('ADMINTITLE','Eastern - Admin Panel');

define('THUMB_WIDTH','200');
define('THUMB_HEIGHT','200');

$lang_id='1';
$host = "localhost";
//$dbname = "nxtbloc_db";
//$user = "nxtbloc_user";
//$pwd = "MTRf2WS8mC00";
// $dbname = "apt";
// $user = "root";
// $pwd = "ets";

$dbname = "easyglue_agarwal";
$user = "easyglue_agarwaluser";
$pwd = "B+bKKt~aPZ_y";

define('DB_SERVER', 'localhost');
define('DB_SERVER_USERNAME', $user);
define('DB_SERVER_PASSWORD', $pwd);
define('DB_DATABASE', $dbname);

include ('db.php');
ets_db_connect();

$PHP_SELF = $_SERVER['PHP_SELF'];

$epanel_qry = "Select * from epanel_master where id = '1'";
$epanel_res = ets_db_query($epanel_qry);
$epanel_arr = ets_db_fetch_array($epanel_res);

if(basename($_SERVER['PHP_SELF']) != 'login.php'){
	if(!isset($_SESSION['logged'])){
		header('Location: login.php');
	}
}

?>
