var xredaktor_config = (function() {
	var instance = null;
	return new function() {
		this.getInstance = function(config) {
			if (instance == null) {
				instance = new xredaktor_config_(config);
			}
			return instance;
		}
	}
})();

var xredaktor_config_ = function(config) {
	this.config = config || {};
};

xredaktor_config_.prototype = {

	getMainPanel : function()
	{
		return Ext.create('Ext.Panel',{
			html:'config'
		});
	}
};