<?
class timex
{

	public static $momentsGROUPS 	= array();
	public static $momentsOfMyLife 	= array();
	public static $momentsStepper 	= 0;


	public static function logMoment($msg,$stepRight=0,$group='')
	{
		if ($stepRight == 1) self::$momentsStepper++;

		$t = round(microtime(true)*1000);
		
		if ($group == "")
		self::$momentsOfMyLife[] = array('t'=>$t,'m'=>$msg,'s'=>self::$momentsStepper);

		if ($group != "")
		{
			if (!isset(self::$momentsGROUPS[$group])) {

				self::$momentsGROUPS[$group] = array();
			}
			self::$momentsGROUPS[$group][] = array('t'=>$t,'m'=>$msg,'s'=>self::$momentsStepper);
		}

		if ($stepRight == 2) self::$momentsStepper--;
	}

	public static function showMyLife()
	{

		self::logMoment('END');
		$u = getrusage();

		$start	= 0;
		$run 	= 0;

		echo "<table>";
		foreach (self::$momentsOfMyLife as $m)
		{
			$txt	= $m['m'];
			$t 		= $m['t'];
			$s 		= $m['s'];

			if ($start == 0) $start = $t;

			$d 		= $t - $start;
			$start 	= $t;

			$run += $d;

			$w = 100;
			$f = $w*$s;

			echo "<tr><td>$run</td><td>$d</td><td><div style='width:".$f."px;display:inline-block;'>&nbsp;</div> $txt</td></tr>";
		}
		echo "</table>";

		$total = $run;

		foreach (self::$momentsGROUPS as $group => $lines) {

			echo "<h1>$group</h1>";
			$start 	= 0;
			$run 	= 0;
			$end 	= 0;

			echo "<table>";
			foreach ($lines as $i => $m)
			{
				$txt	= $m['m'];
				$t 		= $m['t'];
				$s 		= $m['s'];

				if ($s == 1) {
					$start = 0;
				}


				if ($start == 0) $start = $t;

				$d 		= $t - $start;
				$start 	= $t;
				$end = $t;

				$run += $d;

				$w = 100;
				$f = $w*$s;

				echo "<tr><td>$i</td><td>$run</td><td>$d</td><td><div style='width:".$f."px;display:inline-block;'>&nbsp;</div> $txt</td></tr>";
			}

			echo "</table>";

			echo "<h1>$group | $run</h1>";

		}


		echo "TOTAL: $total";

	}

}