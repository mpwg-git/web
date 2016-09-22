var xluerzer_publish = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xluerzer_publish";
		}

		this.getInstance = function(config) {
			if (instance == null) {
				instance = new xluerzer_publish_(config);
			}
			return instance;
		}
	}
})();

var xluerzer_publish_ = function(config) {
	this.config = config || {};
};

xluerzer_publish_.prototype = {
	
	open: function() {
		
		var gui = {
			xtype: 'panel',
			title: 'PUBLISH',
			html: 'PUBLISH'
		};
		
		xluerzer.getInstance().showContent(gui);
		
	}
	
}