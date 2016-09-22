<?php
function smarty_modifier_xr_patchDate($date,$cfg)
{
	if (!templatex::arePluginsEnabled()) return false;

	switch (xredaktor_pages::getFrontEndLang())
	{
		case 'de':

			$s = array();
			$p = array();


			$s[] = 'january'; 		$p[] = 'Jänner';
			$s[] = 'february'; 		$p[] = 'Februar';
			$s[] = 'march'; 		$p[] = 'März';
			$s[] = 'april'; 		$p[] = 'April';
			$s[] = 'may'; 			$p[] = 'Mai';
			$s[] = 'june'; 			$p[] = 'Juni';
			$s[] = 'july'; 			$p[] = 'Juli';
			$s[] = 'august'; 		$p[] = 'August';
			$s[] = 'september'; 	$p[] = 'September';
			$s[] = 'october'; 		$p[] = 'Oktober';
			$s[] = 'november'; 		$p[] = 'November';
			$s[] = 'december';		$p[] = 'Dezember';
			$date = str_ireplace($s,$p,$date);


			$sm = array();
			$smp = array();

			$sm[] = 'Jan'; 		$smp[] = 'Jän';
			$sm[] = 'Feb'; 		$smp[] = 'Feb';
			$sm[] = 'Mar'; 		$smp[] = 'Mär';
			$sm[] = 'Apr'; 		$smp[] = 'Apr';
			$sm[] = 'May'; 		$smp[] = 'Mai';
			$sm[] = 'Jun'; 		$smp[] = 'Jun';
			$sm[] = 'Jul'; 		$smp[] = 'Jul';
			$sm[] = 'Aug'; 		$smp[] = 'Aug';
			$sm[] = 'Sep'; 		$smp[] = 'Sep';
			$sm[] = 'Oct'; 		$smp[] = 'Okt';
			$sm[] = 'Nov'; 		$smp[] = 'Nov';
			$sm[] = 'Dec'; 		$smp[] = 'Dez';
			$date = str_ireplace($sm,$smp,$date);


			$sd = array();
			$sdp = array();

			$sd[] = 'Mon'; 		$sdp[] = 'Mo';
			$sd[] = 'Tue'; 		$sdp[] = 'Di';
			$sd[] = 'Wed'; 		$sdp[] = 'Mi';
			$sd[] = 'Thu'; 		$sdp[] = 'Do';
			$sd[] = 'Fri'; 		$sdp[] = 'Fr';
			$sd[] = 'Sat'; 		$sdp[] = 'Sa';
			$sd[] = 'Sun'; 		$sdp[] = 'So';
			$date = str_ireplace($sd,$sdp,$date);

			break;

		default: break;
	}
	return $date;
}

