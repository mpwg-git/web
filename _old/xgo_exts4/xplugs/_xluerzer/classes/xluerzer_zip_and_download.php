<?

class xluerzer_zip_and_download
{

	public static function handleDownloadFilesViaDefaultDBFetchner($cfg)
	{
		$downloadFilesScope = $_REQUEST['downloadFilesScope'];
		switch ($downloadFilesScope)
		{
			case 'sel_sub_thumbs':
			case 'sel_sub_print':
			case 'sel_sub_videos':
			case 'sub_thumbs':
			case 'sub_print':
			case 'sub_videos':
				self::queryAndZip_submissions($cfg['sql_data'],$downloadFilesScope);
				break;
			case 'sel_sub_thumbs_students':
			case 'sel_sub_print_students':
			case 'sel_sub_videos_students':
			case 'sub_thumbs_students':
			case 'sub_print_students':
			case 'sub_videos_students':
				self::queryAndZip_submissions_students($cfg['sql_data'],$downloadFilesScope);
				break;	
			default: die("invalid downloadFilesScope");
		}
		die();
	}

	public static function getVideoFile($submission)
	{
		$possibleFile = array($submission['es_video_s_id'],$submission['es_video_480_mp4_s_id'],$submission['es_video_720_mp4_s_id'],$submission['es_video_1080_mp4_s_id']);
		foreach ($possibleFile as $_x_s_id)
		{
			$_x_s_id = intval($_x_s_id);
			if ($_x_s_id == 0) continue;
			return $_x_s_id;
		}

		return false;
	}
	
	public static function getVideoFile_students($submission)
	{
		$possibleFile = array($submission['ess_video_s_id'],$submission['ess_video_480_mp4_s_id'],$submission['ess_video_720_mp4_s_id'],$submission['ess_video_1080_mp4_s_id']);
		foreach ($possibleFile as $_x_s_id)
		{
			$_x_s_id = intval($_x_s_id);
			if ($_x_s_id == 0) continue;
			return $_x_s_id;
		}

		return false;
	}

	public static function queryAndZip_submissions($sql,$downloadFilesScope)
	{
		$maxFiles = 1000;
		
		//die($sql);
		$files = array();

		###############
		$ids = array();
		if (isset($_REQUEST['ids']))
		{
			$check_ids = explode(",",$_REQUEST['ids']);
			foreach ($check_ids as $idx)
			{
				$idx = intval($idx);
				if ($idx == 0) continue;
				$ids[] = $idx;
			}
		}
		##############


		switch ($downloadFilesScope)
		{
			case 'sel_sub_thumbs':
			case 'sel_sub_print':
			case 'sel_sub_videos':
				$sql = str_replace('[GRID_FILTERS]',' es_id in ('.implode(',',$ids).') AND ',$sql);
				break;
			default:
				$sql = str_replace('[GRID_FILTERS]','',$sql);
				break;
		}

			
		$data = dbx::queryAll($sql,false);

	
		
		foreach ($data as $i => $submission)
		{
			if ($i > $maxFiles) die("ERROR: more than $maxFiles records selected ... ");
			switch ($downloadFilesScope)
			{
				case 'sel_sub_thumbs':
					if (!in_array($submission['es_id'],$ids)) continue;
					$files[] = $submission['es_image_s_id'];
					break;
				case 'sel_sub_print':
					if (!in_array($submission['es_id'],$ids)) continue;
					$files[] = $submission['es_image_highRes_s_id'];
					break;
				case 'sel_sub_videos':
					if (!in_array($submission['es_id'],$ids)) continue;
					$videoFile = self::getVideoFile($submission);
					if ($videoFile === false) continue;
					$files[] = $videoFile;
					break;

				case 'sub_thumbs':
					$files[] = $submission['es_image_s_id'];
					break;
				case 'sub_print':
					$files[] = $submission['es_image_highRes_s_id'];
					break;
				case 'sub_videos':
					$videoFile = self::getVideoFile($submission);
					if ($videoFile === false) continue;
					$files[] = $videoFile;
					break;
				default: die("invalid queryAndZip_submissions");
			}
		}

		$filesClean = array();
		foreach ($files as $f)
		{
			$s_id = intval($f);
			if ($s_id == 0) continue;
			$filesClean[] = $f;
		}

		$zipFiles = array();
		$size = 0;
		foreach ($filesClean as $s_id)
		{
			$file = xredaktor_storage::getFileDstById($s_id);
			if (!file_exists($file)) continue;
			$zipFiles[] = $file;
			$size += filesize($file);
		}

		$cnt = count($zipFiles);


		if ($cnt>$maxFiles)
		{
			$sizex = hdx::bytes2HumanReadAble($size);
			die("Requested: $sizex ($cnt Files), Maximum filecount of $maxFiles exceeded!");
		}

		if ($cnt == 0)
		{
			die("NO FILES");
		}

		hdx::zipFilesAndSendAsDownload($zipFiles,$downloadFilesScope.'.zip');
		die();

	}


	public static function queryAndZip_submissions_students($sql,$downloadFilesScope)
	{
		$maxFiles = 1000;
		
			
		$files = array();

		###############
		$ids = array();
		if (isset($_REQUEST['ids']))
		{
			$check_ids = explode(",",$_REQUEST['ids']);
			foreach ($check_ids as $idx)
			{
				$idx = intval($idx);
				if ($idx == 0) continue;
				$ids[] = $idx;
			}
		}
		##############
		
			
		

		switch ($downloadFilesScope)
		{
			case 'sel_sub_thumbs_students':
			case 'sel_sub_print_students':
			case 'sel_sub_videos_students':
				
				$sql = str_replace('[GRID_FILTERS]',' ess_id in ('.implode(',',$ids).') AND ',$sql);
				break;
			default:
				$sql = str_replace('[GRID_FILTERS]','',$sql);
				break;
		}

		//die("sql ".$sql);
		
		$data = dbx::queryAll($sql,false);

		
		foreach ($data as $i => $submission)
		{
			if ($i > $maxFiles) die("ERROR: more than $maxFiles records selected ... ");
			switch ($downloadFilesScope)
			{
				case 'sel_sub_thumbs_students':
					if (!in_array($submission['ess_id'],$ids)) continue;
					$files[] = $submission['ess_image_s_id'];
					break;
				case 'sel_sub_print_students':
					if (!in_array($submission['ess_id'],$ids)) continue;
					$files[] = $submission['ess_image_highRes_s_id'];
					break;
				case 'sel_sub_videos_students':
					if (!in_array($submission['ess_id'],$ids)) continue;
					$videoFile = self::getVideoFile($submission);
					if ($videoFile === false) continue;
					$files[] = $videoFile;
					break;

				case 'sub_thumbs_students':
					$files[] = $submission['ess_image_s_id'];
					break;
				case 'sub_print_students':
					$files[] = $submission['ess_image_highRes_s_id'];
					break;
				case 'sub_videos_students':
					$videoFile = self::getVideoFile($submission);
					if ($videoFile === false) continue;
					$files[] = $videoFile;
					break;
				default: die("invalid queryAndZip_submissions_students");
			}
		}

		$filesClean = array();
		foreach ($files as $f)
		{
			$s_id = intval($f);
			if ($s_id == 0) continue;
			$filesClean[] = $f;
		}

		$zipFiles = array();
		$size = 0;
		foreach ($filesClean as $s_id)
		{
			$file = xredaktor_storage::getFileDstById($s_id);
			if (!file_exists($file)) continue;
			$zipFiles[] = $file;
			$size += filesize($file);
		}

		$cnt = count($zipFiles);


		if ($cnt>$maxFiles)
		{
			$sizex = hdx::bytes2HumanReadAble($size);
			die("Requested: $sizex ($cnt Files), Maximum filecount of $maxFiles exceeded!");
		}

		if ($cnt == 0)
		{
			die("NO FILES");
		}

		hdx::zipFilesAndSendAsDownload($zipFiles,$downloadFilesScope.'.zip');
		die();

	}


}