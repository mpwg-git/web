Ext.define('Ext.xr.field_atomlist', {
	extend: 'Ext.form.FieldContainer',
	alias: 'widget.xr_field_atomlist',


	checkLinearAssozDataArray : function(as_config)
	{
		var data = Ext.decode(as_config,true);
		if (data == null)						data = {'l':[],'a':{}};
		if (typeof data == "undefined") 		data = {'l':[],'a':{}};
		if (typeof data['l'] == "undefined") 	data['l'] = [];
		if (typeof data['a'] == "undefined") 	data['a'] = {};
		if (!Ext.isArray(data['l'])) 			data['l'] = [];
		if (!Ext.isObject(data['a'])) 			data['a'] = [];

		if (typeof data['autoIDOffset'] == "undefined") data['autoIDOffset'] = 0;

		var autoIDOffset 	= parseInt(data['autoIDOffset'],10);
		var check 			= 0;

		Ext.each(data['l'],function(d){
			var v = parseInt(d.v,10);
			if (v > check) check = v;
		},this);

		if (check >= autoIDOffset) {
			autoIDOffset = check;
		}

		data['autoIDOffset'] = autoIDOffset;

		return data;
	},

	syncData: function()
	{
		if (!this.rendered) 				return false;
		if (this.currentSelection == -1) 	return false;

		if (this.grid.getStore().getCount() == 0)
		{
			this.value = Ext.encode({'l':[],'a':{}});
			return true;
		}

		var r = this.grid.getStore().getById(this.currentSelection);
		r.data.atom_cfg = this.formpanel.getForm().getValues();

		var l = [];
		var a = {};

		this.grid.getStore().each(function(r){
			var tmp = {v:r.data.v,atom_cfg:r.data.atom_cfg};

			l.push(tmp);
			a[tmp.v] = tmp;

			return true; // keeep iterating
		},this);

		var data = {'l':l,'a':a};
		this.value = Ext.encode(data);

		return true;
	},


	getValue: function()
	{
		if (typeof this.syncData == 'function')
		{
			this.syncData();
		}
		return this.value;
	},


	setValue: function(value)
	{
		console.info('SETTT',value);
	},

	setRawValue: function(value)
	{
		console.info('SETTT',value);
	},

	getSubmitValue: function()
	{
		this.syncData();
		return this.value;
	},

	constructor:function(cnfg){

		var me = this;
		var ms = me.checkLinearAssozDataArray(''+cnfg.value);

		this.labelAlign = "top";
		this.value = cnfg.value;

		console.info('AL',cnfg.id);
		this.hiddenX = Ext.create('Ext.form.field.Hidden',{
			name: cnfg.name,
			value: cnfg.value,
			scope: this,
			listeners:{
				scope: this,
				buffer: 1,
				change: function(hf,value) {
					var data = Ext.decode(value,true);
					if (data.l)
					{
						console.info("xxxx",this.grid);
						var d = this.checkLinearAssozDataArray(data)['l'];
						ms = data;
						this.grid.getStore().loadData(d);
					}
				}
			}
		});

		this.hiddenX.getValue 		= this.getValue;
		this.hiddenX.getSubmitValue = this.getSubmitValue;

		cnfg.html = "Atomlist: "+cnfg.as_label;
		cnfg.html = "";

		console.info("TTTTTTTTTTTTTTTTTTT");

		var grid = xframe_pattern.getInstance().genMatrix({
			region:'west',
			plain: true,
			autoID: true,
			layout: 'fit',
			flex: 0,
			border: false,
			autoIDOffset : ms.autoIDOffset,
			autoDestroyStore: false,
			width: 70,
			data: me.checkLinearAssozDataArray(ms)['l'],
			auto_flush: {
				scope: me,
				handler: function(oldCfg,newCfg)
				{

				}
			},
			tools: false,
			autoDestroyStore:false,
			forceFit:true,
			plugin_numLines: false,
			button_add: true,
			button_del: true,
			button_short: true,
			xstore: {
				pid: 	'v',
				fields: [
				{name: 'atom_cfg', 	text:'atom_cfg',	type:'object', header:false},
				{name: 'v', 		text:'ID',	type:'string', width: 200, hidden: false}
				//,{name: 'g', 		text:'Anzeige',		type:'string', width: 200, editor: {allowBlank: false,xtype: 'textfield'}}
				]
			}
		});

		this.grid = grid;

		this.rendered = false;
		grid.on('afterrender',function(){
			this.rendered = true;
			grid.getStore().loadData(ms['l']);
		},this);


		this.currentSelection = -1;
		this.latestData	= {};
		this.finalData 	= {};

		grid.on('selectionchange',function(view,selections){

			holder.setDisabled(false);

			if (this.currentSelection != -1)
			{
				this.syncData();
			}

			if  (selections.length == 0) {
				this.currentSelection = -1;
				this.formpanel.getForm().reset();
				return;
			}

			this.currentSelection 	= selections[0].data.v;
			this.latestData			= selections[0].data;


			var atom_cfg  = selections[0].data.atom_cfg;
			if (atom_cfg == "")
			{
				this.formpanel.getForm().reset();
			}

			this.formpanel.getForm().setValues(atom_cfg);
			return true;

		},this,{delay:1});

		var holder = Ext.create('Ext.panel.Panel',{
			disabled: true,
			border: false,
			html: '',
			region: 'center'
		});

		var gui = Ext.create('Ext.panel.Panel',{
			frame: false,
			plain: true,
			border: false,
			layout: 'border',
			fieldLabel: cnfg.as_label,
			items: [this.hiddenX,grid,holder],
			height: 600
		});



		gui.on('afterrender',function(){

			//this.up('form').on('syncform')

		},this);



		xframe.ajax({
			scope:this,
			url: '/xgo/xplugs/xredaktor/ajax/gui/getFormSettingsViaID',
			params: {
				id: cnfg.as_config,
				r_id: 0
			},
			success: function(json) {

				this.formpanel = xredaktor_forms.getInstance().finalize([],json);
				this.formpanel.on('afterrender',function() {
					var fh = fpanel.getHeight() + 25;
					gui.setHeight(fh);
					this.setHeight(fh+23);
				},this,{buffer:1});

				var fpanel = Ext.create('Ext.panel.Panel',{
					border: false,
					layout: 'fit',
					items: this.formpanel
				});



				holder.removeAll();
				holder.add(fpanel);
				holder.doLayout();


			},
			failure: function() {
			}
		});







		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);

		this.add(gui);
	},

	statics: {
		openConfigWindow: function(as,grid) {

			Ext.xr.field.openDefaultConfigWindow({
				grid: grid,
				as: as,
				title: 'Bausteine-Liste Einstellung',
				fields: [{
					xtype: 'xr_field_atom',
					name: 'as_config',
					fieldLabel: 'Basutein'
				}]
			});

		}
	}

});