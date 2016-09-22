<?

class xluerzer_admin
{
	public static function defaultAjaxHandler($function,$param_0)
	{
		switch ($function)
		{
			case 'statics':

				$ids = "(20,21,22,23,24)";
				
				$sql_data = "SELECT * FROM pages where p_id in $ids";
				$sql_cnt = "SELECT count(*)  as sql_cnt FROM pages where p_id in $ids ";

				xluerzer_db::uniqueDataGridWrapper(array(
				'sql_data' 	=> $sql_data,
				'sql_cnt' 	=> $sql_cnt,
				));
				
				break;

			case 'loadoecontact_groupCategorys':
				self::loadContactCategoriesGroups();
				break;
			case 'loadbackendUsers':
				self::loadbackendUsers();
				break;
			case 'loadContactCategories':
				self::loadContactCategories();
				break;
			case 'saveContactCategories':
				self::saveContactCategories();
				break;
			case 'loadoeBlogCategorys':
				self::loadoeBlogCategorys();
				break;
			default:
				die('XXX');
		}
	}

	public static function saveContactCategories()
	{
		$eca_id = intval($_REQUEST['eca_id']);
		$state 	= intval($_REQUEST['state']);
		$cat_id = intval($_REQUEST['cat_id']);


		dbx::query("delete from a_contact_to_category where actc_category_id = $cat_id and actc_contact_id = $eca_id");

		if ($state == '1')
		{
			dbx::insert('a_contact_to_category',array('actc_category_id'=>$cat_id,'actc_contact_id'=>$eca_id,'actc_created_ts'=>'NOW()'));
		}


		frontcontrollerx::json_success();
	}

	public static function loadContactCategories()
	{
		$groupsCanBeChecked = ($_REQUEST['GROUP_CHECK']=='1');
		
		$_query = trim(dbx::escape($_REQUEST['_query']));
		
		$ret 	= array();
		$groups = dbx::queryAll("select * from a_contact_category_group where accg_del='N' order by accg_categorygroup asc ");
		$ec_id 	= intval($_REQUEST['ec_id']);

		$assignments = array();

		if ($ec_id > 0)
		{
			$assigned = dbx::queryAll("select actc_category_id from a_contact_to_category where actc_contact_id = $ec_id");
			foreach ($assigned as $a)
			{
				$idx = intval($a['actc_category_id']);
				$assignments[] = $idx;
			}
		}


		foreach ($groups as $g)
		{
			$id 	= $g['accg_id'];
			$cntx 	= 0;

			$searchIt = ""; 
			
			if ($_query != "")
			{
				$searchIt = " AND acc_category LIKE '%$_query%' "; 
			}
			
			$children = dbx::queryAll("select acc_id as id, acc_category as text, true as leaf from a_contact_category where acc_categoryGroup_id  = $id $searchIt order by acc_category");
			if ($children === false) continue;
			if ($children === false) $children = array();
			
			foreach ($children as $i => $c)
			{
				$idx = $c['id'];
				$checked = in_array($idx,$assignments);
				if ($checked) $cntx++;

				$children[$i]['checked'] = $checked;
				$children[$i]['iconCls'] = 'cc_group_node';
			}

			$tmp = array(
			id 			=> 'group_'.$id,
			text 		=> $g['accg_categorygroup'],
			iconCls		=> 'cc_group',
			leaf 		=> false,
			children	=> $children,
			//checked 	=> false
			);

			if ($groupsCanBeChecked)
			{
				$tmp['checked'] = false;
			}
			
			if (($ec_id > 0) && ($cntx > 0))
			{
				$tmp['text'] = $tmp['text']." <b>($cntx)</b>";
			}

			$ret[] = $tmp;
		}

		echo json_encode($ret);
		die();
	}


	public static function loadbackendUsers()
	{
		$records = array();
		$records[] = array('label'=>'not assigned','value'=>0);
		$records = array_merge($records,dbx::queryAll("select abu_username as label, abu_id as value from a_backend_user where abu_username IS NOT NULL AND abu_username != '' order by abu_username"));
		frontcontrollerx::json_success(array('backendUsers'=>$records));
	}


	public static function loadoeBlogCategorys()
	{
		$records = array();
		$records[] = array('label'=>'not assigned','value'=>0);
		$records = array_merge($records,dbx::queryAll("select oebc_name as label, oebc_id as value from oe_blog_categories where oebc_del='N' order by oebc_name asc"));
		frontcontrollerx::json_success(array('oeBlogCategorys'=>$records));
	}

	public static function loadContactCategoriesGroups()
	{
		$records = array();
		$records[] = array('label'=>'not assigned','value'=>0);
		$records = array_merge($records,dbx::queryAll("select accg_categorygroup as label, accg_id as value from a_contact_category_group  order by accg_categorygroup asc"));
		frontcontrollerx::json_success(array('oecontact_groupCategorys'=>$records));
	}


}