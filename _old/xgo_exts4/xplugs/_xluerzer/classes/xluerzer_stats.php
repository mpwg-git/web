<?


class xluerzer_stats
{
	public static function defaultAjaxHandler($function,$param_0)
	{
		switch ($function)
		{
			case 'details':
				self::details();
				break;
			default:
				die('XXX');
		}
	}

	public static function details()
	{

		// PERSONAL SHOW CASE
		$personal = array(
		'total images' 			=> dbx::queryAttribute("select count(fba_id) as cntx from fe_beyond_archive ","cntx"),
		'total showcases'		=> dbx::queryAttribute("select count(feu_id) as cntx from fe_users where feu_e_contact_id != 0","cntx"),
		'connected fe_users'	=> dbx::queryAttribute("select count(feu_id) as cntx from fe_users where feu_e_contact_id != 0","cntx"),
		'total available'		=> dbx::queryAttribute("select count(fep_contact_id) as cntx from fe_profiles","cntx")
		);

		// SUBMISSIONS
		$submissions = array(
		);

		$data = dbx::queryAll("SELECT COUNT( * ) AS cntx, `es_submittedFor` FROM  `e_submissions` GROUP BY  `es_submittedFor` ");
		foreach ($data as $d)
		{
			$submissions[$d['es_submittedFor']] = $d['cntx'];
		}

		// MEDIA
		$media = array(
		);

		$data = dbx::queryAll("SELECT COUNT( * ) AS  `cntx` ,  `eam_type`
		FROM  `e_archive_media` 
		GROUP BY  `eam_type` 
		ORDER BY  `eam_type`
		");

		foreach ($data as $d)
		{
			$t = '?';
			switch ($d['eam_type'])
			{
				case '1': $t = "PRINT"; break;
				case '2': $t = "FILM"; break;
				case '3': $t = "STUDENTS"; break;
				case '4': $t = "WEBSITE"; break;
				case '5': $t = "APP"; break;
				default: break;
			}

			$media[$t] = $d['cntx'];
		}


		// VIDEO ENCODER
		$video_encoder = array();

		$data = dbx::queryAll("SELECT COUNT( * ) AS  `cntx` ,  `ve_type` , ve_state
		FROM  `vid_encoder` 
		GROUP BY  `ve_state` ,  `ve_type` 
		ORDER BY  ve_state,ve_type 
		");

		foreach ($data as $d)
		{
			$k = "<b>".$d['ve_state']."</b> - ".$d['ve_type']."";
			$video_encoder[$k] = $d['cntx'];
		}

		// DOWNLOADER
		$downloader = array();

		$data = dbx::queryAll("SELECT COUNT( * ) AS  `cntx` ,  `d_done` ,  `d_src` ,  `d_error` 
		FROM  `downloader` 
		GROUP BY  `d_src` , d_done
		ORDER BY  `d_src` , d_done
		");

		foreach ($data as $d)
		{
			$k = "<b>".$d['d_src']."</b> - DONE[<b>".$d['d_done']."</b>] - ERROR[<b>".$d['d_error']."</b>]";
			$downloader[$k] = $d['cntx'];
		}

		// CLOUD
		$cloud = array();

		
		$data = dbx::queryAll("SELECT COUNT( * ) AS  `cntx` ,  `eamc_bucket_state` 
		FROM  `e_archive_media_cloud` 
		GROUP BY  `eamc_bucket_state` 
		ORDER BY  `eamc_bucket_state
		");

		foreach ($data as $d)
		{
			$k = "MEDIA : <b>".$d['eamc_bucket_state']."</b>";
			$cloud[$k] = $d['cntx'];
		}
		
		$dir = realpath(dirname(__FILE__).'/../../../../').'/../'; 
		
		// STORAGE
		$storage = array(

		
		'disk usage' 					=> self::getDiskUsage($dir),
		'image cache' 					=> self::getDiskUsage($dir.'/web/archive/_cache'),
		'disk usage' 					=> self::getDiskUsage($dir.'/web'),

		'beyond archive size' 			=> self::getDiskUsage($dir.'/web/archive/beyond_archive'),
		
		'media videos highres' 			=> self::getDiskUsage($dir.'/web/archive/media_old/video_highres'),
		'submission specials highres' 	=> self::getDiskUsage($dir.'/web/archive/submissions/specials/highres'),
		'submission specials lowres' 	=> self::getDiskUsage($dir.'/web/archive/submissions/specials/lowres'),
	
		'submission highres' 			=> self::getDiskUsage($dir.'/web/archive/submissions/specials/highres'),
		'submission lowres' 			=> self::getDiskUsage($dir.'/web/archive/submissions/specials/lowres'),

		);

		$stats = array(
		'Beyond Archive' 				=> $personal,
		'Submissions' 					=> $submissions,
		'Archive Media' 				=> $media,
		'Video Encoder' 				=> $video_encoder,
		'Downloader (Datamigration)' 	=> $downloader,
		'Cloud' 						=> $cloud,
		'Server - Storage' 				=> $storage,
		);

		frontcontrollerx::json_success(array('stats'=>$stats));
	}
	
	public static function getDiskUsage($dir)
	{
		exec(" du -sh $dir",$out);
		$out = implode("",$out);
		return $out;
	}

}