var xmarketing = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xmarketing";
		}

		this.getInstance = function(config) {
			if (instance == null) {
				instance = new xmarketing_(config);
			}
			return instance;
		}
	}
})();

var xmarketing_ = function(config) {
	this.config = config || {};
};

xmarketing_.prototype = {

	noAccess: function()
	{
		Ext.Msg.alert('Zugriff verweigert', 'Sie können die gewünschte Funktion nicht ausführen.');
	},

	getAjaxPath : function(suffix)
	{
		return '/xgo/xplugs/xmarketing/ajax'+suffix;
	},


	ifUserEnabled : function(cfg)
	{
		var me = this;
		xframe.ajax({
			scope: me,
			url: xmarketing.getInstance().getAjaxPath('/security/checkUserSettings'),
			params : {
				module : cfg.module
			},
			success: function(d) {
				if (d.PERMISSION)
				{
					cfg.fn.call(cfg.scope);
				} else
				{
					me.noAccess();
				}
			},
			stateless: function(json)
			{
			}
		});

	},

	openEmission : function() {
		this.ifUserEnabled({
			module: 'EMISSION',
			scope: this,
			fn : function() {
				xframe.setAppTitle('Aussendungen');
				xredaktor.getInstance().switchContent(xmarketing_emission.getInstance().getMainPanel());
			}
		});
	},


	openLists : function() {
		this.ifUserEnabled({
			module: 'LISTS',
			scope: this,
			fn : function() {
				xframe.setAppTitle('Lists');
				xredaktor.getInstance().switchContent(xmarketing_lists.getInstance().getMainPanel());
			}
		});
	},


	openRecipients : function() {
		this.ifUserEnabled({
			module: 'RECIPIENTS',
			scope: this,
			fn : function() {
				xframe.setAppTitle('Empfänger');
				xredaktor.getInstance().switchContent(xmarketing_recipients.getInstance().getMainPanel());
			}
		});
	},


	openInfopool : function() {
		this.ifUserEnabled({
			module: 'REPORTS',
			scope: this,
			fn : function() {
				xframe.setAppTitle('Informationspool');
				xredaktor.getInstance().openInfoPool();
			}
		});
	},


	openConfig: function() {
		this.ifUserEnabled({
			module: 'CONFIG',
			scope: this,
			fn : function() {
				xframe.setAppTitle('Konfiguration');
				xredaktor.getInstance().switchContent(xmarketing_config.getInstance().getMainPanel());
			}
		});
	},

	getTopMenu : function()
	{
		var buttons = [{
			text: 	'Aussendungen',
			scale: 	'large',
			height: 60,
			scope: this,
			handler: this.openEmission
		},
		{
			height: 60,
			text: 	'Listen',
			scale: 	'large',
			scope: this,
			handler: this.openLists
		},
		{
			height: 60,
			text: 	'Empfänger',
			scale: 	'large',
			scope: this,
			handler: this.openRecipients
		},
		{
			height: 60,
			text: 	'Infopool',
			scale: 	'large',
			scope: this,
			handler: this.openInfopool
		},
		{
			height: 60,
			text: 	'Konfigurationen',
			scale: 	'large',
			scope: this,
			handler: this.openConfig
		}]

		return buttons;
	}


}
