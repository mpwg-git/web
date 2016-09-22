Ext.define('Ext.xr.field_file', {
	extend: 'Ext.form.FieldContainer',
	alias: 'widget.xr_field_file',

	config: {
		fieldLabel: 'File',
		labelWidth: 100,
		width: 300
	},

	constructor:function(cnfg){

		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);


		this.makeGui();
		this.hiddenX = Ext.create('Ext.form.field.Hidden',{
			name: cnfg.name,
			value: cnfg.value,
			listeners: {
				scope: this,
				change: function(fieldx,value){
					this.showImageX();
					this.fireEvent('change', this.hiddenX,value);
				}
			}
		});

		this.add(this.hiddenX);
		this.on('afterrender',function(){
			this.showImageX();
		},this,{buffer:10})
	},

	getValue: function() {
		return this.hiddenX.getValue();
	},


	setValue: function(value) {
		this.hiddenX.setValue(value);
		this.showImageX();
	},

	makeGui: function() {

		var me 			= this;
		this.imgId 		= Ext.id();
		this.imgInfo 	= Ext.id();

		this.add({
			xtype: 'fieldcontainer',
			width: 400,
			// The body area will contain three text fields, arranged
			// horizontally, separated by draggable splitters.
			layout: 'vbox',
			items: [{
				xtype: 'panel',
				border: false,
				width: 170,
				height: 170,
				html: '<div><div class="FA_SELECTOR_imgHolder"><img id="'+me.imgId+'" src="" width="150px" height="150px"></div></div>'
			}, {
				xtype: 'splitter'
			}, {
				id: me.imgInfo,
				border: false,
				xtype: 'panel',
				html: '<div></div>',
				flex: 1
			}, {
				xtype: 'splitter'
			}, {
				border: false,
				xtype: 'panel',
				//height: 200,
				width: 140,
				layout: 'vbox',
				flex: 1,
				items: [{
					xtype: 'button',
					iconCls: 'xf_select',
					text: 'Choose file',
					scope: this,
					handler: this.chooseFile
				},{
					scope: this,
					xtype: 'button',
					iconCls: 'xf_select_del',
					text: 'Delete selection',
					scope: this,
					handler: this.delFile
				}
				]

			}]
		});

	},


	delFile: function() {
		this.hiddenX.setValue(0);
		this.showImageX();
	},

	showImageX: function() {

		var s_id = this.hiddenX.getValue();

		if (s_id == "") s_id = 0;
		if (s_id == 0) 	s_id = "";

		var url = '/xgo/xplugs/xredaktor/ajax/storage/scaleBoxed/'+s_id+'/150/150';

		try{
			Ext.get(this.imgId).dom.setAttribute('src',url);
			Ext.getCmp(this.imgInfo).update("ID:"+s_id);
		} catch (e) {

			this.on('afterrender',function(){
				Ext.get(this.imgId).dom.setAttribute('src',url);
				Ext.getCmp(this.imgInfo).update("ID:"+s_id);
			},this,{buffer:10})

		}
	},

	chooseFile: function() {

		var me = this;
		if (!this.xstorage) this.xstorage = xredaktor_storage.getInstance();

		this.latestSaved = this.rawConfig.value;

		this.xstorage.showFileDialog({
			s_storage_scope: xredaktor.getInstance().getCurrentBasicStorage(),
			site_id: xredaktor.getInstance().getCurrentSiteId(),
			preSelect: me.rawConfig.value,
			latestSaved : me.latestSaved,
			scope: this,
			callBack: function(datax)
			{
				var data = datax[0].data;
				if (!Ext.isNumeric(data.s_id)) data.s_id = '';
				var s_id = data.s_id;

				me.rawConfig.value = s_id;
				this.hiddenX.setValue(s_id);
				this.showImageX();
			}
		});


	}




});
