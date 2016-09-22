<?

require_once (dirname(__FILE__) . '/../_includes.php');


/*******************************************************************************************
 * CHATITEMS
 ******************************************************************************************/
$table_chat = 'chatitems';
$attrs_chat = dbx::getAllAttributes($table_chat);
$fields_chat= array();

foreach ($attrs_chat as $key => $value) {
	$fields_chat[] = trim($value['Field']);
}

$fieldsStr_chat 	= implode(',', $fields_chat);


dbx::query("TRUNCATE $table_chat");
dbx::query("INSERT INTO $table_chat ($fieldsStr_chat) SELECT $fieldsStr_chat FROM wsfdev.$table_chat");
 
/*******************************************************************************************/






/****************************************************************
 * WIZARDS
 ***************************************************************/
$data = array("wizards", "wizard_auto_539", "wizard_auto_540", "wizard_auto_541", "wizard_auto_543", "wizard_auto_544", "wizard_auto_545", "wizard_auto_547", "wizard_auto_554", "wizard_auto_555", "wizard_auto_605", "wizard_auto_612", "wizard_auto_707", "wizard_auto_712", "wizard_auto_713", "wizard_auto_714", "wizard_auto_715", "wizard_auto_716", "wizard_auto_717", "wizard_auto_718", "wizard_auto_719", "wizard_auto_720", "wizard_auto_754", "wizard_auto_755", "wizard_auto_756", "wizard_auto_765", "wizard_auto_767", "wizard_auto_768", "wizard_auto_771", "wizard_auto_772", "wizard_auto_773", "wizard_auto_775", "wizard_auto_776", "wizard_auto_801", "wizard_auto_809", "wizard_auto_810", "wizard_auto_822", "wizard_auto_830", "wizard_auto_834", "wizard_auto_839", "wizard_auto_840", "wizard_auto_844", "wizard_auto_845", "wizard_auto_846", "wizard_auto_847", "wizard_auto_853", "wizard_auto_858", "wizard_auto_860", "wizard_auto_861", "wizard_auto_882", "wizard_auto_893", "wizard_auto_SIMPLE_W2W_707_712", "wizard_auto_SIMPLE_W2W_707_809", "wizard_auto_SIMPLE_W2W_712_717", "wizard_auto_SIMPLE_W2W_712_718", "wizard_auto_SIMPLE_W2W_834_882");

/* tables die nicht auf wsfdev existieren
wizard_auto_907
wizard_auto_911
wizard_auto_SIMPLE_W2W_907_911
*/
 
$list = array();

foreach ($data as $key => $values) {
	$list[] = trim($values);
}

$count = count($list);

foreach ($list as $key) {
		
	$table = $key;
	$attrs = dbx::getAllAttributes($table);
	$fields = array();
	
	foreach ($attrs as $key => $value) {
		$fields[] = trim($value['Field']);
	}
	
	$fieldsStr = implode(',', $fields);
	
	//echo $table;
	//echo "<br>";
	
	dbx::query("TRUNCATE $table");
	dbx::query("INSERT INTO $table ($fieldsStr) SELECT $fieldsStr FROM wsfdev.$table");	
}
/******************************************************************************************/






/*******************************************************************************************
 * FE_TAGS
 ******************************************************************************************/
$table_fe_tags = 'fe_tags';
$attrs_fe_tags = dbx::getAllAttributes($table_fe_tags);
$fields_fe_tags = array();

foreach ($attrs_fe_tags as $key => $value) {
	$fields_fe_tags[] = trim($value['Field']);
}

$fieldsStr_fe_tags 	= implode(',', $fields_fe_tags);


dbx::query("TRUNCATE $table_fe_tags");
dbx::query("INSERT INTO $table_fe_tags ($fieldsStr_fe_tags) SELECT $fieldsStr_fe_tags FROM wsfdev.$table_fe_tags");
 
/*******************************************************************************************/






