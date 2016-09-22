var xluerzer_students_winner = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xluerzer_students_winner";
		}

		this.getInstance = function(config) {
			return  new xluerzer_students_winner_(config);
			return instance;
		}
	}
})();

var xluerzer_students_winner_ = function(config) {
	this.config = config || {};
};

xluerzer_students_winner_.prototype = {

	openGrid_fe_users: function()
	{
	},
	
	openGrid_be_users: function()
	{
	},
	
	
}