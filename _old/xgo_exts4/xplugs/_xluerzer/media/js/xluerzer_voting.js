var xluerzer_voting = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xluerzer_voting";
		}

		this.getInstance = function(config) {
			return new xluerzer_voting_(config);
			return instance;
		}
	}
})();

var xluerzer_voting_ = function(config) {
	this.config = config || {};
};

xluerzer_voting_.prototype = {

	reportVoting2: function(evr_id,users)
	{

		var fields_submissions =  [
		{name:'es_id', 				text:'Image',						width: 160, type: 'int', renderer: xluerzer_submissions.getInstance().renderer_submission_small, scope: xluerzer_submissions.getInstance()},
		{name:'votes_cnt', 			text:'Votes',						width: 50,  type: 'int'},
		{name:'evr_submission_id', 	text:'S-ID',						width: 60,  type: 'int'},
		{name:'es_magazine_id', 	text:'M-ID', 						width: 50,  type: 'string'},
		{name:'es_submittedBy',		text:'Submitter', 					width: 100, type: 'string'},
		{name:'es_created_ts',		text:'Submitted On', 				width: 120,  type: 'string'},
		];

		Ext.each(users,function(obj){
			fields_submissions.push({name:'user_info_'+obj.evu_id, 	text:obj.evu_name, type: 'string', renderer: this.voteRender});
		},this);

		var report_submission = xframe_pattern.getInstance().genGrid({
			region:'west',
			width: 200,
			forceFit:true,
			border:false,
			title: 'By Submissions',
			split: true,
			collapseMode: 'mini',
			button_del:false,
			button_add:false,
			search: false,
			records_move: false,
			pager: true,
			xstore: {
				load: 	xluerzer.getInstance().getAjaxPath('voting_reporting_by_submissions2/load'),
				params: {
					evr_id: evr_id
				},
				pid: 	'es_id',
				fields: fields_submissions
			},
			listeners: {
				scope:this,
				buffer: 1,
				afterrender: function(t) {
					t.getStore().load();
				}
			}
		});


		var fields_users  =  [
		{name:'evu_id', 			text:'Voter-ID',			type: 'int'},
		{name:'evu_name', 			text:'Name',				type: 'string'},
		{name:'liked', 				text:'Accepted',			type: 'int'},
		{name:'dissed', 			text:'Discarded', 			type: 'int'},
		//{name:'nv',					text:'Not Voted', 			type: 'int'},
		//{name:'total',				text:'Total', 				type: 'int'},
		];

		var report_users = xframe_pattern.getInstance().genGrid({
			region:'west',
			width: 200,
			forceFit:true,
			border:false,
			title: 'By Voters',
			split: true,
			collapseMode: 'mini',
			button_del:false,
			button_add:false,
			search: false,
			records_move: false,
			pager: true,
			xstore: {
				load: 	xluerzer.getInstance().getAjaxPath('voting_reporting_by_users2/load'),
				params: {
					evr_id: evr_id
				},
				pid: 	'evu_id',
				fields: fields_users
			},
			listeners: {
				scope:this,
				buffer: 1,
				afterrender: function(t) {
					t.getStore().load();
				}
			}
		});

		/* *******************************************************************

		LÄNDER

		********************************************************************* */


		var fields_countrys =  [
		{name:'asc_name', 		text:'Country', 	type: 'string', sortable: false},
		{name:'count', 			text:'Count', 		type: 'int', sortable: false}
		];

		var report_countrys = xframe_pattern.getInstance().genGrid({
			region:'west',
			width: 200,
			forceFit:true,
			border:false,
			title: 'Countries',
			split: true,
			collapseMode: 'mini',
			button_del:false,
			button_add:false,
			search: false,
			records_move: false,
			pager: true,
			xstore: {
				load: 	xluerzer.getInstance().getAjaxPath('voting_countrys2/load'),
				params: {
					evr_id: evr_id
				},
				pid: 	'evu_id',
				fields: fields_countrys
			},
			listeners: {
				scope:this,
				buffer: 1,
				afterrender: function(t) {
					t.getStore().load();
				}
			}
		});


		var fields_want =  [
		{name:'votes', 			text:'Votes', 		type: 'int'},
		{name:'count', 			text:'Count', 		type: 'int'},
		{name:'submitter', 		text:'Submitter', 	type: 'int',  sortable: false},
		];

		var report_want = xframe_pattern.getInstance().genGrid({
			region:'west',
			width: 200,
			forceFit:true,
			border:false,
			title: 'Detailed',
			split: true,
			collapseMode: 'mini',
			button_del:false,
			button_add:false,
			search: false,
			records_move: false,
			pager: true,
			xstore: {
				load: 	xluerzer.getInstance().getAjaxPath('voting_detailed2/load'),
				params: {
					evr_id: evr_id
				},
				pid: 	'evu_id',
				fields: fields_want
			},
			listeners: {
				scope:this,
				buffer: 1,
				afterrender: function(t) {
					t.getStore().load();
				}
			}
		});





		var gui = Ext.widget({
			title: 'Info',
			xtype: 'tabpanel',
			items: [report_want, report_countrys,  report_submission,report_users]
		});

		return gui;
	},


	reportDetails: function(type)
	{


		var fields_submissions =  [
		{name:'evr_id', 					text:'ID',							type: 'int'},
		{name:'evr_name',					text:'Name',				 		type: 'string', editor: {allowBlank: false, xtype: 'textfield'}},
		{name:'evr_submission_id_start', 	text:'Start',						type: 'int', editor: {xtype: 'numberfield',allowDecimals:false}},
		{name:'evr_submission_id_stop', 	text:'Stop',						type: 'int', editor: {xtype: 'numberfield',allowDecimals:false}},
		];

		var report_submission = xframe_pattern.getInstance().genGrid({
			forceFit:true,
			border:false,
			title: 'Reports',
			split: true,
			collapseMode: 'mini',
			button_del:true,
			button_add:true,
			search: false,
			records_move: false,
			pager: true,
			xstore: {
				load: 		xluerzer.getInstance().getAjaxPath('voting_report_nonspecial/load'),
				insert: 	xluerzer.getInstance().getAjaxPath('voting_report_nonspecial/insert'),
				update: 	xluerzer.getInstance().getAjaxPath('voting_report_nonspecial/update'),
				remove: 	xluerzer.getInstance().getAjaxPath('voting_report_nonspecial/remove'),
				params: {
					type: type
				},
				pid: 	'evr_id',
				fields: fields_submissions
			},
			listeners2: {
				scope:this,
				buffer: 1,
				afterrender: function(t) {
					t.getStore().load();
				}
			}
		});





		report_submission.on('afterrender',function(t){
			t.getStore().load();
		},this);

		report_submission.on('itemdblclick',function(t,record){
	
			
			var evr_id = record.data['evr_id'];
			
			
			this.voters_step_1.setDisabled(true);
			this.voters_step_2.setDisabled(true);
			this.voting_results.setDisabled(false);
			this.tab.setActiveTab(this.voting_results);
			this.voting_results.removeAll();



			this.gui.mask("Loading data ....");
			xframe.ajax({
				scope: this,
				url: xluerzer.getInstance().getAjaxPath('voting/loadx2'),
				params : {
					evr_id: evr_id
				},
				stateless: function(success, json)
				{
					this.gui.unmask();
					if (!success) return;
					this.voting_results.add(this.reportVoting2(evr_id,json.reports.users));
				}
			});





		},this);


		return report_submission;

	},

	saveGeneral: function()
	{

		var data = this.fp.getForm().getValues();

		console.info(data);


		var data = Ext.encode(data);

		this.gui.mask("Saving data ....");
		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('voting/save_general'),
			params : {
				ev_id: this.latest_id,
				data: data
			},
			stateless: function(success, json)
			{
				this.votingGrid.getStore().load();
				this.gui.unmask();
				if (!success) return;
			}
		});
	},

	saveGeneralAllgemein: function(type)
	{

		switch(type)
		{
			case 'print':
			var data = this.fp_print.getForm().getValues();
			var ev_id = this.id_print;
			break;
			case 'film':
			var data = this.fp_film.getForm().getValues();
			var ev_id = this.id_film;
			break;
			case 'students':
			var data = this.fp_students.getForm().getValues();
			var ev_id = this.id_students;
			break;
		}

		var data = Ext.encode(data);

		this.gui.mask("Saving data ....");
		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('voting/save_general'),
			params : {
				ev_id: ev_id,
				data: data
			},
			stateless: function(success, json)
			{
				this.votingGrid.getStore().load();
				this.gui.unmask();
				if (!success) return;
			}
		});
	},

	voteRender: function(v)
	{
		if (v == '') return "Not voted";
		var splitted = v.split("|");

		var txt = splitted[0];
		var ts 	= splitted[1];

		switch(txt)
		{
			case '1':
			txt = "<span style='background-color:green;color:white;'>&nbsp;Accepted&nbsp;</span>";
			break;
			default:
			txt = "<span style='background-color:red;color:white;'>&nbsp;Discarded&nbsp;</span>";
			break;
		}

		return txt + "<br>" + ts;
	},

	reportVoting: function(nr,users)
	{

		var fields_submissions =  [
		{name:'es_id', 				text:'Image',						width: 160, type: 'int', renderer: xluerzer_submissions.getInstance().renderer_submission_small, scope: xluerzer_submissions.getInstance()},
		{name:'votes_cnt', 			text:'Votes',						width: 50,  type: 'int'},
		{name:'evr_submission_id', 	text:'S-ID',						width: 60,  type: 'int'},
		{name:'es_magazine_id', 	text:'M-ID', 						width: 50,  type: 'string'},
		{name:'es_submittedBy',		text:'Submitter', 					width: 100, type: 'string'},
		{name:'es_created_ts',		text:'Submitted On', 				width: 120,  type: 'string'},
		];

		Ext.each(users,function(obj){
			fields_submissions.push({name:'user_info_'+obj.evu_id, 	text:obj.evu_name, type: 'string', renderer: this.voteRender});
		},this);

		var report_submission = xframe_pattern.getInstance().genGrid({
			region:'west',
			width: 200,
			forceFit:true,
			border:false,
			title: 'By Submissions (Step: '+nr+')',
			split: true,
			collapseMode: 'mini',
			button_del:false,
			button_add:false,
			search: false,
			records_move: false,
			pager: true,
			xstore: {
				load: 	xluerzer.getInstance().getAjaxPath('voting_reporting_by_submissions/load'),
				params: {
					ev_id: this.latest_id,
					evr_step: nr
				},
				pid: 	'es_id',
				fields: fields_submissions
			},
			listeners: {
				scope:this,
				buffer: 1,
				afterrender: function(t) {
					t.getStore().load();
				}
			}
		});


		var valuex 		= 0;
		var vals 		= this.fp.getForm().getValues();
		var field_id 	= Ext.id();

		switch(''+nr)
		{
			case '1':
			valuex = vals['ev_vote_limit_first_step'];
			break;

			case '2':
			valuex = vals['ev_vote_limit_second_step'];
			break;

			default:
		}

		var ev_final_vote_mode = this.fp.jsonData['ev_final_vote_mode'];



		var fields_users  =  [
		{name:'evu_id', 			text:'Voter-ID',			type: 'int'},
		{name:'evu_name', 			text:'Name',				type: 'string'},
		{name:'liked', 				text:'Accepted',			type: 'int'},
		{name:'dissed', 			text:'Discarded', 			type: 'int'},
		{name:'nv',					text:'Not Voted', 			type: 'int'},
		{name:'total',				text:'Total', 				type: 'int'},
		];

		var report_users = xframe_pattern.getInstance().genGrid({
			region:'west',
			width: 200,
			forceFit:true,
			border:false,
			title: 'By Voters (Step: '+nr+')',
			split: true,
			collapseMode: 'mini',
			button_del:false,
			button_add:false,
			search: false,
			records_move: false,
			pager: true,
			xstore: {
				load: 	xluerzer.getInstance().getAjaxPath('voting_reporting_by_users/load'),
				params: {
					ev_id: this.latest_id,
					evr_step: nr
				},
				pid: 	'evu_id',
				fields: fields_users
			},
			listeners: {
				scope:this,
				buffer: 1,
				afterrender: function(t) {
					t.getStore().load();
				}
			}
		});

		/* *******************************************************************

		LÄNDER

		********************************************************************* */


		var fields_countrys =  [
		{name:'asc_name', 		text:'Country', 	type: 'string', sortable: false},
		{name:'count', 			text:'Count', 		type: 'int', sortable: false}
		];

		var report_countrys = xframe_pattern.getInstance().genGrid({
			region:'west',
			width: 200,
			forceFit:true,
			border:false,
			title: 'Countries',
			split: true,
			collapseMode: 'mini',
			button_del:false,
			button_add:false,
			search: false,
			records_move: false,
			pager: true,
			xstore: {
				load: 	xluerzer.getInstance().getAjaxPath('voting_countrys/load'),
				params: {
					ev_id: this.latest_id,
					evr_step: nr
				},
				pid: 	'evu_id',
				fields: fields_countrys
			},
			listeners: {
				scope:this,
				buffer: 1,
				afterrender: function(t) {
					t.getStore().load();
				}
			}
		});


		var fields_want =  [
		{name:'votes', 			text:'Votes', 		type: 'int'},
		{name:'count', 			text:'Count', 		type: 'int'},
		{name:'submitter', 		text:'Submitter', 	type: 'int',  sortable: false},
		];

		var report_want = xframe_pattern.getInstance().genGrid({
			region:'west',
			width: 200,
			forceFit:true,
			border:false,
			title: 'Detailed',
			split: true,
			collapseMode: 'mini',
			button_del:false,
			button_add:false,
			search: false,
			records_move: false,
			pager: true,
			xstore: {
				load: 	xluerzer.getInstance().getAjaxPath('voting_detailed/load'),
				params: {
					ev_id: this.latest_id,
					evr_step: nr
				},
				pid: 	'evu_id',
				fields: fields_want
			},
			listeners: {
				scope:this,
				buffer: 1,
				afterrender: function(t) {
					t.getStore().load();
				}
			}
		});








		var gui = Ext.widget({
			xtype: 'tabpanel',
			title: 'Step '+nr,
			tbar: [{
				scope: this,
				value: valuex,
				text: 'Limit',
				xtype: 'numberfield',
				id: field_id
			},{
				scope: this,
				iconCls: 'xl_copy_right',
				text: 'Process Limit',
				xtype: 'button',
				handler: function()
				{
					report_want.mask("updating ...");
					xframe.ajax({
						scope: this,
						url: xluerzer.getInstance().getAjaxPath('voting/processLimit'),
						params : {
							ev_id: this.latest_id,
							step: nr,
							limit: Ext.getCmp(field_id).getValue()
						},
						stateless: function(success, json)
						{
							report_want.unmask();
							report_want.getStore().load();
							if (!success) report_want.getStore().load();
						}
					});
				}

			},{


				listeners: {
					scope: this,
					change: function(cb, newValue, oldValue, eOpts)
					{

						report_want.mask("updateing voting ....");
						xframe.ajax({
							scope: this,
							url: xluerzer.getInstance().getAjaxPath('voting/save_mode'),
							params : {
								ev_id: this.latest_id,
								ev_final_vote_mode: newValue ? '1' : '0',
							},
							stateless: function(success, json)
							{
								report_want.unmask();
								report_users.getStore().load();
								report_submission.getStore().load();
								report_countrys.getStore().load();
								report_want.getStore().load();
							}
						});




					}
				},

				scope: this,
				disabled: (''+nr == '1'),
				xtype: 'checkbox',
				name: 'overall_type_person',
				inputValue: '1',
				uncheckedValue: '0',
				boxLabel: 'Votes 1+2&nbsp;&nbsp;',
				value: ev_final_vote_mode


			},'-',{
				iconCls: 'xl_copy_right',
				scope: this,
				text: 'Close Step '+nr,
				handler: function()
				{

					report_want.mask("updating ...");
					xframe.ajax({
						scope: this,
						url: xluerzer.getInstance().getAjaxPath('voting/close_step_x'),
						params : {
							ev_id: this.latest_id,
							step: nr
						},
						stateless: function(success, json)
						{
							report_want.unmask();
							report_want.getStore().load();
							if (!success) report_want.getStore().load();
						}
					});


				}


			}],
			items: [report_want, report_countrys,  report_submission,report_users]
		});

		return gui;
	},


	getVotingPanel_step1: function(ev_id)
	{
		var voters_fields =  [
		{name:'evu_id', 					text:'ID', 					type: 'int'},
		{name:'ev_checked',					text:'Selected', 			type: 'bool'},
		{name:'evu_name',					text:'Name', 				type: 'string'},
		{name:'evu_email',					text:'E-Mail', 				type: 'string'},
		{name:'evu_password',				text:'Password', 			type: 'string'},
		{name:'evtu_show_details',			text:'Show Details', 		type: 'bool'},
		{name:'evtu_permission_x_min_1',	text:'X-1 Permission', 		type: 'bool'}
		];

		var gui = xframe_pattern.getInstance().genGrid({
			disabled: false,
			region:'west',
			width: 200,
			forceFit:true,
			border:false,
			title: 'Fe-Users Step 1',
			split: true,
			collapseMode: 'mini',
			button_del:false,
			button_add:false,
			search: true,
			pager: true,
			xstore: {
				load: 		xluerzer.getInstance().getAjaxPath('voting/voting_users_step_1'),
				udpate: 	xluerzer.getInstance().getAjaxPath('voting/voting_users_step_1_update'),
				params : {
					ev_id: ev_id
				},
				pid: 	'evu_id',
				fields: voters_fields
			},
			listeners: {
				scope: this,
				buffer: 1,
				afterrender: function() {
					gui.getStore().load();
				},
				itemdblclick: function(g,record) {
				}
			}
		});

		gui.getStore().on('update',function(grid,r){

			var record = r.data;

			gui.mask("Saving data ....");
			xframe.ajax({
				scope: this,
				url: xluerzer.getInstance().getAjaxPath('voting/save_check'),
				params : {
					step: 1,
					ev_id: ev_id,
					user_id: record['evu_id'],
					state: record['ev_checked'] ? '1' : '0',
					evtu_show_details: record['evtu_show_details'] ? '1' : '0',
					evtu_permission_x_min_1: record['evtu_permission_x_min_1'] ? '1' : '0'
				},
				stateless: function(success, json)
				{
					gui.getStore().load();
					gui.unmask();
					if (!success) gui.getStore().load();
				}
			});


		},this);

		return gui;
	},

	getVotingPanel_step2: function(ev_id)
	{
		var voters_fields =  [
		{name:'evu_id', 					text:'ID', 					type: 'int'},
		{name:'ev_checked',					text:'Selected', 			type: 'bool'},
		{name:'evu_name',					text:'Name', 				type: 'string'},
		{name:'evu_email',					text:'E-Mail', 				type: 'string'},
		{name:'evu_password',				text:'Password', 			type: 'string'},
		{name:'evtu_show_details',			text:'Show Details', 		type: 'bool'},
		{name:'evtu_permission_x_min_1',	text:'X-1 Permission', 		type: 'bool'}
		];

		var gui = xframe_pattern.getInstance().genGrid({
			disabled: false,
			region:'west',
			width: 200,
			forceFit:true,
			border:false,
			title: 'Fe-Users Step 2',
			split: true,
			collapseMode: 'mini',
			button_del:false,
			button_add:false,
			search: true,
			pager: true,
			xstore: {
				load: 		xluerzer.getInstance().getAjaxPath('voting/voting_users_step_2'),
				udpate: 	xluerzer.getInstance().getAjaxPath('voting/voting_users_step_2_update'),
				params : {
					ev_id: ev_id
				},
				pid: 	'evu_id',
				fields: voters_fields
			},
			listeners: {
				scope: this,
				buffer: 1,
				afterrender: function() {
					gui.getStore().load();
				},
				itemdblclick: function(g,record) {
				}
			}
		});

		gui.getStore().on('update',function(grid,r){

			var record = r.data;

			gui.mask("Saving data ....");
			xframe.ajax({
				scope: this,
				url: xluerzer.getInstance().getAjaxPath('voting/save_check'),
				params : {
					step: 2,
					ev_id: ev_id,
					user_id: record['evu_id'],
					state: record['ev_checked'] ? '1' : '0',
					evtu_show_details: record['evtu_show_details'] ? '1' : '0',
					evtu_permission_x_min_1: record['evtu_permission_x_min_1'] ? '1' : '0'
				},
				stateless: function(success, json)
				{
					gui.getStore().load();
					gui.unmask();
					if (!success) gui.getStore().load();
				}
			});


		},this);

		return gui;
	},


	loadVotingData: function(type, id)
	{

		console.log("loading data ",id);

		switch(type)
		{
			case 'print':
			var whatpanel = this.fp_print;
			break;
			case 'film':
			var whatpanel = this.fp_film;
			break;
			case 'students':
			var whatpanel = this.fp_students;
			break;
		}


		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('voting/loadx'),
			params : {
				ev_id: id
			},
			stateless: function(success, json)
			{
				this.gui.unmask();
				if (!success) return;
				whatpanel.getForm().setValues(json.data);
				whatpanel.jsonData = json.data;

				console.info('json',json);

			}
		});

	},

	open: function()
	{
		var fields =  [
		{name:'ev_id', 				text:'ID', 					type: 'int',},
		{name:'ev_name',			text:'Product-Name', 		type: 'string'}
		];

		this.votingGrid = xframe_pattern.getInstance().genGrid({
			region:'west',
			width: 200,
			forceFit:true,
			border:false,
			title: 'Specials',
			split: true,
			collapseMode: 'mini',
			button_del:true,
			button_add:true,
			search: true,
			records_move: false,
			pager: true,
			xstore: {
				load: 	xluerzer.getInstance().getAjaxPath('voting/load'),
				update: xluerzer.getInstance().getAjaxPath('voting/update'),
				insert: xluerzer.getInstance().getAjaxPath('voting/insert'),
				remove: xluerzer.getInstance().getAjaxPath('voting/remove'),
				params: {},
				pid: 	'ev_id',
				fields: fields
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {
				}
			}
		});

		var fields2 =  [
		{name:'evu_id', 				text:'ID', 					type: 'int'},
		{name:'evu_name',				text:'Name', 				type: 'string', editor: {allowBlank: false, xtype: 'textfield'}},
		{name:'evu_email',				text:'E-Mail', 				type: 'string', editor: {allowBlank: true, xtype: 'textfield'}},
		{name:'evu_password',			text:'Password', 			type: 'string', editor: {allowBlank: true, xtype: 'textfield'}},
		];

		this.usersGrid = xframe_pattern.getInstance().genGrid({
			region:'west',
			width: 200,
			forceFit:true,
			border:false,
			title: 'Users',
			split: true,
			collapseMode: 'mini',
			button_del:true,
			button_add:true,
			search: true,
			records_move: false,
			pager: true,
			xstore: {
				load: 	xluerzer.getInstance().getAjaxPath('vusers/load'),
				update: xluerzer.getInstance().getAjaxPath('vusers/update'),
				insert: xluerzer.getInstance().getAjaxPath('vusers/insert'),
				remove: xluerzer.getInstance().getAjaxPath('vusers/remove'),
				params: {},
				pid: 	'evu_id',
				fields: fields2
			},
			listeners2: {
				scope:this,
				buffer: 1,
				afterrender: function(t) {
					t.getStore().load();
				}
			}
		});

		this.usersGrid.on('afterrender',function(){
			this.usersGrid.getStore().load();
		},this);


		this.votingGrid.on('selectionchange',function(v,sel){


			this.latest_id = -1;
			this.voters_step_1.setDisabled(sel.length != 1);
			this.voters_step_2.setDisabled(sel.length != 1);
			this.voting_results.setDisabled(sel.length != 1);
			this.fp.setDisabled(sel.length != 1);

			if (sel.length == 0) return;
			this.latest_id = sel[0].data.ev_id;

			this.voters_step_1.getStore().proxy.extraParams['ev_id'] = this.latest_id;
			this.voters_step_2.getStore().proxy.extraParams['ev_id'] = this.latest_id;



			this.voters_step_1.getStore().load();
			this.voters_step_2.getStore().load();


			this.voting_results.removeAll();

			this.gui.mask("Loading data ....");
			xframe.ajax({
				scope: this,
				url: xluerzer.getInstance().getAjaxPath('voting/loadx'),
				params : {
					ev_id: this.latest_id
				},
				stateless: function(success, json)
				{
					this.gui.unmask();
					if (!success) return;
					this.fp.getForm().setValues(json.data);
					this.fp.jsonData = json.data;

					this.voting_results.add(this.reportVoting('1',json.reports.users_1));
					switch(''+json.data.ev_type)
					{
						case '1': // PRINT
						case '4': // STUDENTS
						this.voters_step_2.setDisabled(true);
						break;
						default:
						this.voters_step_2.setDisabled(false);
						this.voting_results.add(this.reportVoting('2',json.reports.users_2));
						break;
					}

					console.info('json',json);

					// REPORTS






				}
			});






		},this);

		var voters_fields =  [
		{name:'evu_id', 					text:'ID', 					type: 'int'},
		{name:'ev_checked',					text:'Selected', 			type: 'bool'},
		{name:'evu_name',					text:'Name', 				type: 'string'},
		{name:'evu_email',					text:'E-Mail', 				type: 'string'},
		{name:'evu_password',				text:'Password', 			type: 'string'},
		{name:'evtu_show_details',			text:'Show Details', 		type: 'bool'},
		{name:'evtu_permission_x_min_1',	text:'X-1 Permission', 		type: 'bool'}
		];

		this.voters_step_1 = xframe_pattern.getInstance().genGrid({
			disabled: true,
			region:'west',
			width: 200,
			forceFit:true,
			border:false,
			title: 'Fe-Users Step 1',
			split: true,
			collapseMode: 'mini',
			button_del:false,
			button_add:false,
			search: true,
			pager: true,
			xstore: {
				load: 		xluerzer.getInstance().getAjaxPath('voting/voting_users_step_1'),
				udpate: 	xluerzer.getInstance().getAjaxPath('voting/voting_users_step_1_update'),
				pid: 	'evu_id',
				fields: voters_fields
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {
				}
			}
		});

		this.voters_step_1.getStore().on('update',function(grid,r){

			var record = r.data;

			this.gui.mask("Saving data ....");
			xframe.ajax({
				scope: this,
				url: xluerzer.getInstance().getAjaxPath('voting/save_check'),
				params : {
					step: 1,
					ev_id: this.latest_id,
					user_id: record['evu_id'],
					state: record['ev_checked'] ? '1' : '0',
					evtu_show_details: record['evtu_show_details'] ? '1' : '0',
					evtu_permission_x_min_1: record['evtu_permission_x_min_1'] ? '1' : '0'
				},
				stateless: function(success, json)
				{
					this.votingGrid.getStore().load();
					this.gui.unmask();
					if (!success) this.voters_step_1.getStore().load();
				}
			});


		},this);


		this.voters_step_2 = xframe_pattern.getInstance().genGrid({
			disabled: true,
			region:'west',
			width: 200,
			forceFit:true,
			border:false,
			title: 'Fe-Users Step 2',
			split: true,
			collapseMode: 'mini',
			button_del:false,
			button_add:false,
			search: true,
			pager: true,
			xstore: {
				load: 	xluerzer.getInstance().getAjaxPath('voting/voting_users_step_2'),
				pid: 	'evu_id',
				fields: voters_fields
			},
			listeners: {
				scope: this,				buffer: 1,
				itemdblclick: function(g,record) {
				}
			}
		});


		this.voters_step_2.getStore().on('update',function(grid,r){

			var record = r.data;

			this.gui.mask("Saving data ....");
			xframe.ajax({
				scope: this,
				url: xluerzer.getInstance().getAjaxPath('voting/save_check'),
				params : {
					step: 2,
					ev_id: this.latest_id,
					user_id: record['evu_id'],
					state: record['ev_checked'] ? '1' : '0',
					evtu_show_details: record['evtu_show_details'] ? '1' : '0',
					evtu_permission_x_min_1: record['evtu_permission_x_min_1'] ? '1' : '0'
				},
				stateless: function(success, json)
				{
					this.votingGrid.getStore().load();
					this.gui.unmask();
					if (!success) this.voters_step_2.getStore().load();
				}
			});


		},this);



		var votingresult_fields =  [
		{name:'evr_id', 			text:'ID', 					type: 'int'},
		{name:'evr_voting_user_id',	text:'User', 				type: 'string'},
		{name:'evr_submission_id',	text:'Submission ID', 		type: 'int'},
		{name:'evr_vote',			text:'Vote', 				type: 'int',		renderer: xluerzer_renderer.getInstance().renderer_vote}
		];


		this.voting_results = Ext.widget({
			disabled: true,
			xtype: 'tabpanel',
			title: 'Reports',
			items: []
		});

		var wx = 300;


		this.fp = Ext.widget({

			tbar: ['->',{
				iconCls: 'xf_save',
				text: 'Save',
				scope: this,
				handler: this.saveGeneral
			}],
			disabled: true,
			title: 'General',
			border: false,
			xtype: 'form',
			height: '100%',
			overflowY: 'auto',
			defaultType: 'textfield',
			defaults: {
				anchor: '100%',
				labelAlign : 'top'
			},
			bodyPadding: 20,

			items: [
			{
				xtype: 'text',
				text: 'Voting - Details',
				height: 50
			},
			
			{
			name: 'ev_name',
			fieldLabel: 'Description',
			maxWidth: wx
			},
			

			xluerzer_gui.getInstance().simplyCombo({
				fieldLabel: 'Active',
				name: 'ev_active',
				value: '',
				data: [{k:'0',v:'Inactive'},{k:'1',v:'Active'},{k:'2',v:'Finished'}],
				emptyText: '',
				maxWidth: wx
			}),

			{
				name: 'ev_magazine_type_id',
				xtype: 'xluerzer_magType',
				fieldLabel: 'Magazine-Typ',
				maxWidth: wx
			},
/*
			{
				name: 'ev_magazine_id',
				xtype: 'xluerzer_magazine_specials',
				fieldLabel: 'Product',
				maxWidth: wx
			},
*/
			{
				name: 'ev_submission_id_start',
				xtype: 'numberfield',
				emptyValue: 'Submission-ID',
				fieldLabel: 'Submission-ID START',
				maxWidth: wx
			},

			{
				emptyValue: 'Submission-ID',
				name: 'ev_submission_id_end',
				xtype: 'numberfield',
				fieldLabel: 'Submission-ID END',
				maxWidth: wx
			},


			/*

			{
			submitFormat: 'Y-m-d',
			name: 'ev_date_start',
			xtype: 'datefield',
			fieldLabel: 'Startdate',
			maxWidth: wx
			},

			{
			submitFormat: 'Y-m-d',
			name: 'ev_date_end',
			xtype: 'datefield',
			fieldLabel: 'Enddate',
			maxWidth: wx
			},

			*/

			/*

			xluerzer_gui.getInstance().simplyCombo({
				fieldLabel: 'Type',
				name: 'ev_type',
				value: '',
				maxWidth: wx,
				data: [{k:'0',v:'not set'},{k:'1',v:'Print'},{k:'2',v:'Film'},{k:'3',v:'Special'},{k:'4',v:'Students'}],
				emptyText: ''
			}),
			*/
			
			{
				name: 'ev_vote_limit_first_step',
				xtype: 'hidden',
				fieldLabel: 'Vote-Limit: Step 1',
				maxWidth: wx
			},

			{
				name: 'ev_vote_limit_second_step',
				xtype: 'hidden',
				fieldLabel: 'Vote-Limit: Step 2',
				maxWidth: wx
			},



			],
			listeners: {

				scope: this,
				afterrender: function()
				{
					this.votingGrid.getStore().load();
				}

			}
		});


		this.id_print = 1;

		this.fp_print = Ext.widget({

			tbar: ['->',{
				iconCls: 'xf_save',
				text: 'Save',
				scope: this,
				handler: function() {
					this.saveGeneralAllgemein("print");
				}
			}],
			title: 'General',
			border: false,
			xtype: 'form',
			height: '100%',
			defaultType: 'textfield',
			overflowY: 'auto',
			defaults: {
				anchor: '100%',
				labelAlign : 'top'
			},
			bodyPadding: 20,

			items: [
			{
				xtype: 'text',
				text: 'Voting - Details',
				height: 50
			},
			/*
			{
			name: 'ev_name',
			fieldLabel: 'Description',
			maxWidth: wx
			},
			*/

			xluerzer_gui.getInstance().simplyCombo({
				fieldLabel: 'Active',
				name: 'ev_active',
				value: '',
				data: [{k:'0',v:'Inactive'},{k:'1',v:'Active'},{k:'2',v:'Finished'}],
				emptyText: '',
				maxWidth: wx
			}),

			{
				name: 'ev_submission_id_start',
				xtype: 'numberfield',
				emptyValue: 'Submission-ID',
				fieldLabel: 'Submission-ID START',
				maxWidth: wx
			}


			],
			listeners: {

				scope: this,
				afterrender: function()
				{
					console.log("allgemein rendered");
					this.loadVotingData("print",this.id_print);
				}

			}
		});



		this.id_film = 2;

		this.fp_film = Ext.widget({

			tbar: ['->',{
				iconCls: 'xf_save',
				text: 'Save',
				scope: this,
				handler: function() {
					this.saveGeneralAllgemein("film");
				}
			}],
			title: 'General',
			border: false,
			xtype: 'form',
			height: '100%',
			overflowY: 'auto',
			defaultType: 'textfield',
			defaults: {
				anchor: '100%',
				labelAlign : 'top'
			},
			bodyPadding: 20,

			items: [
			{
				xtype: 'text',
				text: 'Voting - Details',
				height: 50
			},

			xluerzer_gui.getInstance().simplyCombo({
				fieldLabel: 'Active',
				name: 'ev_active',
				value: '',
				data: [{k:'0',v:'Inactive'},{k:'1',v:'Active'},{k:'2',v:'Finished'}],
				emptyText: '',
				maxWidth: wx
			}),

			{
				name: 'ev_submission_id_start',
				xtype: 'numberfield',
				emptyValue: 'Submission-ID',
				fieldLabel: 'Submission-ID START',
				maxWidth: wx
			}


			],
			listeners: {

				scope: this,
				afterrender: function()
				{
					console.log("allgemein rendered");
					this.loadVotingData("film",this.id_film);
				}

			}
		});


		this.id_students = 3;

		this.fp_students = Ext.widget({

			tbar: ['->',{
				iconCls: 'xf_save',
				text: 'Save',
				scope: this,
				handler: function() {
					this.saveGeneralAllgemein("students");
				}
			}],
			title: 'General',
			border: false,
			xtype: 'form',
			height: '100%',
			overflowY: 'auto',
			defaultType: 'textfield',
			defaults: {
				anchor: '100%',
				labelAlign : 'top'
			},
			bodyPadding: 20,

			items: [
			{
				xtype: 'text',
				text: 'Voting - Details',
				height: 50
			},

			xluerzer_gui.getInstance().simplyCombo({
				fieldLabel: 'Active',
				name: 'ev_active',
				value: '',
				data: [{k:'0',v:'Inactive'},{k:'1',v:'Active'},{k:'2',v:'Finished'}],
				emptyText: '',
				maxWidth: wx
			}),

			{
				name: 'ev_submission_id_start',
				xtype: 'numberfield',
				emptyValue: 'Submission-ID',
				fieldLabel: 'Submission-ID START',
				maxWidth: wx
			}


			],
			listeners: {

				scope: this,
				afterrender: function()
				{
					console.log("allgemein rendered");
					this.loadVotingData("students",this.id_students);
				}

			}
		});


		this.tab_print = Ext.widget({
			xtype: 'tabpanel',
			title: 'Print',
			items: [this.fp_print,this.reportDetails('PRINT'),this.getVotingPanel_step1(1),this.voting_results]
		});

		this.tab_tv = Ext.widget({
			xtype: 'tabpanel',
			title: 'Film',
			items: [this.fp_film,this.reportDetails('VIDEO'),this.getVotingPanel_step1(2),this.getVotingPanel_step2(2)]
		});

		this.tab_students = Ext.widget({
			xtype: 'tabpanel',
			title: 'Students',
			items: [this.fp_students,this.getVotingPanel_step1(3)]
		});

		this.tab = Ext.widget({
			xtype: 'tabpanel',
			layout: 'fit',
			region: 'center',
			border: false,
			items: [this.fp,this.voters_step_1,this.voters_step_2,this.voting_results]
		});

		this.tabUsers = Ext.widget({
			region:'west',
			width: '50%',
			xtype: 'tabpanel',
			layout: 'fit',
			border: false,
			split: true,
			items: [this.votingGrid,this.tab_print,this.tab_tv,this.tab_students,this.usersGrid]

		});

		this.gui = Ext.widget({
			xtype: 'panel',
			title: 'Voting',
			layout: 'border',
			tbar: [{
				scope: this,
				text: 'Prepare Sampledata for testing',
				handler: function() {

					this.gui.mask('Generating TEST-Data ...');
					xframe.ajax({
						scope: this,
						url: xluerzer.getInstance().getAjaxPath('voting/genTestData'),
						stateless: function(success, json)
						{
							this.gui.unmask();
						}
					});


				}
			}],
			items: [this.tabUsers,this.tab]
		});

		xluerzer.getInstance().showContent(this.gui);
	}

}