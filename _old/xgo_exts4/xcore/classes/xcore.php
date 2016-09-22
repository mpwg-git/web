<?
class xcore
{
	public static function flushTemp()
	{
		$root = dirname(__FILE__).'/..';
		$dirs2clean = array($root.'/tmp', $root.'/tmp/cache', $root.'/tmp/smarty', '/logs');
		foreach ($dirs2clean as $dir)
		{
			$files = hdx::readDirFlatArray($dir);
			foreach ($files as $file)
			{
				if ($file['TYPE'] != 'FILE') continue;
				@unlink($file['F_NAME_FULL']);
			}
		}
		dbx::query("TRUNCATE xcore_internal_reporting;");
	}
}