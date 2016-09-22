<?php
function smarty_modifier_xr_date($string,$size)
{
	if (!templatex::arePluginsEnabled()) return false;
	
	list($y,$m,$d) = explode("-",$string);

	switch ($size)
	{
		case 'l':
			setlocale (LC_ALL, 'de_DE@euro', 'de_DE', 'de', 'ge');
			$month = date("F", mktime(0, 0, 0, $m));
			
			
			switch (xredaktor_pages::getFrontEndLang())
			{
				case 'de':
					
					switch (strtolower($month))
					{
						case 'january': 	$month = 'Jänner'; 		break;
						case 'february': 	$month = 'Februar';		break;
						case 'march': 		$month = 'März';		break;
						case 'april': 		$month = 'April'; 		break;
						case 'may': 		$month = 'Mai'; 		break;
						case 'june': 		$month = 'Juni'; 		break;
						case 'july': 		$month = 'Juli'; 		break;
						case 'august': 		$month = 'August'; 		break;
						case 'september': 	$month = 'September'; 	break;
						case 'october': 	$month = 'Oktober'; 	break;
						case 'november': 	$month = 'November'; 	break;
						case 'december':	$month = 'Dezember'; 	break;
					}
					
					break;
				default:
			}
			
			return "$d. $month $y";
			
			break;
		case 'm':
			setlocale (LC_ALL, 'de_DE@euro', 'de_DE', 'de', 'ge');
			$month = date("M", mktime(0, 0, 0, $m));
			
			
			switch (xredaktor_pages::getFrontEndLang())
			{
				case 'de':
					
					switch (strtolower($month))
					{
						case 'jan': 	$month = 'Jän'; 		break;
						case 'feb': 	$month = 'Feb';		break;
						case 'mar': 	$month = 'Mär';		break;
						case 'apr': 	$month = 'Apr'; 		break;
						case 'may': 	$month = 'Mai'; 		break;
						case 'jun': 	$month = 'Jun'; 		break;
						case 'jul': 	$month = 'Jul'; 		break;
						case 'aug': 	$month = 'Aug'; 		break;
						case 'sep': 	$month = 'Sep'; 	break;
						case 'oct': 	$month = 'Okt'; 	break;
						case 'nov': 	$month = 'Nov'; 	break;
						case 'dec':		$month = 'Dez'; 	break;
					}
					
					break;
				default:
			}
			
			if ($m == 5) 
			return "$d. $month $y";
			else 
			return "$d. $month. $y";
			
			break;
		default:
			return "$d.$m.$y";
	}
}

