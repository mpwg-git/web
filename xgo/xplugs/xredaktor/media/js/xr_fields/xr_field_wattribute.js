
Ext.define('Ext.xr.field_wattribute', {
	extend: 'Ext.form.field.Trigger',
	alias: 'widget.xr_field_wattribute',

	trigger1Cls: Ext.baseCSSPrefix + 'form-clear-trigger',
	trigger2Cls: Ext.baseCSSPrefix + 'form-search-trigger',

	hasSearch : false,
	paramName : 'query',

	initComponent: function() {
		var me = this;


		me.callParent(arguments);

		me.on('specialkey', function(f, e){
			if (e.getKey() == e.ENTER) {
				me.onTrigger2Click();
			}
		});

		me.on('change',function() {
			console.info('CHANGE');
		},this);

	},

	afterRender: function(){
		this.callParent();
		this.triggerCell.item(0).setDisplayed(false);
		this.updateView();
	},

	updateView: function() {

		var as_id = parseInt(this.getValue(),10);
		if (isNaN(as_id)) as_id = 0;

		if (this.latestRequest == as_id) {
			if (!this.latestRequest_label) return; // REQUEST PENDING ...
			this.setRawValue(this.latestRequest_label);
			return;
		}

		if (as_id == 0)
		{
			this.setRawValue("");
			return ;
		}

		this.latestRequest = as_id;

		xframe.ajax({
			scope:this,
			url: '/xgo/xplugs/xredaktor/ajax/atoms_settings/getDataRecordFieldByIdName',
			params : {
				id: as_id
			},
			stateless: function(state,json)
			{
				this.latestRequest_label = false;
				if (!state) return;
				this.latestRequest_label = this.genCombiName(json.atom,json.as);
				this.setRawValue(this.latestRequest_label);
			}
		});

	},

	onTrigger1Click : function(){
		var me = this;
	},

	onTrigger2Click : function(){
		var me = this;
		this.openWindow();
	},

	handleAsType: function(as_type,o,j)
	{
		return "XXXXXXXX";

		try {
			var d = this.atom_types_store.getNodeById(as_type);
		} catch (e) {
			return as_type;
		}

		if (!d) return as_type;
		if (!d.data) return as_type;
		if (!d.data.iconCls) return as_type;

		var iconCls = d.data.iconCls;
		var label 	= d.data.label;

		return '<div style="position:relative;"><span class="rendererIconCls '+iconCls+'"></span><span class="rendererIconLabel">'+label+"</span></div>";
	},

	initTrees: function() {

		var s_id = xredaktor.getInstance().getCurrentSiteId();

		this.tree_wizards = xframe_pattern.getInstance().genTree({
			iconsPrefix: "xr_wizards",
			button_add:false,
			button_del:false,
			region:'west',
			title: 'Wizards',
			forceFit:true,
			border:false,
			width: 200,
			split: true,
			justDblClick: true,
			collapseMode: 'mini',
			collapsible: true,
			xstore: {
				params : {
					a_s_id : s_id,
					a_type : "WIZARD",
					gui_mode : 'INFOPOOL'
				},
				load: 	'/xgo/xplugs/xredaktor/ajax/atoms/load',
				update: '/xgo/xplugs/xredaktor/ajax/atoms/update',
				insert: '/xgo/xplugs/xredaktor/ajax/atoms/insert',
				remove: '/xgo/xplugs/xredaktor/ajax/atoms/remove',
				move: 	'/xgo/xplugs/xredaktor/ajax/atoms/move',
				pid: 	'a_id',
				fields: [
				{name: 'a_name', 		text:'Name',			type:'string', 	folder: true, editor: {allowBlank: false,xtype: 'textfield'}},
				{name: 'a_id',			text:'Interne Nummer',	type:'int', 	hidden: false}
				]
			}
		});

		this.tree_wizards.on('selectionchange',function(view,selections,options){
			this.del();

			if (selections.length == 0)	{
				this.tree_attributes.setDisabled(true);
				this.wizardSel = false;
				return;
			}

			this.wizardSel = selections[0].data;
			this.tree_attributes.getStore().proxy.extraParams.as_a_id = selections[0].data.a_id;
			this.tree_attributes.getStore().load();
			this.tree_attributes.setDisabled(false);

		},this,{delay:1});


		/* ****************************** */

		var u = Ext.create('Ext.xr.field_atom_type',{});
		this.atom_types_store = u.getStoreX();

		this.tree_attributes = xframe_pattern.getInstance().genTree({
			iconsPrefix: "xr_wizards_attributes",
			button_add:false,
			button_del:false,
			disabled: true,
			region:'center',
			title: 'Attributes',
			forceFit:true,
			border:false,
			split: true,
			justDblClick: true,
			collapseMode: 'mini',
			collapsible: true,
			xstore: {
				params : {
					showAsTree: 1,
					as_a_id: 0,
					a_s_id : s_id,
					a_type : "WIZARD",
					gui_mode : 'INFOPOOL'
				},
				load: 	'/xgo/xplugs/xredaktor/ajax/atoms_settings/load',
				update: '/xgo/xplugs/xredaktor/ajax/atoms_settings/update',
				insert: '/xgo/xplugs/xredaktor/ajax/atoms_settings/insert',
				remove: '/xgo/xplugs/xredaktor/ajax/atoms_settings/remove',
				move: 	'/xgo/xplugs/xredaktor/ajax/atoms_settings/move',
				pid: 	'as_id',
				fields: [
				{name: 'as_name', 		text:'Name',			type:'string', 	folder: true},
				{name: 'as_id',			text:'Interne Nummer',	type:'int', 	hidden: false},
				{name: 'as_label', 		text:'Label',			type:'string', 	folder: false},
				{name: 'as_type',		text:'Type',			type:'string', 	hidden: true},
				]
			}
		});

		this.tree_attributes.getStore().on('load',function(){
			if (!this.selectThisPath) return;
			this.tree_attributes.unmask();
			this.tree_attributes.selectPath(this.selectThisPath);
			this.selectThisPath = false;
		},this);


		var u = Ext.create('Ext.xr.field_atom_type',{});
		this.atom_types_store = u.getStoreX();

		this.tree_attributes.getStore().on('beforeappend',function(tree,node){
			if (!this.atom_types_store.getNodeById(node.data.as_type))
			{
				node.data.iconCls = "xr_field_not_installed";
			} else
			{
				node.data.iconCls = this.atom_types_store.getNodeById(node.data.as_type).data.iconCls;
			}
		},this);

		this.tree_attributes.on('selectionchange',function(view,selections,options){
			if (selections.length == 0)	{
				this.del();
				return;
			}
			this.setSel(selections[0].data);
		},this,{delay:1});

		this.tree_attributes.on('itemdblclick',function(view,r){
			this.setSel(r.data);
			this.save();
		},this,{delay:1});

		this.tree_wizards.on('afterrender',function(){

			var me = this;
			var as_id = parseInt(this.getValue(),10);
			if (isNaN(as_id)) as_id = 0;

			if ((me.a_id) && (as_id == 0))
			{

				var a_id = me.a_id;
				xframe.ajax({
					scope:this,
					url: "/xgo/xplugs/xredaktor/ajax/gui/getAtomSettings",
					params : {
						a_id: a_id
					},
					stateless: function(success,json)
					{
						if (!success) return;

						if (json.path == "")
						{
							json.path = '/0/'+a_id;
						} else {
							json.path = '/0/'+json.path+'/'+a_id;
						}



						this.tree_wizards.selectPath(json.path,'a_id','/',function(){
						});
					}
				});
				return;
			}

			if (as_id == 0)
			{
				return ;
			}

			this.tree_wizards.mask("Lade Daten ...");
			this.tree_attributes.mask("Lade Daten ...");


			xframe.ajax({
				scope:this,
				url: '/xgo/xplugs/xredaktor/ajax/atoms_settings/getDataRecordFieldByIdName',
				params : {
					id: as_id
				},
				stateless: function(state,json)
				{
					this.tree_wizards.unmask();
					if (!state) {
						this.tree_attributes.unmask();
						return;
					}
					me.selectThisPath = json.p_as;
					this.tree_wizards.selectPath(json.p_a,'a_id','/',function(){

					});


				}
			});


		},this,{buffer:100});


	},


	getPanel: function() {

		this.initTrees();
		var panel = Ext.widget({
			xtype: 'panel',
			layout: 'border',
			items: [this.tree_wizards,this.tree_attributes]
		});

		return panel;
	},

	setSel: function(r) {
		this.attrSel = r;
		this.selection = r.as_id;
		Ext.getCmp(this.btn_save).setDisabled(false);
	},

	del: function() {
		this.selection = "";
		Ext.getCmp(this.btn_save).setDisabled(true);
	},

	genCombiName: function(wz,att)
	{
		return wz.a_name + " | "+att.as_name + "   ["+wz.a_id+"|"+att.as_id+"]";
	},

	getValue: function() {
		if (!this.selection) this.selection = "";
		return this.selection;
	},

	getRawValue: function() {
		if (!this.selection) this.selection = "";
		return this.selection;
	},

	setValue: function(as_id) {
		this.selection = as_id;
		this.updateView();
	},

	save: function() {
		this.setRawValue(this.genCombiName(this.wizardSel,this.attrSel));
		this.selection = this.attrSel.as_id;
		this.win.close();
	},

	abort: function() {
		this.win.close();
	},


	openWindow: function() {

		var panel = this.getPanel();


		this.btn_save = Ext.id();

		this.win = Ext.create('Ext.window.Window', {
			title: 'Wizard | Attribut',
			modal: true,
			width: window.innerWidth*0.6,
			height: window.innerHeight*0.8,
			layout: 'fit',
			items: [panel],
			bbar: ['->',{
				id: this.btn_save,
				iconCls: 'xf_save',
				text: 'Speichern',
				scope: this,
				disabled: true,
				handler: this.save
			},{
				iconCls: 'xf_del',
				text: 'Löschen',
				scope: this,
				handler: this.del
			},'-',{
				iconCls: 'xf_abort',
				text: 'Abbrechen',
				scope: this,
				handler: this.abort
			}]
		});

		this.win.show();
	}



});



