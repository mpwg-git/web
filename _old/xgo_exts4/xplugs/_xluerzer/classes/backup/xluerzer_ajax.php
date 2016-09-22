<?

class xluerzer_ajax
{

	public static function handleAjax()
	{
		
		libx::turnOnErrorReporting();
		libx::jsonFeedback_ON();
		list($scope,$function,$param_0,$param_1,$param_2) = explode("/",$_REQUEST['url']);
		
		switch ($scope)
		{
			case 'crm_personCategories':
			case 'crm_contacts':
			case 'crm_contacts_bubble':
			case 'crm_contacts_by_id':
				xluerzer_crm::handleAjax($scope,$function);
				break;
			case 'e_submissionSearchComboFor':
			case 'e_crmSearchComboFor':
			case 'e_submissionCrazyImage':
			case 'e_submissionOfTheDayX':
			case 'e_submissions_day_overview':
				xluerzer_e::defaultAjaxHandler($scope,$function);
				break;

			case 'e_submission_media':
				xluerzer_e::defaultMedia($function,$param_0,$param_1);
				break;
			
			case 'e_submissioncredits_details':
				$json = file_get_contents('php://input');
				xluerzer_e::defaultCredits($function,$param_0,$json);	
				break;
			
			case 'media':
				xredaktor_media::handleAjax($function);
				break;
				
			case 'oe_thisweek':
			case 'oe_adsoftheweek':
			case 'oe_inspiration':
			case 'oe_magazines':
			case 'oe_partners':
			case 'oe_designerprofiles':
			case 'oe_blogposts':
			case 'oe_events':
			case 'oe_mediamanager':
			case 'oe_otherarticle':	
			case 'e_submissioncredits':
				
				xluerzer_oe::defaultAjaxHandler($scope,$function);
				break;
				
				
			case 'e_submission_details':
			case 'e_contact_details':
			case 'e_contact_backups':
			case 'e_contact_representants':
			case 'e_contact_duplicates':
			case 'e_contact_associates':
				$json = file_get_contents('php://input');
				xluerzer_e::defaultDetails($scope,$function,$param_0,$json);
				break;	
				
				
				
			case 'oe_thisweek_details':
			case 'oe_adsoftheweek_details':
			case 'oe_inspiration_details':
			case 'oe_magazines_details':
			case 'oe_partners_details':
			case 'oe_designerprofiles_details':
			case 'oe_blogposts_details':
			case 'oe_events_details':
			case 'oe_otherarticle_details':
			
				$json = file_get_contents('php://input');
				xluerzer_oe::defaultDetails($scope,$function,$param_0,$json);
				break;	
				
		}

		die('X');
	}

}
