<?

class wzx
{

	private static $WIZARD_RECORD_CACHE = "WIZARD_RECORD_";

	private static $CONNECTION_MODE_REPRESENTATION 	= "DRAFT";
	private static $CONNECTION_MODE_LANGUAGE 		= Ixcore::init_fail_lang_fe ;

	function __construct()
	{
		$CONNECTION_MODE_LANGUAGE = xredaktor_pages::getFrontEndLang();
	}

	private static function genWizardRecordKey($wz_id,$wz_r_id)
	{
		return self::$WIZARD_RECORD_CACHE.$wz_id.'_'.$wz_r_id;
	}


	public static function cache_del($wz_id,$wz_r_id)
	{
		$wz_id = intval($wz_id);
		if ($wz_id == 0) return false;
		$wz_r_id = intval($wz_r_id);
		if ($wz_r_id == 0) return false;

		cachex::del(self::genWizardRecordKey($wz_id,$wz_r_id));
	}

	public static function doTheMagicStaticDance($wz_id,$wz_r_id)
	{

		$wz_id = intval($wz_id);
		if ($wz_id == 0) return false;
		$wz_r_id = intval($wz_r_id);
		if ($wz_r_id == 0) return false;

		/*

		- MAPPEN NACH TYPE ...
		- CLEAN LANG
		- MAPPED LANG

		$static['DE']
		$static['DE_MAPPED']

		- ALLE NON MULTIS
		- ALLE DE VALUES jedoch nach mapping order

		$static['EN']
		$static['EN_MAPPED']

		- ALLE NON MULTIS
		- ALLE EN VALUES jedoch nach mapping order sprich DE

		*/


		$siteId 		= dbx::query("select a_s_id from atoms where a_id = $wz_id");
		$staticFinal 	= array();
		$static 		= xredaktor_wizards::toStaticArrayFlat($wz_id,$wz_r_id);
		$langs 			= xredaktor_pages::getValidLangs($siteId);
		$table			= xredaktor_wizards::genWizardTableNameBy_a_id($wz_id);
		$raw			= dbx::query("select * from $table where wz_id = $wz_r_id");


		$staticFinal 	= array(

		'RAW'			=> $raw,
		'STATIC'		=> $static,
		'LANG'			=> array(),
		'GENERIC'		=> array(),
		'META'			=> array(),

		);

		$fields_mutli 		= dbx::queryAll("select * from atoms_settings where as_a_id = $wz_id and as_type_multilang='Y'");
		$fields_mutli_no 	= dbx::queryAll("select * from atoms_settings where as_a_id = $wz_id and as_type_multilang='N'");

		if ($fields_mutli_no === false) $fields_mutli_no = array();
		if ($fields_mutli === false) 	$fields_mutli = array();

		$nonMulti 	= array();

		foreach ($fields_mutli_no as $fmn)
		{
			$field_name = self::getMultiLangFieldNameByAS($fmn);
			$nonMulti[substr($field_name,3)] = $raw[$field_name];
		}

		$langSpecificArrays = array();
		foreach ($langs as $l => $langx)
		{
			$langx 	= strtoupper($langx);
			$mapped = xredaktor_wizards::mapLanguageFieldsToNormFields($wz_id,$raw,false,false,false,$langx);

			foreach ($fields_mutli as $l)
			{
				$field_name = $l['as_name'];
				$langSpecificArrays[$langx][$field_name] = $mapped['wz_'.$field_name];
			}

			// STRICT

			foreach ($fields_mutli as $as)
			{
				$field_as_name 	= $as['as_name'];
				$field_db_field	= self::getMultiLangFieldNameByAS($as,$langx);
				$langSpecificArrays[$langx.'_STRICT'][$field_as_name] = $raw[$field_db_field];
			}

			foreach ($nonMulti as $k => $v)
			{
				$langSpecificArrays[$langx][$k] 			= $v;
				$langSpecificArrays[$langx.'_STRICT'][$k] 	= $v;
			}
		}
		
		
		$staticFinal['LANG'] 	= $langSpecificArrays;
		$staticFinal['GENERIC'] = $nonMulti;

		return $staticFinal;
	}

	public static function cache_build($wz_id,$wz_r_id)
	{
		$wz_id = intval($wz_id);
		if ($wz_id == 0) return false;
		$wz_r_id = intval($wz_r_id);
		if ($wz_r_id == 0) return false;

		$table 	= xredaktor_wizards::genWizardTableNameBy_a_id($wz_id);
		$data 	= dbx::query("select * from $table where wz_id = $wz_r_id");

		$ret = array(
		'WZ_ID'		=> $wz_id,
		'WZ_R_ID'	=> $wz_r_id,
		'RAW' 		=> $data,
		'STATIC'	=> self::doTheMagicStaticDance($wz_id,$wz_r_id),
		'URL'		=> ''
		);

		cachex::set(self::genWizardRecordKey($wz_id,$wz_r_id),$ret);
		return $ret; /// UUUR WICHTIG, MUSS DAS 1:1 zurückschicken


		return false;
		die();

		/*

		NACH STATIC PRO LANG ...

		*/

		$static = xredaktor_wizards::toStaticArray($wz_id,$wz_r_id);
		$table	= xredaktor_wizards::genTable($wz_id);

		dbx::update($table,array('wz_static'=>$static),array('wz_id'=>$wz_r_id));
		$full = dbx::query("select * from $table where wz_id = $wz_r_id");

		cachex::set(self::genWizardRecordKey($wz_id,$wz_r_id), $full);

		return $full;
	}


	public static function getStatic($wz_id,$wz_r_id)
	{
		$wz_id = intval($wz_id);
		if ($wz_id == 0) return false;
		$wz_r_id = intval($wz_r_id);
		if ($wz_r_id == 0) return false;

		$cache = cachex::get(self::genWizardRecordKey($wz_id,$wz_r_id));
		if ($cache === false)
		{
			$cache = self::buildCache($wz_id,$wz_r_id);
		}

		return $cache;
	}


	/*

	ATOMICS

	*/





	public static function vupsert($wz_vid,$where_array,$insert=false,$update=false)
	{
	}


	public static function upsert($wz_id,$where_array,$insert=false,$update=false)
	{
	}

	public static function insert($wz_id,$db)
	{
		$wz_id = intval($wz_id);
		$table = xredaktor_wizards::genWizardTableNameBy_a_id($wz_id);
		if ($table === false) return false;
		$wz_r_id = intval(dbx::insert($table,$db));
		self::cache_build($wz_id,$wz_r_id);
		return $wz_r_id;
	}


	public static function update($wz_id,$db,$where_array_or_id)
	{

		$table 		= xredaktor_wizards::genWizardTableNameBy_a_id($wz_id);
		$wz_r_id 	= 0;


		if (is_numeric($where_array_or_id))
		{
			$wz_r_id = intval($where_array_or_id);
			if ($wz_r_id == 0) return false;

		} else {

			$where 	= dbx::getWhereByArray($where_array_or_id);
			$record	= dbx::query(self::translate_sql("select wz_id from [:$wz_id] ".$where." LIMIT 1"));

			if ($record === false) return false;
			$wz_r_id = intval($record['wz_id']);
			if ($wz_r_id == 0) return false;
		}

		dbx::update($table,$db,array('wz_id'=>$wz_r_id));
		self::cache_build($wz_id,$wz_r_id);
		return true;
	}

	public static function delete($wz_id,$wz_r_id)
	{

		$table 		= xredaktor_wizards::genWizardTableNameBy_a_id($wz_id);
		$wz_r_id 	= intval($wz_r_id);

		if ($wz_r_id == 0) return false;

		$db = array(
		'wz_del' => 'Y'
		);
		dbx::update($table,$db,array('wz_id'=>$wz_r_id));

		self::cache_del($wz_id,$wz_r_id);
		return true;
	}

	public static function getMultiLangFieldName($as_id,$lang=false)
	{
		$as = xredaktor_atoms_settings::getById($as_id);
		if ($as === false) return false;

		if ($as['as_type_multilang'] == 'N')
		{
			return 'wz_'.$as['as_name'];
		}

		if ($lang === false)
		{
			$lang = self::getLanguage();
		}

		return '_'.strtoupper($lang).'_wz_'.$as['as_name'];
	}

	public static function getMultiLangFieldNameByAS($as,$lang=false)
	{
		if ($as === false) return false;

		if ($as['as_type_multilang'] == 'N')
		{
			return 'wz_'.$as['as_name'];
		}

		if ($lang === false)
		{
			$lang = self::getLanguage();
		}

		return '_'.strtoupper($lang).'_wz_'.$as['as_name'];

	}

	private static function getMatchTable($matches)
	{
		// ABFRAGEN WELCHE FUCKING DB - DRAFT OR PUBLISHED ...

		/*

		DRAFT,
		PUBLISHED,
		VERSION-Y

		*/

		$a_id 	= intval($matches[1]);
		$table 	= xredaktor_wizards::genWizardTableNameBy_a_id($a_id);
		if ($table === false) die("INVALID SQL A_ID : $a_id");
		return $table;
	}

	private static function getMatchField($matches)
	{
		$as_id 	= intval($matches[1]);
		$attr 	= self::getMultiLangFieldName($as_id);
		if ($attr === false) die("INVALID SQL AS_ID : $as_id");
		return $attr;
	}

	public static function translate_sql($sql)
	{
		$pattern_tables = "/\[\:(.*?)\]/";
		$pattern_fields	= "/\<\:(.*?)\>/";

		$compiled = preg_replace_callback($pattern_tables,'wzx::getMatchTable',$sql);
		$compiled = preg_replace_callback($pattern_fields,'wzx::getMatchField',$compiled);

		return $compiled;
	}

	public static function queryAll($where_with_numeric_tables_only,$memoryReturn=true)
	{

		$sql = self::translate_sql($where_with_numeric_tables_only);
		$records = dbx::queryAll($sql,$memoryReturn);
		return $records;
	}


	public static function query($where_with_numeric_tables_only,$statics=true)
	{
		if ($statics) // wollen nur die static aggregierten pro language
		{

		} else
		{

		}
	}

	public static function setRepresentation($mode)
	{
		// TODO CHECK GEGEN STD SPRACHEN
		self::$CONNECTION_MODE_REPRESENTATION = $mode;
		return true;
	}

	public static function getRepresentation()
	{
		// DRAFT, PUBISHED, VERSION-Y
		// REQUEST !? or param
		return self::$CONNECTION_MODE_REPRESENTATION;
	}

	public static function setLanguage($lang)
	{
		// TODO CHECK GEGEN STD SPRACHEN
		self::$CONNECTION_MODE_LANGUAGE = $lang;
		return true;
	}

	public static function getLanguage()
	{
		switch (self::$CONNECTION_MODE_LANGUAGE)
		{
			default:
				return self::$CONNECTION_MODE_LANGUAGE;
		}
	}

	public static function vget($wz_vid,$wz_r_id,$lang='AUTO',$representation='AUTO')
	{
		$wz_id = dbx::queryAttribute("select a_id from atoms where a_vid = $wz_vid LIMIT 1","a_id"); //TODO OPTIMIZE UND CACHE
		if ($wz_id === false) return false;
		return self::get($wz_id,$wz_r_id,$lang,$representation);
	}


	public static function get($wz_id,$wz_r_id,$lang='AUTO',$representation='AUTO')
	{
		if ($representation == 'AUTO')
		{
			$representation = self::getRepresentation();
		}

		if ($lang == 'AUTO')
		{
			$lang = self::getLanguage();
		}

		$data = cachex::get(self::genWizardRecordKey($wz_id,$wz_r_id));
		$data = false;

		if (($data === null) || ($data === false)) $data = self::cache_build($wz_id,$wz_r_id);

		return $data;
	}

	public static function getAll($wz_id,$where,$lang='AUTO',$representation='AUTO')
	{

		if ($representation == 'AUTO') // SWITCH
		{
			self::getRepresentation();
		}

	}


	public static function registerInCache()
	{

		// IM CACHE


		// ELASTIC SITE - SEARCH

	}

	public static function publish($wz_id,$wz_r_id)
	{

		// STATICS herrichten
		// URL GENERIEEN UND REGISTRIEREN

		// URL AUFRUFEN // CACHE FÜLLEN | HINTERGUND
		// REMAK BEIM RECORD --> RE-CACHE FLAG und info // HINTERGUND

		self::registerInCache();

	}


	public static function elasticSearch($query_text,$wz_ids=false)
	{



	}





















}