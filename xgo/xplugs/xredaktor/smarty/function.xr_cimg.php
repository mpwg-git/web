<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_function_xr_cimg($params, &$template)
{
	
	if (!templatex::arePluginsEnabled()) return false;
		
	// storage id		
	$s_id 	= intval($params['s_id']); // '' oder 0
	// profile id aus image_profiles
	$p_id 	= intval($params['p_id']); // '' oder 0
	$p_name	= dbx::escape(trim($params['p_name']));
	
	 
	 // TODO
	 $site_id = 1;
	 
 	// get default image s_id from site settings
 	if (isset($params['show_default']) || $s_id == 0)
	{
		//$s_id
		$s_id = intval(dbx::queryAttribute("select * from sites where s_id = $site_id", "s_default_img_s_id"));
	}

	
	// p_id higher prio als p_name
	if ($p_id == 0)
	{
		// check for pname
		if ($p_name == '')
		{
			if (libx::isDeveloper())
			{
				return "[CIMG DEV] ERROR: image profile not set!";
			}	
			return "";	
		}
		else 
		{
			$profile = dbx::query("select * from image_profiles where wz_name = '$p_name'");
		}
	}
	else
	{
		$profile = dbx::query("select * from image_profiles where wz_id = $p_id");
	}
	
	if ($profile === false)
	{
		if (libx::isDeveloper())
		{
			return "[CIMG DEV] ERROR: image profile doesn't exist!";
		}	
		return "";	
	} 
	
	$cnfg 	= array(
		's_id' 		=> $s_id,
		'w'			=> $profile['wz_w'],
		'h'			=> $profile['wz_h'],
		'q'			=> $profile['wz_q'],
		'rmode'		=> $profile['wz_rmode'],
		'ext'		=> $profile['wz_ext'],
		'class'		=> $profile['wz_class']
	);
	
	$imgCfg = xredaktor_storage::xr_img2($cnfg,true);

	unset($cnfg['s_id']);
	unset($cnfg['ext']);
	unset($cnfg['rmode']);
	unset($cnfg['var']);
	unset($cnfg['w']);
	unset($cnfg['h']);
	unset($cnfg['q']);
	unset($cnfg['cloud']);
	unset($cnfg['showgififgif']);
	unset($cnfg['show_default']);

	$cnfg['src'] 		= $imgCfg['src'];
	$cnfg['width'] 		= $imgCfg['rw'];
	$cnfg['height']		= $imgCfg['rh'];
	$cnfg['alt']		= $imgCfg['alt'];

	if (!isset($cnfg['border'])) {
		$cnfg['border']	= 0;
	}

	$tag = "<img ";
	
	foreach ($cnfg as $k => $v)
	{
		$tag .= ' '.$k.'='.'"'.$v.'"'.' ';
	}
	
	$tag .= " />";
	
	
	return $tag;
}

