var xredaktor_forms_be = (function() {
	var instance = null;
	return new function() {
		this.getInstance = function(config) {
			return new xredaktor_forms_be_(config);
		}
	}
})();

var xredaktor_forms_be_ = function(config) {
	this.config = config || {};
};

xredaktor_forms_be_.prototype = {

	
	loadAtom: function()
	{
		
	},
	
	getMainPanel : function(a_id, a_type)
	{
		var gui = Ext.widget({
			xtype: 'panel',
			title: 'BE-FORMS',
			layout: 'border',
			items: []
		});

		gui.loadAtom = this.loadAtom;
		return gui;
	}
	
}