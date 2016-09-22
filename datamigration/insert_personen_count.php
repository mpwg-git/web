<?

#die('schon erledigt...');


require_once(dirname(__FILE__) . '/_includes.php');

$rooms = dbx::queryAll("SELECT * FROM wizard_auto_809 ");

foreach ($rooms as $room)
{
	echo "\n room id : {$room['wz_id']} ";
	$ret = fe_room::update_mitbewohner_counts_of_room($room['wz_id']);
	
	$male 	= $ret['MALE'];
	$female = $ret['FEMALE'];
	$total 	= $ret['TOTAL'];
	echo " update ok - male: $male female: $female total: $total";
}
