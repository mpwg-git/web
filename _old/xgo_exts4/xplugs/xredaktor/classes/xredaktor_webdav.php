<?

require_once dirname(__FILE__).'/../../../xcore/libs/sabredav/lib/Sabre/autoload.php';
loaderx::addAutoLoadPath(dirname(__FILE__).'/webdav');

class xredaktor_webdav
{

	public function getOffsetServerDir()
	{
		return dirname(__FILE__).'/webdav/sample';
	}

	public function getOffsetNodeDir()
	{
		return '/xdav';
	}

	public function process()
	{
		if (!libx::isDeveloper()) die('WRONG_IP');
		libx::turnOnErrorReporting();
		$server = new Sabre_DAV_Server(new xr_webdav_dir('/'));
	 	$server->setBaseUri(self::getOffsetNodeDir(),'/'); 
		$server->addPlugin(new Sabre_DAV_Locks_Plugin(new xr_webdav_lock(dirname(__FILE__).'/webdav/locks')));
		$server->exec();
	}


}