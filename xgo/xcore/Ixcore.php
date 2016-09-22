<?

interface Ixcore {


	const FCGI_AUTH 			=  true;
	const htdocsRoot_HTACCESS 	= "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web";
	const htdocsRoot 			= "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web";


	/************************************************************************************************
	*
	* LANGUAGE DEFAULT SETTINGS
	*
	*/

	const init_fail_lang_fe	= 'de';
	const init_fail_lang_be	= 'en';

	/************************************************************************************************
	*
	* XR_ASSETS
	*
	*/

	const jsCompression 	= false;
	const cssCompression 	= false;


	/************************************************************************************************
	*
	* FORMS
	*
	*/

	const formsKey = "ldksöjaf#asdkfoxxyevwirhjmqb3kj4514§§$%>>";

	/************************************************************************************************
	*
	* CACHING
	*
	*/

	const useCacheing			= false;
	const redisPort				= 6390;
	const memcachex_preFix		= 'mpwgbeta';

	/************************************************************************************************
	*
	* TIMEMACHINE
	*
	*/

	const TIMEMACHINE				= false;

	/************************************************************************************************
	*
	* PATHS OF LIBS
	*
	*/

	const PATH_ImageMagick 		= "convert";
	const PATH_ImageMagick_RGB	= "sRGB";

	/************************************************************************************************
	*
	* DEVELOPMENT
	*
	*/
	const DEVELOPER_IPS_COMMA_SEPERATED = "92.62.28.10,84.113.222.236,62.178.65.83,86.59.23.218,86.59.98.168,91.115.36.34,213.162.68.95,80.110.76.19,185.39.175.21,80.110.73.2,84.112.240.94,89.144.224.109,212.186.77.9";

	/************************************************************************************************
	*
	* TEMP_DIR
	*
	*/

	const TEMP_DIR_USE_DEFAULT							= true;
	const TEMP_DIR_ALTERNATE							= "";
	const TEMP_DIR_PREFIX								= "xcoreTmpPrefix_";

	/************************************************************************************************
	*
	* SMARTY
	*
	*/

	const SMARTY_COMPILE_CHECK							= true;
	const SMARTY_CACHEING								= false;
	const SMARTY_LIFETIME								= 3600;

	/************************************************************************************************
	*
	* ERROR/WARNING/INFO - REPORTING
	*
	*/

	# - via db
	const REPORTING_USE_DB								= true;
	const REPORTING_USE_DB_NAME							= 'xcore_internal_reporting';

	# - via mail
	const REPORTING_USE_MAIL							= true;
	const REPORTING_USE_MAIL_SUBJECT					= "mpwg-beta";
	const REPORTING_USE_MAIL_EMAILS_COMMA_SEPERTATED	= "webdev@gitgo.at";
	const REPORTING_USE_MAIL_FROM						= "as@gitgo.at";


	/************************************************************************************************
	*
	* MYSQL Database
	*
	*/

	const DB_HOST 					= "localhost";
	const DB_PORT 					= 3306;
	const DB_NAME 					= "wsfbeta";
	const DB_USER 					= "wsfbeta";
	const DB_PWD 					= "E2TmPrjWbchy7BUY";

	/************************************************************************************************
	*
	* MAILING System
	*
	*/

	const MAIL_SMTP_USE				= true;
	const MAIL_SMTP_AUTH			= true;
	const MAIL_SMTP_HOST			= "smtp.inode.at";
	const MAIL_SMTP_USER			= "mailhub@pixelfarmers.at";
	const MAIL_SMTP_PASS			= "1qayxsw2";


}
