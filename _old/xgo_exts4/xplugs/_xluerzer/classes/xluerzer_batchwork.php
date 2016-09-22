<?

class xluerzer_batchwork
{

	public static function defaultAjaxHandler($function,$param_0)
	{

		switch ($function)
		{
			case 'process_input':
				self::parseInput($param_0);
				break;
			default: die('???!??');
		}

		die(" $function $param_0");
	}


	public static function parseInput($taskid)
	{

		$file = $_FILES['file']['tmp_name'];

		if (!file_exists($file)) die("file not submitted");


		switch ($taskid)
		{
			case 17:
				$output = xluerzer_batchprocess::doTask(17,file($file));
				echo json_encode(array('output'=>$output));
				die();
				break;
			default: break;
		}


		$fh = fopen($file, 'r');
		$line = 0;
		$data = array();

		while (($l = fgetcsv($fh, 0, "\t")) !== false) {
			$line++;
			// task 4 - contactdetails - needs header
			if ($line == 1 && $taskid != 4) continue;
			$data[] = $l;
		}

		// multiple
		switch ($taskid)
		{
			case '2':
			case '14':
				// pos 1 und 2 jeweils exploden

				foreach ($data as &$o)
				{
					$o[1] = explode(",",$o[1]);
					$o[2] = explode(",",$o[2]);
				}

				break;
			default: break;
		}

		$output = print_r($data,true);
		$output = xluerzer_batchprocess::doTask($taskid,$data);
		echo json_encode(array('output'=>$output));
		die();
	}

}