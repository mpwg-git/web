var xredaktor_autoCompletion = (function() {
	var instance = null;
	return new function() {
		this.getInstance = function(config) {
			if (instance == null) {
				instance = new xredaktor_autoCompletion_(config);
			}
			return instance;
		}
	}
})();

var xredaktor_autoCompletion_ = function(config) {
	this.config = config || {};
};

xredaktor_autoCompletion_.prototype = {

	openWin : function(editor)
	{
		var pos = editor.cursorCoords();
		Ext.create('Ext.Window', {
			title: 'Code-Pad',
			width: 400,
			height: 200,
			x: pos.x,
			y: pos.yBot,
			modal:true,
			plain: true,
			headerPosition: 'right',
			layout: 'fit',
			items: {
				border: false
			}
		}).show();
	}

};