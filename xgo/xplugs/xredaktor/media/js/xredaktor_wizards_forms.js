var xredaktor_wizards_forms = (function() {
	var instance = null;
	return new function() {

		this.getInstance = function(config) {
			if (instance == null) {
				instance = new xredaktor_wizards_forms_(config);
			}
			return instance;
		}
	}
})();

var xredaktor_wizards_forms_ = function(config) {
	this.config = config || {};
};


xredaktor_wizards_forms_.prototype = {
	
	genDefaultFormById : function() {
		
		this.formPanel = Ext.create('Ext.form.Panel', {
			frame: false,
			border: false,
			autoScroll: true,
			title: 'Lade Formular',
			bodyStyle:'padding:15px',
			fieldDefaults: {
				labelAlign: 'top',
				msgTarget: 'side'
			},
			tbar: [{text:'Speichern',iconCls:'xf_save'}],
			items: []
		});
		
		return this.formPanel;
	}
	
};