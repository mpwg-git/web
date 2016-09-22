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


	finalize: function(final_tbar,json) {

		var gui = false;

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

						gui.mask('Wechsle Sprache ...');
						
						var fields = $$('.xr_multilang');
						Ext.each(fields,function(f) {
							Ext.getCmp(f.id).hide();
						});

						if (!pressed) {
							gui.unmask();
							return;
						}

						var fields = $$(".xr_multilang_"+btn.scopeMeTo);
						Ext.each(fields,function(f) {
							Ext.getCmp(f.id).show();
						});
						
						gui.unmask();

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
				labelAlign: 'left',
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
				}
			}
		});

		return gui;
	}

}