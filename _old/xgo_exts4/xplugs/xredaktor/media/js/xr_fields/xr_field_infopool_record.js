Ext.define('Ext.xr.field_infopool_record', {
	extend: 'Ext.panel.Panel',
	alias: 'widget.xr_field_infopool_record',

	config: {
		border: false
	},


	getRecordsPanel: function() {

		var a_id = 0;

		var fields = [
		{name: 'wz_id',		text:'Interne Nummer',		type:'int',		hidden: false, 	header:true, width: 50, flex:0},
		{name: 'titleIt',	text:'Titel',				type:'string' , hidden: false, 	header:true},
		];

		var grid = this.grid = xframe_pattern.getInstance().genGrid({
			region:'center',
			search:true,
			forceFit:true,
			border:false,
			split: true,
			pager:true,
			title: 'Datensätze',
			plugin_numLines: true,
			noDND: true,
			xstore: {
				load: 	'/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/load',
				loadParams : {
					titleIt: 1,
					domagic : a_id
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

		return grid;
	},


	getWizardsPanel: function() {

		var s_id = xredaktor.getInstance().getCurrentSiteId();

		var fields = [
		{name: 'a_name', 		text:'Name',			type:'string', 	folder: true, editor: {allowBlank: false,xtype: 'textfield'}},
		{name: 'a_id',			text:'Interne Nummer',	type:'int', 	hidden: false}
		];

		var tree = xframe_pattern.getInstance().genTree({
			iconsPrefix: "xr_wizards",
			region:'west',
			noDND: true,
			title: 'Infopool Datenbanken',
			forceFit:true,
			border:false,
			split: true,
			justDblClick: true,
			xstore: {
				params : {
					a_s_id : s_id,
					a_type : 'WIZARD',
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

		return tree;
	},

	showRecordsOf: function(wid) {

		this._wid = wid;

		this.record.setDisabled(false);
		var store = this.gird.getStore();
		store.proxy.extraParams.domagic = wid;
		store.load();
	},




	selectRecord: function(r) {

		var r_id 		= r.wz_id;
		var titleIt 	= r.titleIt;

		var d = {
			wz_id: this._wid,
			r_id: r_id,
			titleIt:  titleIt
		}

		this.latestSel = d.wz_id+";"+d.r_id;

		this.selectRecordFinal(d,false);
	},


	selectRecordFinal: function(d) {
		this.current.getForm().setValues(d);
		this.current.setDisabled(false);
	},

	getCurrentSettingsFromBackend: function(wz_id,r_id,cb) {

		this.gui.mask("Lade aktuelle Daten ...");

		xframe.ajax({
			scope:this,
			url: '/xgo/xplugs/xredaktor/ajax/gui/getInfopoolRecord',
			params : {
				wz_id:wz_id,
				r_id:r_id
			},
			stateless: function(success,json)
			{
				this.gui.unmask();
				if (!success) return;

				this.tree.selectPath('/0'+json.d.wz_path+"/"+wz_id);
				this.selectRecordFinal(json.d);
			}
		});

	},

	getValue: function()
	{
		return this.hiddenX.getValue();
	},

	setValue: function(value)
	{
		this.hiddenX.setValue(value);
	},

	handleChangeEvent: function() {

		if (this.hiddenX.getValue() != "") {

			var ids 	= this.hiddenX.getValue().split(";");
			if (ids.length != 2) return false;

			var wz_id 	= parseInt(ids[0],10);
			var r_id 	= parseInt(ids[1],10);

			if ((wz_id > 0) && (r_id > 0)) {

				this.recordInfo.mask('Aktualisiere Einstellungen ...');
				xframe.ajax({
					scope:this,
					url: '/xgo/xplugs/xredaktor/ajax/gui/getInfopoolRecord',
					params : {
						wz_id:wz_id,
						r_id:r_id
					},
					stateless: function(success,json)
					{
						this.recordInfo.unmask();
						if (!success) return;
						this.recordInfo.setValue(json.d.IR_TITLEIT || '[X]');
					}
				});



			} else

			return false;

		} else {
			this.recordInfo.setValue('[X]');
		}
	},

	checkPreSelection: function() {

		if (this.hiddenX.getValue() != "") {

			var ids 	= this.hiddenX.getValue().split(";");
			if (ids.length != 2) return false;

			var wz_id 	= parseInt(ids[0],10);
			var r_id 	= parseInt(ids[1],10);

			if ((wz_id > 0) && (r_id > 0)) {


				this.latestSel = this.hiddenX.getValue();

				this.getCurrentSettingsFromBackend(wz_id,r_id,function(d){
					this.selectRecordFinal(d);
				});

				return true;
			}

			return false;

		}

		return false;
	},

	saveLatestSel: function() {
		this.hiddenX.suspendEvents();
		this.hiddenX.setValue(this.latestSel);
		this.hiddenX.resumeEvents();
		this.fireEvent('change',this,this.latestSel)

		// update record text info
		var record 	= this.current.getForm().getValues();
		var wz_tite = this.latest_wizard_name;
		var txt = wz_tite + " / " + record.titleIt+" ["+record.wz_id+"/"+record.r_id+"]";
		this.recordInfo.setValue(txt);

		this.win.close();
	},

	selectWizardRecord: function() {

		var win 	= false;
		var width 	= window.innerWidth*0.9;
		var height 	= window.innerHeight*0.9;

		this.tree = this.getWizardsPanel();
		this.tree.on('selectionchange',function(view,selections,options) {

			if (selections.length != 1) {
				this.grid.setDisabled(true);
				return;
			}

			var r 		= selections[0].data;
			var wid 	= r.a_id;

			this.latest_wizard_name = selections[0].raw.a_name;
			this.showRecordsOf(wid);

		},this);

		this.gird 		= this.getRecordsPanel();

		this.grid.on('itemdblclick',function(view,selections,options){
			this.saveLatestSel();
		},this,{buffer:100});

		this.grid.on('selectionchange',function(view,selections,options){

			if (selections.length != 1) {
				return;
			}

			var r = selections[0].data;
			this.selectRecord(r);

		},this);


		this.current = Ext.create('Ext.form.Panel',{

			border: false,

			title: 'Ausgewählter Datensatz',
			xtype: 'form',
			region: 'north',

			bodyPadding: 5,
			layout: 'anchor',

			defaults: {
				anchor: '100%',
				labelAlign: 'left'
			},

			items: [{
				xtype: 'hidden',
				readOnly: true,
				fieldLabel: 'Wizard',
				name: 'wz_id'
			},{
				xtype: 'textfield',
				readOnly: true,
				fieldLabel: 'Datensatz ID',
				name: 'r_id'
			},{
				xtype: 'textfield',
				readOnly: true,
				fieldLabel: 'Titel',
				name: 'titleIt'
			}]

		});

		this.record = Ext.create('Ext.panel.Panel',{
			disabled: true,
			border: false,
			region: 'center',
			layout: 'border',
			items: [this.gird,this.current]

		});

		this.gui = Ext.create('Ext.panel.Panel',{
			xtype: 'panel',
			layout: 'border',
			items: [this.tree,this.record],
			bbar: ['->',{
				iconCls: 'xf_select',
				text: 'Auswählen',
				scope: this,
				handler: function() {
					this.saveLatestSel();
				}
			},{
				iconCls: 'xf_abort',
				text: 'Abbrechen',
				scope: this,
				handler: function() {
					win.close();
				}
			}]
		});

		win = Ext.create('widget.window', {
			border:false,
			iconCls:'xf_select',
			title: 'Infopool & Datensatz wählen...',
			closable: true,
			width: width,
			height: height,
			modal:true,
			layout: 'fit',
			items: [this.gui],
			listeners: {
				scope: this,
				buffer: 1,
				afterrender: function() {
					this.checkPreSelection();
				}
			}
		});
		this.win = win;

		win.show();
	},

	constructor:function(cnfg){

		var IR_TITLEIT = "[X]";

		if (cnfg.IR_TITLEIT)
		{
			IR_TITLEIT = cnfg.IR_TITLEIT;
		}

		var me = this;
		this.hiddenX = Ext.create('Ext.form.field.Hidden',{
			name: cnfg.name,
			value: cnfg.value,
			scope: this,
			listeners:{
				scope: this,
				buffer: 1,
				change: this.handleChangeEvent
			}
		});

		this.butts = {
			xtype: 'container',
			layout: 'hbox',
			margin: '0 0 10',
			items: [{
				xtype: 'button',
				scope: this,
				iconCls:'xf_select',
				text: 'Set Record',
				handler: this.selectWizardRecord
			}, {
				xtype: 'splitter',
				width: 10
			}, {
				iconCls:'xf_select_del',
				xtype: 'button',
				scope: this,
				text: 'Remove Record',
				handler: function() {

				}
			}]
		};

		this.recordInfo = Ext.create('Ext.form.field.Text',{
			fieldLabel: 'Record',
			value: IR_TITLEIT,
			readOnly:true,
		});

		this.recordInfo.on('focus',function(){
			this.selectWizardRecord();
		},this);

		this.labelX = {
			title: cnfg.fieldLabel,
			xtype:'fieldset',
			defaultType: 'textfield',
			collapsed: false,
			layout: 'anchor',
			defaults: {
				anchor: '100%',
				labelAlign: 'left'
			},
			items :[this.recordInfo,this.butts]
		};

		cnfg.items = [this.hiddenX,this.labelX];

		cnfg.listeners = {
			scope: this,
			buffer: 1,
			afterrender: function() {

			}
		};

		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);
	}

});