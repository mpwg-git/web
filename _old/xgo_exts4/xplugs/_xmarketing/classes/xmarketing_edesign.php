<?

class xmarketing_edesign
{

	public static function handleAjax($function)
	{


		switch ($function)
		{
			case 'editor':
				if (intval($_REQUEST['xme_id'])==0)
				{
					die('-');
				}

				
				$xme_id = xmarketing_security::safe_emissions_id($_REQUEST['xme_id']);
				if ($xme_id == 0) die('-');

				$xme = dbx::query("select * from xm_emissions where xme_id = $xme_id");
				$xme_p_id = intval($xme['xme_p_id']);

				$_REQUEST['p_id'] 	= $xme_p_id;
				$_REQUEST['cms']	= 1;

				
				
				if (!xmarketing_emissions::isEmissionEditable($xme_id))
				{
					unset($_REQUEST['cms']);
				}

				$p_id 	= frontcontrollerx::isInt($_REQUEST['p_id']);
				$p_s_id = xredaktor_niceurl::getSiteIdViaPageId($p_id);

				xredaktor_niceurl::setSiteConfig($p_s_id);
				xredaktor_render::renderPageEvenItIsOffline();
				
				$html = xredaktor_render::renderPage($p_id,true);
				$html = str_replace("<base","<edit_modus_xr_base",$html);
				
				die($html);

				break;
			default: die('T');
		}
	}

}