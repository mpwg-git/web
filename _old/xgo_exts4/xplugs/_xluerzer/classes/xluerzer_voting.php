<?

class  xluerzer_voting
{


	public static function postCheck_step($nodes,$totalCount)
	{

		if ($_REQUEST['checked_only'] == '1')
		{

			//$checked = dbx::query("select fe_users.*, ev_checked = from e_voting_fe_users where evfeu_step = $step and evfeu_ev_id = $ev_id and evfeu_feu_id = $feu_id");
		}

		foreach ($nodes as $i => $n)
		{

			$evu_id = $n['evu_id'];
			$ev_id 	= $n['ev_id'];
			$step 	= $n['step'];


			$checked = dbx::query("select * from e_voting_users2voting where evtu_step = $step and evtu_ev_id = $ev_id and evtu_evu_id = $evu_id");
			$nodes[$i]['ev_checked'] = ($checked !== false);

			if ($checked !== false)
			{
				$nodes[$i]['evtu_permission_x_min_1'] 	= $checked['evtu_permission_x_min_1'];
				$nodes[$i]['evtu_show_details'] 		= $checked['evtu_show_details'];
			}
		}

		return array($nodes,$totalCount);
	}

	public static function defaultAjaxHandlerUser($function,$param_0)
	{


		$extFunctionsConfig = array(
		'table'				=> 'e_voting_users',
		'db_prefix'			=> 'evu_',
		'pid'				=> 'evu_id',
		'fid'				=> 'evu_fid',
		'sort'				=> 'evu_sort',
		'del'				=> 'evu_del',
		'fields'			=> array('evu_id', 'evu_email', 'evu_name', 'evu_password'),
		'extraInsert'		=> array('evu_created_ts' => 'NOW()'),
		'update'			=> array('evu_name','evu_email', 'evu_name', 'evu_password'),
		'normalize'			=> array('string'=>array('evu_name','evu_email','evu_password'))
		);

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
		die('x');
	}
	public static function defaultAjaxHandler($scope,$function,$param_0)
	{
		xluerzer_user::liveSecurityCheckByTag('VOTING');

		switch ($scope)
		{
			case 'voting_report_nonspecial':
				$type = $_REQUEST['type'];


				switch ($type)
				{
					case 'STUDENT':
					case 'PRINT':
					case 'VIDEO':


						/*
						$sql_data 	= "select * from e_voting_report where evr_type = '$type' order by evr_id desc";
						$sql_cnt 	= "select count(evr_id) as sql_cnt from e_voting_report where evr_type = '$type' order by evr_id desc";

						xluerzer_db::uniqueDataGridWrapper(array(
						'sql_data' 	=> $sql_data,
						'sql_cnt' 	=> $sql_cnt,
						));
						*/


						$extFunctionsConfig = array(
						'table'				=> 'e_voting_report',
						'db_prefix'			=> 'evr_',
						'pid'				=> 'evr_id',
						'fid'				=> 'evr_fid',
						'sort'				=> 'evr_sort',
						'del'				=> 'evr_del',
						'fields'			=> array('evr_id','evr_name', 'evr_submission_id_start', 'evr_submission_id_stop', 'evr_type'),
						'extraInsert'		=> array('evr_created' => 'NOW()','evr_type'=>$type),
						'extraLoad'			=> " evr_type = '$type' ",
						'update'			=> array('evr_name','evr_submission_id_start','evr_submission_id_stop'),
						'normalize'			=> array('string'=>array('evr_name'),'int'=>array('evr_submission_id_start','evr_submission_id_stop'))
						);

						xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);




						break;
					default:
						die("XXX");
				}

				break;
			case 'voting_reporting_by_users':

				$evr_step = intval($_REQUEST['evr_step']);
				if ($evr_step == 0) die("X0");

				$ev_id = intval($_REQUEST['ev_id']);
				$voting = dbx::query("select * from e_voting where ev_id = $ev_id");
				if ($voting === false) die('X1');

				$ev_magazine_id = intval($voting['ev_magazine_id']);
				if ($ev_magazine_id == 0) die("X2");

				$ev_magazine_type_id 	= intval($voting['ev_magazine_type_id']);
				if ($ev_magazine_type_id == 0) die("X2.1");

				$ev_type = intval($voting['ev_type']);
				if ($ev_type == 0) die("X3");

				$ev_submission_id_start 	= intval($voting['ev_submission_id_start']);
				$ev_submission_id_end 	= intval($voting['ev_submission_id_end']);

				switch ($ev_type)
				{
					case '1': // PRINT
					$es_mediaType_id = "1";
					break;
					case '2': // VIDEO
					$es_mediaType_id = "2";
					break;
					case '3': // SPECIAL
					$es_mediaType_id = "1";
					break;
					case '4': // STUDENT
					die('X5');
					break;
					default: die("X4");
				}

				$add_sql = "";

				if($ev_submission_id_start > 0 && $ev_submission_id_end > 0)
				{
					$add_sql = " and e_submissions.es_id >= $ev_submission_id_start AND e_submissions.es_id <= $ev_submission_id_end ";
				}
				else if($ev_submission_id_start > 0)
				{
					$add_sql = " and e_submissions.es_id >= $ev_submission_id_start ";
				}
				else if($ev_submission_id_end > 0)
				{
					$add_sql = " and e_submissions.es_id <= $ev_submission_id_end ";
				}

				$totalSubmissions = intval(dbx::queryAttribute("select count(es_id) as cntx from e_submissions where es_mediaType_id = $es_mediaType_id and es_state = 1 and es_submission_type = $ev_magazine_type_id $add_sql","cntx"));

				$sql_data = "SELECT

						e_voting_users.evu_id,
						e_voting_users.evu_email,
						e_voting_users.evu_name,
						
						concat('$totalSubmissions') 		as total,
						evr_voting_user_id 					as uid,
						sum(evr_vote='0') 					as dissed, 
						sum(evr_vote='1') 					as liked, 
						($totalSubmissions-count(evr_id)) 	as nv
						
						FROM e_voting_results,e_voting_users WHERE evr_ev_id = $ev_id and evr_step = $evr_step and evu_id = evr_voting_user_id
						
						group by `evr_voting_user_id`
						ORDER BY `evr_voting_user_id` DESC";


				$sql_cnt = "SELECT count(evr_id) as sql_cnt FROM `e_voting_results` WHERE evr_ev_id = $ev_id and evr_step = $evr_step group by evr_voting_user_id";

				xluerzer_db::uniqueDataGridWrapper(array(
				'sql_data' 	=> $sql_data,
				'sql_cnt' 	=> $sql_cnt,
				));

				break;

			case 'voting_reporting_by_users2':


				$evr_step = intval($_REQUEST['evr_step']);
				if ($evr_step == 0)
				{
					$evr_step = 1;
				}


				$evr_id = intval($_REQUEST['evr_id']);
				if ($evr_id == 0) die('x');

				$settings = dbx::query("select * from e_voting_report where evr_id = $evr_id ");


				switch ($settings['evr_type'])
				{
					case 'PRINT':
						$ev_id = 1;
						break;
					case 'VIDEO':
						$ev_id = 2;
						break;
					case 'STUDENT':
						$ev_id = 3;
						break;
					default: die("evr_type?");
				}

				$voting = dbx::query("select * from e_voting where ev_id = $ev_id");
				if ($voting === false) die('X1');


				$ev_type = intval($voting['ev_type']);
				if ($ev_type == 0) die("X3");


				$ev_submission_id_start = intval($settings['evr_submission_id_start']);
				$ev_submission_id_end	= intval($settings['evr_submission_id_stop']);


				$whichDb = 1;

				switch ($ev_type)
				{
					case '1': // PRINT
					$ev_magazine_type_id = 1;
					$es_mediaType_id = "1";
					break;
					case '2': // VIDEO
					$ev_magazine_type_id = 12;
					$es_mediaType_id = "2";
					
					if($evr_step == 2)
					{
						$whichDb = 3;
					}
					
					break;
					case '3': // SPECIAL
					$es_mediaType_id = "1";
					break;
					case '4': // STUDENT
					$whichDb = 2;
					break;
					default: die("X4");
				}


				switch ($whichDb)
				{
					case 3:

						$add_sql = "";
						$add_sqlvoting = "";

						if($ev_submission_id_start > 0 && $ev_submission_id_end > 0)
						{
							$add_sql = " and e_submissions.es_id >= $ev_submission_id_start AND e_submissions.es_id <= $ev_submission_id_end ";
							$add_sqlvoting = " and evr_submission_id >= $ev_submission_id_start AND evr_submission_id <= $ev_submission_id_end ";
						}
						else if($ev_submission_id_start > 0)
						{
							$add_sql = " and e_submissions.es_id >= $ev_submission_id_start ";
							$add_sqlvoting = " and evr_submission_id >= $ev_submission_id_start ";
						}
						else if($ev_submission_id_end > 0)
						{
							$add_sql = " and e_submissions.es_id <= $ev_submission_id_end ";
							$add_sqlvoting = " and evr_submission_id <= $ev_submission_id_end ";
						}


						/// es_state = 1 and !? stimmt das

						

						$totalSubmissions 	= intval(dbx::queryAttribute("select count(es_id) as cntx from e_submissions where es_state = 1 and es_submission_type = 12 and es_mediaType_id = 2 $add_sql and es_id in (select evss_submission_id from e_voting_second_step)","cntx"));
						$votedUnique		= intval(dbx::queryAttribute("select count(distinct(es_id)) as cntx from e_submissions,e_voting_results where es_mediaType_id = $es_mediaType_id and es_submission_type = $ev_magazine_type_id $add_sql and  evr_ev_id = $ev_id and evr_step = $evr_step and es_id = evr_submission_id","cntx"));

						$sql_data = "SELECT

						e_voting_users.evu_id,
						e_voting_users.evu_email,
						e_voting_users.evu_name,
						
						concat('$totalSubmissions') 		as total,
						evr_voting_user_id 					as uid,
						sum(evr_vote='0') 					as dissed, 
						sum(evr_vote='1') 					as liked, 
						($totalSubmissions-count(evr_id)) 	as nv2,
						($totalSubmissions-$votedUnique) 	as nv
						
						FROM e_voting_results,e_voting_users,e_voting_users2voting WHERE evr_ev_id = $ev_id and evr_step = $evr_step and evu_id = evr_voting_user_id 
						and evtu_ev_id = evr_ev_id and evtu_step = evr_step and evtu_evu_id = evu_id
						$add_sqlvoting
						
						group by `evr_voting_user_id`
						ORDER BY `evr_voting_user_id` DESC";

						$sql_cnt = "SELECT count(evr_id) as sql_cnt FROM `e_voting_results` WHERE evr_ev_id = $ev_id and evr_step = $evr_step $add_sqlvoting group by evr_voting_user_id";
						
						break;
					
					case 2:



						$add_sql = "";
						$add_sqlvoting = "";

						if($ev_submission_id_start > 0 && $ev_submission_id_end > 0)
						{
							$add_sql = " and e_submissions_students.ess_id >= $ev_submission_id_start AND e_submissions_students.ess_id <= $ev_submission_id_end ";
							$add_sqlvoting = " and evr_submission_id >= $ev_submission_id_start AND evr_submission_id <= $ev_submission_id_end ";
						}
						else if($ev_submission_id_start > 0)
						{
							$add_sql = " and e_submissions_students.ess_id >= $ev_submission_id_start ";
							$add_sqlvoting = " and evr_submission_id >= $ev_submission_id_start ";
						}
						else if($ev_submission_id_end > 0)
						{
							$add_sql = " and e_submissions_students.ess_id <= $ev_submission_id_end ";
							$add_sqlvoting = " and evr_submission_id <= $ev_submission_id_end ";
						}

						$totalSubmissions = intval(dbx::queryAttribute("select count(ess_id) as cntx from e_submissions_students where 1 $add_sql","cntx"));

						$sql_data = "SELECT

						e_voting_users.evu_id,
						e_voting_users.evu_email,
						e_voting_users.evu_name,
						
						concat('$totalSubmissions') 		as total,
						evr_voting_user_id 					as uid,
						sum(evr_vote='0') 					as dissed, 
						sum(evr_vote='1') 					as liked, 
						($totalSubmissions-count(evr_id)) 	as nv
						
						FROM e_voting_results,e_voting_users,e_voting_users2voting WHERE evr_ev_id = $ev_id and evr_step = $evr_step and evu_id = evr_voting_user_id
						and evtu_ev_id = evr_ev_id and evtu_step = evr_step and evtu_evu_id = evu_id
						$add_sqlvoting
						group by `evr_voting_user_id`
						ORDER BY `evr_voting_user_id` DESC";


						$sql_cnt = "SELECT count(evr_id) as sql_cnt FROM `e_voting_results` WHERE evr_ev_id = $ev_id and evr_step = $evr_step $add_sqlvoting group by evr_voting_user_id";


						break;
					default:


						$add_sql = "";
						$add_sqlvoting = "";

						if($ev_submission_id_start > 0 && $ev_submission_id_end > 0)
						{
							$add_sql = " and e_submissions.es_id >= $ev_submission_id_start AND e_submissions.es_id <= $ev_submission_id_end ";
							$add_sqlvoting = " and evr_submission_id >= $ev_submission_id_start AND evr_submission_id <= $ev_submission_id_end ";
						}
						else if($ev_submission_id_start > 0)
						{
							$add_sql = " and e_submissions.es_id >= $ev_submission_id_start ";
							$add_sqlvoting = " and evr_submission_id >= $ev_submission_id_start ";
						}
						else if($ev_submission_id_end > 0)
						{
							$add_sql = " and e_submissions.es_id <= $ev_submission_id_end ";
							$add_sqlvoting = " and evr_submission_id <= $ev_submission_id_end ";
						}


						/// es_state = 1 and !? stimmt das


						$totalSubmissions 	= intval(dbx::queryAttribute("select count(es_id) as cntx from e_submissions where es_mediaType_id = $es_mediaType_id and es_submission_type = $ev_magazine_type_id $add_sql","cntx"));
						$votedUnique		= intval(dbx::queryAttribute("select count(distinct(es_id)) as cntx from e_submissions,e_voting_results where es_mediaType_id = $es_mediaType_id and es_submission_type = $ev_magazine_type_id $add_sql and  evr_ev_id = $ev_id and evr_step = $evr_step and es_id = evr_submission_id","cntx"));

						$sql_data = "SELECT

						e_voting_users.evu_id,
						e_voting_users.evu_email,
						e_voting_users.evu_name,
						
						concat('$totalSubmissions') 		as total,
						evr_voting_user_id 					as uid,
						sum(evr_vote='0') 					as dissed, 
						sum(evr_vote='1') 					as liked, 
						($totalSubmissions-count(evr_id)) 	as nv2,
						($totalSubmissions-$votedUnique) 	as nv
						
						FROM e_voting_results,e_voting_users,e_voting_users2voting WHERE evr_ev_id = $ev_id and evr_step = $evr_step and evu_id = evr_voting_user_id 
						and evtu_ev_id = evr_ev_id and evtu_step = evr_step and evtu_evu_id = evu_id
						$add_sqlvoting
						
						group by `evr_voting_user_id`
						ORDER BY `evr_voting_user_id` DESC";

						$sql_cnt = "SELECT count(evr_id) as sql_cnt FROM `e_voting_results` WHERE evr_ev_id = $ev_id and evr_step = $evr_step $add_sqlvoting group by evr_voting_user_id";

						break;
				}




				xluerzer_db::uniqueDataGridWrapper(array(
				'sql_data' 	=> $sql_data,
				'sql_cnt' 	=> $sql_cnt,
				));

				break;



			case 'voting_detailed':


				$evr_step = intval($_REQUEST['evr_step']);
				if ($evr_step == 0) die("X0");

				$ev_id = intval($_REQUEST['ev_id']);
				$voting = dbx::query("select * from e_voting where ev_id = $ev_id");
				if ($voting === false) die('X1');

				$ev_submission_id_start = intval($voting['ev_submission_id_start']);
				if ($ev_submission_id_start == 0) die("X2");

				$ev_type = intval($voting['ev_type']);
				if ($ev_type == 0) die("X3");

				$sort = json_decode($_REQUEST['sort'],true);
				$sort_field = dbx::escape($sort[0]['property']);
				$sort_dir 	= dbx::escape($sort[0]['direction']);


				if (!in_array($sort_field,array('count','votes')))
				{
					$sort_field = "votes";
					$sort_dir = "desc";
				}

				$ev_final_vote_mode = intval($voting['ev_final_vote_mode']);

				if (($ev_final_vote_mode == 1) && ($evr_step == 2))
				{
					$extra = " 1 " ;
				} else
				{
					$extra = " evr_step=$evr_step ";
				}

				$sql_data = "select count(votes) as count, votes from
(select count(evr_id) as votes, evr_submission_id  from e_voting_results where $extra and (evr_vote=1 or evr_vote=2) and evr_ev_id=$ev_id group by evr_submission_id) t 
group by votes
order by $sort_field $sort_dir
				";


				//die(print_r($sql_data));

				$root = dbx::queryAll($sql_data);

				foreach ($root as $i => $t)
				{


					$votes 		= intval($t['votes']);
					$submitter 	= dbx::queryAttribute("select count(distinct(es_submittedBy)) as cntx

from e_submissions , (
select count(evr_id) as votes, evr_submission_id  
from e_voting_results 
where $extra and evr_vote=1 and evr_ev_id=$ev_id 

group by evr_submission_id ORDER BY `votes`  DESC

) t where t.votes = $votes and t.evr_submission_id = es_id
","cntx");




					$countries 	= dbx::queryAttribute("select count(distinct(es_country_id)) as countries

from e_submissions , (
select count(evr_id) as votes, evr_submission_id  
from e_voting_results 
where $extra and evr_vote=1 and evr_ev_id=$ev_id 

group by evr_submission_id ORDER BY `votes`  DESC

) t where t.votes = $votes and t.evr_submission_id = es_id
",'countries');


					// , (select group_concat(asc_name) from a_shop_country where asc_id = es_country_id)

					$countries_names 	= dbx::queryAttribute("select group_concat(distinct(asc_name)) as countries

from e_submissions , a_shop_country, (
select count(evr_id) as votes, evr_submission_id  
from e_voting_results 
where $extra and evr_vote=1 and evr_ev_id=$ev_id 

group by evr_submission_id ORDER BY `votes`  DESC

) t where t.votes = $votes and t.evr_submission_id = es_id and asc_id = es_country_id
",'countries');


					$root[$i]['submitter'] 		 = intval($submitter);
					$root[$i]['countries']		 = $countries;
					$root[$i]['countries_names'] = $countries_names;
				}


				$data = array(
				'root'			=> $root,
				'totalCount' 	=> count($root)
				);


				frontcontrollerx::json_success($data);


				die('x');


				xluerzer_db::uniqueDataGridWrapper(array(
				'sql_data' 	=> $sql_data,
				'sql_cnt' 	=> $sql_cnt,
				));





				die();

				break;


			case 'voting_detailed2':


				$evr_step = intval($_REQUEST['evr_step']);
				if ($evr_step == 0)
				{
					$evr_step = 1;
				}


				$evr_id = intval($_REQUEST['evr_id']);
				if ($evr_id == 0) die('x');

				$settings = dbx::query("select * from e_voting_report where evr_id = $evr_id ");

				$whichDb = 1;
				switch ($settings['evr_type'])
				{
					case 'PRINT':
						$ev_id = 1;
						break;
					case 'VIDEO':
						$ev_id = 2;
						break;
					case 'STUDENT':
						$ev_id = 3;
						$whichDb = 2;
						break;
					default: die("evr_type?");
				}


				$voting = dbx::query("select * from e_voting where ev_id = $ev_id");
				if ($voting === false) die('X1');

				$ev_submission_id_start = intval($settings['evr_submission_id_start']);
				$ev_submission_id_stop	= intval($settings['evr_submission_id_stop']);


				$ev_type = intval($voting['ev_type']);
				if ($ev_type == 0) die("X3");

				$sort = json_decode($_REQUEST['sort'],true);
				$sort_field = dbx::escape($sort[0]['property']);
				$sort_dir 	= dbx::escape($sort[0]['direction']);


				if (!in_array($sort_field,array('count','votes')))
				{
					$sort_field = "votes";
					$sort_dir = "desc";
				}

				$extra = " evr_step=$evr_step ";

				$sql_data = "select count(votes) as count, votes from
(select count(evr_id) as votes, evr_submission_id  from e_voting_results where $extra and evr_vote=1 and evr_ev_id=$ev_id and evr_submission_id >= $ev_submission_id_start and evr_submission_id <= $ev_submission_id_stop group by evr_submission_id) t 
group by votes
order by $sort_field $sort_dir
				";


				$root = dbx::queryAll($sql_data);



				switch ($whichDb)
				{

					case 2:



						foreach ($root as $i => $t)
						{
							$votes 		= intval($t['votes']);
							$submitter 	= dbx::queryAttribute("select count(distinct(ess_submittedBy)) as cntx

from e_submissions_students , (
select count(evr_id) as votes, evr_submission_id  
from e_voting_results 
where $extra and evr_vote=1 and evr_ev_id=$ev_id 

group by evr_submission_id ORDER BY `votes`  DESC

) t where t.votes = $votes and t.evr_submission_id = ess_id
","cntx");

							$countries 	= dbx::queryAttribute("select count(distinct(ess_country_id)) as countries

from e_submissions_students , (
select count(evr_id) as votes, evr_submission_id  
from e_voting_results 
where $extra and evr_vote=1 and evr_ev_id=$ev_id 

group by evr_submission_id ORDER BY `votes`  DESC

) t where t.votes = $votes and t.evr_submission_id = ess_id
",'countries');


							// , (select group_concat(asc_name) from a_shop_country where asc_id = es_country_id)

							$countries_names 	= dbx::queryAttribute("select group_concat(distinct(asc_name)) as countries

from e_submissions_students , a_shop_country, (
select count(evr_id) as votes, evr_submission_id  
from e_voting_results 
where $extra and evr_vote=1 and evr_ev_id=$ev_id 

group by evr_submission_id ORDER BY `votes`  DESC

) t where t.votes = $votes and t.evr_submission_id = ess_id and asc_id = ess_country_id
",'countries');


							$root[$i]['submitter'] 		 = intval($submitter);
							$root[$i]['countries']		 = $countries;
							$root[$i]['countries_names'] = $countries_names;

						}



						break;

					default:


						foreach ($root as $i => $t)
						{
							$votes 		= intval($t['votes']);
							$submitter 	= dbx::queryAttribute("select count(distinct(es_submittedBy)) as cntx

from e_submissions , (
select count(evr_id) as votes, evr_submission_id  
from e_voting_results 
where $extra and evr_vote=1 and evr_ev_id=$ev_id 

group by evr_submission_id ORDER BY `votes`  DESC

) t where t.votes = $votes and t.evr_submission_id = es_id
","cntx");

							$countries 	= dbx::queryAttribute("select count(distinct(es_country_id)) as countries

from e_submissions , (
select count(evr_id) as votes, evr_submission_id  
from e_voting_results 
where $extra and evr_vote=1 and evr_ev_id=$ev_id 

group by evr_submission_id ORDER BY `votes`  DESC

) t where t.votes = $votes and t.evr_submission_id = es_id
",'countries');


							// , (select group_concat(asc_name) from a_shop_country where asc_id = es_country_id)

							$countries_names 	= dbx::queryAttribute("select group_concat(distinct(asc_name)) as countries

from e_submissions , a_shop_country, (
select count(evr_id) as votes, evr_submission_id  
from e_voting_results 
where $extra and evr_vote=1 and evr_ev_id=$ev_id 

group by evr_submission_id ORDER BY `votes`  DESC

) t where t.votes = $votes and t.evr_submission_id = es_id and asc_id = es_country_id
",'countries');


							$root[$i]['submitter'] 		 = intval($submitter);
							$root[$i]['countries']		 = $countries;
							$root[$i]['countries_names'] = $countries_names;

						}

						break;
				}




				$data = array(
				'root'			=> $root,
				'totalCount' 	=> count($root)
				);


				frontcontrollerx::json_success($data);


				die('x');


				xluerzer_db::uniqueDataGridWrapper(array(
				'sql_data' 	=> $sql_data,
				'sql_cnt' 	=> $sql_cnt,
				));





				die();

				break;


			case 'voting_countrys':


				$evr_step = intval($_REQUEST['evr_step']);
				if ($evr_step == 0) die("X0");

				$ev_id = intval($_REQUEST['ev_id']);
				$voting = dbx::query("select * from e_voting where ev_id = $ev_id");
				if ($voting === false) die('X1');

				$ev_submission_id_start = intval($voting['ev_submission_id_start']);
				if ($ev_submission_id_start == 0) die("X2");

				$ev_type = intval($voting['ev_type']);
				if ($ev_type == 0) die("X3");

				$sort = json_decode($_REQUEST['sort'],true);
				$sort_field = dbx::escape($sort[0]['property']);
				$sort_dir 	= dbx::escape($sort[0]['direction']);


				if (!in_array($sort_field,array('count','votes')))
				{
					$sort_field = "votes";
					$sort_dir = "desc";
				}

				$ev_final_vote_mode = intval($voting['ev_final_vote_mode']);

				if (($ev_final_vote_mode == 1) && ($evr_step == 2))
				{
					$extra = "" ;
				} else
				{
					$extra = " evr_step=$evr_step and ";
				}



				$sql_data = "select es_country_id, count(es_id) as count, asc_name, count(distinct(es_submittedBy)) as submitter

from e_submissions , e_voting_results, a_shop_country 
where $extra evr_vote=1 and evr_ev_id=$ev_id  and evr_submission_id = es_id and asc_id = es_country_id
group by es_country_id 
order by count desc, asc_name asc
";

				$root = dbx::queryAll($sql_data);
				$data = array(
				'root'			=> $root,
				'totalCount' 	=> count($root)
				);


				frontcontrollerx::json_success($data);

				die();

				break;

			case 'voting_countrys2':


				$evr_step = intval($_REQUEST['evr_step']);
				if ($evr_step == 0)
				{
					$evr_step = 1;
				}


				$evr_id = intval($_REQUEST['evr_id']);
				if ($evr_id == 0) die('x');

				$settings = dbx::query("select * from e_voting_report where evr_id = $evr_id ");


				$whichDb = 1;

				switch ($settings['evr_type'])
				{
					case 'PRINT':
						$ev_id = 1;
						break;
					case 'VIDEO':
						$ev_id = 2;
						break;
					case 'STUDENT':
						$ev_id = 3;
						$whichDb = 2;
						break;
					default: die("evr_type?");
				}



				$voting = dbx::query("select * from e_voting where ev_id = $ev_id");
				if ($voting === false) die('X1');

				$ev_submission_id_start = intval($settings['evr_submission_id_start']);
				$ev_submission_id_stop	= intval($settings['evr_submission_id_stop']);

				$ev_type = intval($voting['ev_type']);
				if ($ev_type == 0) die("X3");

				$sort = json_decode($_REQUEST['sort'],true);
				$sort_field = dbx::escape($sort[0]['property']);
				$sort_dir 	= dbx::escape($sort[0]['direction']);


				if (!in_array($sort_field,array('count','votes')))
				{
					$sort_field = "votes";
					$sort_dir = "desc";
				}

				$ev_final_vote_mode = intval($voting['ev_final_vote_mode']);

				if (($ev_final_vote_mode == 1) && ($evr_step == 2))
				{
					$extra = "" ;
				} else
				{
					$extra = " evr_step=$evr_step and ";
				}


				switch ($whichDb)
				{

					case 2:
						$sql_data = "select ess_country_id, count(ess_id) as count, asc_name, count(distinct(ess_submittedBy)) as submitter

from e_submissions_students , e_voting_results, a_shop_country 
where $extra evr_vote=1 and evr_ev_id=$ev_id  and evr_submission_id = ess_id and asc_id = ess_country_id and ess_id >= $ev_submission_id_start and ess_id <= $ev_submission_id_stop
group by ess_country_id 
order by count desc
";
						break;

					default:
						$sql_data = "select es_country_id, count(es_id) as count, asc_name, count(distinct(es_submittedBy)) as submitter

from e_submissions , e_voting_results, a_shop_country 
where $extra evr_vote=1 and evr_ev_id=$ev_id  and evr_submission_id = es_id and asc_id = es_country_id and es_id >= $ev_submission_id_start and es_id <= $ev_submission_id_stop
group by es_country_id 
order by count desc
";
						break;
				}


				$root = dbx::queryAll($sql_data);
				$data = array(
				'root'			=> $root,
				'totalCount' 	=> count($root)
				);


				frontcontrollerx::json_success($data);

				die();

				break;

			case 'voting_reporting_by_submissions':


				$evr_step = intval($_REQUEST['evr_step']);
				if ($evr_step == 0) die("X0");

				$ev_id = intval($_REQUEST['ev_id']);
				$voting = dbx::query("select * from e_voting where ev_id = $ev_id");
				if ($voting === false) die('X1');

				$ev_magazine_id 		= intval($voting['ev_magazine_id']);
				$ev_magazine_type_id 	= intval($voting['ev_magazine_type_id']);
				$ev_final_vote_mode		= intval($voting['ev_final_vote_mode']);

				if ($ev_magazine_id == 0) die("X2");

				$ev_type = intval($voting['ev_type']);
				if ($ev_type == 0) die("X3");

				switch ($ev_type)
				{
					case '1': // PRINT
					$es_mediaType_id = "1";
					break;
					case '2': // VIDEO
					$es_mediaType_id = "2";
					break;
					case '3': // SPECIAL
					$es_mediaType_id = "1";
					break;
					case '4': // STUDENT
					die('X5');
					break;
					default: die("X4");
				}


				$users = dbx::queryAll("select * from e_voting_users2voting,e_voting_users where evtu_evu_id = evu_id and evu_del='N' and evtu_step = $evr_step and evtu_ev_id = $ev_id");

				$SELECTORS_GRANDISIMUSS = array();
				$keys = array();
				$keys2 = array();

				foreach ($users as $u) {
					$evu_id = $u['evu_id'];
					$key 	= 'user_info_'.$evu_id;
					$keys[] = "$key IS NOT NULL ";
					$keys2[] = $key;
					$SELECTORS_GRANDISIMUSS[] = " (select concat(evr_vote,'|',evr_modified_ts) from e_voting_results where evr_ev_id = $ev_id and evr_step = $evr_step and evr_voting_user_id = $evu_id and evr_submission_id = es_id) as $key ";
				}

				$SELECTORS_GRANDISIMUSS = implode(",",$SELECTORS_GRANDISIMUSS);
				$keys = implode(" OR ",$keys);
				$keys2 = implode(" , ",$keys2);

				/*
				$sql_data = "SELECT $keys2,evr_submission_id,es_id,es_magazine_id,es_submittedBy,es_created_ts FROM (SELECT

				$SELECTORS_GRANDISIMUSS,

				es_id as evr_submission_id,es_id,es_magazine_id,es_submittedBy,es_created_ts
				FROM e_submissions WHERE  es_mediaType_id = $es_mediaType_id and es_magazine_id = $ev_magazine_id
				) as subbi where $keys

				";

				$sql_cnt = "SELECT count(*) as sql_cnt FROM (SELECT

				$SELECTORS_GRANDISIMUSS,

				es_id as evr_submission_id,es_id,es_magazine_id,es_submittedBy,es_created_ts
				FROM e_submissions WHERE  es_mediaType_id = $es_mediaType_id and es_magazine_id = $ev_magazine_id
				) as subbi where $keys

				";
				*/

				if($evr_step == 2 && $ev_final_vote_mode == 1)
				{
					$sql_data = "SELECT (select sum(evr_vote) from e_voting_results where evr_ev_id = $ev_id and evr_submission_id = es_id) as votes_cnt,
				
						$keys2,evr_submission_id,es_id,es_magazine_id,es_submittedBy,es_created_ts FROM (SELECT
	
						$SELECTORS_GRANDISIMUSS,
								
						es_id as evr_submission_id,es_id,es_magazine_id,es_submittedBy,es_created_ts
						FROM e_submissions WHERE  es_mediaType_id = $es_mediaType_id and es_submission_type = $ev_magazine_type_id 
						) as subbi where $keys
							
					";
				}
				else
				{
					$sql_data = "SELECT (select sum(evr_vote) from e_voting_results where evr_ev_id = $ev_id and evr_step = $evr_step and evr_submission_id = es_id) as votes_cnt,
				
						$keys2,evr_submission_id,es_id,es_magazine_id,es_submittedBy,es_created_ts FROM (SELECT
	
						$SELECTORS_GRANDISIMUSS,
								
						es_id as evr_submission_id,es_id,es_magazine_id,es_submittedBy,es_created_ts
						FROM e_submissions WHERE  es_mediaType_id = $es_mediaType_id and es_submission_type = $ev_magazine_type_id 
						) as subbi where $keys
							
					";
				}

				$sql_cnt = "SELECT count(*) as sql_cnt FROM (SELECT

					$SELECTORS_GRANDISIMUSS,
							
					es_id as evr_submission_id,es_id,es_magazine_id,es_submittedBy,es_created_ts
					FROM e_submissions WHERE  es_mediaType_id = $es_mediaType_id and es_submission_type = $ev_magazine_type_id 
					) as subbi where $keys
						
				";


				xluerzer_db::uniqueDataGridWrapper(array(
				'sql_data' 	=> $sql_data,
				'sql_cnt' 	=> $sql_cnt,
				));

				break;

			case 'voting_reporting_by_submissions2':


				$evr_step = intval($_REQUEST['evr_step']);
				if ($evr_step == 0)
				{
					$evr_step = 1;
				}




				$evr_id = intval($_REQUEST['evr_id']);
				if ($evr_id == 0) die('x');

				$settings = dbx::query("select * from e_voting_report where evr_id = $evr_id ");


				switch ($settings['evr_type'])
				{
					case 'PRINT':
						$ev_id = 1;
						break;
					case 'VIDEO':
						$ev_id = 2;
						break;
					case 'STUDENT':
						$ev_id = 3;
						break;
					default: die("evr_type?");
				}


				$ev_submission_id_start = intval($settings['evr_submission_id_start']);
				$ev_submission_id_stop	= intval($settings['evr_submission_id_stop']);

				$voting = dbx::query("select * from e_voting where ev_id = $ev_id");
				if ($voting === false) die('X1');

				$ev_magazine_id 		= intval($voting['ev_magazine_id']);
				$ev_magazine_type_id 	= intval($voting['ev_magazine_type_id']);
				$ev_final_vote_mode		= intval($voting['ev_final_vote_mode']);

				$ev_type = intval($voting['ev_type']);
				if ($ev_type == 0) die("X3");




				$whichDb = 1;

				switch ($ev_type)
				{
					case '1': // PRINT
					$ev_magazine_type_id = 1;
					$es_mediaType_id = "1";
					break;
					case '2': // VIDEO
					$ev_magazine_type_id = 12;
					$es_mediaType_id = "2";
					break;
					case '3': // SPECIAL
					$es_mediaType_id = "1";
					break;
					case '4': // STUDENT
					$whichDb = 2;
					break;
					default: die("X4");
				}


				switch ($whichDb)
				{
					case 2:

						$users = dbx::queryAll("select * from e_voting_users2voting,e_voting_users where evtu_evu_id = evu_id and evu_del='N' and evtu_step = $evr_step and evtu_ev_id = $ev_id");


						$SELECTORS_GRANDISIMUSS = array();
						$keys = array();
						$keys2 = array();

						foreach ($users as $u) {
							$evu_id = $u['evu_id'];
							$key 	= 'user_info_'.$evu_id;
							$keys[] = "$key IS NOT NULL ";
							$keys2[] = $key;
							$SELECTORS_GRANDISIMUSS[] = " (select concat(evr_vote,'|',evr_modified_ts) from e_voting_results where evr_ev_id = $ev_id and evr_step = $evr_step and evr_voting_user_id = $evu_id and evr_submission_id = ess_id and ess_id >= $ev_submission_id_start and ess_id <= $ev_submission_id_stop) as $key ";
						}

						$SELECTORS_GRANDISIMUSS = implode(",",$SELECTORS_GRANDISIMUSS);
						$keys = implode(" OR ",$keys);
						$keys2 = implode(" , ",$keys2);




						$sql_data = "SELECT (select sum(evr_vote) from e_voting_results where evr_ev_id = $ev_id and evr_step = $evr_step and evr_submission_id = ess_id and ess_id >= $ev_submission_id_start and ess_id <= $ev_submission_id_stop ) as votes_cnt,
				
						$keys2,evr_submission_id,ess_id,ess_magazine_id,ess_submittedBy,ess_created_ts FROM (SELECT
	
						$SELECTORS_GRANDISIMUSS,
								
						ess_id as evr_submission_id,ess_id,ess_magazine_id,ess_submittedBy,ess_created_ts
						FROM e_submissions_students WHERE   ess_id >= $ev_submission_id_start and ess_id <= $ev_submission_id_stop
						) as subbi where $keys
							
					";

						$sql_cnt = "SELECT count(*) as sql_cnt FROM (SELECT

					$SELECTORS_GRANDISIMUSS,
							
					ess_id as evr_submission_id,ess_id,ess_magazine_id,ess_submittedBy,ess_created_ts
					FROM e_submissions_students WHERE   ess_id >= $ev_submission_id_start and ess_id <= $ev_submission_id_stop
					) as subbi where $keys
						
				";

						break;
					default:
						$users = dbx::queryAll("select * from e_voting_users2voting,e_voting_users where evtu_evu_id = evu_id and evu_del='N' and evtu_step = $evr_step and evtu_ev_id = $ev_id");

						$SELECTORS_GRANDISIMUSS = array();
						$keys = array();
						$keys2 = array();

						foreach ($users as $u) {
							$evu_id = $u['evu_id'];
							$key 	= 'user_info_'.$evu_id;
							$keys[] = "$key IS NOT NULL ";
							$keys2[] = $key;
							$SELECTORS_GRANDISIMUSS[] = " (select concat(evr_vote,'|',evr_modified_ts) from e_voting_results where evr_ev_id = $ev_id and evr_step = $evr_step and evr_voting_user_id = $evu_id and evr_submission_id = es_id and es_id >= $ev_submission_id_start and es_id <= $ev_submission_id_stop) as $key ";
						}

						$SELECTORS_GRANDISIMUSS = implode(",",$SELECTORS_GRANDISIMUSS);
						$keys = implode(" OR ",$keys);
						$keys2 = implode(" , ",$keys2);



						$sql_data = "SELECT (select sum(evr_vote) from e_voting_results where evr_ev_id = $ev_id and evr_step = $evr_step and evr_submission_id = es_id and es_id >= $ev_submission_id_start and es_id <= $ev_submission_id_stop ) as votes_cnt,
				
						$keys2,evr_submission_id,es_id,es_magazine_id,es_submittedBy,es_created_ts FROM (SELECT
	
						$SELECTORS_GRANDISIMUSS,
								
						es_id as evr_submission_id,es_id,es_magazine_id,es_submittedBy,es_created_ts
						FROM e_submissions WHERE  es_mediaType_id = $es_mediaType_id and es_submission_type = $ev_magazine_type_id  and es_id >= $ev_submission_id_start and es_id <= $ev_submission_id_stop
						) as subbi where $keys
							
					";

						$sql_cnt = "SELECT count(*) as sql_cnt FROM (SELECT

					$SELECTORS_GRANDISIMUSS,
							
					es_id as evr_submission_id,es_id,es_magazine_id,es_submittedBy,es_created_ts
					FROM e_submissions WHERE  es_mediaType_id = $es_mediaType_id and es_submission_type = $ev_magazine_type_id  and es_id >= $ev_submission_id_start and es_id <= $ev_submission_id_stop
					) as subbi where $keys
						
				";
						break;

				}




				xluerzer_db::uniqueDataGridWrapper(array(
				'sql_data' 	=> $sql_data,
				'sql_cnt' 	=> $sql_cnt,
				));

				break;

			default: break;

		}


		switch ($function)
		{
			case 'close_step_x':
				$ev_id 	= intval($_REQUEST['ev_id']);
				$step 	= intval($_REQUEST['step']);

				
				
				
				switch ($step) {
					case 1:
					
						$ev = dbx::query("select * from e_voting where ev_id = $ev_id");
						if ($ev === false) die('X1');
						
						
						$ev_x1_active = intval($ev['ev_x1_active']);						
						if($ev_x1_active == 0) break;

						$ev_magazine_type_id 	= intval($ev['ev_magazine_type_id']);
						if ($ev_magazine_type_id == 0) die("X2");

						$ev_type = intval($ev['ev_type']);
						if ($ev_type == 0) die("X3");

						$ev_submission_id_start 	= intval($ev['ev_submission_id_start']);
						$ev_submission_id_end 	= intval($ev['ev_submission_id_end']);

						
						
						
						switch ($ev_type)
						{
							case '1': // PRINT
							$es_mediaType_id = "1";
							break;
							case '2': // VIDEO
							$es_mediaType_id = "2";
							break;
							case '3': // SPECIAL
							$es_mediaType_id = "1";
							break;
							case '4': // STUDENT
							die('X5');
							break;
							default: die("X4");
						}


						$add_sql = "";

						if($ev_submission_id_start > 0 && $ev_submission_id_end > 0)
						{
							$add_sql = " and e_submissions.es_id >= $ev_submission_id_start AND e_submissions.es_id <= $ev_submission_id_end ";
						}
						else if($ev_submission_id_start > 0)
						{
							$add_sql = " and e_submissions.es_id >= $ev_submission_id_start ";
						}
						else if($ev_submission_id_end > 0)
						{
							$add_sql = " and e_submissions.es_id <= $ev_submission_id_end ";
						}

						$all_not_voted = dbx::queryAll("select es_id from e_submissions where es_mediaType_id = $es_mediaType_id and es_submission_type = $ev_magazine_type_id $add_sql
														and es_id not in (select evr_submission_id from e_voting_results where evr_step=1 and evr_ev_id=$ev_id)");

						if($all_not_voted === false) $all_not_voted = array();

						foreach ($all_not_voted as $key => $value) {
							$evss_submission_id = intval($value['es_id']);

							dbx::update('e_submissions',array('es_state'=>7),array('es_id'=>$evss_submission_id));
						}

						/*
						$all_discarded_votes = dbx::queryAll("select evr_submission_id from

						(select sum(evr_vote) as discard_votes, evr_submission_id  from e_voting_results where evr_step=1 and evr_ev_id=$ev_id group by evr_submission_id) t

						where t.discard_votes = 0");

						if($all_discarded_votes === false) $all_discarded_votes = array();

						foreach ($all_discarded_votes as $key => $value) {
						$evss_submission_id = intval($value['evr_submission_id']);

						dbx::update('e_submissions',array('es_state'=>7),array('es_id'=>$evss_submission_id));
						}
						*/

						$ev_vote_limit_first_step = intval($ev['ev_vote_limit_first_step']);
						
						
						if($ev_vote_limit_first_step > 0)
						{
							$sql_data = "select evr_submission_id from

							(select count(evr_id) as votes, evr_submission_id  from e_voting_results where evr_step=1 and evr_vote=1 and evr_ev_id=$ev_id group by evr_submission_id) t 
							
							where t.votes < $ev_vote_limit_first_step
													
											";

							$data = dbx::queryAll($sql_data);

							if($data === false) $data = array();

							foreach ($data as $key => $value) {
								$evss_submission_id = intval($value['evr_submission_id']);

								dbx::update('e_submissions',array('es_state'=>7),array('es_id'=>$evss_submission_id));
							}
						}

						dbx::update('e_voting',array('ev_x1_active'=>1),array('ev_id'=>$ev_id,'ev_x1_active'=>0));

						break;
					case 2:
						$ev = dbx::query("select * from e_voting where ev_id = $ev_id");
						if ($ev === false) die('X1');

						$ev_x2_active = intval($ev['ev_x2_active']);
						if($ev_x2_active == 1) break;

						$ev_magazine_type_id 	= intval($ev['ev_magazine_type_id']);
						if ($ev_magazine_type_id == 0) die("X2");

						$ev_type = intval($ev['ev_type']);
						if ($ev_type == 0) die("X3");

						$ev_submission_id_start 	= intval($ev['ev_submission_id_start']);
						$ev_submission_id_end 	= intval($ev['ev_submission_id_end']);

						switch ($ev_type)
						{
							case '1': // PRINT
							$es_mediaType_id = "1";
							break;
							case '2': // VIDEO
							$es_mediaType_id = "2";
							break;
							case '3': // SPECIAL
							$es_mediaType_id = "1";
							break;
							case '4': // STUDENT
							die('X5');
							break;
							default: die("X4");
						}

						$add_sql = "";

						if($ev_submission_id_start > 0 && $ev_submission_id_end > 0)
						{
							$add_sql = " and e_submissions.es_id >= $ev_submission_id_start AND e_submissions.es_id <= $ev_submission_id_end ";
						}
						else if($ev_submission_id_start > 0)
						{
							$add_sql = " and e_submissions.es_id >= $ev_submission_id_start ";
						}
						else if($ev_submission_id_end > 0)
						{
							$add_sql = " and e_submissions.es_id <= $ev_submission_id_end ";
						}

						$all_not_voted = dbx::queryAll("select es_id from e_submissions where es_mediaType_id = $es_mediaType_id and es_submission_type = $ev_magazine_type_id $add_sql and
														es_id not in (select evr_submission_id from e_voting_results where evr_step=2 and evr_ev_id=$ev_id)");

						if($all_not_voted === false) $all_not_voted = array();

						foreach ($all_not_voted as $key => $value) {
							$evss_submission_id = intval($value['es_id']);

							dbx::update('e_submissions',array('es_state'=>7),array('es_id'=>$evss_submission_id));
						}

						$ev_vote_limit_second_step = intval($ev['ev_vote_limit_second_step']);

						if($ev_vote_limit_second_step > 0)
						{

							$sql_data = "select evr_submission_id from

							(select count(evr_id) as votes, evr_submission_id  from e_voting_results  where evr_step=2 and evr_vote=1 and evr_ev_id=$ev_id group by evr_submission_id) t 
							
							where t.votes < $ev_vote_limit_second_step
													
											";


							$data = dbx::queryAll($sql_data);

							if($data === false) $data = array();

							foreach ($data as $key => $value) {
								$evss_submission_id = intval($value['evr_submission_id']);

								dbx::update('e_submissions',array('es_state'=>7),array('es_id'=>$evss_submission_id));

							}

							dbx::update('e_voting',array('ev_active'=>2,'ev_x2_active'=>1),array('ev_id'=>$ev_id));

						}
						break;
					default:
						break;

				}


				frontcontrollerx::json_success();
				break;
			case 'processLimit':

				$ev_id = intval($_REQUEST['ev_id']);
				$step = intval($_REQUEST['step']);
				$limit = intval($_REQUEST['limit']);

				switch ($step) {
					case 1:
						if($limit == 0) break;

						$ev = dbx::query("select * from e_voting where ev_id = $ev_id");

						$ev_x1_active = intval($ev['ev_x1_active']);

						if($ev_x1_active == 1) break;
						

						dbx::update('e_voting',array('ev_vote_limit_first_step'=>$limit),array('ev_id'=>$ev_id,'ev_x1_active'=>0));
						$ev = dbx::query("select * from e_voting where ev_id = $ev_id");
						
						
						$ev_vote_limit_first_step = intval($ev['ev_vote_limit_first_step']);

						if($ev_vote_limit_first_step > 0)
						{
							dbx::query("delete from e_voting_second_step where evss_ev_id = $ev_id");

							$sql_data = "select evr_submission_id from

							(select count(evr_id) as votes, evr_submission_id  from e_voting_results where evr_step=1 and evr_vote=1 and evr_ev_id=$ev_id group by evr_submission_id) t 
							
							where t.votes >= $ev_vote_limit_first_step
													
											";

							$data = dbx::queryAll($sql_data);
							
							
							if($data === false) $data = array();

							foreach ($data as $key => $value) {
								$evss_submission_id = intval($value['evr_submission_id']);

								$present = dbx::query("select * from e_voting_second_step where evss_submission_id = $evss_submission_id and evss_ev_id	= $ev_id");

					
								if($present === false)
								{
									$db = array(
									'evss_submission_id'=> $evss_submission_id,
									'evss_ev_id'		=> $ev_id
									);


									dbx::insert('e_voting_second_step',$db);
									
									
									
								}
							}

						}

						break;
					case 2:
					
					
						if($limit == 0) break;
						

						$ev = dbx::query("select * from e_voting where ev_id = $ev_id");
						
						$ev_x1_active = intval($ev['ev_x1_active']);
						$ev_x2_active = intval($ev['ev_x2_active']);
						
						if($ev_x1_active == 0) break;
						if($ev_x2_active == 1) break;
						
						
						dbx::update('e_voting',array('ev_vote_limit_second_step'=>$limit),array('ev_id'=>$ev_id,'ev_x2_active'=>0));
						$ev = dbx::query("select * from e_voting where ev_id = $ev_id");

						$ev_vote_limit_second_step = intval($ev['ev_vote_limit_second_step']);
						$ev_final_vote_mode = intval($ev['ev_final_vote_mode']);

							
						
						if($ev_vote_limit_second_step > 0)
						{
							if($ev_final_vote_mode == 1)
							{
								$sql_data = "select evr_submission_id from

								(select count(evr_id) as votes, evr_submission_id  from e_voting_results where evr_vote=1 and evr_ev_id=$ev_id group by evr_submission_id) t 
								
								where t.votes >= $ev_vote_limit_second_step
														
												";
							}
							else
							{
								$sql_data = "select evr_submission_id from

								(select count(evr_id) as votes, evr_submission_id  from e_voting_results where evr_step=2 and evr_vote=1 and evr_ev_id=$ev_id group by evr_submission_id) t 
								
								where t.votes >= $ev_vote_limit_second_step
														
												";
							}

							$data = dbx::queryAll($sql_data);

							if($data === false) $data = array();

							foreach ($data as $key => $value) {
								$evss_submission_id = intval($value['evr_submission_id']);

								dbx::update('e_submissions',array('es_state'=>4),array('es_id'=>$evss_submission_id));

							}
							
						}
						break;

					default:

						break;
				}

				frontcontrollerx::json_success();

				break;


			case 'genTestData':

				die("xxx");

				dbx::query("update `e_submissions` set es_state = 7 WHERE  `es_magazine_id` = 162 and es_state = 1");
				dbx::query("update `e_submissions` set es_state = 7 WHERE  `es_magazine_id` = 162 and es_state = 4");
				dbx::query("update `e_submissions` set es_state = 7 WHERE  `es_magazine_id` = 162 and es_state = 5");
				dbx::query("update `e_submissions` set es_state = 1 WHERE  `es_magazine_id` = 162 and es_image_s_id > 0 ORDER BY RAND() limit 200");

				dbx::query("truncate table e_voting_results");
				dbx::query("truncate table e_voting_second_step");
				dbx::query("truncate table e_voting_second_step_accept");
				dbx::query("truncate table e_voting_second_step_reject");
				dbx::query("update e_voting set ev_vote_limit_first_step = 0, ev_vote_limit_second_step = 0, ev_x1_active = 0, ev_x2_active = 0, ev_final_vote_mode = 0 where ev_id = 4");


				#################### FE_USER FIX
				#152
				#162

				$submissions = dbx::queryAll('select `es_email`,es_magazine_id from e_submissions where es_magazine_id IN (152,162) and es_fe_user_id = 0 group by es_email');

				$ids = array();

				foreach ($submissions as $s)
				{
					$es_mail = trim($s['es_email']);

					if($es_mail == '') continue;

					$feu = dbx::query("select feu_id from fe_users where feu_id NOT IN (select es_fe_user_id from e_submissions where es_magazine_id IN (152,162)) ORDER BY RAND() LIMIT 0,1 ");

					$feu_id = intval($feu['feu_id']);



					dbx::query("update e_submissions set es_fe_user_id = $feu_id where es_magazine_id IN (152,162) and es_email = '$es_mail'");
				}

				frontcontrollerx::json_success();
				break;

			case 'voting_users_step_2':
			case 'voting_users_step_1':

				$ev_id = intval($_REQUEST['ev_id']);
				$step = 0;

				switch ($function)
				{
					case 'voting_users_step_2':
						$step = 2;
						break;
					case 'voting_users_step_1':
						$step = 1;
						break;
					default: break;
				}

				$function = 'load';

				$extFunctionsConfig = array(
				'table'				=> 'e_voting_users',
				'sort'				=> 'evu_sort',
				'pid'				=> 'evu_id',
				'fid'				=> 'evu_id',
				'del'				=> 'evu_del',
				'preSelect'			=> " , $ev_id as ev_id, $step as step ",
				'extraInsert'		=> array('evu_created_ts' => 'NOW()'),
				'fields'			=> array('evu_email','evu_password','evu_type','evu_created_ts','evtu_show_details','evtu_permission_x_min_1'),
				'update'			=> array(),
				'postHooks'			=> array('load'=>'xluerzer_voting::postCheck_step'),
				'normalize'	=> array(
				'string'	=> array(),
				'int'		=> array(),
				));

				xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);

				break;


				break;

			case 'loadx':
				$ev_id = intval($_REQUEST['ev_id']);
				if ($ev_id == 0) die('x');

				$data = dbx::query("select * from e_voting where ev_id = $ev_id and ev_del='N'");


				$reports = array(

				'users_1' => dbx::queryAll("select * from e_voting_users2voting,e_voting_users where evtu_evu_id = evu_id and evu_del='N' and evtu_step = 1 and evtu_ev_id = $ev_id"),
				'users_2' => dbx::queryAll("select * from e_voting_users2voting,e_voting_users where evtu_evu_id = evu_id and evu_del='N' and evtu_step = 2 and evtu_ev_id = $ev_id"),


				);


				frontcontrollerx::json_success(array('data'=>$data,'reports'=>$reports));
				break;


			case 'loadx2':
				$evr_id = intval($_REQUEST['evr_id']);
				if ($evr_id == 0) die('x');
				
				$evtu_step = intval($_REQUEST['evr_step']);
				if ($evtu_step== 0) die('x');
				

				$settings = dbx::query("select * from e_voting_report where evr_id = $evr_id ");

				
				switch ($settings['evr_type'])
				{
					case 'PRINT':
						$ev_id = 1;
						break;
					case 'VIDEO':
						$ev_id = 2;
						break;
					case 'STUDENT':
						$ev_id = 3;
						break;
					default: die("evr_type?");
				}


				$data = dbx::query("select * from e_voting where ev_id = $ev_id and ev_del='N'");
				$reports = array(
				'users' => dbx::queryAll("select * from e_voting_users2voting,e_voting_users where evtu_evu_id = evu_id and evu_del='N' and evtu_step = $evtu_step and evtu_ev_id = $ev_id"),
				);


				frontcontrollerx::json_success(array('data'=>$data,'reports'=>$reports));
				break;
			case 'save_check':

				//$checked 	= dbx::query("select evfeu_id from e_voting_fe_users where evfeu_step = $step and evfeu_ev_id = $ev_id and evfeu_feu_id = $feu_id");
				$step 		= intval($_REQUEST['step']);
				$ev_id 		= intval($_REQUEST['ev_id']);
				$user_id 	= intval($_REQUEST['user_id']);
				$state 		= intval($_REQUEST['state']);


				$evtu_show_details			= intval($_REQUEST['evtu_show_details']);
				$evtu_permission_x_min_1	= intval($_REQUEST['evtu_permission_x_min_1']);


				dbx::query("delete from e_voting_users2voting where evtu_step = $step and evtu_ev_id  = $ev_id and evtu_evu_id = $user_id");

				if ($state == '1')
				{
					dbx::insert("e_voting_users2voting",array(evtu_step => $step, evtu_ev_id  => $ev_id, evtu_evu_id => $user_id,'evtu_permission_x_min_1'=>$evtu_permission_x_min_1,'evtu_show_details'=>$evtu_show_details));
				} else {

					if (($evtu_show_details==0)&&($evtu_permission_x_min_1==0)&&($state==0))
					{

					} else {
						frontcontrollerx::json_failure("Please select user first.");
					}
				}


				frontcontrollerx::json_success();

			case 'save_general':

				$ev_id = intval($_REQUEST['ev_id']);
				if ($ev_id == 0) die('x');

				$data = json_decode($_REQUEST['data'],true);
				$db = array();

				foreach ($data as $k => $v)
				{
					if (!dbx::attributePresent('e_voting',$k)) continue;
					$db[$k] = $v;
				}

				dbx::update('e_voting',$db,array('ev_id'=>$ev_id));

				frontcontrollerx::json_success();
				break;

			case 'save_mode':

				$ev_id = intval($_REQUEST['ev_id']);
				if ($ev_id == 0) die('x');

				$db = array('ev_final_vote_mode' => intval($_REQUEST['ev_final_vote_mode']));

				dbx::update('e_voting',$db,array('ev_id'=>$ev_id));

				frontcontrollerx::json_success();
				break;

			case 'voting_results':
				$ev_id = intval($_REQUEST['ev_id']);

				if ($ev_id == 0) die('xx');

				$data = dbx::query("select * from e_voting_results where evr_ev_id = $ev_id and evr_del='N'");
				frontcontrollerx::json_success(array('data'=>$data));
				break;

			default:
				break;
		}


		$extFunctionsConfig = array(
		'table'				=> 'e_voting',
		'sort'				=> 'ev_id',
		'pid'				=> 'ev_id',
		'fid'				=> 'ev_id',
		'del'				=> 'ev_del',
		'name'				=> 'ev_name',
		'preSelect'		=> " , (select em_name from e_magazine where em_id = ev_magazine_id) as em_name ",
		'extraInsert'		=> array('ev_created' => 'NOW()', 'ev_type' => '3'),
		'extraLoad'			=> 'ev_id > 3',
		'fields'			=> array('ev_active','ev_type','ev_magazine_id','ev_date_start','ev_date_end','ev_submission_id_start','ev_submission_id_end','ev_name'),

		'update'			=> array('ev_active','ev_type','ev_magazine_id'),
		'normalize'	=> array(
		'string'	=> array('ev_date_start','ev_date_end','ev_name'),
		'int'		=> array('ev_active','ev_type','ev_magazine_id'),
		));
		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);

		die("handleVotings");

	}



}