var xluerzer_menu = (function() {
	var instance = null;
	return new function() {

		this.getInstance = function(config) {
			if (instance == null) {
				instance = new xluerzer_menu_(config);
			}
			return instance;
		}
	}
})();

var xluerzer_menu_ = function(config) {
	this.config = config || {};
};

xluerzer_menu_.prototype = {

	getMenues: function() {

		/*
		var ret = {
		'Online Editorial'	: xluerzer_oe.getInstance().getMenu(),
		'Submissions' 		: this.getMenueEditorial(),
		'CRM' 				: this.getMenueCRM(),
		'Editorial' 		: this.getMenueEditorial2(),
		'Admin'				: this.getMenueAdmin()
		};
		*/

		var ret = {};
		var masterCfg = xredaktor.getInstance().getMasterCfg();
		console.info("masterCfg",masterCfg.xluerzer);


		if (masterCfg.xluerzer.abu_security_OE == 1)
		{
			ret['Online Editorial'] = xluerzer_oe.getInstance().getMenu();
		}
		if (masterCfg.xluerzer.abu_security_SUBMISSIONS == 1)
		{
			ret['Submissions'] = this.getMenueEditorial();
		}
		if (masterCfg.xluerzer['abu_security_CRM-CONTACTS-ACCESS'] == 1)
		{
			ret['CRM'] = this.getMenueCRM();
		}

		if (masterCfg.xluerzer.abu_security_EDITORAL == 1)
		{
			ret['Editorial'] = this.getMenueEditorial2();
		}

		if (masterCfg.xluerzer.abu_security_ADMIN == 1)
		{
			ret['Admin'] = this.getMenueAdmin();
		}


		/*
		var addOns = [
		/*
		'Newsletter',

		{
		text: 'Submissions',
		title: 'Submissions',
		classx: 'xluerzer_contacts',
		fn: 'open_search'
		},
		{
		text: 'Lists',
		title: 'Lists',
		classx: 'xluerzer_contacts',
		fn: 'open_search'
		},
		{
		text: 'Recipients',
		title: 'Recipients',
		classx: 'xluerzer_contacts',
		fn: 'open_search'
		}
		* /
		];

		Ext.each(addOns,function(tmp){
		ret['Online Editorial'].push(tmp);
		},this);

		*/


		return ret;
	},

	getMenueCRM: function()
	{

		var ret =  [
		{
			text: 'Search / Add Contacts',
			title: 'Contacts - Add / Search',
			classx: 'xluerzer_contacts',
			fn: 'open_search'
		},

		{
			xtype: 'numberfield',
			minValue: 0,
			width: 150,
			maxWidth: 250,
			fieldLabel: 'Contact ID:',
			hideTrigger:true,
			fn: 'open_search',
			value: parseInt(Ext.util.Cookies.get('lastOpenedContactId'),10),
			listeners: {
				specialkey: function(field, e){
					if (e.getKey() == e.ENTER) {
						var ec_id = field.getValue();
						Ext.util.Cookies.set('lastOpenedContactId', ec_id);
						xluerzer_contacts_detail.getInstance().open(ec_id);
					}
				}
			}
		},

		'-',

		{
			text: 'Batch CRM-Working',
			title: 'Batch CRM-Working',
			classx: 'xluerzer_batch',
			fn: 'open_overview'
		},


		];

		return ret;
	},

	getMenueOnlineEditorial: function() {

		var ret =  [

		'Startpage',

		{
			text: 'Featured Profiles'
		},

		{
			text: 'Frontpage Configuration'
		},

		'-',

		{
			text: 'Features'
		},

		{
			text: 'Blog Posts'
		},

		{
			text: 'Inspirations'
		},

		{
			text: 'Events'
		},

		{
			text: 'Partners'
		},

		{
			text: 'Other Articles'
		},

		'-',

		{
			text: 'File Archive',
			title: 'CMS File Archive',
			classx: 'xluerzer_oe',
			fn: 'open_fa'

		},


		];

		return ret;
	},

	getLastDate: function()
	{
		var lastDay = Ext.util.Cookies.get('lastOpenedSubmissionDay');
		if (!lastDay) lastDay = new Date();

		lastDay = Ext.Date.parse(lastDay, "Y-m-d");

		return lastDay;
	},


	createFilm: function()
	{
		return this.create(2);
	},

	createPrint: function()
	{
		return this.create(1);
	},

	create: function(es_mediaType_id)
	{
		var guix = xluerzer.getInstance().masterTab;
		
		guix.mask('Creating new Submission ['+es_mediaType_id+']...');
		xframe.ajax({
			scope: this,
			type: 'post',
			url: xluerzer.getInstance().getAjaxPath('submissions/createEmpty'),
			params : {
				es_mediaType_id: es_mediaType_id
			},
			stateless: function(success, json)
			{
				guix.unmask();
				if (!success) return;
				this.open(json.es_id);
			}
		});
	},


	open: function(es_id)
	{
		es_id = parseInt(es_id,10);
		if (es_id == 0) return;
		xluerzer_submissions_detail.getInstance().open(es_id);
	},


	getMenueEditorial: function() {

		var ret =  [

		{
			xtype: 'datepicker',
			fieldLabel: 'By date',
			value: this.getLastDate(),
			listeners: {
				buffer: 10,
				select: function(field,date) {
					var datex = Ext.Date.format(date,'Y-m-d');
					Ext.util.Cookies.set('lastOpenedSubmissionDay', datex);
					xluerzer_submissions.getInstance().openGrid_day(datex);
				}
			}

		},

		{
			text: 'Day-Overview',
			title: 'Submission - Day-Overview',
			classx: 'xluerzer_submissions',
			fn: 'openGrid_dayOverview'
		},

		{
			text: 'Search Submissions',
			title: 'Submission - Search',
			classx: 'xluerzer_submissions',
			fn: 'open_search'

		},

		{
			text: 'High-Res Uploads',
			title: 'High-Res Uploads (ONLY)',
			classx: 'xluerzer_highres',
			fn: 'open_overview'

		},

		{
			xtype: 'numberfield',
			minValue: 0,
			width: 150,
			maxWidth: 250,
			fieldLabel: 'Submission ID:',
			hideTrigger:true,
			fn: 'open_search',
			value: parseInt(Ext.util.Cookies.get('lastOpenedSubmissionId'),10),
			listeners: {
				specialkey: function(field, e){
					if (e.getKey() == e.ENTER) {
						var es_id = field.getValue();
						Ext.util.Cookies.set('lastOpenedSubmissionId', es_id);
						xluerzer_submissions.getInstance().openSubmission(es_id);
					}
				}
			}
		},

		{

			iconCls: 'xf_add',
			xtype: 'button',
			text: 'Create Print',
			scope: this,
			handler: this.createPrint
		},




		{

			iconCls: 'xf_add',
			xtype: 'button',
			text: 'Create Film',
			scope: this,
			handler: this.createFilm
		},

		'-',

		{
			text: 'Student Submissions',
			title: 'Student Submissions',
			classx: 'xluerzer_students',
			fn: 'open_search'

		},



		];

		return ret;

	},

	renderer_digital: function(value)
	{
		if ((value !== 'undefined') && (value != 0)) {
			return "<img width=100 height=100 src='/xgo/xplugs/xluerzer/ajax/oe_media/galleryImg/"+value+"'>";
		}
		else {
			return "";
			return "<img width=100 height=100 src='/xgo/xplugs/xluerzer/ajax/oe_media/galleryImg/default.png'>";
		}
	},

	digital_renderer_state: function(value,td)
	{
		switch(''+value)
		{
			case '0':
			return 'Editing';
			case '1':
			return 'Submitted';
			case '9':
			td.style = "background-color:#CCFF66;";
			return 'Published';
			case '10':
			td.style = "background-color:#FF0000;color:white;";
			return 'Unpublished';
			default: return value;
		}
	},

	getMenueEditorial2: function() {


		var e 	= xluerzer_e.getInstance();
		var gr 	= e.renderer_titleImgFromGallery_interview;
		var gr2 = e.renderer_titleImgFromGallery_dinterview;

		var ret =  [
		{
			text: 'Ads of the Week',
			classx: 'xluerzer_adsoftheweek',
			fn: 'open'
		},

		'Media',

		{
			text: 'Search / Modification Media ',
			title: 'Search / Modification Media',
			classx: 'xluerzer_media',
			fn: 'open_search',
			param_0: ''
		},

		{
			xtype: 'numberfield',
			classx: 'xluerzer_media',
			minValue: 0,
			width: 150,
			maxWidth: 250,
			fieldLabel: 'Media ID:',
			hideTrigger:true,
			fn: 'open_search',
			value: parseInt(Ext.util.Cookies.get('lastOpenedMediaId'),10),
			listeners: {
				specialkey: function(field, e){
					if (e.getKey() == e.ENTER) {
						var eam_id = field.getValue();
						Ext.util.Cookies.set('lastOpenedMediaId', eam_id);
						xluerzer_media_detail.getInstance().open(eam_id);
					}
				}
			}
		},

		'-',

		xluerzer_gui.getInstance().defaultAction({

			cfg_grid: {
				disableDel: true,
				text:'Apps',
				pid: 'eda_id',
				fields: [{name:'eda_state',text:'State',width:80,renderer: this.digital_renderer_state},{name:'eda_year',text:'Year',width:80},{name:'eda_edition',text:'Edition',width:80},{name:'eda_title',text:'Title',width:150},{name:'eda_description',text:'Description',kickHtml:true},{name:'eda_modified_ts',text:'Modified on', width: 120},{name:'eda_created_ts',text:'Created on', width: 120},{name:'eda_preview_image',text:'Image',renderer: this.renderer_digital,scope:this, width: 120},{name:'eda_img_gallery',text:'Other Images',  renderer: xluerzer_oe.getInstance().renderer_gallery}],
				scopex: 'e_digital_app',
				initSort: '[{"property":"eda_id","direction":"DESC"},{"property":"eda_year","direction":"DESC"},{"property":"eda_edition","direction":"DESC"}]'
			},

			cfg_record: {
				handler: xluerzer_e.getInstance().default_recordInterface,
				scope: xluerzer_e.getInstance(),
				at_id: 12,
				pid: 	'eda_id',
				prefix: 'eda_',
				title: 'Apps',
				scopex: 'e_digital_app'
			}

		}),

		xluerzer_gui.getInstance().defaultAction({

			cfg_grid: {
				disableDel: true,
				text:'Website',
				pid: 'edw_id',
				fields: [{name:'edw_state',text:'State',width:80,renderer:  this.digital_renderer_state},{name:'edw_year',text:'Year',width:80},{name:'edw_edition',text:'Edition',width:80},{name:'edw_title',text:'Title',width:150},{name:'edw_description',text:'Description',kickHtml:true},{name:'edw_modified_ts',text:'Modified on', width: 120},{name:'edw_created_ts',text:'Created on', width: 120},{name:'edw_preview_image',text:'Image',renderer: this.renderer_digital,scope:this, width: 120},{name:'edw_img_gallery',text:'Other Images',  renderer: xluerzer_oe.getInstance().renderer_gallery}],
				scopex: 'e_digital_web',
				initSort: '[{"property":"edw_id","direction":"DESC"},{"property":"edw_id","direction":"DESC"},{"property":"edw_edition","direction":"DESC"}]'
			},

			cfg_record: {
				handler: xluerzer_e.getInstance().default_recordInterface,
				scope: xluerzer_e.getInstance(),
				at_id: 13,
				pid: 	'edw_id',
				prefix: 'edw_',
				title: 'Websites',
				scopex: 'e_digital_web'
			}

		}),

		xluerzer_gui.getInstance().defaultAction({

			cfg_grid: {
				disableDel: true,
				text:'Interviews',
				pid: 'ei_id',
				fields: [{name:'ei_state',text:'Status', width: 80},{name:'ei_magazine_id',text:'Mag-ID', width: 80},{name:'ei_year',text:'Year', width: 50},{name:'ei_edition',text:'Edition', width: 50},{name:'ei_partner',text:'Interview Partner', width: 150},{name:'ei_modified_ts',text:'Modified on', width: 120},{name:'ei_created_ts',text:'Created on', width: 120},{width: 150, name:'ei_preview_image',text:'First Image',renderer: gr, scope: e},{name:'ei_img_gallery',text:'Gallery',  renderer: xluerzer_oe.getInstance().renderer_gallery}],
				scopex: 'e_interviews',
				initSort: '[{"property":"ei_id","direction":"DESC"}]'
			},

			cfg_record: {
				handler: xluerzer_e.getInstance().default_recordInterface,
				scope: xluerzer_e.getInstance(),
				at_id: 9,
				pid: 	'ei_id',
				prefix: 'ei_',
				title: 'Interview',
				scopex: 'e_interviews'
			}
		}),

		xluerzer_gui.getInstance().defaultAction({

			cfg_grid: {
				disableDel: true,
				text:'Digital Interviews',
				pid: 'edi_id',
				fields: [{name:'edi_state',text:'Status', width: 80},{name:'edi_magazine_id',text:'Mag-ID', width: 80},{name:'edi_year',text:'Year', width: 50},{name:'edi_edition',text:'Edition', width: 50},{name:'edi_partner',text:'Interview Partner', width: 150,kickHtml:true},{name:'edi_modified_ts',text:'Modified on', width: 120},{name:'edi_created_ts',text:'Created on', width: 120},{width: 150, name:'edi_preview_image',text:'First Image',renderer: gr2, scope: e},{name:'edi_img_gallery',text:'Gallery',  renderer: xluerzer_oe.getInstance().renderer_gallery}],
				scopex: 'e_digitalInterviews',
				initSort: '[{"property":"edi_id","direction":"DESC"}]'
			},

			cfg_record: {
				handler: xluerzer_e.getInstance().default_recordInterface,
				scope: xluerzer_e.getInstance(),
				at_id: 10,
				pid: 	'edi_id',
				prefix: 'edi_',
				title: 'Digital Interview',
				scopex: 'e_digitalInterviews'
			}

		}),

		'-',

		{
			title: 'Publishing Products',
			text: 'Publishing Products',
			classx: 'xluerzer_magazines',
			fn: 'open'
		},

		'-',
		{
			text: 'ADS Configurations',
			title: 'ADS Configurations',
			classx: 'xluerzer_ads',
			fn: 'open_overview'
		},


		xluerzer_gui.getInstance().defaultAction({

			cfg_grid: {
				text:'Students Winner Articles',
				pid: 'esw_id',
				fields: [{name:'esw_year',text:'Year', width: 40},{name:'esw_state',text:'State', width: 100, renderer: xluerzer_renderer.getInstance().renderer_state_students},{name:'esw_title',text:'Title'},{name:'esw_img_gallery',text:'Gallery',  renderer:xluerzer_oe.getInstance().renderer_gallery},{name:'esw_modified_ts',text:'Modified on', width: 80},{name:'esw_created_ts',text:'Created on', width: 80}],
				scopex: 'e_students_winner',
				initSort: '[{"property":"esw_year","direction":"DESC"}]'
			},

			cfg_record: {
				handler: xluerzer_e.getInstance().default_recordInterface,
				scope: xluerzer_e.getInstance(),
				at_id: 11,
				pid: 	'esw_id',
				prefix: 'esw_',
				title: 'Students Winner Article',
				scopex: 'e_students_winner'
			}
		}),






		];

		return ret;

	},

	getMenueAdmin: function() {

		var ret =  [

		{
			text: 'Voting',
			classx: 'xluerzer_voting2',
			fn: 'open'
		},



		'-',

		xluerzer_gui.getInstance().defaultAction({

			cfg_grid: {
				text:'IP-Ranges',
				pid: 'aitc_id',
				fields: [{name:'aitc_ip',text:'IP',width:200},{name:'aitc_fe_user_id',text:'User ID',width:80}, {name:'aitc_contact_id_human',text:'Name',width:200}, {name:'aitc_modified_ts',text:'Modified'}],
				scopex: 'a_ipranges',
				initSort: '[{"property":"aitc_id","direction":"DESC"}]'
			},

			cfg_record: {
				handler: xluerzer_a.getInstance().default_recordInterface,
				scope: xluerzer_a.getInstance(),
				at_id: 11,
				pid: 	'aitc_id',
				prefix: 'aitc_',
				title: 'IP-Ranges',
				scopex: 'a_ipranges'
			}

		}),
		
		'-',

		xluerzer_gui.getInstance().defaultAction({

			cfg_grid: {
				text:'Distributors',
				pid: 'ed_id',
				fields: [{name:'ed_contact_id',text:'Contact ID',width:80},{name:'ed_shop_country_human',text:'Country',width:160}, {name:'ed_modified_ts',text:'Modified',width:160},{name:'ed_contact_name',text:'Contact Name'}],
				scopex: 'a_distributors',
				initSort: '[{"property":"ed_id","direction":"DESC"}]'
			},

			cfg_record: {
				handler: xluerzer_a.getInstance().default_recordInterface,
				scope: xluerzer_a.getInstance(),
				at_id: 0,
				pid: 	'ed_id',
				prefix: 'ed_',
				title: 'Distributors',
				scopex: 'a_distributors'
			}

		}),


		xluerzer_gui.getInstance().defaultAction({

			cfg_grid: {
				text:'Ranking Exclusions',
				pid: 'are_id',
				fields: [{name:'are_contact_id',text:'Contact ID',width:80},{name:'are_contact_id_human',text:'Name',width:200},{name:'are_notes',text:'Notes', width:200}, {name:'are_modified_ts',text:'Modified'}],
				scopex: 'a_rankingexclusions',
				initSort: '[{"property":"are_id","direction":"DESC"}]'
			},

			cfg_record: {
				handler: xluerzer_a.getInstance().default_recordInterface,
				scope: xluerzer_a.getInstance(),
				at_id: 10,
				pid: 	'are_id',
				prefix: 'are_',
				title: 'Ranking Exclusions',
				scopex: 'a_rankingexclusions'
			}

		}),

		xluerzer_gui.getInstance().defaultAction({

			cfg_grid: {
				text:'Blog Categories',
				pid: 'oebc_id',
				fields: [{name:'oebc_name',text:'Name'}],
				scopex: 'a_blog_categories',
				initSort: '[{"property":"oebc_name","direction":"ASC"}]'
			},

			cfg_record: {
				handler: xluerzer_a.getInstance().default_recordInterface,
				scope: xluerzer_a.getInstance(),
				at_id: 0,
				pid: 	'oebc_id',
				prefix: 'oebc_',
				title: 'Blog Categories',
				scopex: 'a_blog_categories'
			}

		}),

		{
			text: 'Contact Importer',
			classx: 'xluerzer_contact_importer',
			fn: 'open'
		},

		{
			text: 'FE-Users | Profiles',
			classx: 'xluerzer_profiles_fe_users',
			fn: 'open'
		},


		{
			text: 'Contact Log Report',
			title: 'Contact Log Report',
			classx: 'xluerzer_contactlogreport',
			fn: 'open'
		},
		
		{
			text: 'iEdition',
			title: 'iEdition',
			classx: 'xluerzer_iedition',
			fn: 'open'
		},

		{
			text: 'FE-Submission Combiner',
			title: 'FE-Submission Combiner',
			classx: 'xluerzer_feSubmissionMerger',
			fn: 'open'
		},


		xluerzer_gui.getInstance().defaultAction({

			cfg_grid: {
				text:'Contact Categories',
				pid: 'acc_id',
				fields: [{name:'accg_categorygroup',text:'Group', width: 300, filterable: false},{name:'acc_category',text:'Name'}, {name:'countcontacts',text:'Number of Contacts', width: 120}, {name:'acc_modified_ts',text:'Modified'}],
				scopex: 'a_contact_categories',
				initSort: '[{"property":"acc_category","direction":"ASC"}]'
			},

			cfg_record: {
				handler: xluerzer_a.getInstance().default_recordInterface,
				scope: xluerzer_a.getInstance(),
				at_id: 0,
				pid: 	'acc_id',
				prefix: 'acc_',
				title: 'Contact Categories',
				scopex: 'a_contact_categories'
			}

		}),

		xluerzer_gui.getInstance().defaultAction({

			cfg_grid: {
				text:'Contact Categories Groups',
				pid: 'accg_id',
				fields: [{name:'accg_categorygroup',text:'Name'}],
				scopex: 'a_contact_categories_group',
				initSort: '[{"property":"accg_categorygroup","direction":"ASC"}]'
			},

			cfg_record: {
				handler: xluerzer_a.getInstance().default_recordInterface,
				scope: xluerzer_a.getInstance(),
				at_id: 0,
				pid: 	'accg_id',
				prefix: 'accg_',
				title: 'Contact Categories Groups',
				scopex: 'a_contact_categories_group'
			}

		}),

		'-',

		{
			text: 'Credits Administration',
			title: 'Credits Administration',
			classx: 'xluerzer_admin_credits',
			fn: 'open'
		},
		{
			text: 'Submission Administration',
			title: 'Submission Administration',
			classx: 'xluerzer_admin_submissions',
			fn: 'open'
		},

		{
			text: 'Mail - Admin',
			title: 'Mail - Admin',
			classx: 'xluerzer_mails',
			fn: 'open_admin'
		},
		
		
		
		xluerzer_gui.getInstance().defaultAction({

			cfg_grid: {
				text:'Contact-Mails',
				pid: 'wz_id',
				disableDel: true,
				disableAdd: true,
				fields: [{name:'wz_email',text:'Email',width:200}, {name:'wz_firstname',text:'Firstname',width:150},{name:'wz_lastname',text:'Lastname',width:150},{name:'wz_message',text:'Message'}, {name:'wz_created',text:'Sent',width:140}],
				scopex: 'a_mailarchiv',
				initSort: '[{"property":"wz_id","direction":"DESC"}]'
			},

			cfg_record: {
				handler: xluerzer_a.getInstance().default_recordInterface,
				scope: xluerzer_a.getInstance(),
				disableSave: true,
				pid: 	'wz_id',
				prefix: 'wz_',
				title: 'Contact Mail',
				scopex: 'a_mailarchiv'
			}

		}),
		


		{
			text: 'Statistics',
			title: 'Statistics',
			classx: 'xluerzer_stats',
			fn: 'open_overview'
		},








		'-',

		xluerzer_gui.getInstance().defaultAction({

			cfg_grid: {
				text:'Backend User',
				pid: 'abu_id',
				fields: [{name:'abu_username',text:'Name'},{name:'abu_email',text:'Email'},{name:'abu_lastLogin',text:'Last login'}],
				scopex: 'a_backenduser',
				initSort: '[{"property":"abu_lastLogin","direction":"DESC"}]'
			},

			cfg_record: {
				handler: xluerzer_a.getInstance().default_recordInterface,
				scope: xluerzer_a.getInstance(),
				at_id: 1,
				pid: 	'abu_id',
				prefix: 'abu_',
				title: 'Backend User',
				scopex: 'a_backenduser'
			}

		}),

		xluerzer_gui.getInstance().defaultAction({

			cfg_grid: {
				text:'Frontend / Shop User',
				pid: 'feu_id',
				fields: [{name:'feu_email',text:'E-Mail'},{name:'feu_lastname',text:'Last Name'},{name:'feu_firstname',text:'First name'},{name:'feu_company',text:'Company'},{name:'feu_city',text:'City'},{name:'asc_name',text:'Country'},{name:'feu_modified_ts',text:'Modified'},{name:'feu_created_ts',text:'Created'},{name:'feu_oa_validto',text:'Valid-Subscription To'},{name:'feu_oa_validto_remaining',text:'Remaining Days', scope:this, renderer: this.fe_user_renderer, sortable: false}, {name:'feu_login_count',text:'Logins'}],
				scopex: 'a_frontendcontact',
				initSort: '[{"property":"feu_id","direction":"desc"}]'
			},

			cfg_record: {
				handler: xluerzer_a.getInstance().default_recordInterface,
				scope: xluerzer_a.getInstance(),
				at_id: 112,
				pid: 	'feu_id',
				prefix: 'feu_',
				scopex: 'a_frontendcontact',
				title: 'Frontend User'
			}

		}),




		];

		return ret;
	},


	fe_user_renderer : function(value, metaData, record, rowIndex, colIndex, store, view)
	{
		var valuex = parseInt(value,10);

		if (valuex > 0) {
			setTimeout(function(){
				view.addRowCls(rowIndex, 'subscription-valid');
			},10);
		}
		else if (valuex < 0) {
			setTimeout(function(){
				view.addRowCls(rowIndex, 'subscription-invalid');
			},10);
		}
		else  if (valuex == 0) {
			setTimeout(function(){
				view.addRowCls(rowIndex, 'subscription-ends-today');
			},10);
		}



		//'subscription-notyet';

		return value;
	}


}
