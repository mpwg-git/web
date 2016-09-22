var xredaktor_forms = (function() {
	var instance = null;
	return new function() {

		this.getInstance = function(config) {
			return new xredaktor_forms_(config);
		}
	}
})();

var xredaktor_forms_ = function(config) {
	this.config = config || {};
};

xredaktor_forms_.prototype = {


	/*

	TREE
	GRID

	PANEL - BORDER

	TREE selection --> prxy reloaden

	SUCH PANEL


	*/

	renderInfoPoolCombi: function(panel,wz_id,filters)
	{

	},

	renderInfoPoolCombi: function(panel,wz_id,filters)
	{

	},

	renderInfoPoolRecordFinal: function(detail, wz_id, wz_r_id,vId)
	{
		var me = this;
		var panel = xredaktor_gui.getInstance().renderFormViaId({
			vId: vId,
			scope: me,
			id: wz_id,
			r_id: wz_r_id,
			msg: 'Loading Form ...',
			buttons:[{
				text:	'Save',
				iconCls:'xf_save',
				scope: this,
				handler: function() {

					var data = panel.getGui().getFormData();
					console.info('data2save',data);

					detail.mask('Speicher Daten...');

					xframe.ajax({
						scope:this,
						url: '/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/spreadSave',
						params : {

							domagic:	wz_id,
							json_cfg:	Ext.encode(data),
							id: 		wz_r_id

						},
						success: function(json)
						{
							detail.unmask();
						}
					});

				}
			},
			{
				scope: this,
				iconCls: 'xf_reload',
				text: 'Reload',
				handler: function() {
					me.renderInfoPoolRecord(detail, wz_id, wz_r_id);
				}
			}]
		});

		return panel;
	},


	renderInfoPoolRecord: function(detail, wz_id, wz_r_id, vId)
	{
		if (typeof vId == 'undefined') vId = false;

		var panel = false;

		if (vId)
		{
			if (!this.cacheVids2Id) this.cacheVids2Id = {};

			if (!this.cacheVids2Id[wz_id])
			{
				xframe.ajax({
					scope:this,
					url: '/xgo/xplugs/xredaktor/ajax/gui/resolvevId',
					params : {
						type: 'WIZARD',
						vid: wz_id
					},
					success: function(json)
					{
						this.cacheVids2Id[wz_id] = json.id
						panel = this.renderInfoPoolRecordFinal(detail, this.cacheVids2Id[wz_id], wz_r_id, vId);
						detail.removeAll();
						detail.add(panel);
						detail.doLayout();
					}
				});
			} else {
				panel = this.renderInfoPoolRecordFinal(detail, this.cacheVids2Id[wz_id], wz_r_id, vId);
			}

		} else
		{
			panel = this.renderInfoPoolRecordFinal(detail, wz_id, wz_r_id,vId);
		}
		if (panel)
		{
			detail.removeAll();
			detail.add(panel);
			detail.doLayout();
		}
	},



	finalize: function(final_tbar,json) {

		var gui = false;
		var me	= this;

		if (json.fe_langs && json.multilang)
		{
			final_tbar.push('-');
			var scopeMe = Ext.id();

			Ext.each(json.fe_langs,function(lang,i){

				var tmp = {
					scopeMeTo: lang.fel_ISO,
					pressed: (i==0),
					text: "<b>"+lang.fel_ISO+"</b>",
					enableToggle: true,
					toggleGroup: 'SuperLangToggle_'+scopeMe,
					toggleHandler: function(btn, pressed) {
						if (!pressed) return;

						var form 		= this.up('form');
						var lang_spec 	= "xr_multilang_"+btn.scopeMeTo;
						var fields 		= $$('.xr_multilang',form.el.dom);

						form.mask('Change language ...');

						setTimeout(function(){

							Ext.each(fields,function(f) {
								if ($$(f).hasClass(lang_spec))
								{
									//$$('#'+f.id).show();
									Ext.getCmp(f.id).show();
								} else {
									Ext.getCmp(f.id).hide();
									//$$('#'+f.id).hide();
								}
							});
							
							form.unmask();

						},1);


					}
				};

				final_tbar.push(tmp);
			},this);
		}

		gui = Ext.create('Ext.form.Panel', {
			layout: 'fit',
			frame: false,
			border: false,
			autoScroll: true,
			bodyStyle:'padding:5px',
			fieldDefaults: {
				labelAlign: 'top',
				msgTarget: 'side'
			},
			tbar: final_tbar,
			items: [json.gui],
			defaults: {
				anchor: '100%'
			},
			defaultType: 'textfield',
			listeners: {
				scope: this,
				buffer: 10,
				afterrender: function(fp) {
					//console.info("Formfields: ",$$('.xr_f','#'+fp.id).length);

					var tabKey 		= "infopool_last_panel_byaid_"+json.a_id;
					var tabpanel 	= fp.down('tabpanel');

					if (!tabpanel) return;

					tabpanel.on('tabchange',function(tabPanel,newCard) {
						//console.info('changed',newCard,json);
						Ext.util.Cookies.set(tabKey,newCard.title);
					},this,{buffer:10});


					var title = Ext.util.Cookies.get(tabKey);
					if (typeof title != 'undefined')
					{
						//console.info("Preselected",title,tabpanel.items.items);

						Ext.each(tabpanel.items.items,function(panelx){

							if (panelx.title == title)
							{
								tabpanel.setActiveTab(panelx.id);
							}

						},this);


					}

				}
			}
		});






		return gui;
	}

}