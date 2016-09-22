<?

ini_set('memory_limit', '512M');

class xcrm_dbimport
{
	public static function handleAjaxFunction($function)
	{
		switch ($function)
		{
			case 'doit':
				self::prepareImport();
				die('DONE');
				break;
			default: 
				die('FUNCTION_NOT_FOUND _ '.$function);
				break;
		}
	}
	
	public static function prepareImport()
	{
		die('x');
		//error_reporting(8191);
		$betriebTable = xredaktor_wizards::genWizardTableNameBy_a_id(209);
		$personenTable = xredaktor_wizards::genWizardTableNameBy_a_id(210);
				
		//$data = dbx::queryAll("select * from IMPORTED_VIA_EXCEL__AdrDB_NEU_IMPORT_DBneu_xlsx where idx > 5500 and idx < 6001 order by idx limit 500");
		$data = dbx::queryAll("select * from IMPORTED_VIA_EXCEL__AdrDB_NEU_IMPORT_DBneu_xlsx");
		
		print_r($data);
		
		
		if($data === false) $data = array();
		
		foreach ($data as $key => $value) {
			
			if(trim($value['Organisation']) == '') continue;
			
			$name = trim($value['Organisation']);
			$strasse = trim($value['Straße']);
			$plz = trim($value['PLZ']);
			$eMail = trim($value['eMail']);
			
			$db_Betriebe = array(
				'wz_NAME' 			=> $name,
				'wz_NAME_ZUSATZ'	=> trim($value['Organisation_Zusatz']),
				'wz_PLZ'			=> $plz,
				'wz_ORT'			=> trim($value['Ort']),
				'wz_STRASSE'		=> $strasse,
				'wz_BUNDESLAND'		=> intval($value['Bundesland']),
				'wz_LAND'			=> intval($value['Ausland']),
				'wz_TELEFON'		=> trim($value['Telefon_1']),
				'wz_TELEFON2'		=> trim($value['Telefon_2']),
				'wz_MOBIL'			=> trim($value['Mobil_1']),
				'wz_MOBIL2'			=> trim($value['Mobil_2']),
				'wz_FAX'			=> trim($value['Fax']),
				'wz_EMAIL'			=> $eMail,
				'wz_WEBSEITE'		=> trim($value['Internet']),
				'wz_BEMERKUNGEN'	=> trim($value['Notizen'])
			);
			
			$present = dbx::query("select * from $betriebTable where wz_NAME = '$name' and wz_PLZ = '$plz' and wz_STRASSE = '$strasse'");
			
			if($present === false)
			{
				$lastInsert = xredaktor_fe::wInsert(209,$db_Betriebe);
				$db_Betriebe['WZID'] = $lastInsert;
				$data[$key]['WZID'] = $lastInsert;
			}
			else 
			{
				$wz_id = intval($present['wz_id']);
				dbx::update($betriebTable,$db_Betriebe,array('wz_id'=>$wz_id));
				$db_Betriebe['WZID'] = $wz_id;
				$data[$key]['WZID'] = $wz_id;
			}
			
			$wzido = intval($db_Betriebe['WZID']);
			
			if(trim($value['307_-_TV_+_RV__27_']) != '')
			{
				$present = dbx::query("select * from wizard_auto_SIMPLE_W2W_209_307 where wz_id_low = $wzido and wz_id_high = 27");
				
				if($present === false)
				{
					dbx::insert('wizard_auto_SIMPLE_W2W_209_307',array('wz_id_low' => $db_Betriebe['WZID'],'wz_id_high'=>27));
				}
			}

			if(trim($value['307_-_Gemeinde__3_']) != '')
			{
				$present = dbx::query("select * from wizard_auto_SIMPLE_W2W_209_307 where wz_id_low = $wzido and wz_id_high = 3");
				
				if($present === false)
				{
					dbx::insert('wizard_auto_SIMPLE_W2W_209_307',array('wz_id_low' => $db_Betriebe['WZID'],'wz_id_high'=>3));
				}
			}

			if(trim($value['307_-_PRESSE_Bgld__13_']) != '')
			{
				$present = dbx::query("select * from wizard_auto_SIMPLE_W2W_209_307 where wz_id_low = $wzido and wz_id_high = 13");
				
				if($present === false)
				{
					dbx::insert('wizard_auto_SIMPLE_W2W_209_307',array('wz_id_low' => $db_Betriebe['WZID'],'wz_id_high'=>13));
				}
			}
			
			if(trim($value['307_-_PRESSE_Familien__14_']) != '')
			{
				$present = dbx::query("select * from wizard_auto_SIMPLE_W2W_209_307 where wz_id_low = $wzido and wz_id_high = 14");
				
				if($present === false)
				{
					dbx::insert('wizard_auto_SIMPLE_W2W_209_307',array('wz_id_low' => $db_Betriebe['WZID'],'wz_id_high'=>14));
				}
			}
			
			if(trim($value['307_-_Aviso__8_']) != '')
			{
				$present = dbx::query("select * from wizard_auto_SIMPLE_W2W_209_307 where wz_id_low = $wzido and wz_id_high = 8");
				
				if($present === false)
				{
					dbx::insert('wizard_auto_SIMPLE_W2W_209_307',array('wz_id_low' => $db_Betriebe['WZID'],'wz_id_high'=>8));
				}
			}
			
			if(trim($value['307_-_PRESSE_Bundesland__21_']) != '')
			{
				$present = dbx::query("select * from wizard_auto_SIMPLE_W2W_209_307 where wz_id_low = $wzido and wz_id_high = 21");
				
				if($present === false)
				{
					dbx::insert('wizard_auto_SIMPLE_W2W_209_307',array('wz_id_low' => $db_Betriebe['WZID'],'wz_id_high'=>21));
				}
			}
			
			if(trim($value['307_-_PRESSE_-_Reise__15_']) != '')
			{
				$present = dbx::query("select * from wizard_auto_SIMPLE_W2W_209_307 where wz_id_low = $wzido and wz_id_high = 15");
				
				if($present === false)
				{
					dbx::insert('wizard_auto_SIMPLE_W2W_209_307',array('wz_id_low' => $db_Betriebe['WZID'],'wz_id_high'=>15));
				}
			}

			if(trim($value['307_-_PRESSE_Sport__16_']) != '')
			{
				$present = dbx::query("select * from wizard_auto_SIMPLE_W2W_209_307 where wz_id_low = $wzido and wz_id_high = 16");
				
				if($present === false)
				{
					dbx::insert('wizard_auto_SIMPLE_W2W_209_307',array('wz_id_low' => $db_Betriebe['WZID'],'wz_id_high'=>16));
				}
			}
			
			if(trim($value['307__PRESSE_Gesellschaft__17_']) != '')
			{
				$present = dbx::query("select * from wizard_auto_SIMPLE_W2W_209_307 where wz_id_low = $wzido and wz_id_high = 17");
				
				if($present === false)
				{
					dbx::insert('wizard_auto_SIMPLE_W2W_209_307',array('wz_id_low' => $db_Betriebe['WZID'],'wz_id_high'=>17));
				}
			}
			
			if(trim($value['307_-_PRESSE_WeinKulinarik__18_']) != '')
			{
				$present = dbx::query("select * from wizard_auto_SIMPLE_W2W_209_307 where wz_id_low = $wzido and wz_id_high = 18");
				
				if($present === false)
				{
					dbx::insert('wizard_auto_SIMPLE_W2W_209_307',array('wz_id_low' => $db_Betriebe['WZID'],'wz_id_high'=>18));
				}
			}
			
			if(trim($value['307_-_PRESSE_Kultur__20_']) != '')
			{
				$present = dbx::query("select * from wizard_auto_SIMPLE_W2W_209_307 where wz_id_low = $wzido and wz_id_high = 20");
				
				if($present === false)
				{
					dbx::insert('wizard_auto_SIMPLE_W2W_209_307',array('wz_id_low' => $db_Betriebe['WZID'],'wz_id_high'=>20));
				}
			}
			
			if(trim($value['307_-_Tourismusclub__9_']) != '')
			{
				$present = dbx::query("select * from wizard_auto_SIMPLE_W2W_209_307 where wz_id_low = $wzido and wz_id_high = 9");
				
				if($present === false)
				{
					dbx::insert('wizard_auto_SIMPLE_W2W_209_307',array('wz_id_low' => $db_Betriebe['WZID'],'wz_id_high'=>9));
				}
			}
			
			if(trim($value['307_-_Tourismusenquete__10_']) != '')
			{
				$present = dbx::query("select * from wizard_auto_SIMPLE_W2W_209_307 where wz_id_low = $wzido and wz_id_high = 10");
				
				if($present === false)
				{
					dbx::insert('wizard_auto_SIMPLE_W2W_209_307',array('wz_id_low' => $db_Betriebe['WZID'],'wz_id_high'=>10));
				}
			}
			
			if(trim($value['307_-_Marketingplan,_MAP__24_']) != '')
			{
				$present = dbx::query("select * from wizard_auto_SIMPLE_W2W_209_307 where wz_id_low = $wzido and wz_id_high = 24");
				
				if($present === false)
				{
					dbx::insert('wizard_auto_SIMPLE_W2W_209_307',array('wz_id_low' => $db_Betriebe['WZID'],'wz_id_high'=>24));
				}
			}
			
			if(trim($value['308_-_Burgenland_im_Galopp__5_']) != '')
			{
				$present = dbx::query("select * from wizard_auto_SIMPLE_W2W_209_308 where wz_id_low = $wzido and wz_id_high = 5");
				
				if($present === false)
				{
					dbx::insert('wizard_auto_SIMPLE_W2W_209_308',array('wz_id_low' => $db_Betriebe['WZID'],'wz_id_high'=>5));
				}
			}
			
			if(trim($value['308_-_Pannonisch_Wohnen__4_']) != '')
			{
				$present = dbx::query("select * from wizard_auto_SIMPLE_W2W_209_308 where wz_id_low = $wzido and wz_id_high = 4");
				
				if($present === false)
				{
					dbx::insert('wizard_auto_SIMPLE_W2W_209_308',array('wz_id_low' => $db_Betriebe['WZID'],'wz_id_high'=>4));
				}
			}
			
			if(trim($value['308_-_Best_of_Burgenland__8_']) != '')
			{
				$present = dbx::query("select * from wizard_auto_SIMPLE_W2W_209_308 where wz_id_low = $wzido and wz_id_high = 13");
				
				if($present === false)
				{
					dbx::insert('wizard_auto_SIMPLE_W2W_209_308',array('wz_id_low' => $db_Betriebe['WZID'],'wz_id_high'=>13));
				}
			}
			
			if(trim($value['308_-_Urlaub_am_Bauernhof__9_']) != '')
			{
				$present = dbx::query("select * from wizard_auto_SIMPLE_W2W_209_308 where wz_id_low = $wzido and wz_id_high = 9");
				
				if($present === false)
				{
					dbx::insert('wizard_auto_SIMPLE_W2W_209_308',array('wz_id_low' => $db_Betriebe['WZID'],'wz_id_high'=>9));
				}
			}
			
		}

		foreach ($data as $key => $value) {
			$vorname = trim($value['Vorname']);
			$nachname = trim($value['Nachname']);
			$eMail = trim($value['eMail']);
			
			$db = array(
				'wz_ANREDE' 			=> self::getAnrede($value['Anrede']),
				'wz_BERUFSTITEL' 		=> trim($value['Berufstitel']),
				'wz_TITEL_PRE' 			=> trim($value['AkadGrad']),
				'wz_VORNAME' 			=> $vorname,
				'wz_NACHNAME'			=> $nachname,
				'wz_PLZ_PRIV'			=> trim($value['PLZ']),
				'wz_ORT_PRIV'			=> trim($value['Ort']),
				'wz_STRASSE_PRIV'		=> trim($value['Straße']),
				'wz_BUNDESLAND_PRIV'	=> intval($value['Bundesland']),
				'wz_LAND_PRIV'			=> intval($value['Ausland']),
				'wz_TELEFON_PRIV'		=> trim($value['Telefon_1']).', '.trim($value['Telefon_2']),
				'wz_MOBIL_PRIV'			=> trim($value['Mobil_1']).', '.trim($value['Mobil_2']),
				'wz_EMAIL_PRIV'			=> $eMail,
				'wz_NOTIZ_BERUF'		=> trim($value['Notizen']),
				
			);
				
			$present = dbx::query("select * from $personenTable where wz_VORNAME = '$vorname' and wz_VORNAME = '$nachname' and wz_EMAIL = '$eMail'");
			
			if($present === false)
			{
				$lastInsert = xredaktor_fe::wInsert(210,$db);
				$db['WZID'] = $lastInsert;
				$data[$key]['WZID'] = $lastInsert;
			}
			else 
			{
				$wz_id = intval($present['wz_id']);
				dbx::update($personenTable,$db,array('wz_id'=>$wz_id));
				$db['WZID'] = $wz_id;
				//$data[$key]['WZID'] = $wz_id;
			}
			
			$wzido = intval($db['WZID']);
			
			if(isset($value['WZID']))
			{
				$bid = intval($value['WZID']);
				
				$present = dbx::query("select * from wizard_auto_SIMPLE_W2W_209_210 where wz_id_low = $bid and wz_id_high = $wzido");
				
				if($present === false)
				{
					dbx::insert('wizard_auto_SIMPLE_W2W_209_210',array('wz_id_low' => $bid,'wz_id_high'=>$wzido));
				}
			}
			
			if(trim($value['275_-_VIP_Direktor_Baier__6_']) != '')
			{
				$present = dbx::query("select * from wizard_auto_SIMPLE_W2W_210_275 where wz_id_low = $wzido and wz_id_high = 6");
				
				if($present === false)
				{
					dbx::insert('wizard_auto_SIMPLE_W2W_210_275',array('wz_id_low' => $db['WZID'],'wz_id_high'=>6));
				}
			}
			
			if(trim($value['275_-_Weihnachtskarte__10_']) != '')
			{
				$present = dbx::query("select * from wizard_auto_SIMPLE_W2W_210_275 where wz_id_low = $wzido and wz_id_high = 10");
				
				if($present === false)
				{
					dbx::insert('wizard_auto_SIMPLE_W2W_210_275',array('wz_id_low' => $db['WZID'],'wz_id_high'=>10));
				}
			}
		}
		
	}

	public static function getAnrede($a)
	{
		switch(trim($a))
		{
			case 'Herr':
				return 1;
				break;
			case 'Frau':
				return 2;
				break;
			case 'Familie':
				return 3;
				break;
			default:
				return 0;
				break;
		}
	}

	public static function getBundesland($bl)
	{
		switch(trim($bl))
		{
			case 'B':
				return 'Burgenland';
				break;
			case 'K':
				return 'Kärnten';
				break;
			case 'N':
				return 'Niederösterreich';
				break;
			case 'O':
				return 'Oberösterreich';
				break;
			case 'S':
				return 'Salzburg';
				break;
			case 'ST':
				return 'Steiermark';
				break;
			case 'T':
				return 'Tirol';
				break;
			case 'V':
				return 'Vorarlberg';
				break;
			case 'W':
				return 'Wien';
				break;
			default:
				return '';
				break;
		}
	}
	
	public static function getLand($l)
	{
		switch(trim($l))
		{
			case 'AE':
				return 'Vereinigte Arabische Emirate';
				break;
			case 'AR':
				return 'Argentinien';
				break;
			case 'AT':
				return 'Österreich';
				break;
			case 'AU':
				return 'Australien';
				break;
			case 'BE':
				return 'Belgien';
				break;
			case 'CA':
				return 'Kanada';
				break;
			case 'CN':
				return 'China';
				break;
			case 'CH':
			case 'SW':
				return 'Schweiz';
				break;
			case 'DE':
			case 'DT':
				return 'Deutschland';
				break;
			case 'CZ':
				return 'Tschechien';
				break;
			case 'E':
			case 'ES':
				return 'Spanien';
				break;
			case 'FR':
				return 'Frankreich';
				break;
			case 'GB':
				return 'Vereinigtes Königreich';
				break;
			case 'H':
			case 'HU':
				return 'Ungarn';
				break;
			case 'CRO':
			case 'HR':
				return 'Kroatien';
				break;
			case 'IT':
				return 'Italien';
				break;
			case 'JP':
				return 'Japan';
				break;
			case 'KP':
			case 'KR':
				return 'Korea';
				break;
			case 'LI':
				return 'Liechtenstein';
				break;
			case 'LU':
				return 'Luxemburg';
				break;
			case 'MT':
				return 'Malta';
				break;
			case 'NL':
				return 'Niederlande';
				break;
			case 'PL':
				return 'Polen';
				break;
			case 'RO':
				return 'Rumänien';
				break;
			case 'RU':
			case 'RUS':
				return 'Russland';
				break;
			case 'SE':
				return 'Schweden';
				break;
			case 'SG':
				return 'Singapur';
				break;
			case 'SK':
				return 'Slowakei';
				break;
			case 'SLO':
				return 'Slowenien';
				break;
			case 'TW':
				return 'Taiwan';
				break;
			case 'UA':
				return 'Ukraine';
				break;
			case 'US':
			case 'USA':
				return 'Vereinigte Staaten von Amerika';
				break;
			default:
				return '';
				break;
		}
	}
}
