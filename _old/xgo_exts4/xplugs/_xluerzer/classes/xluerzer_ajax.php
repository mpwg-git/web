<?

class xluerzer_ajax
{

	public static function handleAjax()
	{
		libx::turnOnErrorReporting();
		libx::jsonFeedback_ON();

		list($scope,$function,$param_0,$param_1,$param_2) 	= explode("/",$_REQUEST['url']);
		list($scope_short,$crap) 							= explode("_",$scope,2);

		switch ($scope_short)
		{
			case 'iedtion':
				xluerzer_iedition::defaultAjaxHandler($scope,$function);
				break;
			case 'a':
				xluerzer_a::defaultAjaxHandler($scope,$function);
				break;
			case 'e':
				xluerzer_e::defaultAjaxHandler($scope,$function);
				break;
			case 'oe':
				xluerzer_oe::defaultAjaxHandler($scope,$function);
				break;
			case 'misc':
				xluerzer_misc::defaultAjaxHandler($scope,$function);
				break;
			default:
				break;
		} 

		
		
		switch ($scope_short)
		{
			case 'batchwork':
				xluerzer_batchwork::defaultAjaxHandler($function,$param_0);
				break;
			case 'ads':
				xluerzer_ads::defaultAjaxHandler($function,$param_0);
				break;
			case 'stats':
				xluerzer_stats::defaultAjaxHandler($function,$param_0);
				break;
			case 'publish':
				xluerzer_publish::defaultAjaxHandler($function,$param_0);
				break;	
			case 'admin-submissions':
				xluerzer_admin_submissions::defaultAjaxHandler($crap,$function,$param_0);
				break;
			case 'admin-credits':
				xluerzer_admin_credits::defaultAjaxHandler($crap,$function,$param_0);
				break;
			case 'frontpageconfig':
				xluerzer_frontpageconfig::defaultAjaxHandler($scope,$function);
				break;
			case 'vusers': 
				xluerzer_voting::defaultAjaxHandlerUser($function,$param_0);
				break;
			case 'feprofileimporter':
				xluerzer_feprofileimporter::defaultAjaxHandler($scope,$function,$param_0);
				break;
			case 'cimporter':
				xluerzer_cimporter::defaultAjaxHandler($scope,$function,$param_0);
				break;
			case 'voting':
				xluerzer_voting::defaultAjaxHandler($scope,$function,$param_0);
				break;
			case 'submissions':
				xluerzer_submissions::defaultAjaxHandler($function,$param_0);
				break;
			case 'students':
				xluerzer_students::defaultAjaxHandler($function,$param_0);
				break;
			case 'media':
				xluerzer_media::defaultAjaxHandler($function,$param_0);
				break;
			case 'contacts':
				xluerzer_contacts::defaultAjaxHandler($function,$param_0);
				break;
			case 'contactsDetail':
				xluerzer_contacts_detail::defaultAjaxHandler($function,$param_0);
				break;
			case 'contactlogreport':
				xluerzer_contacts_detail::handleContactLogAll($function,$param_0);
				break;
			case 'adsoftheweek':
				xluerzer_adsoftheweek::defaultAjaxHandler($function,$param_0);
				break;
			case 'magazines':
				xluerzer_magazines::defaultAjaxHandler($function,$param_0);
				break;
			case 'mails':
				xluerzer_mails::defaultAjaxHandler($function,$param_0);
				break;
			case 'admin':
				xluerzer_admin::defaultAjaxHandler($function,$param_0);
				break;
			default:
				die('SCOPE_WRONG!');
		}

		die('FUNC_WRONG');
	}

}
