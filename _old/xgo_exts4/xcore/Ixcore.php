<?

interface Ixcore {

	const memcachex_preFix		= 'xgoshop';
	const FCGI_AUTH 			=  true;
	const htdocsRoot_HTACCESS 	= "/srv/gitgo_daten/www/shop.xgodev.com/web";
	const htdocsRoot 			= "/srv/gitgo_daten/www/shop.xgodev.com/web";

	
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
	const DEVELOPER_IPS_COMMA_SEPERATED = "92.62.28.10,84.113.222.236,86.59.23.218,86.59.98.168,91.115.36.34,212.95.7.27";

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
	const REPORTING_USE_MAIL_SUBJECT					= "xgoshop";
	const REPORTING_USE_MAIL_EMAILS_COMMA_SEPERTATED	= "as@gitgo.at";
	const REPORTING_USE_MAIL_FROM						= "as@gitgo.at";


	/************************************************************************************************
	*
	* MYSQL Database
	*
	*/

	const DB_HOST 					= "localhost";
	const DB_PORT 					= 3306;
	const DB_NAME 					= "xgoshop";
	const DB_USER 					= "xgoshop";
	const DB_PWD 					= "hfEhCwb8RUQsfNx6";

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
