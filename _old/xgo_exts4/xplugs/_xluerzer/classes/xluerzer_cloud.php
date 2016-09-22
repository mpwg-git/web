<?

class xluerzer_cloud
{
	public static function insert_queue_from_submission($cfg)
	{
		$es_id = intval($cfg['es_id']);
		
		if($es_id < 1) return false;
		
		$bucket1_id = 1;
		$bucket2_id = 2;
		
		$eamb_id = intval($value['eamb_id']);
		
		$present = dbx::query("select * from e_archive_media_cloud where eamc_submission_id = $es_id");
	
		if($present === false)
		{
			$db = array(
			'eamc_submission_id' 	=> $es_id,
			'eamc_bucket_1'			=> $bucket1_id,
			'eamc_bucket_2'			=> $bucket2_id,
			'eamc_bucket_state'		=> 'WAIT_4_UPLOAD',
			'eamc_bucket_state_1'	=> 'NONE',
			'eamc_bucket_state_2'	=> 'NONE',
			'eamc_created'			=> 'CURRENT_TIMESTAMP'
			);
			
			dbx::insert('e_archive_media_cloud',$db);
		}
		
		
		
	}
}	