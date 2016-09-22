
var xluerzer_highres = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xluerzer_highres";
		}

		this.getInstance = function(config) {
			return new xluerzer_highres_(config);
			return instance;
		}
	}
})();

var xluerzer_highres_ = function(config) {
	this.config = config || {};
};

xluerzer_highres_.prototype = {
	
	
	open_overview: function()
	{
		
		var gui = xredaktor_storage.getInstance().getMainPanel({
			guiMode: 'FILES_ONLY',
			dir_s_id: 462775
		});
		gui.title = 'High-Res Uploads';
		
		xluerzer.getInstance().showContent(gui);
	}
	
	
};