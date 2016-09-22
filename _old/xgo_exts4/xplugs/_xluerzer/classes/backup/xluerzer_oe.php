<?

class xluerzer_oe
{

	public static function getConfigByScope($scope)
	{

		$db = Ixcore::DB_NAME;

		switch ($scope)
		{

			case  'oe_thisweek':
				$extFunctionsConfig = array(
					'db'			=> $db,
					'table'			=> 'oe_this_week',
					'pid'			=> 'oetw_id',
					'fields'		=> array('oetw_id','oetw_state','oetw_title','oetw_desc_short','oetw_keywords','DATE_FORMAT(oetw_created,"%Y-%m-%d") as oetw_created','oetw_media_id'),
				);
				return $extFunctionsConfig;

			case  'oe_inspiration':
				$extFunctionsConfig = array(
					'db'			=> $db,
					'table'			=> 'oe_inspiration',
					'pid'			=> 'oei_id',
					'fields'		=> array('oei_id','oei_state','oei_title','oei_desc_short','oei_keywords','DATE_FORMAT(oei_created,"%Y-%m-%d") as oei_created','DATE_FORMAT(oei_date_start,"%Y-%m-%d") as oei_date_start','DATE_FORMAT(oei_date_end,"%Y-%m-%d") as oei_date_end','oei_media_id'),
				);
				return $extFunctionsConfig;

			case  'oe_partners':
				$extFunctionsConfig = array(
					'db'			=> $db,
					'table'			=> 'oe_partners',
					'pid'			=> 'oep_id',
					'fields'		=> array('oep_id','oep_state','oep_title','oep_desc_short','oep_keywords','DATE_FORMAT(oep_created,"%Y-%m-%d") as oep_created','DATE_FORMAT(oep_date_start,"%Y-%m-%d") as oep_date_start','DATE_FORMAT(oep_date_end,"%Y-%m-%d") as oep_date_end','oep_media_id'),			
				);
				return $extFunctionsConfig;

			case  'oe_designerprofiles':
				$extFunctionsConfig = array(
					'db'			=> $db,
					'table'			=> 'oe_designer_profiles',
					'pid'			=> 'oedp_id',
					'fields'		=> array('oedp_id','oedp_state','oedp_title','oedp_desc_short','oedp_keywords','DATE_FORMAT(oedp_created,"%Y-%m-%d") as oedp_created','DATE_FORMAT(oedp_date_start,"%Y-%m-%d") as oedp_date_start','DATE_FORMAT(oedp_date_end,"%Y-%m-%d") as oedp_date_end','oedp_media_id'),			
				);
				return $extFunctionsConfig;

			case  'oe_blogposts':
				$extFunctionsConfig = array(
					'db'			=> $db,
					'table'			=> 'oe_blog_posts',
					'pid'			=> 'oebp_id',
					'fields'		=> array('oebp_id','oebp_state','oebp_title','oebp_desc_short','oebp_keywords','DATE_FORMAT(oebp_created_ts,"%Y-%m-%d") as oebp_created','DATE_FORMAT(oebp_date_start,"%Y-%m-%d") as oebp_date_start','DATE_FORMAT(oebp_date_end,"%Y-%m-%d") as oebp_date_end','oebp_media_id','oebp_featured'),
				);
				return $extFunctionsConfig;

			case  'oe_events':
				$extFunctionsConfig = array(
					'db'			=> $db,
					'table'			=> 'oe_events',
					'pid'			=> 'oee_id',
					'fields'		=> array('oee_id','oee_state','oee_title','oee_desc_short','oee_desc_long','oee_keywords','DATE_FORMAT(oee_created,"%Y-%m-%d") as oee_created','DATE_FORMAT(oee_date_from,"%Y-%m-%d") as oee_date_from','DATE_FORMAT(oee_date_end,"%Y-%m-%d") as oee_date_end','oee_media_id'),		
				);
				return $extFunctionsConfig;
				
			case  'oe_interviews':
				/* TODO
				$extFunctionsConfig = array(

					'db'			=> $db,
					'table'			=> 'oe_events',
					'pid'			=> 'oee_id',
					'fields'		=> array('oee_id','oee_state','oee_title','oee_desc_short','oee_keywords','DATE_FORMAT(oee_created,"%Y-%m-%d") as oee_created','DATE_FORMAT(oee_date_from,"%Y-%m-%d") as oee_date_from','DATE_FORMAT(oee_date_end,"%Y-%m-%d") as oee_date_end','oee_media_id'),		
		
				);
				return $extFunctionsConfig;
				*/		
			
			case  'oe_otherarticle':
				$extFunctionsConfig = array(

					'db'			=> $db,
					'table'			=> 'oe_other_articles',
					'pid'			=> 'oeoa_id',
					'fields'		=> array('oeoa_id','oeoa_state','oeoa_title','oeoa_desc_short','oeoa_keywords','DATE_FORMAT(oeoa_created,"%Y-%m-%d") as oeoa_created','DATE_FORMAT(oeoa_date_start,"%Y-%m-%d") as oeoa_date_start','DATE_FORMAT(oeoa_date_end,"%Y-%m-%d") as oeoa_date_end','oeoa_media_id'),
				);
				return $extFunctionsConfig;
		

			case  'oe_frontpage':
				/* TODO
				$extFunctionsConfig = array(

					'db'			=> $db,
					'table'			=> array('cms_content','cms_event'),
					'pid'			=> 'cms_content.id',
					'extraLoad'		=> " cms_content.type = 5 and cms_event.content_id = cms_content.id ",
					'fields'		=> array('cms_content.id','cms_content.c_id','cms_content.title','cms_content.short_description','cms_content.keywords','DATE_FORMAT(cms_content.created,"%Y-%m-%d") as created','cms_content.media_id','cms_content.s_id'),

				);
				return $extFunctionsConfig;
				*/

			default:
				return false;
		}
	}


	public static function defaultGetDetails($scope, $id)
	{
		$id = intval($id);
		$db = Ixcore::DB_NAME;
		dbx2::select_database($db);
		$selectFrom = "";
		$idName = "";

		switch ($scope)
		{

			case  'oe_thisweek_details':

				$selectFrom = "oe_this_week";
				$idName = "oetw_id";
				break;

			case  'oe_partners_details':

				$selectFrom = "oe_partners";
				$idName = "oep_id";
				break;

			case  'oe_inspiration_details':

				$selectFrom = "oe_inspiration";
				$idName = "oei_id";
				break;

			case  'oe_events_details':

				$selectFrom = "oe_events";
				$idName = "oee_id";
				break;

			case  'oe_blogposts_details':

				$selectFrom = "oe_blog_posts";
				$idName = "oebp_id";
				break;

			case  'oe_designerprofiles_details':

				$selectFrom = "oe_designer_profiles";
				$idName = "oedp_id";
				break;

			case  'oe_interview_details':

				/* TODO
				*/
				break;
				
			case  'oe_otherarticle_details':

				$selectFrom = "oe_other_articles";
				$idName = "oeoa_id";
				break;
				
			case  'oe_frontpage_details':

				/* TODO
				*/

			default:
				return false;

		}

		$sql_data 	= "SELECT * from $selectFrom WHERE $idName = ".$id;
		
		$data 		= dbx2::query($sql_data);
		frontcontrollerx::json_success($data);
	}
	
	
	public static function defaultSetDetails($scope, $id, $values)
	{
		
		$updateData = json_decode($values);
		
		$id = intval($id);
		$db = Ixcore::DB_NAME;
		dbx2::select_database($db);
		
		$updateTable = "";
		$idName = "";

		switch ($scope)
		{

			case  'oe_thisweek_details':

				$updateTable = "oe_this_week";
				$idName = "oetw_id";
				break;

			case  'oe_partners_details':

				$updateTable = "oe_partners";
				$idName = "oep_id";
				// die ("in partners - update: ".$updateTable." with fields:".print_r($updateData)." @id: ".$idName." = ".$id);
				break;

			case  'oe_inspiration_details':

				$updateTable = "oe_inspiration";
				$idName = "oei_id";
				break;

			case  'oe_events_details':

				$updateTable = "oe_events";
				$idName = "oee_id";
				break;

			case  'oe_blogposts_details':

				$updateTable = "oe_blog_posts";
				$idName = "oebp_id";
				break;

			case  'oe_designerprofiles_details':

				$updateTable = "oe_designer_profiles";
				$idName = "oedp_id";
				break;

			case  'oe_interview_details':

				// TODO
				break;
				
			case  'oe_otherarticle_details':

				$updateTable = "oe_other_articles";
				$idName = "oeoa_id";
				break;
			
			case  'oe_frontpage_details':

				// TODO
				

			default:
				return false;

		}
		
		$data = dbx2::update($updateTable,$updateData,array($idName=>$id));
		frontcontrollerx::json_success($data);
	}
	
	
	public static function defaultDetails($scope, $function, $id, $values) {
			switch ($function) {
					
				case 'load':
					xluerzer_oe::defaultGetDetails($scope, $id);
					break;
					
				case 'save':
					xluerzer_oe::defaultSetDetails($scope, $id, $values);
					break;
					
				default:
					break;
						
			}	
	}
	
	public static function defaultAjaxHandler($scope,$function)
	{

		switch ($scope)
		{

			case 'oe_getThumb':
				break;
				
			default:
				$extFunctionsConfig = self::getConfigByScope($scope);
				xluerzer_db_junky::handleDefaultExtGrid($extFunctionsConfig,$function);
		}
	}
	

}
