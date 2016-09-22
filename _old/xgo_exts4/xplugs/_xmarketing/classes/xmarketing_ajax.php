<?

class xmarketing_ajax
{

	public static function trackAjax($scope,$function)
	{
		if (libx::isDeveloper()) return;
		
		$user = xredaktor_core::getUserSettings();
		
		$db = array(
		'xmbl_scope' 		=> $scope,
		'xmbl_function' 	=> $function,
		'xmbl_ip' 			=> libx::getIp(),
		'xmbl_host' 		=> libx::getHost(),
		'xmbl_user_id' 		=> $user['wz_id'],
		'xmbl_ts'			=> 'NOW()'
		);
		
		dbx::insert('xm_be_logs',$db);
	}

	public static function handleAjax()
	{
		libx::turnOnErrorReporting();
		libx::jsonFeedback_ON();
		list($scope,$function,$param_0,$param_1,$param_2) = explode("/",$_REQUEST['url']);

		
		
		
		self::trackAjax($scope,$function);

		switch ($scope) {
			case 'trzrzrzrz':
				
				$html = xmarketing_landingpage::replaceLinksForSendingForThisUserAndEmission(10,807,"  <a href=\"http://www.grand-tirolia.com/?utm_source=newsletter_grandtirolia&utm_medium=email&utm_campaign=newsletter_grandtirolia_logo\" target=\"_blank\"><img  src=\"/grandtirolia/_cache/_464_5_661c19b2f626347f5ff3d6bf24893f39.png\"  width=\"152\"  height=\"47\"  alt=\"\"  border=\"0\"  /></a>");
				die($html);
				
				break;
			case 'testQ':
				xmarketing_queue::processQ();
				die('XX');
				break;
			case 'security':
				$perm = false;
				if ($_REQUEST['module'] == 'EMISSION') {
					$perm = true;
				}
				$perm = true;
				return frontcontrollerx::json_success(array('PERMISSION'=>$perm));
				break;
			case 'lists_reports':
				
				xmarketing_reports::handleReportsForLists($function);
				break;
			case 'reports':
				
				
				xmarketing_reports::handleAjax($function);
				break;
			case 'bounces':
				xmarketing_bounces::handleBouncesGui($function);
				break;
			case 'emission_queue_recipient':
				xmarketing_emissions::emission_queue_recipient($function);
				break;
			case 'emission_mails_recipient':
				xmarketing_emissions::emission_mails_recipient($function);
				break;
			case 'emission_config_sender':
				xmarketing_emissions::emission_config_sender($function);
				break;
			case 'emission_config_lists':
				xmarketing_emissions::emission_config_lists($function);
				break;
			case 'emission_config_detail':
				xmarketing_emissions::emission_config_detail($function);
				break;
			case 'config_faccounts':
				xmarketing_config::config_faccounts($function);
				break;
			case 'lists2user':
				xmarketing_recipients::lists2user($function);
				break;
			case 'getRemoteCalls':
				xmarketing_lists::getRemoteCalls($function);
				break;
			case 'lists':
				xmarketing_lists::handleAjax($function);
				break;
			case 'dataHistory':
				xmarketing_recipients::dataHistory($function);
				break;
			case 'mailHistory':
				xmarketing_recipients::mailHistory($function);
				break;
			case 'recipientsOfList':
				xmarketing_recipients::recipientsOfList($function);
				break;
			case 'recipients':
				xmarketing_recipients::handleAjax($function);
				break;
			case 'edesign':
				xmarketing_edesign::handleAjax($function);
				break;
			case 'emissions':
				xmarketing_emissions::handleAjax($function);
				break;
			default: frontcontrollerx::error_scope_notfound();
		}
	}

}