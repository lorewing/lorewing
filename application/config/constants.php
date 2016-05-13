<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESCTRUCTIVE') OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

// database table constant
// master table

define("TBL_MST_STATES",'mst_states');
define("TBL_MST_COUNTRIES",'mst_countries');
define("TBL_MST_VENUES",'tbl_venue'); 
define("TBL_MST_STORES",'tbl_stores');
define("TBL_MST_SESSION",'mst_session'); 
define("TBL_MST_ROLES",'mst_roles');
define("TBL_MST_QUESTIONS",'mst_questions');
define("TBL_QUESTION_ANSWERS",'tbl_question_answers');
define("TBL_VENUES_ATTACHEMENTS",'tbl_venues_attachment');
define("TBL_TEMP_BULK_DATA",'tbl_temp_bulk_data');
define("TBL_SESSION_HAS_STORE",'tbl_session_has_store');
define("TBL_MST_CITIES",'mst_cities');
define("TBL_MST_SETTINGS",'master_settings');
define("TBL_MST_USERS",'tbl_users');
define("TBL_MST_USERS_Information",'tbl_user_information');

define("TBL_MASTER_MENUS",'mst_menus');
define("TBL_MENU_HAS_ROLES",'menu_has_roles');

define("TBL_EVENT_REGISTRATION",'tbl_event_registration');  

define("TBL_CONTENT_IMAGES",'tbl_content_images');  



define("PRODUCT_IMAGES_UPLOAD_LIMIT",100);
define("PRODUCT_IMAGES_MAX_UPLOAD_REACHED","You can upload maximum %s images.");
define("PRODUCT_IMAGES_SUCCESSFULLY_UPLOADED","Image uploaded successfully.");


// Product images
define('INVALID_IMAGE_ID',"Invalid image ID.");
define('PLEASE_SELECT_IMAGES',"Please select images.");
define('CROPED_IMAGE_SAVED_SUCESS',"Croped image saved Successfully.");
define('RESET_IMAGE_SAVED_SUCESS',"Image reset saved Successfully.");

// Stamp table 
define("TBL_STAMP",'systemstamps');
// user table 
define("TBL_USERS",'tbl_users');
define("TBL_USER_INFORMATION",'tbl_user_information');

// activities tables 
define("LOGIN_USERNAME_ERROR_MESSAGE",'Invalid username and password.');
define("LOGIN_USERNAME_ERROR_MESSAGE_FR",'Username and password invalid.');
//define("TBL_ACTIVITIES_DOCUMENTS",'activities_documents');
//define("TBL_ACTIVITIES_QUOTE_STATUS",'activities_quote_status');
//define("TBL_ACTIVITIES_REMINDERS",'activities_reminders');
//define("TBL_ACTIVITIES_SITE_VISIT",'activities_site_visit'); 
	
define("SESSION_TYPE_EXCLUSIVE","Exclusive");
define("SESSION_TYPE_GENERAL","General");
define("LANGUAGE_ENGLISH","english");
define("LANGUAGE_FRENCH","french");

//Roles Id
define("SALES_RIP_NAME","sales_rep");
define("ADMIN_NAME","admin");
define("POWER_USER_NAME","power_user");
define("SALES_DIRECTOR_NAME","sales_director");
define("SALES_MANAGER_NAME","sales_manager");
define("CUSTOMER_NAME","customer");

// for upload path
define("CONTENT_UPLOAD_PATH",'private/uploads/content_images/');

define("CONTENTS_UPLOAD_PATH",CONTENT_UPLOAD_PATH.'%s/');

define("NO_IMAGE_PATH","private/noimage.jpg");

// Products uploads contants
define("CONTENT_IMAGE_MAX_SIZE",'8000');
define("CONTENT_ALLOWED_IMAGE_TYPES",'jpg|jpeg|png|gif');
define("CONTENT_IMAGE_MAX_WIDTH",'5000');
define("CONTENT_IMAGE_MAX_HEIGHT",'5000');
define("CONTENT_IMAGE_MIN_WIDTH_HEIGHT",'100');

define('MESSAGE_SUCCESS','success');
define("CONTENT_IMAGES_MIN_UPLOAD_WITH_HEIGHT","You can upload image of minimum width/height of %spx.");


// for upload gallery path
define("GALLERY_UPLOAD_PATH",'private/uploads/gallery/');

define("GALLERYS_UPLOAD_PATH",GALLERY_UPLOAD_PATH.'%s/');