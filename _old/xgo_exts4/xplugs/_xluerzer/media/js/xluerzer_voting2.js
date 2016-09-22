var xluerzer_voting2 = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xluerzer_voting2";
		}

		this.getInstance = function(config) {
			return new xluerzer_voting2_(config);
			return instance;
		}
	}
})();

var xluerzer_voting2_ = function(config) {
	this.config = config || {};
};

xluerzer_voting2_.prototype = {


	reportVoting2: function(evr_id,users,type,evr_step)
	{

		if (typeof evr_step == "undefined")
		{
			var evr_step = 1;
		}

		switch(type)
		{
			case 'STUDENT':
			var fields_submissions =  [
			{name:'ess_id', 			text:'Image',						width: 160, type: 'int', renderer: xluerzer_students.getInstance().renderer_submission_small, scope: xluerzer_students.getInstance()},
			{name:'votes_cnt', 			text:'Votes',						width: 50,  type: 'int'},
			{name:'evr_submission_id', 	text:'S-ID',						width: 60,  type: 'int'},
			{name:'ess_submittedBy',	text:'Submitter', 					width: 100, type: 'string'},
			{name:'ess_created_ts',		text:'Submitted On', 				width: 120,  type: 'string'},
			];
			break;



			default:
			var fields_submissions =  [
			{name:'es_id', 				text:'Image',						width: 160, type: 'int', renderer: xluerzer_submissions.getInstance().renderer_submission_small, scope: xluerzer_submissions.getInstance()},
			{name:'votes_cnt', 			text:'Votes',						width: 50,  type: 'int'},
			{name:'evr_submission_id', 	text:'S-ID',						width: 60,  type: 'int'},
			{name:'es_magazine_id', 	text:'M-ID', 						width: 50,  type: 'string'},
			{name:'es_submittedBy',		text:'Submitter', 					width: 100, type: 'string'},
			{name:'es_created_ts',		text:'Submitted On', 				width: 120,  type: 'string'},
			];
			break;
		}




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


			toolbar_top: [{

				iconCls: 'xf_download',
				text: 'download as csv',
				scope: this,
				handler: function()
				{
					this.downloadAsCsv(report_submission);
				}

			}],



			xstore: {
				load: 	xluerzer.getInstance().getAjaxPath('voting_reporting_by_submissions2/load'),
				params: {
					evr_id: evr_id,
					evr_step: evr_step
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
		{name:'evu_id', 			text:'Voter-ID',			type: 'int', width: 50},
		{name:'liked', 				text:'Accepted',			type: 'int', width: 100},
		{name:'dissed', 			text:'Discarded', 			type: 'int', width: 100},
		{name:'nv',					text:'Not Voted', 			type: 'int', width: 100},
		{name:'total',				text:'Total', 				type: 'int', width: 100},
		{name:'evu_name', 			text:'Name',				type: 'string'},
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
					evr_id: evr_id,
					evr_step: evr_step
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
		{name:'count', 			text:'Count', 		type: 'int', sortable: false},
		{name:'submitter', 		text:'Submitter', 	type: 'int', sortable: false}
		];

		var report_countrys = xframe_pattern.getInstance().genGrid({
			region:'west',
			width: 200,
			forceFit:true,
			border:false,
			title: 'Overall',
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
					evr_id: evr_id,
					evr_step: evr_step
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
		{name:'votes', 			text:'Votes', 		type: 'int', width: 50},
		{name:'count', 			text:'Count', 		type: 'int', width: 50},
		{name:'submitter', 		text:'Submitter', 	type: 'int',  sortable: false, width: 80},
		{name:'countries', 		text:'Countries', 	type: 'int',  sortable: false, width: 80},
		{name:'countries_names', 		text:'Countries', 	type: 'string',  sortable: false},
		];

		var report_want = xframe_pattern.getInstance().genGrid({
			region:'west',
			width: 200,
			forceFit:true,
			border:false,
			title: 'Voted',
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
					evr_id: evr_id,
					evr_step: evr_step
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





		/*
		var gui = Ext.widget({
		xtype: 'tabpanel',
		items: [report_want, report_countrys,  report_submission,report_users]
		});
		*/

		return [ report_countrys, report_want,  report_submission,report_users];
	},










	/*
	##################################################
	##################################################
	##################################################
	##################################################
	##################################################
	##################################################
	##################################################
	##################################################
	##################################################
	##################################################
	##################################################
	##################################################
	##################################################
	##################################################
	##################################################
	##################################################
	##################################################
	##################################################
	##################################################
	##################################################
	##################################################
	##################################################
	##################################################
	##################################################
	##################################################
	##################################################
	##################################################
	##################################################
	##################################################
	##################################################
	##################################################
	##################################################
	##################################################
	##################################################
	##################################################
	##################################################
	##################################################
	##################################################
	##################################################
	##################################################
	##################################################
	##################################################
	##################################################
	##################################################
	##################################################
	*/


	downloadAsCsv: function(grid)
	{
		console.info(grid.getStore());
		
		var store 	= grid.getStore();
		var url 	= store.proxy.url+'?exportToCsv=1';
		
		Ext.iterate(store.proxy.extraParams,function(k,v){
			url += "&"+k+"="+v;
		},this);
		
		console.info('URL',url);
		window.open(url);
		
		
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
			toolbar_top: [{

				iconCls: 'xf_download',
				text: 'download as csv',
				scope: this,
				handler: function()
				{
					this.downloadAsCsv(report_submission);
				}

			}],
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
		{name:'evu_id', 			text:'Voter-ID',			type: 'int', width: 50},
		{name:'liked', 				text:'Accepted',			type: 'int', width: 100},
		{name:'dissed', 			text:'Discarded', 			type: 'int', width: 100},
		{name:'nv',					text:'Not Voted', 			type: 'int', width: 100},
		{name:'total',				text:'Total', 				type: 'int', width: 100},
		{name:'evu_name', 			text:'Name',				type: 'string'},
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
		{name:'count', 			text:'Count', 		type: 'int', sortable: false},
		{name:'submitter', 		text:'Submitter', 	type: 'int', sortable: false}
		];

		var report_countrys = xframe_pattern.getInstance().genGrid({
			region:'west',
			width: 200,
			forceFit:true,
			border:false,
			title: 'Overall',
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
		{name:'votes', 			text:'Votes', 		type: 'int', width: 50},
		{name:'count', 			text:'Count', 		type: 'int', width: 50},
		{name:'submitter', 		text:'Submitter', 	type: 'int',  sortable: false, width: 80},
		{name:'countries', 		text:'Countries', 	type: 'int',  sortable: false, width: 80},
		{name:'countries_names', 		text:'Countries', 	type: 'string',  sortable: false},
		];

		var report_want = xframe_pattern.getInstance().genGrid({
			region:'west',
			width: 200,
			forceFit:true,
			border:false,
			title: 'Voted',
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
					gui.mask("updating ...");
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
							gui.unmask();
							//if (!success) report_want.getStore().load();

							report_users.getStore().load();
							report_submission.getStore().load();
							report_countrys.getStore().load();
							report_want.getStore().load();

						}
					});
				}

			},{


				listeners: {
					scope: this,
					change: function(cb, newValue, oldValue, eOpts)
					{

						gui.mask("updateing voting ....");
						xframe.ajax({
							scope: this,
							url: xluerzer.getInstance().getAjaxPath('voting/save_mode'),
							params : {
								ev_id: this.latest_id,
								ev_final_vote_mode: newValue ? '1' : '0',
							},
							stateless: function(success, json)
							{
								gui.unmask();

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

					gui.mask("updating ...");
					xframe.ajax({
						scope: this,
						url: xluerzer.getInstance().getAjaxPath('voting/close_step_x'),
						params : {
							ev_id: this.latest_id,
							step: nr
						},
						stateless: function(success, json)
						{
							gui.unmask();

							report_users.getStore().load();
							report_submission.getStore().load();
							report_countrys.getStore().load();
							report_want.getStore().load();
						}
					});


				}


			}],
			items: [ report_countrys,report_want,  report_submission,report_users]
		});

		return gui;
	},


	getMainTab_specials: function()
	{

		var fields =  [
		{name:'ev_id', 				text:'ID', 					type: 'int', width: 50},
		{name:'ev_name',			text:'Product-Name', 		type: 'string'}
		];

		this.votingGrid = xframe_pattern.getInstance().genGrid({
			region:'west',
			width: 200,
			maxWidth: 400,
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


		this.votingGrid.on('selectionchange',function(v,sel){

			this.latest_id = -1;
			this.voters_step_1.setDisabled(sel.length != 1);
			this.voters_step_2.setDisabled(sel.length != 1);
			this.voting_results_specials.setDisabled(sel.length != 1);
			this.fp.setDisabled(sel.length != 1);

			if (sel.length == 0) return;
			this.latest_id = sel[0].data.ev_id;

			this.voters_step_1.getStore().proxy.extraParams['ev_id'] = this.latest_id;
			this.voters_step_2.getStore().proxy.extraParams['ev_id'] = this.latest_id;



			this.voters_step_1.getStore().load();
			this.voters_step_2.getStore().load();


			this.voting_results_specials.removeAll();

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

					this.voting_results_specials.add(this.reportVoting('1',json.reports.users_1));
					switch(''+json.data.ev_type)
					{
						case '1': // PRINT
						case '4': // STUDENTS
						this.voters_step_2.setDisabled(true);
						break;
						default:
						this.voters_step_2.setDisabled(false);
						this.voting_results_specials.add(this.reportVoting('2',json.reports.users_2));
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


		this.voting_results_specials = Ext.widget({
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
				handler: function() {
					this.saveGeneralAllgemein("special",this.fp);
				}
			}],
			disabled: true,
			title: 'General',
			border: false,
			xtype: 'form',
			height: '100%',
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
			
			{
				name: 'ev_magazine_id',
				xtype: 'xluerzer_magazine',
				fieldLabel: 'Magazine',
				maxWidth: wx
			},
			
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
			}


			],
			listeners: {

				scope: this,
				afterrender: function()
				{
					this.votingGrid.getStore().load();
				}

			}
		});



		this.tabRight = Ext.widget({
			xtype: 'tabpanel',
			layout: 'fit',
			region: 'center',
			border: false,
			items: [this.fp,this.voters_step_1,this.voters_step_2,this.voting_results_specials]
		});


		this.specials_gui = Ext.widget({
			xtype: 'panel',
			layout: 'border',
			title: 'Specials',
			border: false,
			items: [this.votingGrid,this.tabRight]
		});


		return this.specials_gui;
	},


	reportDetails: function(type,voting_panel,evr_step)
	{

		if (typeof evr_step == 'undefined')
		{
			evr_step = 1;
		}

		var fields_submissions =  [
		{name:'evr_id', 					text:'ID',							type: 'int', width: 50},
		{name:'evr_name',					text:'Name',				 		type: 'string', editor: {allowBlank: false, xtype: 'textfield'}},
		{name:'evr_submission_id_start', 	text:'Start',						type: 'int', editor: {xtype: 'numberfield',allowDecimals:false}},
		{name:'evr_submission_id_stop', 	text:'Stop',						type: 'int', editor: {xtype: 'numberfield',allowDecimals:false}},
		];

		var report_submission = xframe_pattern.getInstance().genGrid({
			forceFit:true,
			border:false,
			region: 'west',
			width: 400,
			maxWidth: 400,
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

			voting_panel.setDisabled(false);
			voting_panel.removeAll();

			this.gui.mask("Loading data ....");
			xframe.ajax({
				scope: this,
				url: xluerzer.getInstance().getAjaxPath('voting/loadx2'),
				params : {
					evr_id: evr_id,
					evr_step: evr_step
				},
				stateless: function(success, json)
				{
					this.gui.unmask();
					if (!success) return;
					voting_panel.add(this.reportVoting2(evr_id,json.reports.users,type,evr_step));
				}
			});





		},this);


		return report_submission;

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

	getMainTab_print: function()
	{

		var wx = 300;
		this.id_print = 1;
		this.fp_print = Ext.widget({

			tbar: ['->',{
				iconCls: 'xf_save',
				text: 'Save',
				scope: this,
				handler: function() {
					this.saveGeneralAllgemein("print",this.fp_print);
				}
			}],
			title: 'General',
			border: false,
			xtype: 'form',
			height: '100%',
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
					this.loadVotingData("print",this.id_print);
				}

			}
		});


		this.voting_results_print = Ext.widget({
			disabled: true,
			region: 'center',
			xtype: 'tabpanel',
			title: 'Details',
			items: []
		});

		this.printReport = Ext.widget({
			xtype: 'panel',
			region: 'center',
			title: 'Reports',
			layout: 'border',
			items: [this.reportDetails('PRINT',this.voting_results_print,1),this.voting_results_print]
		});

		this.tab_print = Ext.widget({
			xtype: 'tabpanel',
			region: 'center',
			title: 'Print',
			items: [this.fp_print,this.getVotingPanel_step1(1),this.printReport]
		});

		return this.tab_print;
	},

	getMainTab_film: function()
	{

		var wx = 300;
		this.id_film = 2;
		this.fp_film = Ext.widget({

			tbar: ['->',{
				iconCls: 'xf_save',
				text: 'Save',
				scope: this,
				handler: function() {
					this.saveGeneralAllgemein("film",this.fp_film);
				}
			}],
			title: 'General',
			border: false,
			xtype: 'form',
			height: '100%',
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

		this.voting_results_film_1 = Ext.widget({
			disabled: true,
			region: 'center',
			xtype: 'tabpanel',
			title: 'Details',
			items: []
		});

		this.voting_results_film_2 = Ext.widget({
			disabled: true,
			region: 'center',
			xtype: 'tabpanel',
			title: 'Details',
			items: []
		});

		this.filmReport_1 = Ext.widget({
			xtype: 'panel',
			region: 'center',
			title: 'Step 1',
			layout: 'border',
			items: [this.reportDetails('VIDEO',this.voting_results_film_1,1),this.voting_results_film_1]
		});

		this.filmReport_2 = Ext.widget({
			xtype: 'panel',
			region: 'center',
			title: 'Step 2',
			layout: 'border',
			items: [this.reportDetails('VIDEO',this.voting_results_film_2,2),this.voting_results_film_2]
		});


		this.filmReport = Ext.widget({
			xtype: 'tabpanel',
			region: 'center',
			title: 'Reports',
			items: [this.filmReport_1,this.filmReport_2]
		});


		this.tab_tv = Ext.widget({
			xtype: 'tabpanel',
			region: 'center',
			title: 'Film',
			items: [this.fp_film,this.getVotingPanel_step1(2),this.getVotingPanel_step2(2),this.filmReport]
		});

		return this.tab_tv;

	},

	saveGeneralAllgemein: function(type,fp)
	{

		switch(type)
		{
			case 'print':
			var data = fp.getForm().getValues();
			var ev_id = this.id_print;
			break;
			case 'film':
			var data = fp.getForm().getValues();
			var ev_id = this.id_film;
			break;
			case 'students':
			var data = fp.getForm().getValues();
			var ev_id = this.id_students;
			break;
			case 'special':
			var data = fp.getForm().getValues();
			var ev_id = this.latest_id;
			break;
		}

	
		var data = Ext.encode(data);

		fp.mask("Saving data ....");
		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('voting/save_general'),
			params : {
				ev_id: ev_id,
				data: data
			},
			stateless: function(success, json)
			{
				fp.unmask();
				if (!success) return;
			}
		});
	},


	getMainTab_students: function()
	{


		var wx = 300;
		this.id_students = 3;
		this.fp_students = Ext.widget({

			tbar: ['->',{
				iconCls: 'xf_save',
				text: 'Save',
				scope: this,
				handler: function() {
					this.saveGeneralAllgemein("students",this.fp_students);
				}
			}],
			title: 'General',
			border: false,
			xtype: 'form',
			height: '100%',
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
				fieldLabel: 'Public voting on website',
				name: 'ev_enabled_on_web',
				value: '',
				data: [{k:'0',v:'Offline'},{k:'1',v:'Online'}],
				emptyText: '',
				maxWidth: wx
			}),

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

		this.voting_results_students= Ext.widget({
			disabled: true,
			region: 'center',
			xtype: 'tabpanel',
			title: 'Details',
			items: []
		});

		this.studentsReport = Ext.widget({
			xtype: 'panel',
			region: 'center',
			title: 'Reports',
			layout: 'border',
			items: [this.reportDetails('STUDENT',this.voting_results_students),this.voting_results_students]
		});


		this.tab_students = Ext.widget({
			xtype: 'tabpanel',
			region: 'center',
			title: 'Students',
			items: [this.fp_students,this.getVotingPanel_step1(3),this.studentsReport]
		});

		return this.tab_students;

	},

	getMainTab_users: function()
	{
		var fields2 =  [
		{name:'evu_id', 				text:'ID', 					type: 'int', width: 50},
		{name:'evu_name',				text:'Name', 				type: 'string', editor: {allowBlank: false, xtype: 'textfield'}},
		{name:'evu_email',				text:'E-Mail', 				type: 'string', editor: {allowBlank: true, xtype: 'textfield'}},
		{name:'evu_password',			text:'Password', 			type: 'string', editor: {allowBlank: true, xtype: 'textfield'}},
		];

		this.usersGrid = xframe_pattern.getInstance().genGrid({
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

		return this.usersGrid;
	},

	open: function()
	{

		this.gui = Ext.widget({
			xtype: 'tabpanel',
			title: 'Voting 2',
			layout: 'border',
			items: [this.getMainTab_specials(),this.getMainTab_print(),this.getMainTab_film(),this.getMainTab_students(),this.getMainTab_users()]
		});

		xluerzer.getInstance().showContent(this.gui);
	}

}