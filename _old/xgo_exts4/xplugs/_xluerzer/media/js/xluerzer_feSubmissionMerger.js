var xluerzer_feSubmissionMerger = (function() {
	var instance = null;
	return new function() {

		this.getInstance = function(config) {
			return new xluerzer_feSubmissionMerger_(config);
		}
	}
})();

var xluerzer_feSubmissionMerger_ = function(config) {
	this.config = config || {};
};

xluerzer_feSubmissionMerger_.prototype = {

	open: function()
	{

		var me = this;


		var xls = xluerzer_submissions.getInstance();

		var fields =  [

		{name:'es_image_s_id', 		text:'Image', 			type: 'int', renderer: xls.renderer_submission_small, scope: xls, width: 180},
		{name:'es_id', 				text:'ID', 				type: 'int'},
		{name:'es_submittedFor',	text:'Submitted For', 	type: 'string'},
		{name:'es_state',			text:'State', 			type: 'int', renderer: xls.renderer_submission_state, scope: xls},

		{name:'es_fe_user_id',		text:'Fe-User-ID', 		type: 'string'},
		{name:'es_submittedBy',		text:'Submitted By', 	type: 'string'},
		{name:'es_email',			text:'E-Mail', 			type: 'string'},
		{name:'es_created_ts',		text:'Submitted on', 	type: 'string'}


		];


		var btn_id_bulk 		= Ext.id();
		var but_id_zip_thumbs 	= Ext.id();
		var but_id_zip_print  	= Ext.id();
		var but_id_zip_videos  	= Ext.id();

		this.submissionsGrid = xframe_pattern.getInstance().genGrid({
			region:'center',
			forceFit:true,
			border:false,
			title: 'Submissions',
			split: true,
			collapseMode: 'mini',
			button_del:false,
			button_add:false,
			search: false,
			pager: true,
			button_export: true,
			records_move: false,
			xstore: {
				load: 	xluerzer.getInstance().getAjaxPath('submissions/search4Combiner'),
				pid: 	'es_id',
				fields: fields
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {
					if (!returnGui) {
						xluerzer_submissions_detail.getInstance().open(record.data.es_id);
					} else {
						if (typeof returnGui.callback == 'function') {
							returnGui.callback.call(returnGui.scope,record.data.es_id);
						}
					}
				}
			}
		});


		var w = 500;
		var gui = Ext.widget({
			title: 'FE-Submission Combiner',
			autoScroll: false,
			xtype:'form',
			forceFit:true,
			split: true,
			items: [

			{

				bodyPadding: 20,
				region: 'north',
				split: true,
				height: 200,
				xtype: 'panel',
				layout: 'hbox',
				anchor: '100%',
				items: [
				{
					border: false,
					xtype: 'panel',
					anchor: '100%',

					defaults: {
						width: w
					},

					items:[
					xluerzer_gui.getInstance().searchComboSubmissions({
						fieldLabel: 'Lastname',
						name: 'es_lastname',
						minChars: 3,
						emptyText: 'Min 3 characters ...',
						searchScope: 'es_lastname'
					}),

					xluerzer_gui.getInstance().searchComboSubmissions({
						width: w,
						fieldLabel: 'Company Name',
						name: 'es_company',
						minChars: 3,
						emptyText: 'Min 3 characters ...',
						searchScope: 'es_company'
					}),

					xluerzer_gui.getInstance().searchComboSubmissions({
						width: w,
						fieldLabel: 'E-Mail (search) ',
						name: 'es_email',
						minChars: 3,
						emptyText: 'Min 3 characters ...',
						searchScope: 'es_email'
					}),

					{
						width: w,
						name: 'es_emails',
						xtype:'textarea',
						fieldLabel: 'E-Mail(s) [ENTER] seperated'
					},
					{
						xtype: 'button',
						scope: this,
						text: 'Search',
						handler: function()
						{
							var vars = gui.getForm().getValues();
							this.submissionsGrid.getStore().proxy.extraParams['q'] = Ext.encode(vars);
							this.submissionsGrid.getStore().load();
						}
					}
					]


				},
				{
					xtype: 'text',
					width: 10
				},
				{
					border: false,
					xtype: 'panel',
					items:[{
						hideTrigger: true,
						width: w,
						name: 'es_user_id',
						xtype:'numberfield',
						fieldLabel: 'FE-USER-ID'
					},
					{
						xtype: 'button',
						scope: this,
						text: 'Merge',
						handler: function()
						{





							xframe.yn({
								title:'Change Fe-USER',
								msg: 'Do you really want to change all this submissions ?',
								scope:this,
								handler: function(btn)
								{
									if (btn != 'yes') return;


									gui.mask('Updating contact infos ...');
									xframe.ajax({
										scope: this,
										url: xluerzer.getInstance().getAjaxPath('submissions/search4CombinerDoIt'),
										params : {
											q: Ext.encode(gui.getForm().getValues())
										},
										stateless: function(success, json)
										{
											gui.unmask();
											if (!success) return;

											var vars = gui.getForm().getValues();
											this.submissionsGrid.getStore().proxy.extraParams['q'] = Ext.encode(vars);
											this.submissionsGrid.getStore().load();


										}
									});




								}
							});

















						}
					}]

				}


				]

			}






			,this.submissionsGrid],
			layout: 'border'
		});



		gui.xsubmit = function()
		{
			console.info("xsubmit");
		}

		this.formPanel = gui;
		xluerzer.getInstance().showContent(gui);




	}

}
