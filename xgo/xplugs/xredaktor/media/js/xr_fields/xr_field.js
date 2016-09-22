Ext.define('Ext.xr.field', {
	extend: 'Ext.form.field.Text',
	alias: 'widget.xr_field',


	statics: {

		checkLinearAssozDataArray : function(as_config)
		{
			var data = Ext.decode(as_config,true);
			if (data == null)						data = {'l':[],'a':{}};
			if (typeof data == "undefined") 		data = {'l':[],'a':{}};
			if (typeof data['l'] == "undefined") 	data['l'] = [];
			if (typeof data['a'] == "undefined") 	data['a'] = {};
			if (!Ext.isArray(data['l'])) 			data['l'] = [];
			if (!Ext.isObject(data['a'])) 			data['a'] = [];
			return data;
		},

		rebuildAssozDataForLinAssozDataArray : function(l)
		{
			if (typeof l == "undefined") 			l = [];
			if (!Ext.isArray(l)) 					l = [];

			var data = {'l':l,'a':{}};

			Ext.each(l,function(pack){
				try{
					data['a'][pack.v] = pack;
				} catch(e) {};
			},this);

			return data;
		},

		openDefaultConfigWindowAssozSettings: function(cfg) {

			var me 	= this;
			var win = false;

			if (typeof cfg.grid == "undefined") cfg.grid = false

			if ((!cfg.as) || (typeof cfg.as['as_config'] == 'undefined')) {
				xframe.alert("Interner Fehler","Falscher Funktionsaufruf : openDefaultConfigWindow");
				console.error(cfg);
				return;
			}

			var as_id		= cfg.as['as_id'];
			var as_type 	= cfg.as['as_type'];
			var as_config 	= cfg.as['as_config'];


			var title = "";

			switch(as_type)
			{
				case 'COMBO':
				title = 'Dropdown Konfiguration';
				break;
				case 'RADIO':
				title = 'Radio Konfiguration';
				break;
				case 'CHECKBOX':
				title = 'Checkbox Konfiguration';
				break;
			}

			var fields = [
			{name: 'v', text:'Wert',		type:'string', width: 200, editor: {
				allowBlank: false,
				xtype: 'textfield'
			}},
			{name: 'g', text:'Anzeige',	type:'string', width: 200, editor: {
				allowBlank: false,
				xtype: 'textfield'
			}}];

			var langs = xredaktor.getInstance().getLFE();

			console.info('langs',langs);

			Ext.each(langs,function(s){
				var iso = s.fel_ISO;
				fields.push({name: iso.toUpperCase(), text:'Anzeige '+iso,	type:'string', width: 200, editor: {
					allowBlank: false,
					xtype: 'textfield'
				}});
			});

			var autocheckId = Ext.id();
			var win = xframe.win({
				title:title,
				modal:true,
				items: xframe_pattern.getInstance().genMatrix({
					data: me.checkLinearAssozDataArray(as_config)['l'],
					toolbar_bottom : [{
						xtype:'label',
						id: autocheckId,
						html:'Eingabenkontrolle: <b>noch nicht ausgeführt.</b>'
					}],
					auto_flush: {
						scope: me,
						handler: function(oldCfg,newCfg)
						{
							Ext.getCmp(autocheckId).setText('Überprüfe Eingabe ...');

							var doubles 		= {};
							var errorDoubles 	= false;
							var errorEmpty 		= false;
							var errorEmptyV		= false;

							Ext.each(newCfg,function(i){
								var key = i.v;

								if (typeof doubles[key] == 'undefined') {
									doubles[key] = 1;
								}
								else
								{
									errorDoubles = true;
								}

								if (i['v'] == "")
								{
									errorEmptyV = true;
								}

								var checkValues = "";

								Ext.iterate(i,function(k,v){
									if (k == 'v') return;
									checkValues += v;
								},this);

								if (checkValues == "") errorEmpty = true;
							},this);

							if (errorDoubles)
							{
								Ext.getCmp(autocheckId).setText('Achtung: <b>Die Matrix beinhaltet min. 2 gleiche Werte, dies kann zu fehlern führen.</b> ',false);
							} else
							{
								Ext.getCmp(autocheckId).setText('Eingabenkontrolle: Keine Fehler gefunden.');
							}
							if (errorEmpty)
							{
								Ext.getCmp(autocheckId).setText('Achtung: <b>Die Matrix beinhaltet min. einen Datensatz dessen "Anzeigen" nicht eingegeben wurde.</b> ',false);
							}
							if (errorEmptyV)
							{
								Ext.getCmp(autocheckId).setText('Achtung: <b>Die Matrix beinhaltet min. einen Datensatz dessen Wert wurde nicht eingegeben wurde.</b> ',false);
							}

						}
					},
					tools: false,
					autoDestroyStore:false,
					forceFit:true,
					plugin_numLines: true,
					button_add: true,
					button_del: true,
					button_save : {
						scope: me,
						iconCls:'xf_save',
						text: 'Konfiguration speichern',
						handler: function(oldCfg,newCfg)
						{
							cfg.grid.mask('Speichere Daten ...');
							var fixed = me.rebuildAssozDataForLinAssozDataArray(newCfg);
							xframe.ajax({
								url: '/xgo/xplugs/xredaktor/ajax/atoms_settings/updateConfig',
								params: {
									as_config : Ext.encode(fixed),
									as_id:		as_id
								},
								success: function() {
									cfg.grid.unmask();
									cfg.grid.getStore().load();
								},
								failure: function() {
									cfg.grid.unmask();
									cfg.grid.getStore().load();
								}
							});

							setTimeout(function(){
								win.destroy();
							},1);
						}
					},
					xstore: {
						pid: 	'v',
						fields: fields
					}})
			});
			win.show();


		},


		openDefaultConfigWindow: function(cfg) {

			var me 	= this;
			var win = false;

			if (typeof cfg.grid == "undefined") cfg.grid = false

			if ((!cfg.as) || (typeof cfg.as['as_config'] == 'undefined')) {
				xframe.alert("Interner Fehler","Falscher Funktionsaufruf : openDefaultConfigWindow");
				console.error(cfg);
				return;
			}

			var fp = Ext.create('Ext.form.Panel', {
				bodyPadding: 5,
				layout: 'anchor',
				defaults: {
					anchor: '100%'
				},
				defaultType: 'textfield',
				items: cfg.fields,
				listeners: {
					scope: this,
					afterrender: function() {

						console.info("initValue",cfg.as['as_config']);

						if (cfg.as_config_json)
						{
							var as_config_json = Ext.decode(cfg.as['as_config'],true)
							fp.getForm().setValues(as_config_json);
						} else
						{
							fp.getForm().setValues({
								as_config: cfg.as['as_config']
							});
						}


					}
				}
			});

			save = function() {
				if (cfg.grid) cfg.grid.mask("Aktualisiere Listendarstellung ....");
				xframe.ajax({
					url: '/xgo/xplugs/xredaktor/ajax/atoms_settings/updateConfig',
					params: {
						as_config: cfg.as['as_config'],
						as_id: cfg.as['as_id']
					},
					stateless: function(success,json) {
						if (cfg.grid) {
							cfg.grid.unmask();
							cfg.grid.getStore().load();
						}
					}
				});
				win.close();
			};


			win = Ext.create('Ext.window.Window', {
				title: cfg.title,
				modal: true,
				width: 400,
				layout: 'fit',
				items: [fp],
				bbar: ['->',{
					iconCls: 'xf_save',
					text: 'Speichern',
					scope: this,
					handler: function() {

						var fp_values = fp.getForm().getValues();
						var as_config = "";

						if (cfg.as_config_json)
						{
							as_config = Ext.encode(fp_values);
						} else
						{
							if (typeof fp_values['as_config'] == "undefined")
							{
								as_config = "";
							} else
							{
								as_config = fp_values['as_config'];
							}
						}


						cfg.as['as_config'] = as_config;
						save();
					}
				},{
					iconCls: 'xf_del',
					text: 'Löschen',
					scope: this,
					handler: function() {
						cfg.as['as_config'] = '';
						save();
					}
				},'-',{
					iconCls: 'xf_abort',
					text: 'Abbrechen',
					scope: this,
					handler: function() {
						win.close();
					}
				}]
			});

			console.info('as',cfg.as,fp);

			win.show();
		}
	},

	openInitalValueWindow: function(cfg) {

		var me 	= this;
		var win = false;

		if (typeof cfg.grid == "undefined") cfg.grid = false

		if ((!cfg.as) || (typeof cfg.as['as_init'] == 'undefined')) {
			xframe.alert("Interner Fehler","Falscher Funktionsaufruf : openInitalValueWindow");
			console.error(cfg);
			return;
		}

		var fp = Ext.create('Ext.form.Panel', {
			bodyPadding: 5,
			layout: 'anchor',
			defaults: {
				anchor: '100%'
			},
			defaultType: 'textfield',
			items: cfg.fields,
			listeners: {
				scope: this,
				afterrender: function() {

					console.info("initValue",cfg.as['as_init']);
					fp.getForm().setValues({
						as_init: cfg.as['as_init']
					});

				}
			}
		});

		save = function() {
			if (cfg.grid) cfg.grid.mask("Aktualisiere Listendarstellung ....");
			xframe.ajax({
				url: '/xgo/xplugs/xredaktor/ajax/atoms_settings/updateInit',
				params: {
					as_init: cfg.as['as_init'],
					as_id: cfg.as['as_id']
				},
				stateless: function(success,json) {
					if (cfg.grid) {
						cfg.grid.unmask();
						cfg.grid.getStore().load();
					}
				}
			});
			win.close();
		};


		win = Ext.create('Ext.window.Window', {
			title: cfg.title,
			modal: true,
			width: 400,
			layout: 'fit',
			items: [fp],
			bbar: ['->',{
				iconCls: 'xf_save',
				text: 'Speichern',
				scope: this,
				handler: function() {
					var as_init = fp.getForm().getValues()['as_init'];
					cfg.as['as_init'] = as_init;
					save();
				}
			},{
				iconCls: 'xf_del',
				text: 'Löschen',
				scope: this,
				handler: function() {
					cfg.as['as_init'] = '';
					save();
				}
			},'-',{
				iconCls: 'xf_abort',
				text: 'Abbrechen',
				scope: this,
				handler: function() {
					win.close();
				}
			}]
		});

		console.info('as',cfg.as);

		win.show();
	}


});