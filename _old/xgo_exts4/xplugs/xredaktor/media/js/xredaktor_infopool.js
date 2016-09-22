var xredaktor_infoPool = (function() {
	var instance = null;
	return new function() {
		this.getInstance = function(config) {
			if (instance == null) {
				instance = new xredaktor_infoPool_(config);
			}
			return instance;
		}
	}
})();

var xredaktor_infoPool_ = function(config) {
	this.config = config || {};
};

xredaktor_infoPool_.prototype = {


	getCookieNameForRecord: function(wzid) {
		var wz_id = parseInt(wzid,10);
		return "xr_infopool_record_"+xredaktor.getInstance().getCurrentSiteId()+"_"+wz_id;
	},


	saveLastRecord: function(wzid, rid) {

		var wz_id 	= parseInt(wzid,10);
		var r_id 	= parseInt(rid,10);

		Ext.util.Cookies.set(this.getCookieNameForRecord(wz_id), r_id);

	},

	openLastRecord: function(wzid) {

		var wz_id 	= parseInt(wzid,10);
		var r_id 	= Ext.util.Cookies.get(this.getCookieNameForRecord(wz_id));

		r_id 	= parseInt(r_id,10);

		return r_id;
	},

	renderMyTime: function(tm_id,x,j) {

		if (!this.backupTimeMachine)
		{
			this.backupTimeMachine = xredaktor_timemachine.getInstance().getStoreOfTimemachine();
		}

		if (tm_id == 0) {
			return "";
		}

		if (j.dirty)
		{

			var id_runner = Ext.id();

			xframe.ajax({
				scope:this,
				url: '/xgo/xplugs/xredaktor/ajax/timemachine/loadData',
				params : {
					tm_id: 	tm_id
				},
				stateless: function(succ,json)
				{
					if (!succ) return false;
					$$('#'+id_runner).html(json.tm_name);
				}
			});


			return "<div id ='"+id_runner+"'><span style='background-color:#00b1e7;color:white;'>Update...</span></div>";

		} else {
			return j.raw.wz_tm_name;
		}

	},

	getDefaultWizardView : function(a_id,contentWindow,title,mask,extraConfig)
	{
		if (typeof extraConfig == "undefined") {
			extraConfig = {
				toolbar_top: [],
				selModelButtons: []
			};
		}

		var me = this;
		xframe.ajax({
			scope:this,
			url: '/xgo/xplugs/xredaktor/ajax/wizards/getSettings',
			params : {
				a_id:a_id
			},
			success: function(json)
			{


				try {

					var fields = [
					{name: 'wz_id',				text:'ID',					type:'int',		hidden: false, 	header:true, width: 50, flex: 0},
					//{name: 'wz_tm_id', 			text:'TM',					type:'string', 	hidden: false, 	header:true, width: 50, flex: 1, scope: this, renderer:this.renderMyTime, editor: {xtype:'xr_field_timemachine'}},
					{name: 'wz_online', 		text:'ON', 					type:'string', 	hidden: false, 	header:true, xtype: 'combo', store : [['Y','Ja'],['N','Nein']], width: 60, flex:0},
					{name: 'titleIt',			text:'Titel',				type:'string' , hidden: false, 	header:true},
					{name: 'wz_sort',			text:'Sortierung',			type:'int' , 	hidden: true, 	header:true, editor: {xtype: 'numberfield',allowDecimals:false}}
					];

					Ext.each(json.settings,function(col){
						if (col.as_useAsHeader != 'Y') return;


						if (col.as_type_multilang == 'Y')
						{
							fields.push({name: '_DE_wz_'+col.as_name, text:col.as_label+" [DE]",	type:'string' , hidden: false, 	header:true});
						} else
						{
							fields.push({name: 'wz_'+col.as_name,	text:col.as_label,	type:'string' , hidden: false, 	header:true});
						}

					},this);


					console.info(fields);


					var grid = false;
					var gridHeaderCfgHelper = {
						grid:grid
					};

					grid = this.grid = xframe_pattern.getInstance().genGrid({
						toolbar_top: extraConfig.toolbar_top || [],
						selModelButtons: extraConfig.selModelButtons || [],
						region:'west',
						search:true,
						forceFit:true,
						border:false,
						split: true,
						pager:true,
						title: title || 'Wizard :: '+a_id,
						plugin_numLines: false,
						button_add: true,
						button_del: true,
						xstore: {
							load: 	'/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/load',
							loadParams : {
								titleIt: 1,
								domagic : a_id,
								filter: extraConfig.filter || ''
							},
							remove: '/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/remove',
							update: '/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/update',
							insert: '/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/insert',
							insertParams : {
								domagic : a_id
							},
							updateParams : {
								domagic : a_id
							},
							removeParams : {
								domagic : a_id
							},
							move: 	'/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/move',
							pid: 	'wz_id',
							fields: fields
						}
					});


					grid.on('celldblclick',function(_this,td,cellIndex,record,tr){

						var cell = grid.getView().getHeaderCt().getHeaderAtIndex(cellIndex);
						if (cell.dataIndex != 'wz_tm_id') return false;




					},this);


					gridHeaderCfgHelper.grid = grid;
					grid.getStore().load();

					var detail = Ext.create('Ext.Panel',{
						border:false,
						region:'center',
						layout:'fit',
						items:[]
					});

					var gui = Ext.create('Ext.Panel',{
						border:false,
						layout:'border',
						items:[grid,detail]
					});

					contentWindow.removeAll(true);
					contentWindow.add(gui);
					contentWindow.doLayout();
					contentWindow.setDisabled(false);
					mask.hide();





					showRecordPanel = function(r_id)
					{
						this.saveLastRecord(a_id,r_id);
						var panel = xredaktor_gui.getInstance().renderFormViaId({
							scope: me,
							listeners: {
								afterrender: function(gui) {
									// Geht nicht ...
									console.info('afterrenderxxxxxxxxxxxxxx');
									me.wizardSettings.getGui().setFormData(latestWizardSettings);
								}
							},
							id: a_id,
							r_id: r_id,
							msg: 'Loading ...',
							title: 'Record ['+r_id+']',
							buttons:[{
								text:	'Save',
								iconCls:'xf_save',
								scope: this,
								handler: function() {

									var data = panel.getGui().getFormData();
									console.info('data',data);

									xframe.ajax({
										scope:this,
										url: '/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/spreadSave',
										params : {

											domagic:	a_id,
											json_cfg:	Ext.encode(data),
											id: 		r_id

										},
										success: function(json)
										{
											grid.getStore().load();
										}
									});

								}
							}]
						});

						detail.removeAll();
						detail.add(panel);
						detail.doLayout();
					};

					var r_id = this.openLastRecord(a_id);
					if (r_id > 0) {
						detail.mask("Letzten Datensatz laden ...");
						showRecordPanel.call(this,r_id);
						detail.unmask();
					}

					grid.on('selectionchange',function(view,selections,options){

						if (selections.length != 1) {
							this.saveLastRecord(a_id,0);
							detail.removeAll();
							return;
						}

						var r 		= selections[0].data;
						var r_id 	= r.wz_id;

						showRecordPanel.call(this,r_id);

					},this);




				} catch(e) {console.info('Error Wiz:',e);};
			}
		});

	},

	changeWizard : function(x,r)
	{
		var me = this;
		var a_id = r[0].data.a_id;
		Ext.util.Cookies.set(me.getCookieName(), a_id);
		xframe.setAppTitle('IP: '+ r[0].data.a_name.capitalize());
		this.myMask = new Ext.LoadMask({msg:"Ansicht wird erstellt...",target: this.wizardContent});
		this.myMask.show();
		if (!this.firstTime)
		{
			this.firstTime = true;
		}
		try{
			this.getDefaultWizardView(a_id,this.wizardContent,r[0].data.a_name.capitalize(),this.myMask);
		} catch (e)
		{
			console.info(e);
		}
	},

	getWizardSelectionPanel : function(s_id)
	{

		var a_type = "WIZARD";
		var iconsPrefix = "xr_wizards";

		var fields = [
		{name: 'a_name', 		text:'Name',			type:'string', 	folder: true, editor: {allowBlank: false,xtype: 'textfield'}},
		{name: 'a_id',			text:'Interne Nummer',	type:'int', 	hidden: false}
		];


		var tree = xframe_pattern.getInstance().genTree({
			iconsPrefix: iconsPrefix,
			//			selModelButtons:[but_settings_copy_id],
			//			toolbar_top:[but_settings],
			button_add:false,
			button_del:false,
			region:'west',
			title: 'Infopool Datenbanken',
			forceFit:true,
			border:false,
			split: true,
			justDblClick: true,
			//collapseMode: 'mini',
			collapsible: true,
			xstore: {
				params : {
					a_s_id : s_id,
					a_type : a_type,
					gui_mode : 'INFOPOOL'
				},
				load: 	'/xgo/xplugs/xredaktor/ajax/atoms/load',
				update: '/xgo/xplugs/xredaktor/ajax/atoms/update',
				insert: '/xgo/xplugs/xredaktor/ajax/atoms/insert',
				remove: '/xgo/xplugs/xredaktor/ajax/atoms/remove',
				move: 	'/xgo/xplugs/xredaktor/ajax/atoms/move',
				pid: 	'a_id',
				fields: fields
			}
		});

		tree.on('selectionchange',function(view,selections,options){
			if (selections.length == 0)	{
				Ext.util.Cookies.set(this.getCookieName(), 0);
				return;
			}
			this.changeWizard(view,selections);
		},this,{delay:1});

		tree.on('afterRender',function(){
			if (!this.openFollowingWizard) return;

			var selections = [{
				data : {
					a_id: this.openFollowingWizard.id,
					a_name: this.openFollowingWizard.name
				}
			}];


			this.changeWizard(false,selections);
		},this,{delay:1});

		return tree;
	},

	getWizardMainPanel : function()
	{
		this.wizardContent = Ext.create('Ext.Panel',{
			border:false,
			layout: 'fit'
		});

		var panel = Ext.create('Ext.Panel',{
			region: 'center',
			layout: 'fit',
			border:false,
			items:[this.wizardContent]
		});
		return panel;
	},


	getCookieName : function()
	{
		return 'xr_infopool_last_sel_'+xredaktor.getInstance().getCurrentSiteId();
	},

	getMainPanel : function(s_id,openFollowingWizard,collapseDatabases)
	{

		if (typeof collapseDatabases == 'undefined') collapseDatabases = false;

		this.wizardSelection 	= this.getWizardSelectionPanel(s_id);
		this.wizardMain			= this.getWizardMainPanel();


		if (collapseDatabases)
		{
			this.wizardSelection.setVisible(false);
		}

		var gui = Ext.create('Ext.Panel',{
			layout: 'border',
			border:false,
			items : [this.wizardSelection,this.wizardMain]
		});

		this.openFollowingWizard = false;
		if (typeof openFollowingWizard != 'undefined')
		{
			this.openFollowingWizard = openFollowingWizard;
		}


		gui.on('afterrender',function(){
			var me = this;
			var a_id = 0;
			try {
				a_id = parseInt(Ext.util.Cookies.get(me.getCookieName()),10);
			}catch(e){}

			if (a_id > 0) {

				this.wizardSelection.mask("Öffne letzten Wizard...");
				this.wizardSelection.doSearcherAndSelect(a_id,function(){
					me.wizardSelection.unmask();
				});

			}
		},this,{buffer:10});

		return gui;
	}
};