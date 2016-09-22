var xcrm = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xcrm";
		}

		this.getInstance = function(config) {
			if (instance == null) {
				instance = new xcrm_(config);
			}
			return instance;
		}
	}
})();

var xcrm_ = function(config) {
	this.config = config || {};
};

xcrm_.prototype = {

	getAjaxPath : function(suffix)
	{
		return '/xgo/xplugs/xcrm/ajax'+suffix;
	},

	showDesktop : function() {
		xcrm_gui.getInstance().buildDesktop();
	},

	showDesktop2 : function() {
		xcrm_gui2.getInstance().buildDesktop();
	}

}
