var xluerzer_oe = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xluerzer_oe";
		}

		this.getInstance = function(config) {
			if (instance == null) {
				instance = new xluerzer_oe_(config);
			}
			return instance;
		}
	}
})();

var xluerzer_oe_ = function(config) {
	this.config = config || {};
};

xluerzer_oe_.prototype = {

	openGrid_fe_users: function()
	{
	},
	
	openGrid_be_users: function()
	{
	},
	
	
}